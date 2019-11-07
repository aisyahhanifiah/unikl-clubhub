@extends('layouts.app')

@section('title', 'Events |')

@section('pagename', 'Events')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid mt--7">
  <div class="row">
    @foreach($events as $key => $event)
    <div class="col-xl-3 col-lg-6">
      <div class="card" style="width: 18rem;">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            @foreach($event->images as $key => $images)
            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
              <img class="card-img-top d-block w-100" src="{{ asset('img/event/'.$images->filename) }}" alt="ss">
            </div>
            @endforeach
          </div>
          @if($event->images->count() > 1)
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
          @endif
        </div>
        

        <div class="card-body">
          @foreach ($users->events as $events)

          @if($events->id == $event->id)
          <a href="#" class="btn btn-sm btn-success">Joined</a><br><br>
          @endif

          @endforeach
          <div>
              <h4 class="card-title">{{ $event->name }}</h4>
          </div>
          <div>
              <span class="description">{{ Carbon\Carbon::parse($event->start_date)->format('l, dS F Y') }}</span>
          </div>
          <div>
              <span class="description">{{ $event->venue }}</span>
          </div>
          <br>
          <p class="card-text text-truncate">{{ $event->description }}</p>
          <a href="{{ route('event.show',$event->id)}}" class="btn btn-primary">Show more</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @include('layouts.footers.auth')
</div>
@endsection