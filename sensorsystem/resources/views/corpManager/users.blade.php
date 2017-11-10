@extends('layouts.app_corpManager')

@section('content')
    <?php
    use App\User;
    use App\Customer;use Illuminate\Support\Facades\Auth;
    $users = User::all();
    $customer = Customer::find(Auth::user()->client_id);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Gestisci Utenti</h4></div>
                    <div class="panel-heading clearfix">
                        <a class="btn btn-primary" href="/corpManager/employees/addEmployee">Aggiungi Dipendente</a>
                        </a>
                    </div>
                    <div class="panel-body">
                        <div class="panel-heading clearfix" style="background-color: lightseagreen; color: white">
                            ID:{{$customer->id}} - {{$customer->name}}
                            <a class="btn-group">
                                <a class = "btn btn-default pull-right btn-sm" href="/customers/{{$customer->id}}">Show details</a>
                            </a>
                        </div>
                        <table class = "table">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Ruolo</th>
                            </tr>

                            @foreach($users as $user)
                                @if(($user->client_id == $customer->id))
                                    <tr>
                                        @if($user->type == 1)
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}} {{$user->surname}}</td>
                                            <td>ADMIN</td>
                                            <td>
                                                <a class="btn-group">
                                                    <a class = "btn btn-default pull-right btn-sm" href="/admins/{{$user->id}}" style="background-color: lightseagreen; color:white">Show details</a>
                                                </a>
                                            </td>

                                        @elseif($user->type == 2)
                                            <?php
                                            $flag = true
                                            ?>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}} {{$user->surname}}</td>
                                            <td>RESPONSABILE AZIENDALE</td>
                                            <td>
                                                <a class="btn-group">
                                                    <a class = "btn btn-default pull-right btn-sm" href="/corpManagers/{{$user->id}}" style="background-color: lightseagreen; color:white">Show details</a>
                                                </a>
                                            </td>
                                        @elseif($user->type == 3)
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}} {{$user->surname}}</td>
                                            <td>DIPENDENTE</td>
                                            <td>
                                                <a class="btn-group">
                                                    {!! Form::open(['action' => ['EmployeeController@destroy', $user->id], 'method' => 'DELETE', 'class' => 'pull-right']) !!}
                                                    <a>
                                                        <button type="submit" class = "btn btn-default btn-sm pull-right" style="background-color: lightseagreen; color:white">Delete</button>
                                                    </a>
                                                    {!! Form::close() !!}
                                                    <a class = "btn btn-default pull-right btn-sm" href="/employees/{{$user->id}}/edit" style="background-color: lightseagreen; color:white">Edit</a>
                                                    <a class = "btn btn-default pull-right btn-sm" href="/employees/{{$user->id}}" style="background-color: lightseagreen; color:white">Show details</a>
                                                </a>
                                            </td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection