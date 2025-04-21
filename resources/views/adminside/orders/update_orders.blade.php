<x-admin-layout>
    <h1>Update Order</h1>

    <div class="custom_form ">
        <form action="{{ route('orders.update', ['order' => $order]) }}" method="post">
            @csrf
            @method('PATCH')

            <span class="user-col text-success">Order No. :- <strong> {{ $order->order_number }}</strong></span><br>
            <span class="user-col">Customer Names:- <strong>{{ $order->names }}</strong></span><br>
            <span class="user-col">Customers Email:- <strong>{{ $order->email }}</strong></span><br>
            <span class="user-col">Customers Phone number:- <strong>{{ $order->phone }}</strong></span><br>
    
            <div class="group">
                <div class="input_group">
                    <label for="status">Status</label>
                    <div class="custom_radio_buttons">
                        <label>
                            <input class="option_radio" type="radio" name="status" id="complete" value="complete" {{ old('status') == '1' ? 'checked' : '' }}>
                            <span>Complete</span>
                        </label>
    
                        <label>
                            <input class="option_radio" type="radio" name="status" id="pending" value="pending" {{ old('status') == '0' ? 'checked' : '' }}>
                            <span>Pending</span>
                        </label>
                        <span class="inline_alert">{{ $errors->first('status') }}</span>
                    </div>
                </div>
    
                <div class="input_content">
                    <label for="paid">Payment</label>
                    <div class="custom_radio_buttons">
                        <label>
                            <input class="option_radio" type="radio" name="paid" id="yes" value="1" {{ old('paid') == '1' ? 'checked' : '' }}>
                            <span>Yes</span>
                        </label>
    
                        <label>
                            <input class="option_radio" type="radio" name="paid" id="no" value="0" {{ old('paid') == '0' ? 'checked' : '' }}>
                            <span>No</span>
                        </label>
                        <span class="inline_alert">{{ $errors->first('paid') }}</span>
                    </div>
                </div>
            </div>
            <button type="submit">Update Order</button>
        </form>
    </div>

</x-admin-layout>