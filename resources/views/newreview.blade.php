@extends('layouts.master')

@section('stile', 'style.css')

@section('titolo')
{{ trans('labels.newTitle') }}

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
            <a class="nav-link active" aria-current="page" href="{{ route('review.new') }}">{{ trans('labels.newNavbar') }}</a>
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
<li class="active breadcrumb-item ml-auto">{{ trans('labels.newReview') }}</li>

@endsection

@section('corpo')


<div class="container py-5 col-md-8">
    <form class="form-horizontal" name="review_form" method="POST" action="{{ route('review.store') }}" id="review_form">
        
        <div class="container col-md-8">
            <label for="movie_select">Film:</label>
            <span class="invalid-input" id="invalid-movie"></span>
            <div class="row">
                <div class="col-md-10">
                    <select class="form-select form-select-lg mb-3" aria-label="Default select example" name="movie_select" id="movie_select" >
                        <option selected="selected">{{ trans('labels.availableMovies') }}</option>
                        @foreach($movieList as $movie)
                        <option value="{{ $movie->title }}">{{ $movie->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2 py-1">
                    <a class="btn btn-primary btn-large btn-block" href="{{ route('newmovie') }}">{{ trans('labels.newMovie') }}</a>
                </div>
            </div>
        </div>

        @csrf
        <div class="container col-md-8">
            <label for="rate_select">{{ trans('labels.vote') }}:</label>
            <span class="invalid-input" id="invalid-rate"></span>
            <select class="form-select form-select-lg mb-3" aria-label="Default select example" name="rate_select" id="rate_select">
                <option selected="selected">{{ trans('labels.vote') }}</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>

        <div class="container col-md-8">
            <label for="review_text">{{ trans('labels.review') }}:</label>
            <div class="form-group">
                <textarea class="form-control mb3" id="review_text" name="review_text" rows="10" placeholder="{{ trans('labels.reviewText') }}"></textarea>
            </div>
        </div>

        <div class="container py-3 col-md-2">
            <div class="form-group">
                <label for="mySubmit" class="btn btn-primary btn-large btn-block">{{ trans('labels.insert') }}</label>
                <input id="mySubmit" type="submit" class=""value="Save" hidden onclick="event.preventDefault(); checkReview()"/>
            </div>
            <span id="success-message"></span>
        </div>
    </form>
</div>


@endsection

