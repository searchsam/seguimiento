window.addEventListener('load', function () {

    new Vue({
        el: '#interruptor',
        data: {
            checkValue: 0
        },
        methods: {
            checkToggle(e) {
                this.checkValue==0 ? 1 : 0;
            }
        }
    });

    new Vue({
        el: '#user-foto',
        data: {
            image: $('#default').val() || ''
        },
        methods: {
            onFileChange(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                var image = new Image();
                var reader = new FileReader();
                var vm = this;

                reader.onload = (e) => {
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
            addHabilidad(e) {
                this.habilidades.push( $('#text-hab').val() );
                $('#text-hab').val('');
                $('#text-hab').focus();
                $('#hab-all').text( this.habilidades.toString() );
            },
            rmHabilidad(key) {
                this.habilidades.splice(key, 1);
                $('#hab-all').text( this.habilidades.toString() );
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
            addIdioma(e) {
                this.idiomas.push( $('#text-ido').val() );
                $('#text-ido').val('');
                $('#text-ido').focus();
                $('#ido-all').text( this.idiomas.toString() );
            },
            rmIdioma(key) {
                this.idiomas.splice(key, 1);
                $('#ido-all').text( this.idiomas.toString() );
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
            addInfo( e ) {
                this.informacion.push( $('#text-info').val() );
                $('#text-info').val('');
                $('#text-info').focus();
                $('#info-all').text( this.informacion.toString() );
            },
            rmInfo( key ) {
                this.informacion.splice(key, 1);
                $('#info-all').text( this.informacion.toString() );
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
            close() {
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
            close() {
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
            close() {
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
            close() {
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
            close() {
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
        addCarrera(e) {
            if ($('#opt-carrera').val() > 0) {
                this.carreras.push( $('#opt-carrera option:selected').text() );
                this.identificadores.push( $('#opt-carrera').val() );
                $('#opt-carrera').val('0');
                $('#opt-carrera').focus();
                $('#carrera-all').text( this.identificadores.toString() );
            }
        },
        rmCarrera(key) {
            this.carreras.splice(key, 1);
            this.identificadores.splice(key, 1);
            $('#carrera-all').text( this.identificadores.toString() );
        }
    }
});
