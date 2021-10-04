<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
  <title>Log App</title>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Rubik&display=swap');
    *{
      font-family: 'Rubik', sans-serif;
      color: #000000;
    }
    /* body{
      background-color: antiquewhite
    } */
    .bs{
      box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
    }
  </style>
</head>
<body>

  <div>
    @yield('navbar')
  </div>

  @if (session('Error'))
    <div class="alert alert-danger" role="alertdialog">
      <div class="container">
        {{ session('Error') }}
      </div>
    </div>
  @endif

  @if (session('Message_Info'))
    <div class="alert alert-info" role="alertdialog">
      <div class="container">
        {{ session('Message_Info') }}
      </div>
    </div>
  @endif

  @if (session('Message_Success'))
    <div class="alert alert-success" role="alertdialog">
      <div class="container">
        {{ session('Message_Success') }}
      </div>
    </div>
  @endif

  @if (session('errors'))
    <div class="alert alert-danger" role="alertdialog">
      <div class="container">
        Errors detected please fix immediately
        <ul>
          @foreach (session('errors')->all() as $error)
              <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    </div>
  @endif

  @if (session('item_success'))
    <div class="alert alert-success" role="alertdialog">
      <div class="container">
        {{ session('item_success') }}
      </div>
    </div>
  @endif

  <div class="container">
    @yield('content')
  </div>

</body>
</html>