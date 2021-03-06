@extends('layouts.app_corpManager')

@section('content')
    <?php
    $types = \App\SensorType::all();
    $brands = \App\SensorBrand::all();
    ?>
    <div class="container col-lg-offset-2 col-lg-10">
        <div class="container col-lg-5" style="display: inline-block">
            <div>
                <div class="panel panel-default" style="height: 490px">
                    <div class="panel-heading" style="text-align: center; background-color: lightseagreen; color: white"><h4>Tipi disponibili</h4></div>
                    <div class="panel-body" style="height: 370px ; overflow-y: auto ;">
                        <table class = "table">
                            <tr>
                                <th>ID</th>
                                <th>Tipo</th>
                                <th>Codice</th>
                            </tr>
                            @foreach($types as $type)
                                <tr>
                                    <td>{{$type->id}}</td>
                                    <td>{{$type->type}}</td>
                                    <td>{{$type->code}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="container col-lg-5" style="display: inline-block">
            <div>
                <div class="panel panel-default" style="height: 490px">
                    <div class="panel-heading" style="text-align: center; background-color: lightseagreen; color: white"><h4>Marche disponibili</h4></div>
                    <div class="panel-body" style="height: 370px ; overflow-y: auto ;">
                        <table class = "table">
                            <tr>
                                <th>ID</th>
                                <th>Marca</th>
                                <th>Codice</th>
                            </tr>
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{$brand->id}}</td>
                                    <td>{{$brand->brand}}</td>
                                    <td>{{$brand->code}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="btn btn-default col-lg-2" style="position: relative ; margin-left: 43%" href="/corpManager/sensors">Indietro</a>
@endsection