<form method="POST" action="{{ route('messages.edit.send', $message->id) }}">
    @csrf
    @method('POST')

    <textarea name="message_body" rows="4" cols="50" >{{$message->message_body}}</textarea>
    <button type="submit">Edit Reply</button>
</form>
