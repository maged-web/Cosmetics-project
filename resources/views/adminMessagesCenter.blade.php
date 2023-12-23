<h1>Admin Messages</h1>


@foreach($adminMessages as $senderID => $messages)
    <div>
        <h3>Messages from User ID: {{ $senderID }}</h3>
        <a href="{{ route('messages.conversation', $senderID) }}">View Conversation</a>
        
    </div>
    <hr>
@endforeach