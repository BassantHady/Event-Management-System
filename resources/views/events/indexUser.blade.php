@extends('layouts.nav')

@section('title') Index @endsection
@section('contenet')

    <section class="find-tickets d-flex justify-content-center text-center my-5">
      <div class="intro">
        <h1 class="fw-bold">Find Event Tickets</h1>
        <p class="text-muted">Find tickets to great events.</p>
      </div>
    </section>


    <div class="container mt-4">
      <div class="row g-4"> <!-- g-4 adds margin between cards -->
      @foreach($events as $event)
        <!-- Event Card -->
        <div class="col-md-4" id="{{$event->id}}">
          <div class="card h-100 text-center">
            <h5 class="card-title pt-3 mb-0">{{$event->title}}</h5>
            <div class="card-body">
              <div class="row align-items-center">
                <!-- Date -->
                <div class="col-4 text-danger border-end">
                  <h1 class="fw-bold mb-0">{{ \Carbon\Carbon::parse($event->dateTime)->format('d') }}</h1>
                  <h2 class="fw-bold">{{ \Carbon\Carbon::parse($event->dateTime)->format('M') }}</h2>
                </div>
                <!-- Event Info -->
                <div class="col-8 ps-3 text-start">
                  <p class="mb-0">{{$event->description}}</p>
                  <h6 class="fw-bold mb-1">{{$event->location}}</h6>
                </div>
              </div>
              <!-- Tickets Button -->
              @if(\Carbon\Carbon::parse($event->dateTime)->isPast())
                  <button class="btn btn-sm btn-secondary mt-3" disabled>Tickets</button>
              @else
                @if(session('user'))
                    <a href="{{route('events.show', $event['id'])}}" class="btn btn-sm btn-danger mt-3">Tickets</a>
                @else
                    <a href="{{route('events.login')}}" class="btn btn-sm btn-danger mt-3">Tickets</a>
                @endif
              @endif
            </div>
          </div>
        </div>
      @endforeach

      </div>
    </div>



@endsection
