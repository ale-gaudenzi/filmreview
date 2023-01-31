@extends('layouts.master')
@section('stile', 'style.css')

@section('titolo')
{{ trans('labels.error') }}
@endsection

@section('left_navbar')
    <li class="nav-item">
        <a class="nav-link"  href="{{ route('home') }}">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ route('best')}}">{{ trans('labels.bestNavbar') }}</a>
    </li>
@endsection

@section('right_navbar')
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('user.login') }}">{{ trans('labels.loginNavbar') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ route('user.register') }}">{{ trans('labels.registerNavbar') }}</a>
    </li>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="active breadcrumb-item ml-auto">{{ trans('labels.loginTitle') }}</li>
@endsection

@section('corpo')
<div class="container">
    <div class="row" style="margin-top: 1em">
        <div class="col-md-4 offset-md-4">
            <div class="tab-content">
                <div class="tab-pane active" id="login-form">
                    <div class='panel-body col-md-9 offset-md-2 mb-2'>
                        <div class="col-md-10 offset-md-1 mb-2">
                        {{ trans('labels.errorPassUser') }}
                        </div>
                        <div class="col-md-3 offset-md-4 mb-2">
                                <a href="{{ route('home') }}" class="btn btn-primary">{{ trans('labels.back') }}</a>
                        </div>
                        <p><a class="col-md-3 offset-md-3 mb-2" href="#">{{ trans('labels.lostPass') }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
