@extends('layouts.master')
@section('stile', 'style.css')
@section('titolo')
Errore
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
                        <div class='panel-body col-md-9 offset-md-2 mb-2'>
                            <p>Il nome utente o la password sono errati</p>
                            <div class="col-md-3 offset-md-4 mb-2">
                                    <a href="{{ route('home') }}" class="btn btn-primary">Indietro</a>
                            </div>
                            <p><a class="col-md-3 offset-md-2 mb-2" href="#">Password dimenticata</a></p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
