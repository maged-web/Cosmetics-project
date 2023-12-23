<h1>Send Request for any service</h1>


<form action="{{route('request.send')}}" method="post">
@csrf

<input type="hidden" name="user_id" value="{{ auth()->id() }}">
<input type="text" name="title" id="">
<input type="text" name="body" id="">
<button type="submit">Send Request</button>
</form>