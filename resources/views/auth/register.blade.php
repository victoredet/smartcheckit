@extends('layout.app')
@section('content')

<div class="container">
    <form class="" action="/register" method="post">
    @csrf
<div class="form-group mb-3">
    <label for="username" class="form-label">Enter your full name</label>
    <input name="name" id="username" class="form-control" />
</div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>


  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password">
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Confirm Password</label>
    <input type="password" name="password_confirmation" class="form-control" id="password">
  </div>

   <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>

@endsection
