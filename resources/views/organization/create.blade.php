

@extends('layout.app')
@section('content')

<div class="container my-5">
<form action="/organization/create" method="post">
  @csrf
    <div class="mb-3">
        <label for="orgname" class="form-label">Organization's name</label>
        <input  class="form-control" id="orgname" name="name" aria-describedby="emailHelp">
    </div>

  <div class="mb-3">
     <label for="orgwebsite" class="form-label">Organization's website</label>
        <input  class="form-control" id="orgwebsite" name="website" aria-describedby="emailHelp">
    </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


@endsection
