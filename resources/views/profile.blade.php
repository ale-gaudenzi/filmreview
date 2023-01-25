@extends('layouts.master')

@section('stile', 'style.css')

@section('titolo')
Profilo di {{ $loggedName }}
@endsection


@section('left_navbar')
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('best') }} ">Best</a>
    </li>
@endsection

@section('right_navbar')
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ route('review.new') }}">Nuova</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('user.profile') }}">Profilo di {{ $loggedName }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ route('user.logout') }}">Logout</a>
    </li>    
@endsection

@section('breadcrumb')

<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="active breadcrumb-item ml-auto">Profilo</li>

@endsection

@section('corpo')

@endsection