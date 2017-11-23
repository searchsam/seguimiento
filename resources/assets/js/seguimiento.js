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

    // start app
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

});
