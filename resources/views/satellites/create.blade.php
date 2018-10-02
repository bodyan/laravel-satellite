<form action="{{route('satellite.store')}}" method="post">
	@csrf
	<input type="text" name="name">
	<input type="text" name="longtitude">
	<input type="submit" value="Add Satellite">
	
</form>