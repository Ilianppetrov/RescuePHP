@extends('layouts.app')

@section('content')
@include('notifications.errors')
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <h1>Add animal</h1>
    <form action="{{ route('add.animal') }}" method="POST" enctype="multipart/form-data">
      <div class="form-group{{ $errors->has('animal') ? ' has-error' : '' }}">
        <label for="animalType">Animal *</label>
        <select name="animalType" id="animalType" class="form-control{{ $errors->has('gender') ? ' has-error' : '' }}">
          <option value="" disabled selected></option>
          <option value="Cat">Cat</option>
          <option value="Dog">Dog</option>
        </select>
        </div>
        <div class="form-group">
        <label for="gender">Gender *</label>
        <select name="gender" class="form-control{{ $errors->has('gender') ? ' has-error' : '' }}">
        <option value="" disabled selected></option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      </div>
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name">Name *</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" autofocus>
      </div>
      <div class="form-group row{{ $errors->has('years') ? ' has-error' : '' }}">
        <div class="col-md-6">
          <label for="years">years</label>
          <input type="number" id="years" , name="years" class="form-control" value="{{ old('years') }}">
        </div>
        <div class="col-md-6">
          <label for="months">months</label>
          <input type="number" id="months" , name="months" class="form-control" value="{{ old('months') }}">
        </div>
      </div>
      <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label for="description">Description *</label>
        <br>
        <textarea name="description" id="description" cols="48" rows="15">{{ old('description') }}</textarea>
      </div>
      <div class="form-group">
        Dewormed: <input type="checkbox" name="dewormed" > Castrated: <input type="checkbox" name="castrated"> Vaccinated: <input type="checkbox" name="vaccinated">
      </div>
      <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
        <label for="image" class="myLabel">
        <input type="file" id="image", name="image" class="form-control">
        <span>Upload image *</span>
        </label>
      </div>
      <input type="hidden" name="_token" value="{{ Session::token() }}">
      <button type="submit" class="btn btn-primary">Add</button>
    </form>
  </div>
</div>
@endsection