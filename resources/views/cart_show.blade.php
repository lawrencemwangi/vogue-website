<x-app-layout>
    @include('partials.navbar')

    <div class="cart_container">
        <h1>Cart</h1>
        <p>You have <span class="items" >{{ Session::get('cart_count', 0) }} </span> Items  in your cart</p>

        @foreach ($cart as $id => $item)
            <div class="cart_content">
                <ul>
                    <li>
                        <span class="cart_item">
                            {{ $item['item_name'] }}
                        </span>

                        <span class="quantity">
                            {{ $item['quantity'] }}
                        </span>

                        <span class="price">
                            KES {{ number_format($item['price']) }}
                        </span>

                        <span class="total">
                            {{ number_format($item['price'] * $item['quantity']) }}
                        </span>

                           <!-- Decrease Quantity -->
                        <form action="{{ route('cart.update', [$id, 'action' => 'decrease']) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="minus"><i class="fas fa-minus-circle"></i></button>
                        </form>

                        <!-- Increase Quantity -->
                        <form action="{{ route('cart.update', [$id, 'action' => 'increase']) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit"><i class="fas fa-plus-circle"></i></button>
                        </form>

                        {{-- delete from the cart --}}
                        <form action="{{ route('cart.delete', $id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="cart_del">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @endforeach
        
        <div class="cart_checkout">
            <h2>Order Summary</h2>
            <p>
                <span>Cart Totals</span>
                <span class="price">ksh. {{ number_format($total) }}</span>
            </p>
    
            <div class="check_out">
                <a href="{{ route('checkout') }}">Check Out</a>
            </div>                
        </div>
    </div>

    @include('partials.footer')
</x-app-layout>