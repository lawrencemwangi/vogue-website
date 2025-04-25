<x-admin-layout>
    <h1>Message Reply</h1>

    <div class="contact_container">
        <ul>
            <ul>
                <li> Client Names:- <span>{{ $message->names }}</span></li>
                <li>Client Email:- <span>{{ $message->email }}</span></li>
                <li>Message:- <span>{{ $message->message }}</span></li>
            </ul>
        </ul>

        <div class="message_container">
              <a href="mailto:{{ $message->email }}" target="_blank">Reply the Message</a>
        </div>
    </div>
        
</x-admin-layout>