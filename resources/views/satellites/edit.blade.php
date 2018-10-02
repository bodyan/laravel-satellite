<form action="{{route('satellite.update')}}" method="post">
	@csrf
	<input type="text" name="name" value="{{$satellite->name}}">
	<input type="text" name="longtitude" value="{{$satellite->longitude}}">
	<input type="submit" value="Edit Satellite">
</form>