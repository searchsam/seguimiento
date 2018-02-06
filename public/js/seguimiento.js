/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 42);
/******/ })
/************************************************************************/
/******/ ({

/***/ 42:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(43);
module.exports = __webpack_require__(44);


/***/ }),

/***/ 43:
/***/ (function(module, exports) {

window.addEventListener('load', function () {

    new Vue({
        el: '#interruptor',
        data: {
            checkValue: 0
        },
        methods: {
            checkToggle: function checkToggle(e) {
                this.checkValue == 0 ? 1 : 0;
            }
        }
    });

    new Vue({
        el: '#user-foto',
        data: {
            image: $('#default').val() || ''
        },
        methods: {
            onFileChange: function onFileChange(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length) return;
                this.createImage(files[0]);
            },
            createImage: function createImage(file) {
                var image = new Image();
                var reader = new FileReader();
                var vm = this;

                reader.onload = function (e) {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    });

    // Habilidades
    new Vue({
        el: '#habilidades',
        data: {
            habilidades: []
        },
        methods: {
            addHabilidad: function addHabilidad(e) {
                this.habilidades.push($('#text-hab').val());
                $('#text-hab').val('');
                $('#text-hab').focus();
                $('#hab-all').text(this.habilidades.toString());
            },
            rmHabilidad: function rmHabilidad(key) {
                this.habilidades.splice(key, 1);
                $('#hab-all').text(this.habilidades.toString());
            }
        }
    });

    // Idiomas
    new Vue({
        el: '#idiomas',
        data: {
            idiomas: []
        },
        methods: {
            addIdioma: function addIdioma(e) {
                this.idiomas.push($('#text-ido').val());
                $('#text-ido').val('');
                $('#text-ido').focus();
                $('#ido-all').text(this.idiomas.toString());
            },
            rmIdioma: function rmIdioma(key) {
                this.idiomas.splice(key, 1);
                $('#ido-all').text(this.idiomas.toString());
            }
        }
    });

    // Otra Informacion
    new Vue({
        el: '#informacion',
        data: {
            informacion: []
        },
        methods: {
            addInfo: function addInfo(e) {
                this.informacion.push($('#text-info').val());
                $('#text-info').val('');
                $('#text-info').focus();
                $('#info-all').text(this.informacion.toString());
            },
            rmInfo: function rmInfo(key) {
                this.informacion.splice(key, 1);
                $('#info-all').text(this.informacion.toString());
            }
        }
    });

    // register modal component
    Vue.component('modal', {
        template: '#modal-template'
    });
    Vue.component('modal-students', {
        template: '#modal-template-students'
    });
    //  ===================================================================> Empresa
    // Empresa - mostrar oferta
    new Vue({
        el: '#mostrar-oferta',
        data: {
            showModal: false
        },
        methods: {
            close: function close() {
                alert('hole');
            }
        }
    });
    // Empresa - mostrar candidato
    new Vue({
        el: '#mostrar-candidato',
        data: {
            showModal: false
        },
        methods: {
            close: function close() {
                alert('hole');
            }
        }
    });
    //  ==================================================================> Ususario
    // Usuario - mostrar asignar oferta a cantidato
    new Vue({
        el: '#mostrar-asignar',
        data: {
            showModal: false
        },
        methods: {
            close: function close() {
                alert('hole');
            }
        }
    });
    // Usuario - mostrar enviar candidato a empresa
    new Vue({
        el: '#mostrar-enviar',
        data: {
            showModal: false
        },
        methods: {
            close: function close() {
                alert('hole');
            }
        }
    });
    //  ================================================================> Estudiante
    // Estudiante - mostrar opciones de ofertas a aplicar
    new Vue({
        el: '#mostrar-aplicar',
        data: {
            showModal: false
        },
        methods: {
            close: function close() {
                alert('hole');
            }
        }
    });
});

// Carreras para la Oferta
new Vue({
    el: '#carrera_oferta',
    data: {
        identificadores: [],
        carreras: []
    },
    methods: {
        addCarrera: function addCarrera(e) {
            if ($('#opt-carrera').val() > 0) {
                this.carreras.push($('#opt-carrera option:selected').text());
                this.identificadores.push($('#opt-carrera').val());
                $('#opt-carrera').val('0');
                $('#opt-carrera').focus();
                $('#carrera-all').text(this.identificadores.toString());
            }
        },
        rmCarrera: function rmCarrera(key) {
            this.carreras.splice(key, 1);
            this.identificadores.splice(key, 1);
            $('#carrera-all').text(this.identificadores.toString());
        }
    }
});

/***/ }),

/***/ 44:
/***/ (function(module, exports) {

// FORMACIÓN ACADÉMICA
var cards;

$(document).on('click', '#agregar-academico', function() {
  return $.get('/ajax/add_academico', function(data) {
    $('#estudio-row').append(data);
    return $('#agregar-academico').replaceWith('<a class="agregar quitar"><i class="fa fa-minus"></i></a>');
  });
});

$(document).on('change', '.tipo-estudio', function() {
  var el, opcion;
  el = $(this).parents('.row').find('.estudio');
  opcion = $(this).val().localeCompare("5");
  if (opcion === 0) {
    return $.get('/ajax/add_estudio', function(data) {
      return el.replaceWith(data);
    });
  } else {
    return el.replaceWith('<input type="text" name="estudio_academico[0]" placeholder="Estudio/Carrera" class="estudio">');
  }
});

// QUITAR
$(document).on('click', '.quitar', function() {
  return $(this).parents('.row').css('display', 'none');
});

// EXPERIENCIA LABORAL
$(document).on('click', '#agregar-laraboral', function() {
  var row;
  row = '<div class="row"><div class="col-md-4 col-sm-12"><div class="form-group"><input type="text" name="cargo_laboral[]" placeholder="Cargo"></div></div><div class="col-md-3 col-sm-12"><div class="form-group"><input type="text" name="institucion_laboral[]" placeholder="Instituci&oacute;n"></div></div><div class="col-md-2 col-sm-12"><div class="form-group"><input type="text" name="ciudad_empresa[]" placeholder="Ciudad"></div></div><div class="col-md-2 col-sm-12"><div class="form-group"><input type="text" name="periodo_laboral[]" placeholder="Per&iacute;odo"></div></div><div class="col-md-1 col-sm-12"><div class="form-group"><a class="agregar" id="agregar-laraboral"><i class="fa fa-plus"></i></a></div></div></div>';
  $('#laboral-row').append(row);
  return $(this).replaceWith('<a class="agregar quitar"><i class="fa fa-minus"></i></a>');
});

// RECONOCIMIENTOS
$(document).on('click', '#agregar-reconocimiento', function() {
  var row;
  row = '<div class="row"><div class="col-md-4 col-sm-12"><div class="form-group"><input type="text" name="merito_reconocimiento[]" placeholder="Merito"></div></div><div class="col-md-3 col-sm-12"><div class="form-group"><input type="text" name="organizacion_reconocimiento[]" placeholder="Organizaci&oacute;"></div></div><div class="col-md-2 col-sm-12"><div class="form-group"><input type="text" name="ciudad_reconocimiento[]" placeholder="Ciudad"></div></div><div class="col-md-2 col-sm-12"><div class="form-group"><input type="text" name="periodo_reconicimiento[]" placeholder="A&ntilde;o"></div></div><div class="col-md-1 col-sm-12"><div class="form-group"><a id="agregar-reconocimiento" class="agregar"><i class="fa fa-plus"></i></a></div></div></div>';
  $('#reconocimiento-row').append(row);
  return $(this).replaceWith('<a class="agregar quitar"><i class="fa fa-minus"></i></a>');
});

// Alert dissmise animation
$(document).on('click', '.closebtn', function() {
  var div;
  div = this.parentElement;
  div.style.opacity = '0';
  return setTimeout((function() {
    return div.style.display = 'none';
  }), 600);
});

// Seleccionar uno o varios estudiantes
$(document).on('click', '.info-box-icon', function() {
  var estudiante_seleccionado;
  estudiante_seleccionado = $(this).parents('.box-selectable');
  if (estudiante_seleccionado.children('input:checkbox').is(':checked')) {
    estudiante_seleccionado.children('input:checkbox').prop('checked', false);
    return estudiante_seleccionado.css({
      'background-color': 'white',
      'color': '#808080'
    });
  } else {
    estudiante_seleccionado.children('input:checkbox').prop('checked', true);
    return estudiante_seleccionado.css({
      'background-color': '#1C3170',
      'color': 'white'
    });
  }
});

$(document).on('click', '#enviar', function() {
  var seleccionados;
  seleccionados = $('input:checked').length;
  if ((seleccionados - 1) <= 0) {
    return alert('No ha seleccionado al menos un estudiante');
  } else {
    return $('#asignar-form').submit();
  }
});

// Tamaño de los cards de estudiantes
cards = $(document).find('.info-box');

cards.each(function() {
  var alto, css;
  alto = $(this).height();
  css = '{"height":"' + alto + 'px", "width":"' + alto + 'px"';
  if (alto > 90) {
    css += ', "margin-right":"10px"}';
  } else {
    css += '}';
  }
  $(this).children('.info-box-icon').css(JSON.parse(css));
  return $(this).find('.img-circle').css({
    'max-height': (alto - 10) + 'px',
    'max-width': (alto - 10) + 'px',
    'overflow': 'hidden'
  });
});


/***/ })

/******/ });