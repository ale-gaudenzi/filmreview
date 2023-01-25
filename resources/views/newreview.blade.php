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
<li><a class="active">Home</a></li>
@endsection

@section('corpo')


<div class="container py-5 col-md-8">
<div class="container col-md-8">
    <form class="form-horizontal" name="review" method="post" action="{{ route('review.store') }}">
    Film:

    <span class="invalid-input" id="invalid-movie"></span>

    <select class="form-select form-select-lg mb-3" aria-label="Default select example" name="movie" id="movie_select">
        <option selected>Film già presenti</option>
        @foreach($movieList as $movie)
        <option value="{{ $movie->title }}" selected="selected">{{ $movie->title }}</option>
        @endforeach
    </select>

    </div>

    @csrf

    <div class="container col-md-8">
    Voto:
    <span class="invalid-input" id="invalid-rate"></span>
    <select class="form-select form-select-lg mb-3" aria-label="Default select example" name="rate" id="rate_select">
        <option selected>Voto</option>
        <option value="1" selected="selected">1</option>
        <option value="2" selected="selected">2</option>
        <option value="3" selected="selected">3</option>
        <option value="4" selected="selected">4</option>
        <option value="5" selected="selected">5</option>
        <option value="6" selected="selected">6</option>
        <option value="7" selected="selected">7</option>
        <option value="8" selected="selected">8</option>
        <option value="9" selected="selected">9</option>
        <option value="10" selected="selected">10</option>
    </select>


    </div>

    <div class="container col-md-8">

    Recensione:
    <div class="form-group">
        <input type="text" name="review_text" class="form-control mb-2" placeholder="Testo"/>
    </div>

    <div class="container py-3 col-md-3">

    <div class="form-group">
        <label for="mySubmit" class="btn btn-primary btn-large btn-block">Inserisci</label>
        <input id="mySubmit" type="submit" value="Save" hidden onclick="event.preventDefault(); checkReview()"/>
    </div>
    </div>

    </form>
    </div>

</div>


</div>


@endsection

