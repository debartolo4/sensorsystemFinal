@extends('layouts.app_corpManager')

@section('content')
    <?php
    use App\Site;$sites = Site::all();
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Abilita trasferimento automatico di dati</div>
                    <div class="panel-body">
                        {!!Form::open(['class' => 'form-horizontal', 'action' => 'CustomerController@t_data', 'method' => 'POST'])!!}
                        <div class="form-group">
                            <label for="transf" class="col-md-4 control-label">Trasferisci dati a</label>
                            <div class="col-md-6">
                                <select id="transf" class="form-control" name="transf">
                                    <option>SensorSystemAPP</option>
                                    <option>Sensor Manager</option>
                                    <option>TransmissionControl</option>
                                    <option>SitesControl</option>
                                </select>
                                <h4></h4>
                                <div class="form-group">
                                    Abilita trasferimento automatico
                                    <input type="checkbox" data-toggle="toggle" checked>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a type="button" href="/corpManager/home" class="btn btn-default">
                                    Indietro
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Abilita
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection