<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
                        <select name="tipo_estudio" class="custom-select">
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
                    <input type="text" name="estudio" placeholder="Estudio/Carrera">
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="form-group">
                    <input type="text" name="escuela" placeholder="Instituci&oacute;n de Estudio">
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="form-group">
                    <input type="text" name="ciudad" placeholder="Ciudad">
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="form-group">
                    <input type="text" name="ano" placeholder="A&ntilde;o">
                </div>
            </div>
            <div class="col-md-1 col-sm-12">
                <a id="agregar-academico" class="agregar" v-on:click="addEstudioform()"><i class="fa fa-plus"></i></a>
            </div>
        </div>';
    }

    public function add_laboral()
    {
        echo '<div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <input type="text" name="cargo" placeholder="Cargo">
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <input type="text" name="institucion" placeholder="Instituci&oacute;n">
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="form-group">
                    <input type="text" name="ciudad" placeholder="Ciudad">
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="form-group">
                    <input type="text" name="periodo" placeholder="Per&iacute;odo">
                </div>
            </div>
            <div class="col-md-1 col-sm-12">
                <div class="form-group">
                    <a class="agregar" id="agregar-laraboral"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>';
    }
}
