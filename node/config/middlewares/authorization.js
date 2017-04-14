'use strict';

/*

  Se agrego esta nueva regla para dar acceso al usuario actual,
  se comprueba primero que el usuario este autenticado, si lo esta,
  se comprueba su nivel: si es administrador o gerente obtiene acceso
  a la ruta solicitada, si no es ninguna de las anteriores se redirige al root,
  si no esta autenticado se redirige a login

*/

exports.authCRM = {

  isAdmin: function(req, res, next) {
    if (req.isAuthenticated()) {
      if (req.user.nivel == "administrador") {
        next();
      }else{
        res.redirect("/");
      }
    }else{
      res.redirect("/login");
    }
  },

  isManager: function(req, res, next) {
    if (req.isAuthenticated()) {
      if (req.user.nivel == "gerente") {
        next();
      }else{
        res.redirect("/");
      }
    }else{
      res.redirect("/login");
    }
  },

  isAdminOrManager: function(req, res, next) {
    if (req.isAuthenticated()) {
      if (req.user.nivel == "administrador" || req.user.nivel == "gerente") {
        next();
      }else{
        res.redirect("/");
      }
    }else{
      res.redirect("/login");
    }
  }
};

/*
 *  Generic require login routing middleware
 */

exports.requiresLogin = function (req, res, next) {
  if (req.isAuthenticated()) return next();
  if (req.method == 'GET') req.session.returnTo = req.originalUrl;
  res.redirect('/login');
};

/*
 *  User authorization routing middleware
 */

exports.user = {
  hasAuthorization: function (req, res, next) {
    if (req.profile.id != req.user.id) {
      req.flash('info', 'You are not authorized');
      return res.redirect('/users/' + req.profile.id);
    }
    next();
  }
};

/*
 *  Article authorization routing middleware
 */

exports.article = {
  hasAuthorization: function (req, res, next) {
    if (req.article.user.id != req.user.id) {
      req.flash('info', 'You are not authorized');
      return res.redirect('/articles/' + req.article.id);
    }
    next();
  }
};

/**
 * Comment authorization routing middleware
 */

exports.comment = {
  hasAuthorization: function (req, res, next) {
    // if the current user is comment owner or article owner
    // give them authority to delete
    if (req.user.id === req.comment.user.id || req.user.id === req.article.user.id) {
      next();
    } else {
      req.flash('info', 'You are not authorized');
      res.redirect('/articles/' + req.article.id);
    }
  }
};
