@extends('layout.app')

@section('content')
<div class="container my-5">
    <h3>Welcome back {{Session::get('user')['name']}}</h3>

    <div class="row">
        <div class="card col-4 p-3 m-3">
        <p>You have created </p>
            <h2>{{count($myOrgs)}}</h2>
            <p><a href="/organization/list"> Organizations </a></p>
        </div>

        <div class="card col-4 p-3 m-3">
            <p>You belong to  </p>
            <h2>{{count($myOrgs)}}</h2>
            <p>Organizations</p>
        </div>


    </div>
</div>


@endsection
