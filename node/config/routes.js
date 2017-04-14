'use strict';

/*
 * Module dependencies.
 */

const users = require('../app/controllers/users');
const articles = require('../app/controllers/articles');
const comments = require('../app/controllers/comments');
const tags = require('../app/controllers/tags');
const auth = require('./middlewares/authorization');
const search = require('../app/controllers/search');
const options = require('../app/controllers/options');

// nuevos modulos
const concesionarios = require('../app/controllers/concesionarios');
const marcas = require('../app/controllers/marca');

/**
 * Route middlewares
 */

const isAdmin     = [auth.requiresLogin, auth.authCRM.isAdmin];
const isManager   = [auth.requiresLogin, auth.authCRM.isManager];
const isAdminOrManager = [auth.requiresLogin, auth.authCRM.isAdminOrManager];
const articleAuth = [auth.requiresLogin, auth.article.hasAuthorization];
const commentAuth = [auth.requiresLogin, auth.comment.hasAuthorization];

const fail = {
  failureRedirect: '/login'
};

/**
 * Expose routes
 */

module.exports = function (app, passport) {
  const pauth = passport.authenticate.bind(passport);

  // user routes
  app.get('/login', users.login);
  app.get('/logout', users.logout);
  app.get('/users/signup', users.signup);
  app.post('/users', users.create);
  app.get('/users/list', isAdmin, users.allUsers);
  app.post('/users/session',
    pauth('local', {
      failureRedirect: '/login',
      failureFlash: 'Invalid email or password.'
    }), users.session);
  app.get('/users/:userId', isAdmin, users.show);
  app.param('userId', users.load);

  // article routes
  app.param('id', articles.load);
  app.get('/articles', articles.index);
  app.get('/articles/new', auth.requiresLogin, articles.new);
  app.post('/articles', auth.requiresLogin, articles.create);
  app.get('/articles/:id', articles.show);
  app.get('/articles/:id/edit', articleAuth, articles.edit);
  app.put('/articles/:id', articleAuth, articles.update);
  app.delete('/articles/:id', articleAuth, articles.destroy);

  // home route
  app.get('/',auth.requiresLogin, articles.index);

  // comment routes
  app.param('commentId', comments.load);
  app.post('/articles/:id/comments', auth.requiresLogin, comments.create);
  app.get('/articles/:id/comments', auth.requiresLogin, comments.create);
  app.delete('/articles/:id/comments/:commentId', commentAuth, comments.destroy);

  // tag routes
  app.get('/tags/:tag', tags.index);

  // Search routes
  app.get('/busquedas', search.busquedas);
  app.get('/nueva-consulta', search.nuevaConsulta);

  // concesionarios
  app.param('concesionarioId', concesionarios.load);
  app.get('/concesionarios', auth.requiresLogin, concesionarios.index);
  app.get('/concesionarios/nuevo', isAdminOrManager, concesionarios.new);
  app.post('/concesionarios', isAdminOrManager, concesionarios.create);
  app.get('/concesionarios/:concesionarioId', auth.requiresLogin, concesionarios.show);
  app.get('/concesionarios/:concesionarioId/edit', isAdminOrManager, concesionarios.edit);
  app.put('/concesionarios/:concesionarioId', isAdminOrManager, concesionarios.update);
  app.delete('/concesionarios/:concesionarioId', isAdminOrManager, concesionarios.destroy);

  // Option routes
  app.get('/opciones', options.opcionesUsuario);

  // Marcas
  app.param('marcaId', auth.requiresLogin, marcas.load);
  app.get('/marcas', auth.requiresLogin, marcas.index);
  app.get('/marcas/nuevo', isAdminOrManager, marcas.new);
  app.post('/marcas', isAdminOrManager, marcas.create);
  app.get('/marcas/:marcaId', isAdminOrManager, marcas.show);
  app.get('/marcas/:marcaId/edit', isAdminOrManager, marcas.edit);
  app.put('/marcas/:marcaId', isAdminOrManager, marcas.update);
  app.delete('/marcas/:marcaId', isAdminOrManager, marcas.destroy);

  /**
   * Error handling
   */

  app.use(function (err, req, res, next) {
    // treat as 404
    if (err.message
      && (~err.message.indexOf('not found')
      || (~err.message.indexOf('Cast to ObjectId failed')))) {
      return next();
    }

    console.error(err.stack);

    if (err.stack.includes('ValidationError')) {
      res.status(422).render('422', { error: err.stack });
      return;
    }

    // error page
    res.status(500).render('500', { error: err.stack });
  });

  // assume 404 since no middleware responded
  app.use(function (req, res) {
    const payload = {
      url: req.originalUrl,
      error: 'Not found'
    };
    if (req.accepts('json')) return res.status(404).json(payload);
    res.status(404).render('404', payload);
  });
};
