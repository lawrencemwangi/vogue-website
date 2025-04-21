<x-admin-layout>
    <div class="shop">
        <h1>Add Categories</h1>
        <div class="btn1">
            <button><a href="{{ route('shop.create') }}">Add Item</a></button>
        </div>
    </div>

    <form action="{{ route('category.store') }}" method="post">
        @csrf

        <div class="input_group">
            <div class="input_content">
                <label for="category">Category</label>
                <input type="text" name="category" id="category" placeholder="Enter category name">
                <span class="inline_alert">{{ $errors->first('category') }}</span>
            </div>
        </div>
         
        <button type="submit">Add Category</button>
    </form>
</x-admin-layout>