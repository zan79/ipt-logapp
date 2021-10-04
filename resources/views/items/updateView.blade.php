@extends('base')

@section('navbar')

<nav class="navbar navbar-expand-lg navbar-light bs bg-light">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ url('/items') }}">Prelim App</a>
    <form class="d-flex">
      <ul class="navbar-nav">
        <a class="btn btn-danger" href="{{ url('/logout') }}">Logout</a>
      </ul>
    </form>
  </div>
</nav>

@endsection

@section('content')

<div class="mt-5">
  
  <div class="row">
    <span class="col">
    </span>
    <span class="col text-center">
      <h1 class="">Update Item</h1>
    </span>
    <span class="col text-end">
      <a href="{{ route('items.index') }}" class=" btn btn-warning"> Back to Items</a>
    </span>
  </div>

  <div class="col-md-6 offset-md-3">

    <div class="card bs">
      <div class="card-body">
        <form action="{{ route('items.update', $item->id) }}" method="post">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <input type="text" name="name" id="name" value="{{ $item->name }}" class="form-control" placeholder="Name" required>
          </div>

          <div class="mb-3">
            <textarea class="form-control" style="height:70px" name="description" placeholder="Description" required>{{ $item->description }}</textarea>
          </div>

          <div class="mb-3">
            <input type="number" name="price" id="price" value="{{ $item->price }}" class="form-control" placeholder="Price" required>
          </div>

          <div class="mb-3">
            <input type="number" name="quantity" id="quantity" value="{{ $item->quantity }}" class="form-control" placeholder="Quantity" required>
          </div>

          <button class="btn btn-success form-control" type="submit">Update</button>
        </form>
      </div>
    </div>

  </div>
</div>

@endsection