@extends('layouts.app_corpManager')

@section('content')
    <?php
    use App\User;
    use App\Customer;
    $sites = \App\Site::all();
    $customer = Customer::find(Auth::user()->client_id);
    $flag = false;
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Visualizza siti</h4></div>
                    <div class="panel-heading clearfix">
                        <a class="btn btn-primary" href="/corpManager/sites/addSite">Aggiungi Sito</a>
                    </div>
                    <div class="panel-body">
                        <div class="panel-heading clearfix" style="background-color: lightseagreen; color: white">
                            ID:{{$customer->id}} - {{$customer->name}}
                        </div>
                        <table class = "table">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Indirizzo</th>
                                <th>Città</th>
                                <th>Provincia</th>
                            </tr>

                            @foreach($sites as $site)
                                @if(($site->client_id == $customer->id))
                                    <?php
                                    $flag = true;
                                    ?>
                                    <tr>
                                        <td>{{$site->id}}</td>
                                        <td>{{$site->name}}</td>
                                        <td>{{$site->address}},{{$site->num}}</td>
                                        <td>{{$site->city}}</td>
                                        <td>{{$site->province}}</td>
                                        <td>
                                            <a class="btn-group">
                                                {!! Form::open(['action' => ['SiteController@destroy', $site->id], 'method' => 'DELETE', 'class' => 'pull-right']) !!}
                                                <a>
                                                    <button type="submit" class = "btn btn-default btn-sm pull-right" style="background-color: lightseagreen; color:white">Delete</button>
                                                </a>
                                                {!! Form::close() !!}
                                                <a class = "btn btn-default pull-right btn-sm" href="/sites/{{$site->id}}/edit" style="background-color: lightseagreen; color:white">Edit</a>
                                                <a class = "btn btn-default pull-right btn-sm" href="/sites/{{$site->id}}" style="background-color: lightseagreen; color:white">Show details</a>
                                            </a>
                                        </td>
                                @endif
                            @endforeach
                        </table>
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