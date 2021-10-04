@extends('base')

@section('navbar')

<nav class="navbar navbar-expand-lg navbar-light bs bg-light">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ url('/') }}">Log App</a>
  </div>
</nav>

@endsection

@section('content')

<div class="row">
  <div class="col-md-4 offset-md-4 mt-4">
    <div class="text-center mt-2 mb-2">
      <h3>User Login</h3>
    </div>
    <div class="card bs">
      <div class="card-body">
        <form action="{{url('/login')}}" method="post">
          {{ csrf_field() }}
          <div class="mb-3">

            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
          </div>
          <div class="mb-3">

            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
          </div>
          <button class="btn btn-primary form-control" type="submit">Login</button>
          <hr>
          <div class="px-5">
            <p class="text-center">Don't have an account yet?</p>
            <a class="btn btn-success form-control" href="{{ url('/register') }}">Register</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection