@extends('layouts.master')

@section('stile', 'style.css')

@section('titolo')
{{ trans('labels.reviewsTitle') }} {{ $movie->title }}
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
      <a class="nav-link" aria-current="page" href="{{ route('user.profile') }}">{{ trans('labels.profileNavbar') }}{{ $loggedName }}</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" aria-current="page" href="{{ route('user.logout') }}">Logout</a>
    </li>
  @else
    <li class="nav-item">
      <a class="nav-link" aria-current="page" href="{{ route('user.login') }}">{{ trans('labels.loginNavbar') }}</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" aria-current="page" href="{{ route('user.register') }}">{{ trans('labels.registerNavbar') }}</a>
    </li>
  @endif
@endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
  <li class="active breadcrumb-item ml-auto">{{$movie->title}}</li>
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
              <img class="d-block col-md-8 offset-md-3 py-3 img-responsive" src="{{ $movie->imagelink }}" alt="" min-width="300" min-height="300">
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-7 px-5">
        <div class="card-block">
          <br>
          <h3 class="card-title">{{ $movie->title }}</h3>
          <p class="card-text"> {{ trans('labels.year') }}: {{ $movie->year }} </p>
          <p class="card-text"> {{ trans('labels.director') }}: {{ $movie->director }} </p>
          <p class="card-text"> {{ trans('labels.genre') }}: {{ $movie->genre }} </p>
          <p class="card-text"> {{ trans('labels.duration') }}: {{ $movie->duration }} minuti </p>
          <p class="card-text"> {{ trans('labels.averageVote') }}: {{number_format( $movie->medium_rate, 2) }} ({{ $movie->review_number }} {{ trans('labels.reviews') }})</p>
        </div>
      </div>
    </div>
  </div>


  @foreach($reviewList as $review)
  <div class="container col-md-12">
    <div class="card">
      <div class="row ">
        <div class="col-md-4 px-5">
          <br>
          <p class="card-text"> <b>{{ trans('labels.vote') }}</b>: <br>{{ $review->rate }} </p>
        </div>

        <div class="col-md-6 px-5">
          <br>
          <p class="card-text"> <b>{{ trans('labels.review') }}</b>: <br>{{ $review->text }}</p>
          <br>
        </div>
        @if(isset($isAdmin) and $isAdmin==1)
        <div class="col-md-2 py-4"> 

          <div class="row col-md-10 gy-1">
            <a class="btn btn-danger" href="{{ route('review.confirmDelete', ['id' => $review->review_id]) }}">{{ trans('labels.delete') }}</a>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
@endforeach

</div>


@endsection

