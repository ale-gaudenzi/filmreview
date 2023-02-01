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
<div class="tab-pane active">
    <form id="movie-form" name="movie-form" action="{{ route('movie.store') }}" method="post" style="margin-top: 2em">
    @csrf
        <label for="title">{{ trans('labels.title') }}:</label>
        <span class="invalid-input" id="invalid-title"></span>
        <div class="form-group">
            <input type="text" name="title" id="title" class="form-control mb-2" placeholder="{{ trans('labels.title') }}"/>
        </div>

        <label for="year">{{ trans('labels.director') }}:</label>
        <span class="invalid-input" id="invalid-director"></span>
        <div class="form-group">
            <input type="text" name="director" id="director" class="form-control mb-2" placeholder="{{ trans('labels.director') }}"/>
        </div>

        <label for="genre">{{ trans('labels.genre') }}:</label>
        <span class="invalid-input" id="invalid-genre"></span>
        <div class="form-group">
            <input type="text" name="genre" id="genre" class="form-control mb-2" placeholder="{{ trans('labels.genre') }}"/>
        </div>

        <div class='row'>
            <div class="col-sm">
                <label for="year">{{ trans('labels.year') }}:</label>
                <span class="invalid-input" id="invalid-year"></span>
                <div class="form-group">
                    <input type="text" name="year" id="year" class="form-control mb-2 col-md-2" placeholder="{{ trans('labels.year') }}"/>
                </div>
            </div>

            <div class="col-sm">
                <label for="duration">{{ trans('labels.durationmin') }}:</label>
                <span class="invalid-input" id="invalid-duration"></span>
                <div class="form-group">
                    <input type="text" name="duration" id="duration" class="form-control mb-2" placeholder="{{ trans('labels.durationmin') }}"/>
                </div>
            </div>
        </div>

        <label for="image">{{ trans('labels.imagelink') }}:</label>
        <span class="invalid-input" id="invalid-link"></span>
        <div class="form-group">
            <input type="text" name="imagelink" id="imagelink" class="form-control mb-2" placeholder="{{ trans('labels.imagelink') }}"/>
        </div>

        <div class="form-group col-md-4 py-4 offset-md-4 mb-2">
            <label for="submit-movie" class="btn btn-primary btn-large btn-block">{{ trans('labels.insert') }}</label>
            <input id="submit-movie" type="submit" value="Save" hidden onclick="event.preventDefault(); checkMovie()"/>
        </div>

        <div class="container col-md-6">
        <span id="success-message"></span>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>


@endsection

