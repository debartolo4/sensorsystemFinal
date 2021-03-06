@extends('layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-13">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="container" align="center" >
                            <?php
                            use Illuminate\Support\Facades\Auth;
                            $user = Auth::user();
                            $type = $user->type;
                            ?>
                            <h1 style="color:dodgerblue">Benvenuto Admin!</h1>
                            <h2>{{ Auth::user()->name }} {{Auth::user()->surname}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection