<x-admin-layout>
    {{-- <x-header title="Dorms" addLink="#"/> --}}

    <div class="message_container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">Full Names</span>
                <span class="user-col">Email</span>
                <span class="user-col">Message</span>
                <span class="user-col">Action</span>
            </div>
             
            @if (empty($messages))
                <p>No User Found at the moment</p> 
            @else
                @foreach ($messages as $message)
                    <div class="user_infor">
                        <span class="user-col">{{ $message->names }}</span>
                        <span class="user-col">{{ $message->email }}</span>
                        <span class="user-col">{{ $message->message }}</span>
                        <span class="action">
                            <a href="#">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </span>
                    </div>
                @endforeach
            @endif      
        </div>
    </div>
</x-admin-layout>