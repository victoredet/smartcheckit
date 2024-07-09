
@extends('layout.app')
@section('content')

<div class="container ">
    <h1 class="">Welcome  @if(Session::get('user'))  {{Session::get('user')['name'] }} @endif  @if(!Session::get('user'))  to smartcheckit. @endif </h1>

@if(Session::get('user'))
    <p> click <a href="/create-organization"> here </a> to setup your organization</p>
@endif


 @if(!Session::get('user'))
    <p> click <a href="/sign-up"> here </a> to get started</p>
 @endif
</div>
@endsection

