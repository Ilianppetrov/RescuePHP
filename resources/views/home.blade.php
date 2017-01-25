    @extends('layouts.app')

@section('content')
@include('notifications.messages')
<div class="row">
@foreach($animals as $animal)
    <div class="col-xs-12 col-md-4 hiddenAnimal transformHidden">  
    <div class="thumbnail clearfix hoover">
        <div>
          <a href="{{ route('animal.profile', ['id' => $animal->id]) }}" class="index-image-containter">
            <img class="img-responsive index-image" src="images/{{ $animal['image'] }}" alt="...">
            </a>
        </div>
        <p class="animal-name pull-left">{{ $animal['name'] }}</p>
        <p class="animal-age pull-right">{{$animal['months']}} months</p>
        <p class="animal-age pull-right">{{$animal['years']}} years</p>
    </div>
</div>

@endforeach
</div>
<div class="col-md-offset-5">
    {{ $animals->links() }}
</div>
@endsection
