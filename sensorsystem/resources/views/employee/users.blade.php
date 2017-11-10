@extends('layouts.app_employee')

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
                    <div class="panel-heading"><h4>Visualizza colleghi</h4></div>
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