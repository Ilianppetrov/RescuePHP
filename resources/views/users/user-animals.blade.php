@extends('layouts.app')

@section('content')
@include('notifications.messages')
@if(count($animals) > 0)
<div class="row">
  <div class="col-md-8 col-md-offset-2">
@foreach($animals as $animal)
  
      <ul class="list-group">
        <li class="list-group-item row">
          <span class="col-md-2 col-xs-3 myAnnimalsName"><strong>{{$animal->name}}</strong></span>
          <a href="#" class="btn btn-success col-md-2 col-md-offset-3 col-xs-3 col-xs-offset-2">Adopted</a>
          <a href="{{ route('animal.edit', $animal->id) }}" class="btn btn-primary col-md-2 col-xs-2">Edit</a>
          <a href="{{ route('animal.delete', $animal->id) }}" class="btn btn-danger col-md-2 confirm-alert col-xs-2" >Delete</a>
        </li>
      </ul>
@endforeach
    </div>
  </div>
 @else
  <div class="row">
    <div class="col-md-6 col-md-offset-4 col-xs-10 col-xs-offset-1">
      <h1>No Animals added</h1>
    </div>
  </div>
@endif
  @endsection