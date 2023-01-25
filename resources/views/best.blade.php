@extends('layouts.master')

@section('stile', 'style.css')

@section('titolo')
Best review
@endsection


@section('left_navbar')
    <li class="nav-item">
        <a class="nav-link"  href="{{ route('home') }}">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('best')}}">Best</a>
    </li>
@endsection

@section('right_navbar')
    @if($logged)
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('review.new') }}">Nuova</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('user.profile') }}">Profilo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('user.logout') }}">Logout</a>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('user.login') }}">Accedi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('user.register') }}">Registrati</a>
        </li>
    @endif
@endsection

@section('breadcrumb')
<li><a class="active">Home</a></li>
@endsection

@section('corpo')

@foreach($movieList as $movie)
<div class="container py-3 col-md-8">
  <div class="card">
    <div class="row ">
      <div class="col-md-5">
        <div id="CarouselTest" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#CarouselTest" data-slide-to="0" class="active"></li>
            <li data-target="#CarouselTest" data-slide-to="1"></li>
            <li data-target="#CarouselTest" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner"> <!--non carousel-->
            <div class="carousel-item active">
              <img class="d-block" src="https://picsum.photos/450/300?image=1072" alt="">
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-7 px-5">
        <div class="card-block">
          <br>
          <h3 class="card-title">{{ $movie->title }} </h3>
          <p class="card-text"> Regista: {{ $movie->director }} </p>
          <p class="card-text"> Genere: {{ $movie->genre }} </p>
          <p class="card-text"> Durata: {{ $movie->duration }} minuti </p>
          <p class="card-text"> Voto medio: {{ $movie->medium_rate }} (su {{ $movie->review_number }} recensioni)</p>
        </div>
      </div>

    </div>
  </div>
</div>
@endforeach

<br>
<br>



@endsection