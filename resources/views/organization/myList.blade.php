@extends('layout.app')

@section('content')
<div class="container">
    @foreach ($orgDetails as $item)
    <div class="card p-3 my-3">
      <h4><a href="/organization/overview/{{$item['org']->id}}"> {{$item['org']->name}}</a></h4>
      <p> Instructors: {{count($item['instructors'])}} </p>
    <div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{'modal'.$item['org']->id}}">Add Instructor</button>
    </div>
<!-- Modal -->
<div class="modal fade" id="{{'modal'.$item['org']->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/organization/add-instructor" >
        @csrf
                <input name="org_id" hidden value="{{$item['org']->id}}" />
            <div class="form-group my-3">
                <input name="email" placeholder="Enter instructor email" class="form-control" type="email" />
            </div>
            <div>
                <button class="btn btn-success" type="submit">submit</button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    @endforeach
</div>



@endsection

