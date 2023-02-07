@extends('layouts.master')

@section('stile', 'style.css')

@section('titolo')
{{ trans('labels.deleteTitle') }}

@endsection


@section('left_navbar')
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('best') }} ">{{ trans('labels.bestNavbar') }}</a>
    </li>
@endsection

@section('right_navbar')
    @if($logged)
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('review.new') }}">{{ trans('labels.newNavbar') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('user.profile') }}">{{ trans('labels.profileNavbar') }} {{ $loggedName }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('user.logout') }}">Logout</a>
        </li>
    @endif
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item ml-auto"><a href="{{ route('user.profile') }}">{{ trans('labels.profileNavbar') }}{{ $loggedName }}</a></li>
<li class="active breadcrumb-item ml-auto">{{ trans('labels.deleteTitle') }}</li>

@endsection

@section('corpo')
<div class="container py-5 col-md-6 offset-md-3">
    <p class="offset-md-2">{{trans('labels.deleteQuestion')}}{{ $movie->title }}?</p>
    <div class="row col-md-3 offset-md-4 gy-1 py-3">
        <a class="btn btn-danger" href="{{ route('review.delete', ['id' => $review->review_id]) }}">{{ trans('labels.confirm') }}</a>
        <a class="btn btn-primary" href="{{ route('user.profile') }}">{{ trans('labels.back') }}</a>
    </div>    
</div>


@endsection

