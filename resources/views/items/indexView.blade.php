@extends('base')

@section('navbar')

<nav class="navbar navbar-expand-lg navbar-light bs bg-light">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ url('/items') }}">Log App</a>
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
    <div class="col text-start">
      <h1 class="">Items</h1>
    </div>
    <div class="col text-end">
      <a class="btn btn-primary" href="{{ route('items.create') }}" > Create Item</a>
    </div>
  </div>

  <div class="card bs">
    <table class="table table-striped">

      <thead class="text-dark">
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>&nbsp;</th>
      </thead>
  
      <tbody>
        @foreach ($items as $item)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->quantity }}</td>
            <td class="text-end">
              <form action="{{ route('items.destroy',$item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a class="text-end btn btn-warning btn-sm" href="{{ route('items.edit',$item->id) }}">Update</a>
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>
            </td>
        </tr>
        @endforeach
      </tbody>
  
    </table>
  </div>
</div>

@endsection