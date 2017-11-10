@extends('layouts.admin_template')

@section('content')
    <div class='row' id="mostrar-oferta">
        <div class='col-md-6'>
            <!-- Box -->
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">Ofertas Creadas</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    <button type="button" data-toggle="modal" data-target="#oferta-modal" class="btn btn-default add-oferta"><i class="fa fa-plus"></i></button>
                    @if (count($cliente))
                        <div class="card">
                            <div class="triangle-container warning" data-toggle="tooltip" data-placement="left" title="Oferta en espera de ser atendida."></div>
                            <div class="card-body">
                                <h1><b>John Doe</b></h1>
                                <p>Architect & Engineer</p>
                            </div>
                        </div>
                    @endif
                </div><!-- /.box-body -->

            </div><!-- /.box -->
        </div><!-- /.col -->

        <div class='col-md-6'>
            <!-- Box -->
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">Ofertas Atendidas</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    @if (count($cliente))
                        <div class="card">
                            <div class="triangle-container success" data-toggle="tooltip" data-placement="left" title="Oferta atendida."></div>
                            <div class="card-body">
                                <h1><b>John Doe</b></h1>
                                <p>Architect & Engineer</p>
                            </div>
                        </div>
                    @endif
                </div><!-- /.box-body -->

            </div><!-- /.box -->
        </div><!-- /.col -->

        <div class="modal fade" id="oferta-modal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header text-center">
                        <h1 class="modal-title">Generar Oferta</h1>
                    </div>

                    <div class="modal-body">
                        <form id="curriculum-form" action="{{ route('registrar_oferta') }}" method="POST" role="form">
                            <div class="form-group">
                                <div class="form-select {{ $errors->has('tipo_oferta') ? 'error' : '' }}">
                                    <select name="tipo_oferta" class="custom-select {{ $errors->has('tipo_oferta') ? 'error' : '' }}">
                                        <option value="0">Tipo de Oferta</option>
                                        @foreach ($tipo_oferta as $oferta)
                                            <option value="{{ $oferta->id_tipo_oferta }}" {{ (old('tipo_oferta')==$oferta->id_tipo_oferta) ? 'selected' : '' }}>{{ $oferta->tipo_oferta }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {!! $errors->first('tipo_oferta', '<span class="help-block"><b>:message</b></span>') !!}
                            </div>
                            <div class="form-group">
                                <input type="text" name="limite" id="Date" style="width:100%" placeholder="Fecha Limite" class="{{ $errors->has('limite') ? 'error' : '' }}" value="{{ old('limite') }}">
                                {!! $errors->first('limite', '<span class="help-block"><b>:message</b></span>') !!}
                            </div>
                            <div class="form-group">
                                <textarea name="descripcion" style="width:100%" placeholder="Descripci&oacute;n" class="{{ $errors->has('descripcion') ? 'error' : '' }}">{{ old('descripcion') }}</textarea>
                                {!! $errors->first('descripcion', '<span class="help-block"><b>:message</b></span>') !!}
                            </div>
                            <div class="row">
                                <div class="col col-md-6 seccess">
                                    <button type="submit">Generar</button>
                                </div>
                            </form>
                            <div class="col col-md-6 cancel">
                                <button type="button" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div><!-- /.row -->

    <div class="daterangepicker dropdown-menu ltr show-calendar opensleft" style="top: 705.317px; right: 25px; left: auto; display: none;"><div class="calendar left"><div class="daterangepicker_input"><input class="input-mini form-control active" name="daterangepicker_start" value="" type="text"><i class="fa fa-calendar glyphicon glyphicon-calendar"></i><div class="calendar-time"><div><select class="hourselect"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12" selected="selected">12</option></select> : <select class="minuteselect"><option value="0" selected="selected">00</option><option value="30">30</option></select> <select class="ampmselect"><option value="AM" selected="selected">AM</option><option value="PM">PM</option></select></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div><div class="calendar-table"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-chevron-left glyphicon glyphicon-chevron-left"></i></th><th colspan="5" class="month">Nov 2017</th><th></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off available" data-title="r0c0">29</td><td class="off available" data-title="r0c1">30</td><td class="off available" data-title="r0c2">31</td><td class="available" data-title="r0c3">1</td><td class="available" data-title="r0c4">2</td><td class="available" data-title="r0c5">3</td><td class="weekend available" data-title="r0c6">4</td></tr><tr><td class="weekend available" data-title="r1c0">5</td><td class="available" data-title="r1c1">6</td><td class="available" data-title="r1c2">7</td><td class="available" data-title="r1c3">8</td><td class="available" data-title="r1c4">9</td><td class="today active start-date active end-date available" data-title="r1c5">10</td><td class="weekend available" data-title="r1c6">11</td></tr><tr><td class="weekend available" data-title="r2c0">12</td><td class="available" data-title="r2c1">13</td><td class="available" data-title="r2c2">14</td><td class="available" data-title="r2c3">15</td><td class="available" data-title="r2c4">16</td><td class="available" data-title="r2c5">17</td><td class="weekend available" data-title="r2c6">18</td></tr><tr><td class="weekend available" data-title="r3c0">19</td><td class="available" data-title="r3c1">20</td><td class="available" data-title="r3c2">21</td><td class="available" data-title="r3c3">22</td><td class="available" data-title="r3c4">23</td><td class="available" data-title="r3c5">24</td><td class="weekend available" data-title="r3c6">25</td></tr><tr><td class="weekend available" data-title="r4c0">26</td><td class="available" data-title="r4c1">27</td><td class="available" data-title="r4c2">28</td><td class="available" data-title="r4c3">29</td><td class="available" data-title="r4c4">30</td><td class="off available" data-title="r4c5">1</td><td class="weekend off available" data-title="r4c6">2</td></tr><tr><td class="weekend off available" data-title="r5c0">3</td><td class="off available" data-title="r5c1">4</td><td class="off available" data-title="r5c2">5</td><td class="off available" data-title="r5c3">6</td><td class="off available" data-title="r5c4">7</td><td class="off available" data-title="r5c5">8</td><td class="weekend off available" data-title="r5c6">9</td></tr></tbody></table></div></div><div class="calendar right"><div class="daterangepicker_input"><input class="input-mini form-control" name="daterangepicker_end" value="" type="text"><i class="fa fa-calendar glyphicon glyphicon-calendar"></i><div class="calendar-time"><div><select class="hourselect"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11" selected="selected">11</option><option value="12">12</option></select> : <select class="minuteselect"><option value="0">00</option><option value="30">30</option></select> <select class="ampmselect"><option value="AM">AM</option><option value="PM" selected="selected">PM</option></select></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div><div class="calendar-table"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Dec 2017</th><th class="next available"><i class="fa fa-chevron-right glyphicon glyphicon-chevron-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off available" data-title="r0c0">26</td><td class="off available" data-title="r0c1">27</td><td class="off available" data-title="r0c2">28</td><td class="off available" data-title="r0c3">29</td><td class="off available" data-title="r0c4">30</td><td class="available" data-title="r0c5">1</td><td class="weekend available" data-title="r0c6">2</td></tr><tr><td class="weekend available" data-title="r1c0">3</td><td class="available" data-title="r1c1">4</td><td class="available" data-title="r1c2">5</td><td class="available" data-title="r1c3">6</td><td class="available" data-title="r1c4">7</td><td class="available" data-title="r1c5">8</td><td class="weekend available" data-title="r1c6">9</td></tr><tr><td class="weekend available" data-title="r2c0">10</td><td class="available" data-title="r2c1">11</td><td class="available" data-title="r2c2">12</td><td class="available" data-title="r2c3">13</td><td class="available" data-title="r2c4">14</td><td class="available" data-title="r2c5">15</td><td class="weekend available" data-title="r2c6">16</td></tr><tr><td class="weekend available" data-title="r3c0">17</td><td class="available" data-title="r3c1">18</td><td class="available" data-title="r3c2">19</td><td class="available" data-title="r3c3">20</td><td class="available" data-title="r3c4">21</td><td class="available" data-title="r3c5">22</td><td class="weekend available" data-title="r3c6">23</td></tr><tr><td class="weekend available" data-title="r4c0">24</td><td class="available" data-title="r4c1">25</td><td class="available" data-title="r4c2">26</td><td class="available" data-title="r4c3">27</td><td class="available" data-title="r4c4">28</td><td class="available" data-title="r4c5">29</td><td class="weekend available" data-title="r4c6">30</td></tr><tr><td class="weekend available" data-title="r5c0">31</td><td class="off available" data-title="r5c1">1</td><td class="off available" data-title="r5c2">2</td><td class="off available" data-title="r5c3">3</td><td class="off available" data-title="r5c4">4</td><td class="off available" data-title="r5c5">5</td><td class="weekend off available" data-title="r5c6">6</td></tr></tbody></table></div></div><div class="ranges"><div class="range_inputs"><button class="applyBtn btn btn-sm btn-success" type="button">Apply</button> <button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button></div></div></div>
@endsection
