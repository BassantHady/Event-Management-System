@extends('Layouts.nav')

@section('title') Edit @endsection
@section('contenet')
<form method="POST" action="{{route('events.update', $event->id)}}">
@csrf
@method('PUT')
    <div class="mb-2 mt-4">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" value="{{$event->title}}" class="form-control" id="exampleFormControlInput1" name="title">
    </div>
    <div class="mb-2">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{{$event->description}}</textarea>
    </div>
    <div class="mb-2">
        <label for="exampleFormControlTextarea1" class="form-label">Location</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="location" rows="3">{{$event->location}}</textarea>
    </div>
    <div class="mb-2">
        <label for="date" class="form-label">Date</label>
        <input type="datetime-local" class="form-control" id="date" name="date" value="{{ \Carbon\Carbon::parse($event->dateTime)->format('Y-m-d\TH:i') }}">
    </div>
    <button type="submit" class="btn btn-primary">update</button>
</form>
@endsection