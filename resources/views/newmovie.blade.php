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
<div class="col-md-8 offset-md-2">
<div class="tab-content">
<div class="tab-pane active">
    @csrf
    <div class='row'>
        <div class="col-md-10">
            <label for="title">{{ trans('labels.title') }}:</label>
            <span class="invalid-input" id="invalid-title"></span>
            <div class="form-group">
                <input type="text" name="title" id="title" class="form-control mb-2" placeholder="{{ trans('labels.title') }}"/>
            </div>
            </div>
            <div class="col-md-1">
            <div class="form-group col-md-4 py-4 offset-md-4 mb-2">
                <label for="search-movie" class="btn btn-primary btn-large btn-block">{{ trans('labels.search') }}</label>
                <input id="search-movie" type="submit" value="Save" hidden onclick="event.preventDefault(); searchMovie()"/>
            </div>
        </div>
    </div>

    <div class="container col-md-6">
        <span id="found-message"></span>
        <span id="success-message"></span>
    </div>

    <table class='table table-striped' id='result-table' name='result-table'>
    </table>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">



</div>
</div>

<div class="col-md-8 offset-md-2" >
<p>{{ trans('labels.powered') }}</p>
<img src="{{ url('/') }}/img/tmdb.svg" alt="tmdb"> 
<p></p>
</div>

</div>


</div>


</div>


@endsection

