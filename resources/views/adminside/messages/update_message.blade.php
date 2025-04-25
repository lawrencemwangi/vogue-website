<x-admin-layout>
    <h1>Message Reply</h1>

    <div class="message_container">
        <ul>
            <ul>
                <li> Client Names:- <span>{{ $message->names }}</span></li>
                <li>Client Email:- <span>{{ $message->email }}</span></li>
                <li>Message:- <span>{{ $message->message }}</span></li>
            </ul>
        </ul>

        <a href="mailto:{{ $message->email }}" target="_blank">Reply the Message</a>
    </div>
        
</x-admin-layout>