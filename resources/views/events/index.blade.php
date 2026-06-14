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
              <!-- Button -->
              <a href="{{route('events.edit', $event['id'])}}" class="btn btn-sm btn-danger mt-3">Edit</a>
              <form style="display: inline;" method="POST" action="{{route('events.destroy', $event->id)}}" onsubmit="return confirm('Are you sure you want to delete this post?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger mt-3">Delete</button>
              </form>
            </div>
          </div>
        </div>
      @endforeach

      </div>
    </div>

    <div class="text-center mt-4 mb-4">
        <a href="{{route('events.create')}}" type="button" class="btn btn-dark">Create Event</a>
    </div>



@endsection