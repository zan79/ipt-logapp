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
      <h3>User Registration</h3>
    </div>
    <div class="card bs">
      <div class="card-body">
        <form action="{{url('/register')}}" method="post">
          {{ csrf_field() }}
          <div class="row mb-2">
            <div class="col">

              <input type="text" name="fname" id="fname" class="form-control" placeholder="First name" required>
            </div>
            <div class="col">

              <input type="text" name="lname" id="lname" class="form-control" placeholder="Last name" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="phone" class="ms-2">10-digit ex:9670000000</label>
            <input type="tel" name="phone" id="phone" class="form-control" placeholder="Mobile number" required pattern="[0-9]{10}">
          </div>
          <div class="mb-3">

            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
          </div>
          <div class="mb-3">

            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
          </div>
          <button class="btn btn-success form-control" type="submit">Register</button>
          <hr>
          <div class="px-5">
            <p class="text-center">Already have an account?</p>
            <a class="btn btn-primary form-control" href="{{ url('/login') }}">Login</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection