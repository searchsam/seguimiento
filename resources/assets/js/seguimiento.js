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

    // FORMACIÓN ACADÉMICA
    $( document ).on('click', '#agregar-academico', function() {
        $.ajax({
            url: '/ajax/add_academico',
            method: "GET"
        }).done(function( html ) {
            $( '#estudio-row' ).append( html );
            $( '#agregar-academico' ).replaceWith( '<a class="agregar quitar"><i class="fa fa-minus"></i></a>' );
        });
    });

    $( document ).on('click', '.quitar', function() {
        $(this).parents('.row').css('display', 'none');
    });

    // EXPERIENCIA LABORAL
    $( document ).on('click', '#agregar-laraboral', function() {
        var row = '<div class="row"><div class="col-md-4 col-sm-12"><div class="form-group"><input type="text" name="cargo_laboral[]" placeholder="Cargo"></div></div><div class="col-md-3 col-sm-12"><div class="form-group"><input type="text" name="institucion_laboral[]" placeholder="Instituci&oacute;n"></div></div><div class="col-md-2 col-sm-12"><div class="form-group"><input type="text" name="ciudad_empresa[]" placeholder="Ciudad"></div></div><div class="col-md-2 col-sm-12"><div class="form-group"><input type="text" name="periodo_laboral[]" placeholder="Per&iacute;odo"></div></div><div class="col-md-1 col-sm-12"><div class="form-group"><a class="agregar" id="agregar-laraboral"><i class="fa fa-plus"></i></a></div></div></div>';

        $( '#laboral-row' ).append( row );
        $( this ).replaceWith( '<a class="agregar quitar"><i class="fa fa-minus"></i></a>' );
    });

    // RECONOCIMIENTOS
    $( document ).on('click', '#agregar-reconocimiento', function() {
        var row = '<div class="row"><div class="col-md-4 col-sm-12"><div class="form-group"><input type="text" name="merito_reconocimiento[]" placeholder="Merito"></div></div><div class="col-md-3 col-sm-12"><div class="form-group"><input type="text" name="organizacion_reconocimiento[]" placeholder="Organizaci&oacute;"></div></div><div class="col-md-2 col-sm-12"><div class="form-group"><input type="text" name="ciudad_reconocimiento[]" placeholder="Ciudad"></div></div><div class="col-md-2 col-sm-12"><div class="form-group"><input type="text" name="periodo_reconicimiento[]" placeholder="A&ntilde;o"></div></div><div class="col-md-1 col-sm-12"><div class="form-group"><a id="agregar-reconocimiento" class="agregar"><i class="fa fa-plus"></i></a></div></div></div>';

        $( '#reconocimiento-row' ).append( row );
        $( this ).replaceWith( '<a class="agregar quitar"><i class="fa fa-minus"></i></a>' );
    });

});
