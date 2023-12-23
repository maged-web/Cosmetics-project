{{-- <form method="POST" action="{{ route('messages.send') }}">
    @csrf
    @method('POST')
    <textarea name="message_body" rows="4" cols="50" placeholder="Type your message here..."></textarea>
    <button type="submit">Send Message</button>
</form>
 --}}

 <h1>Conversation with Admin</h1>

@foreach($conversation as $message)
    <div>
        <p>Message: {{ $message->message_body }}</p>
        @if ($message->sender_id==Auth::id())
        <form method="POST" action="{{ route('messages.edit', $message->id) }}">
            @csrf
            @method('GET')
            <button type="submit">Edit</button>
        </form>        
        <form method="POST" action="{{ route('messages.delete', $message->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
            @endif
    </div>
    <hr>
@endforeach

<form method="POST" action="{{ route('messages.send') }}">
    @csrf
    @method('POST')

    <textarea name="message_body" rows="4" cols="50" placeholder="Type your reply here..."></textarea>
    <button type="submit">Send Reply</button>
</form>