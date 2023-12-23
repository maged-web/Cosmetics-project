@foreach($conversation as $message)
    @if($message->sender_id !== 1)
        <?php $otherSenderID = $message->sender_id; ?>
        @break
    @endif
@endforeach

@foreach($conversation as $message)
    <div>
        <p>Message: {{ $message->message_body }}</p>
        @if ($message->sender_id==1)
        <form method="POST" action="{{ route('messages.edit', $message->id) }}">
            @csrf
            @method('GET')
            <button type="submit">Edit</button>
        </form>     
            <form method="POST" action="{{ route('messages.admin.delete', $message->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
            @endif

    </div>
    <hr>
@endforeach

<form method="POST" action="{{ route('messages.reply', $otherSenderID) }}">
    @csrf
    <textarea name="message_body" rows="4" cols="50" placeholder="Type your reply here..."></textarea>
    <button type="submit">Send Reply</button>
</form>