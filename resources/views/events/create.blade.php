@extends('Layouts.nav')

@section('title') Create @endsection
@section('contenet')
<form method="POST" action="{{route('events.store')}}">
    @csrf
    <!-- Title Field -->
    <div class="mb-2 mt-4">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" value="" class="form-control" id="exampleFormControlInput1" name="title">
    </div>
    <!-- Description Field -->
    <div class="mb-2">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
    </div>
    <!-- location Field -->
    <div class="mb-2">
        <label for="exampleFormControlTextarea1" class="form-label">Location</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="location" rows="3"></textarea>
    </div>
    <!-- Date Field -->
    <div class="mb-2">
        <label for="date" class="form-label">Date</label>
        <input type="datetime-local" class="form-control" id="date" name="date">
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection