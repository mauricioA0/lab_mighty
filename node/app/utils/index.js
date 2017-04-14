module.exports = {
  respond,
  respondOrRedirect,
  isAdminOrManager
};

function respond (res, tpl, obj, status) {
  res.format({
    html: () => res.render(tpl, obj),
    json: () => {
      if (status) return res.status(status).json(obj);
      res.json(obj);
    }
  });
}

function respondOrRedirect ({ req, res }, url = '/', obj = {}, flash) {
  res.format({
    html: () => {
      if (req && flash) req.flash(flash.type, flash.text);
      res.redirect(url);
    },
    json: () => res.json(obj)
  });
}

/*

  Se agrego esta function a utils para que se llame al modulo
  que se necesite, comprueba si el user actual es 
  Administrador o Gerente, recibe como parametro el user.nivel
  retorna true en caso de ser Administrador o Gerente, de lo contrario
  retorna falso

*/

function isAdmin(user) {
  if (user.nivel == "administrador") {
    return true;
  }
  return false;
}

function isManager(user) {
  if (user.nivel == "gerente") {
    return true;
  }
  return false;
}

function isAdminOrManager(user) {
  if (isAdmin(user) || isManager(user)) {
    return true;
  }
  return false;
}
