@extends('layouts.app_employee')

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
        <div class="col-md-10 col-md-offset-1">
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
@endsection