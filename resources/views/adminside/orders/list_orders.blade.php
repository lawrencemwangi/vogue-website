<x-admin-layout>
    <h1>Orders</h1>
    <div class="message_container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">Order No.</span>
                <span class="user-col">Names</span>
                <span class="user-col">Email</span>
                <span class="user-col">Phone_number</span>
                <span class="user-col">Status</span>
                <span class="user-col">Payment</span>
                <span class="user-col">Action</span>
            </div>
             
            @if (empty($orders))
                <p>No User Found at the moment</p> 
            @else
                @foreach ($orders as $order)
                    <div class="user_infor">
                        <span class="user-col text-success">{{ $order->order_number }}</span>
                        <span class="user-col">{{ $order->names }}</span>
                        <span class="user-col">{{ $order->email }}</span>
                        <span class="user-col">{{ $order->phone }}</span>
                        <span class="user-col {{ $order->status == 'pending' ? 'text-danger' : 'text-success' }}">
                            {{ $order->status }}
                        </span>                        
                        <span class="user-col {{ $order->paid == 1 ? 'text-success' : 'text-danger' }}">
                            {{ $order->paid == 1 ? 'Yes' : 'No'  }}
                        </span>
                        <span class="action">
                            <a href="{{ route('orders.edit', ['order' => $order]) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </span>
                    </div>
                @endforeach
            @endif      
        </div>
    </div>
</x-admin-layout>