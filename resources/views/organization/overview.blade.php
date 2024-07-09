@extends('layout.app')

@section('content')
    <div class="container">

    <div>
    <p>instructors</p>
        @foreach ($details['instructors'] as $instruct)
        <p> @if($instruct['account'] == null) {{$instruct['email']}} @endif  </p>
        <p> @if($instruct['account'] != null) {{$instruct['account']->name}} @endif  </p>
        @endforeach
    </div>
    </div>
@endsection
