@extends('layouts.master')

@section('stile', 'style.css')

@section('titolo')
{{ trans('labels.newMovieTitle') }}
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
            <a class="nav-link" aria-current="page" href="{{ route('user.profile') }}">{{ trans('labels.profileNavbar') }} {{ $loggedName }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('user.logout') }}">Logout</a>
        </li>
    @endif
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('review.new') }}">{{ trans('labels.newReview') }}</a></li>
<li class="active breadcrumb-item ml-auto">{{ trans('labels.newMovieTitle') }}</li>

@endsection

@section('corpo')


<div class="container col-md-8">
<div class="row" style="margin-top: 1em">
<div class="col-md-4 offset-md-4">
<div class="tab-content">
<div class="tab-pane active" id="login-form">
    <form id="login-form" action="{{ route('movie.insert') }}" method="post" style="margin-top: 2em">
        
        <label for="title">{{ trans('labels.title') }}:</label>
        <div class="form-group">
            <input type="text" name="title" id="title" class="form-control mb-2" placeholder="{{ trans('labels.title') }}"/>
        </div>

        <label for="year">{{ trans('labels.year') }}:</label>
        <div class="form-group">
            <input type="text" name="year" id="year" class="form-control mb-2" placeholder="{{ trans('labels.year') }}"/>
        </div>

        <label for="genre">{{ trans('labels.genre') }}:</label>
        <div class="form-group">
            <input type="text" name="genre" id="genre" class="form-control mb-2" placeholder="{{ trans('labels.genre') }}"/>
        </div>

        <label for="duration">{{ trans('labels.duration') }}:</label>
        <div class="form-group">
            <input type="text" name="duration" id="duration" class="form-control mb-2" placeholder="{{ trans('labels.duration') }}"/>
        </div>

        <label for="image">{{ trans('labels.imagelink') }}:</label>
        <div class="form-group">
            <input type="text" name="imagelink" id="imagelink" class="form-control mb-2" placeholder="{{ trans('labels.imagelink') }}"/>
        </div>

        <div class="form-group col-md-4 py-4 offset-md-4 mb-2">
            <label for="mySubmit" class="btn btn-primary btn-large btn-block">{{ trans('labels.insert') }}</label>
            <input id="mySubmit" type="submit" value="Save" hidden onclick="event.preventDefault(); checkMovie()"/>
        </div>
        <span id="success-message"></span>


    </form>
</div>
</div>
</div>
</div>
</div>


@endsection

