<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Carrera;
use App\TipoEstudio;

class AjaxController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add_academico()
    {
        $tipo_estudio   = TipoEstudio::all();

        echo '<div class="row">
            <div class="col-md-2 col-sm-12">
                <div class="form-group">
                    <div class="form-select">
                        <select name="tipo_estudio[]" class="custom-select tipo-estudio">
                            <option value="0">Tipo de Estudio</option>';
                            foreach ($tipo_estudio as $estudio)
                            {
                                echo '<option value="' . $estudio->id_tipo_estudio . '">' . $estudio->tipo_estudio . '</option>';
                            }
                    echo '</select>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <input type="text" name="estudio_academico[]" placeholder="Estudio/Carrera" class="estudio">
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="form-group">
                    <input type="text" name="institucion_academica[]" placeholder="Instituci&oacute;n de Estudio">
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="form-group">
                    <input type="text" name="localidad_estudio[]" placeholder="Ciudad">
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="form-group">
                    <input type="text" name="fecha_estudio[]" placeholder="A&ntilde;o">
                </div>
            </div>
            <div class="col-md-1 col-sm-12">
                <a id="agregar-academico" class="agregar"><i class="fa fa-plus"></i></a>
            </div>
        </div>';
    }

    public function add_laboral()
    {
        echo '<div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <input type="text" name="cargo_laboral[]" placeholder="Cargo">
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <input type="text" name="institucion_laboral[]" placeholder="Instituci&oacute;n">
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="form-group">
                    <input type="text" name="ciudad_empresa[]" placeholder="Ciudad">
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="form-group">
                    <input type="text" name="periodo_laboral[]" placeholder="Per&iacute;odo">
                </div>
            </div>
            <div class="col-md-1 col-sm-12">
                <div class="form-group">
                    <a class="agregar" id="agregar-laraboral"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>';
    }

    public function add_estudio()
    {
        $carreras = Carrera::all();

        echo '<div class="form-select estudio">
            <select name="estudio_academico[]" class="custom-select">';
                foreach ($carreras as $carrera)
                {
                    echo '<option value="' . $carrera->id_carrera . '">' . $carrera->nombre_carrera . '</option>';
                }
        echo '</select>
        </div>';
    }
}
