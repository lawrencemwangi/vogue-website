<x-app-layout>
    @include('partials.navbar')

    <div class="cart_container order-container">
        <h1>Check Out Cart</h1>

        <div class="custom_form">
            <form action="{{ route('place_order') }}" method="POST">
                @csrf
            
                <div class="input_group">
                    <label for="names">Name:</label>
                    <input type="text" name="names" value="{{ $user->name ?? old('names') }}" required>
                </div>
            
                <div class="input_group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="{{ $user->email ?? old('email') }}" required>
                </div>
            
                <div class="input_group">
                    <label for="phone">Phone Number:</label>
                    <input type="text" name="phone" value="{{ $user->phone ?? old('phone_number') }}">
                </div>
            
                <div class="input_group">
                    <label for="address">Address:</label>
                    <textarea name="address" required>{{ $user->address ?? old('address') }}</textarea>
                </div>

                <div>
                    <strong>Total: KES {{ number_format($total, 2) }}</strong>
                </div>
        
                <button type="submit">Place your Order</button>
            </form>
        </div>
    </div>

    @include('partials.footer')    
</x-app-layout>