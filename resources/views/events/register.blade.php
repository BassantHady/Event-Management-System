@extends('Layouts.nav')

@section('title') register @endsection
@section('contenet')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4 rounded-4" style="width: 28rem;">
            <h3 class="text-center mb-4">Register</h3>
            <form method="POST" action="{{route('events.registerCreate')}}">
                @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>
            <p class="text-center mt-3">Already have an account? 
            <a href="{{route('events.login')}}" class="text-decoration-none">Login here</a>
            </p>
        </div>
    </div>

@endsection