@extends('layouts.app_corpManager')

@section('content')
    <?php
    use App\Site;
    use App\Customer;
    use App\Sensor;
    $sites = Site::all();
    $customer = Customer::find(Auth::user()->client_id);
    $sensors = Sensor::all();
    $flag = false;
    $flag2 = false;
    ?>
    <div class="container col-lg-12">
        <div class="container col-lg-4" style="display: inline-block;  position:absolute ; margin-top: 150px">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align: center; background-color: lightseagreen; color: white"><h4>Installazione</h4></div>
                    <div class="panel-title" style="text-align: center; margin-top: 25px"><div><h4>Pannello per l'installazione dei sensori nei siti</h4></div></div>
                    <div class="panel-body" style="text-align: center">
                        <a class="col-md-12 btn btn-primary" style="margin-bottom: 10px" href="/corpManager/sensors/addSensor">Installa sensore</a>
                        <a class="col-md-12 btn btn-primary" style="margin-bottom: 10px" href="/corpManager/sensors/installableSensors">Visualizza sensori installabili</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="pull-right col-md-8">
            <div class="panel panel-default" style="height: 545px">
                <div class="panel-heading" style="text-align: center; background-color: lightseagreen; color: white"><h4>Sensori installati</h4></div>
                <div class="panel-body">
                    <div class="panel-heading clearfix" style="background-color: steelblue; color: white">
                        ID:{{$customer->id}} - {{$customer->name}}
                    </div>
                    <div class="panel-body" style="height: 350px ; overflow-y: auto ;">
                        @foreach($sites as $site)
                            @if(($site->client_id == $customer->id))
                                <?php
                                $flag = true;
                                $flag2 = false;
                                ?>
                                <div class="panel-heading clearfix" style="background-color: lightblue; color: darkblue">
                                    ID:{{$site->id}} - {{$site->name}} - {{$site->address}},{{$site->num}} - {{$site->city}} ({{$site->province}})
                                </div>
                                <table class = "table">
                                    <tr>
                                        <th>ID</th>
                                        <th>Tipo</th>
                                        <th>Marca</th>
                                        <th>Coordinate</th>
                                        <th>MinVal</th>
                                        <th>MaxVal</th>
                                    </tr>
                                    @foreach($sensors as $sensor)
                                        @if(($sensor->site_id == $site->id))
                                            <?php
                                            $flag2 = true;
                                            ?>
                                            <tr>
                                                <td>{{$sensor->id_string}}</td>
                                                <td>{{\App\SensorType::find($sensor->type_id)->type}}</td>
                                                <td>{{\App\SensorBrand::find($sensor->brand_id)->brand}}</td>
                                                <td>{{$sensor->coordinates}}</td>
                                                <td>{{$sensor->minV}}</td>
                                                <td>{{$sensor->maxV}}</td>
                                                <td>
                                                    <a class="btn-group">
                                                        {!! Form::open(['action' => ['SensorController@destroy', $sensor->id], 'method' => 'DELETE', 'class' => 'pull-right']) !!}
                                                        <a>
                                                            <button type="submit" class = "btn btn-default btn-sm pull-right" style="background-color: lightblue; color:darkblue">Delete</button>
                                                        </a>
                                                        {!! Form::close() !!}
                                                        <a class = "btn btn-default pull-right btn-sm" href="/sensors/{{$sensor->id}}/edit" style="background-color: lightblue; color:darkblue">Edit</a>
                                                        <a class = "btn btn-default pull-right btn-sm" href="/sensors/{{$sensor->id}}" style="background-color: lightblue; color:darkblue">Show details</a>
                                                    </a>
                                                </td>
                                        @endif
                                    @endforeach
                                </table>
                                @if($flag == true && $flag2 == false)
                                    <div class="panel-body">
                                        Non sono presenti sensori.
                                    </div>
                                @endif
                            @endif
                        @endforeach
                        @if($flag == false)
                            <div class="panel-body">
                                Non sono presenti siti.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection