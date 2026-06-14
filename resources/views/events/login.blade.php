@extends('Layouts.nav')

@section('title') login @endsection
@section('contenet')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4 rounded-4" style="width: 28rem;">
        <h3 class="text-center mb-4">Login</h3>
        <form method="POST" action="{{route('events.loginEvents')}}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <p class="text-center mt-3">Don’t have an account? 
        <a href="{{ route('events.register') }}" class="text-decoration-none">Register here</a>
        </p>
    </div>
</div>
@endsection