@extends('layouts.app')

@section('content')
@include('notifications.messages')
<div class="row">
  <div class="col-xs-12 col-md-4 animalProfile">
    <input type="hidden" data-id={{$animal->id}}>
    <img class="img-responsive animal-image" src="{{ URL::to('images/' . $animal->image ) }}" alt="">
    <form action="{{ route('upload.images', $animal->id) }}" method="POST" enctype="multipart/form-data">
      <label for="images">
        <span>Upload images</span>
        <input type="file" multiple="multiple" id="images", name="images[]" class="form-control">
        <button type="submit" class="btn btn-primary">send</button>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
      </form>
    </div>
    <form action="#" class="col-xs-12 col-md-5 animalForm">
      <div class="form-group">
        <label for="name">Name: <span id="span-name">{{$animal->name}}</span> <i class="fa fa-pencil btn btn-warning" aria-hidden="true"></i></label>
        <input type="text" name="name" value="{{$animal->name}}" class="hide">
      </div>
      <div class="form-group">
        <label for="years">years: <span id="span-years">{{$animal->years}}</span> <i class="fa fa-pencil btn btn-warning" aria-hidden="true"></i></label>
        <input type="number" name="years" value="{{$animal->years}}" class="hide">
        <br>
        <label for="months">months: <span id="span-months">{{$animal->months}}</span> <i class="fa fa-pencil btn btn-warning" aria-hidden="true"></i></label>
        <input type="number" name="months" value="{{$animal->months}}" class="hide">
      </div>
      <div>
       Vaccinated: <input type="checkbox" name="vaccinated" @if ($animal->vaccinated) checked @endif> Dewormed: <input type="checkbox" name="dewormed" @if ($animal->dewormed) checked @endif> Castrated: <input type="checkbox"
       name="castrated" @if ($animal->castrated) checked @endif>
     </div>
     <div class="form-group">
      <label for="description">Description: <span id="span-desc">{{$animal->description}}</span> <i class="fa fa-pencil btn btn-warning" aria-hidden="true"></i></label>
      <textarea name="description" id="description" cols="55" rows="10" class="hide textarea">{{$animal->description}} </textarea>
    </div>
    <button class="btn btn-success edit-save" id="animal-edit">Save</button>
  </form>
</div>
@if ($images)
<div class="row">
@if (!is_null($images->one))
  <div class="col-xs-12 col-md-4 image-edit-container" data-image-id="one">
    <button class="image-delete-button btn btn-danger">X</button>
    <button class="image-default-button btn btn-default">Set as default</button>
    <span href="#" class="thumbnail index-image-containter">
    <img src="{{ URL::to('images/' . $images->one  ) }}" alt="..." class="img-responsive">
    </span>
  </div>
  @endif
  @if (!is_null($images->two))
  <div class="col-xs-12 col-md-4 image-edit-container" data-image-id="two">
    <button class="image-delete-button btn btn-danger" >X</button>
    <button class="image-default-button btn btn-default">Set as default</button>
    <span href="#" class="thumbnail index-image-containter">
    <img src="{{ URL::to('images/' . $images->two  ) }}" alt="..." class="img-responsive">
    </span>
  </div>
  @endif
  @if (!is_null($images->three))
  <div class="col-xs-12 col-md-4 image-edit-container" data-image-id="three">
    <button class="image-delete-button btn btn-danger">X</button>
    <button class="image-default-button btn btn-default">Set as default</button>
    <span href="#" class="thumbnail index-image-containter">
    <img src="{{ URL::to('images/' . $images->three  ) }}" alt="..." class="img-responsive">
    </span>
  </div>
  @endif
  @if (!is_null($images->four))
  <div class="col-xs-12 col-md-4 image-edit-container" data-image-id="four">
    <button class="image-delete-button btn btn-danger">X</button>
    <button class="image-default-button btn btn-default">Set as default</button>
    <span href="#" class="thumbnail index-image-containter">
    <img src="{{ URL::to('images/' . $images->four  ) }}" alt="..." class="img-responsive">
    </span>
  </div>
  @endif
  @if (!is_null($images->five))
  <div class="col-xs-12 col-md-4 image-edit-container" data-image-id="five">
    <button class="image-delete-button btn btn-danger">X</button>
    <button class="image-default-button btn btn-default">Set as default</button>
    <span href="#" class="thumbnail index-image-containter">
    <img src="{{ URL::to('images/' . $images->five  ) }}" alt="..." class="img-responsive">
    </span>
  </div>
  @endif
  @if (!is_null($images->six))
  <div class="col-xs-12 col-md-4 image-edit-container" data-image-id="six">
    <button class="image-delete-button btn btn-danger">X</button>
    <button class="image-default-button btn btn-default">Set as default</button>
    <span href="#" class="thumbnail index-image-containter">
    <img src="{{ URL::to('images/' . $images->six  ) }}" alt="..." class="img-responsive">
    </span>
  </div>
  @endif
</div>
@endif

@endsection

@section('script')
  <script type="text/javascript">
    var editRoute = '{{ route('animal.edita', $animal->id) }}'
    var defaultRoute = '{{ route('default.image', $animal->id) }}'
    var deleteRoute = '{{ route('delete.image', $animal->id) }}'
    var token = '{{ Session::token() }}'
  </script>
@endsection