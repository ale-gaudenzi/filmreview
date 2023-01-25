@extends('layouts.master')
@section('stile', 'style.css')
@section('titolo')
Accedi
@endsection

@section('left_navbar')
    <li class="nav-item">
        <a class="nav-link"  href="{{ route('home') }}">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ route('best')}}">Best</a>
    </li>
@endsection

@section('right_navbar')
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('user.login') }}">Accedi</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ route('user.register') }}">Registrati</a>
    </li>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="active breadcrumb-item ml-auto">Login</li>
@endsection

@section('corpo')
<div class="container">
    <div class="row" style="margin-top: 1em">
        <div class="col-md-4 offset-md-4">
            <div class="tab-content">
                <div class="tab-pane active" id="login-form">
                    <form id="login-form" action="{{ route('user.login') }}" method="post" style="margin-top: 2em">
                        @csrf

                        <div class="form-group">
                            <input type="text" name="username" class="form-control mb-2" placeholder="Username"/>
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" class="form-control mb-2" placeholder="Password"/>
                        </div>

                        <div class="form-group text-center mb-2">
                            <input type="checkbox" name="remember">
                            <label for="remember">Ricordami</label>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 offset-md-4 mb-2">
                                    <input type="submit" name="login-submit" class="form-control btn btn-primary" value="Accedi">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="text-center">
                                <a href="#">Password dimenticata?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
