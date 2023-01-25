@extends('layouts.master')

@section('stile', 'style.css')

@section('titolo')
Inserisci nuova recensione
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
    @if($logged)
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('review.new') }}">Nuova</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('user.profile') }}">Profilo di {{ $loggedName }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('user.logout') }}">Logout</a>
        </li>
    @endif
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="active breadcrumb-item ml-auto">Nuova recensione</li>

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
                        <option selected="selected">Film già presenti</option>
                        @foreach($movieList as $movie)
                        <option value="{{ $movie->title }}">{{ $movie->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2 py-1">
                    <div class="form-group">
                        <label for="newMovie" class="btn btn-primary btn-large btn-block">Nuovo</label>
                        <input id="newMovie" type="submit" value="Save" hidden onclick="event.preventDefault()"/>
                    </div>
                </div>
            </div>
        </div>

        @csrf
        <div class="container col-md-8">
            <label for="rate_select">Voto:</label>
            <span class="invalid-input" id="invalid-rate"></span>
            <select class="form-select form-select-lg mb-3" aria-label="Default select example" name="rate_select" id="rate_select">
                <option selected="selected">Voto</option>
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
            <label for="review_text">Recensione:</label>
            <div class="form-group">
                    <textarea class="form-control mb3" id="review_text" name="review_text" rows="10" placeholder="Testo recensione"></textarea>
            </div>
        </div>

        <div class="container py-3 col-md-2">
            <div class="form-group">
                <label for="mySubmit" class="btn btn-primary btn-large btn-block">Inserisci</label>
                <input id="mySubmit" type="submit" value="Save" hidden onclick="event.preventDefault(); checkReview()"/>
            </div>
            <span id="success-message"></span>
        </div>
    </form>
</div>


@endsection

