
# FORMACIÓN ACADÉMICA
$ document
    .on 'click', '#agregar-academico', ->
        $.get '/ajax/add_academico', (data) ->
            $ '#estudio-row'
                .append data
            $ '#agregar-academico'
                .replaceWith '<a class="agregar quitar"><i class="fa fa-minus"></i></a>'

# QUITAR
$ document
    .on 'click', '.quitar', ->
        $ this
            .parents('.row').css 'display', 'none'

# EXPERIENCIA LABORAL
$ document
    .on 'click', '#agregar-laraboral', ->
        row = '<div class="row"><div class="col-md-4 col-sm-12"><div class="form-group"><input type="text" name="cargo_laboral[]" placeholder="Cargo"></div></div><div class="col-md-3 col-sm-12"><div class="form-group"><input type="text" name="institucion_laboral[]" placeholder="Instituci&oacute;n"></div></div><div class="col-md-2 col-sm-12"><div class="form-group"><input type="text" name="ciudad_empresa[]" placeholder="Ciudad"></div></div><div class="col-md-2 col-sm-12"><div class="form-group"><input type="text" name="periodo_laboral[]" placeholder="Per&iacute;odo"></div></div><div class="col-md-1 col-sm-12"><div class="form-group"><a class="agregar" id="agregar-laraboral"><i class="fa fa-plus"></i></a></div></div></div>'
        $ '#laboral-row'
            .append row
        $ this
            .replaceWith '<a class="agregar quitar"><i class="fa fa-minus"></i></a>'

# RECONOCIMIENTOS
$ document
    .on 'click', '#agregar-reconocimiento', ->
        row = '<div class="row"><div class="col-md-4 col-sm-12"><div class="form-group"><input type="text" name="merito_reconocimiento[]" placeholder="Merito"></div></div><div class="col-md-3 col-sm-12"><div class="form-group"><input type="text" name="organizacion_reconocimiento[]" placeholder="Organizaci&oacute;"></div></div><div class="col-md-2 col-sm-12"><div class="form-group"><input type="text" name="ciudad_reconocimiento[]" placeholder="Ciudad"></div></div><div class="col-md-2 col-sm-12"><div class="form-group"><input type="text" name="periodo_reconicimiento[]" placeholder="A&ntilde;o"></div></div><div class="col-md-1 col-sm-12"><div class="form-group"><a id="agregar-reconocimiento" class="agregar"><i class="fa fa-plus"></i></a></div></div></div>'
        $ '#reconocimiento-row'
            .append row
        $ this
            .replaceWith '<a class="agregar quitar"><i class="fa fa-minus"></i></a>'
