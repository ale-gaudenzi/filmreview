@extends('layouts.master')

@section('stile', 'style.css')

@section('titolo')
Recensioni di {{ $movie_title }}
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
      <a class="nav-link" aria-current="page" href="{{ route('review.new') }}">Nuova</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" aria-current="page" href="{{ route('user.profile') }}">Profilo di {{ $loggedName }}</a>
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
  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
  <li class="active breadcrumb-item ml-auto">{{$movie_title}}</li>
@endsection

@section('corpo')
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
          <h3 class="card-title">{{ $movie_title }} </h3>


        </div>
      </div>
    </div>
  </div>


  @foreach($reviewList as $review)
  <div class="container col-md-12">
    <div class="card">
      <div class="row ">
        <div class="col-md-5 px-5">
          <br>
          <p class="card-text"> Voto: {{ $review->rate }} </p>
        </div>

        <div class="col-md-7 px-5">
          <br>
          <p class="card-text"> Recensione: <br>{{ $review->text }}</p>
          <br>
        </div>
      </div>
    </div>
  </div>
@endforeach

</div>


@endsection

