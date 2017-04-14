'use strict';

/**
 * Module dependencies.
 */

const mongoose = require('mongoose');
const crypto = require('crypto');

const Schema = mongoose.Schema;
const oAuthTypes = [
  'github',
  'twitter',
  'facebook',
  'google',
  'linkedin'
];

/**
 * User Schema
 */

const UserSchema = new Schema({
  nombre: { type: String, default: '' },
  email: { type: String, default: '' },
  sexo: { type: String},
  nivel: { type: String },
  fechaNacimiento: { type: Date },
  nombreUsuario: { type: String, default: '' },
  numeroDocumento: { type: String },
  tipoDocumento: { type: String },
  provider: { type: String, default: '' },
  hashed_password: { type: String, default: '' },
  salt: { type: String, default: '' },
  authToken: { type: String, default: '' }
});

const validatePresenceOf = value => value && value.length;

/**
 * Virtuals
 */

UserSchema
  .virtual('password')
  .set(function (password) {
    this._password = password;
    this.salt = this.makeSalt();
    this.hashed_password = this.encryptPassword(password);
  })
  .get(function () {
    return this._password;
  });

/**
 * Validations
 */

// the below 5 validations only apply if you are signing up traditionally

UserSchema.path('nombre').validate(function (nombre) {
  if (this.skipValidation()) return true;
  return nombre.length;
}, 'Nombre no puede estar vacio');

UserSchema.path('email').validate(function (email) {
  if (this.skipValidation()) return true;
  return email.length;
}, 'Email no puede estar vacio');

UserSchema.path('email').validate(function (email, fn) {
  const User = mongoose.model('User');
  if (this.skipValidation()) fn(true);

  // Check only when it is a new user or when email field is modified
  if (this.isNew || this.isModified('email')) {
    User.find({ email: email }).exec(function (err, users) {
      fn(!err && users.length === 0);
    });
  } else fn(true);
}, 'Email ya esta registrado');

UserSchema.path('nombreUsuario').validate(function (nombreUsuario) {
  if (this.skipValidation()) return true;
  return nombreUsuario.length;
}, 'Nombre de usuario no puede estar vacio');

UserSchema.path('hashed_password').validate(function (hashed_password) {
  if (this.skipValidation()) return true;
  return hashed_password.length && this._password.length;
}, 'Contraseña no puede estar vacia');


/**
 * Pre-save hook
 */

UserSchema.pre('save', function (next) {
  if (!this.isNew) return next();

  if (!validatePresenceOf(this.password) && !this.skipValidation()) {
    next(new Error('Contraseña invalida'));
  } else {
    next();
  }
});

/**
 * Methods
 */

UserSchema.methods = {

  /**
   * Authenticate - check if the passwords are the same
   *
   * @param {String} plainText
   * @return {Boolean}
   * @api public
   */

  authenticate: function (plainText) {
    return this.encryptPassword(plainText) === this.hashed_password;
  },

  /**
   * Make salt
   *
   * @return {String}
   * @api public
   */

  makeSalt: function () {
    return Math.round((new Date().valueOf() * Math.random())) + '';
  },

  /**
   * Encrypt password
   *
   * @param {String} password
   * @return {String}
   * @api public
   */

  encryptPassword: function (password) {
    if (!password) return '';
    try {
      return crypto
        .createHmac('sha1', this.salt)
        .update(password)
        .digest('hex');
    } catch (err) {
      return '';
    }
  },

  /**
   * Validation is not required if using OAuth
   */

  skipValidation: function () {
    return ~oAuthTypes.indexOf(this.provider);
  }
};

/**
 * Statics
 */

UserSchema.statics = {

  /**
   * Load
   *
   * @param {Object} options
   * @param {Function} cb
   * @api private
   */

  load: function (options, cb) {
    options.select = options.select || 'nombre nivel nombreUsuario';
    return this.findOne(options.criteria)
      .select(options.select)
      .exec(cb);
  },

  getAllUsers: function() {
    return this.find({})
      .exec();
  },

  getSupervisors: function() {
    return this.find({"nivel": "supervisor"})
      .exec();
  },

  getVendedores: function() {
    return this.find({"nivel": "vendedor"})
      .exec();
  }
  
};

mongoose.model('User', UserSchema);
