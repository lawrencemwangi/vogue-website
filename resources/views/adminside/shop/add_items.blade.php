<x-admin-layout>
    <div class="shop">
        <h1>Add Item</h1>
        <div class="btn1">
            <button><a href="{{ route('category.create') }}">Add Category</a></button>
        </div>
    </div>
    

    <form action="{{ route('shop.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="group">
            <div class="input_group">
                <label for="item_name">Item Names</label>
                <input type="text" name="item_name" id="item_name" value="{{ old('item_name') }}" placeholder="Enter item Name">
            </div>

            <div class="input_group">
                <label for="category">Categories</label>
                <select name="category_id" id="category_id">
                    <option value="">--Select category--</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->category }}</option>         
                    @endforeach
                </select>
            </div> 
        </div> 
        
        <div class="group">
            <div class="input_group">
                <label for="Price">Price</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}" placeholder="Enter the Price">
            </div>

            <div class="input_group">
                <label for="size">Size</label>
                <input type="number" name="size" id="size" value="{{ old('size') }}" placeholder="Enter the size">
            </div>
        </div>

        <div class="group">
            <div class="input_group">
                <label for="in_stock">Featured</label>
                <div class="custom_radio_buttons">
                    <label>
                        <input class="option_radio" type="radio" name="featured" id="active" value="1" {{ old('in_stock') == '1' ? 'checked' : '' }}>
                        <span>active</span>
                    </label>

                    <label>
                        <input class="option_radio" type="radio" name="featured" id="inactive" value="0" {{ old('in_stock') == '0' ? 'checked' : '' }}>
                        <span>inacitve</span>
                    </label>
                    <span class="inline_alert">{{ $errors->first('featured') }}</span>
                </div>
            </div>

            <div class="input_content">
                <label for="in_stock">Visibility</label>
                <div class="custom_radio_buttons">
                    <label>
                        <input class="option_radio" type="radio" name="in_stock" id="in_stock" value="1" {{ old('in_stock') == '1' ? 'checked' : '' }}>
                        <span>Yes</span>
                    </label>

                    <label>
                        <input class="option_radio" type="radio" name="in_stock" id="not_in_stock" value="0" {{ old('in_stock') == '0' ? 'checked' : '' }}>
                        <span>No</span>
                    </label>
                    <span class="inline_alert">{{ $errors->first('in_stock') }}</span>
                </div>
            </div>
        </div>

        <div class="input_group">
            <label for="image">Product Image <strong>(Max is 2Mbs)</strong></label>
            <input type="file" name="image"  id="image" accept="image/*" value="{{ old('image')}}" multiple>
        </div>

        <div class="input_content">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="7" rows="10" placeholder="Enter the description">{{ old('description') }}</textarea>
                {{ old('description') }} 
            </textarea>
        </div>

        <button type="submit">Save</button>
    </form>
</x-admin-layout>