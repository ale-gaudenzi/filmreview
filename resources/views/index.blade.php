@extends('layouts.master')

@section('stile', 'style.css')

@section('titolo')
{{ trans('labels.siteTitle') }}
@endsection


@section('left_navbar')
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
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
<li><a class="active">Home</a></li>
@endsection

@section('corpo')


@foreach($reviewList as $review)
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
          <h3 class="card-title">{{ $review->title }} </h3>
          <p class="card-text"> {{ trans('labels.director') }}: {{ $review->director }} </p>
          <p class="card-text"> {{ trans('labels.genre') }}: {{ $review->genre }} </p>
          <p class="card-text"> {{ trans('labels.duration') }}: {{ $review->duration }} minuti </p>
          <p class="card-text"> {{ trans('labels.averageVote') }}: {{ $review->medium_rate }} ({{ $review->review_number }} {{ trans('labels.review') }})</p>
          <a href="{{ route('review.showReviews', ['id' => $review->movie_id] ) }}" class="mt-auto btn btn-primary">{{ trans('labels.allReviews') }}</a>
        </div>
      </div>
    </div>
  </div>
  <div class="container col-md-12">
  <div class="card">
    <div class="row ">
    <div class="col-md-5 px-5">
    <br>

    <p class="card-text"> {{ trans('labels.vote') }}: {{ $review->rate }} </p>
    </div>
    <div class="col-md-7 px-5">
    <br>

    <p class="card-text"> {{ trans('labels.review') }}: <br>{{ $review->text }}</p>
    <br>

  </div>
    </div>
</div>
  </div>
</div>
@endforeach

<br>
@endsection

