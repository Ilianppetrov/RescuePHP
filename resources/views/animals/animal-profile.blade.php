@extends('layouts.app')

@section('content')
<div class="profile-container">
  <div class="row">
    <div class="col-xs-12 col-md-6 animalProfile">
      <img class="img-responsive animal-image" src="{{ URL::to('images/' . $animal->image ) }}" alt="">
    </div>
    <div class="col-xs-12 col-md-6">
      <p>name: {{$animal->name}}</p>
      <p>gender: {{$animal->gender}}</p>
      <p>Age: {{$animal->years}} years {{$animal->months}} months old</p>
     @if ($animal->vaccinated)
    <span class="btn btn-success">Vaccinated</span>
    @else
    <span class="btn btn-danger">Vaccinated</span>
    @endif
    @if ($animal->dewormed)
    <span class="btn btn-success">Dewormed</span>
    @else
    <span class="btn btn-danger">Dewormed</span>
    @endif
    @if ($animal->castrated)
    <span class="btn btn-success">Castrated</span>
    @else
    <span class="btn btn-danger">Castrated</span>
    @endif
      <p>Description: {{$animal->description}}</p>
    </div>
    
    @if (Auth::check() && Auth::user()->id !== $animal->user_id)
    <form action="#">
      <button class="btn btn-primary">Send</button>
    </form>
    @endif
  {{-- </div>
  {{# if data.images}}
  <div class="row images-selector">
    <div class="col-md-3 col-md-offset-5 btn btn-primary show-more-images">Show more images</div>
  </div>
  <div class="profile-images">
    <div class="row">
      {{# each data.images}}
      <div class="col-xs-12 col-md-4">
        <span href="#" class="thumbnail hoover index-image-containter">
          <img src="#" alt="..." class="img-responsive" data-src="/{{this}}">
        </span>
      </div>
      {{/each}}
    </div>
  </div>
</div>
<div class="selected">
  <div class="previous-image">
    <img src="#" alt="">
  </div>
  <div class="current-image">
    <img src="#" id="current-image" />
  </div>
  <div class="next-image">
    <img src="#" alt="">
  </div>
  </ul> --}}
@endsection