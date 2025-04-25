<x-admin-layout>
    @include('adminside.partials.header', ['title' => 'Shop', 'addLink' => route('shop.create')])

    <div class="message_container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">Item Name</span>
                <span class="user-col">Category</span>
                <span class="user-col">Image Name</span>
                <span class="user-col">Price</span>
                <span class="user-col">Featured</span>
                <span class="user-col">Visibility</span>
                <span class="user-col">Size</span>
                <span class="user-col">Description</span>
                <span class="user-col">Action</span>
            </div>
             
            @if (empty($items))
                <p>No User Found at the moment</p> 
            @else
                @foreach ($items as $item)
                    <div class="user_infor">
                        <span class="user-col">{{ $item->item_name }}</span>
                        <span class="user-col">{{ optional($item->category)->category }}</span>
                        <span class="user-col">{{ $item->image }}</span>
                        <span class="user-col">{{ $item->price }}</span>
                        <span class="user-col {{ $item->featured == 1 ? 'text-success' : 'text-danger' }}">
                            {{ $item->featured == 1 ? 'Active' : 'Inactive' }}
                        </span>
                        <span class="user-col {{ $item->featured == 1 ? 'text-success' : 'text-danger' }}">
                            {{ $item->visibility == 1 ? 'Yes' : 'No' }}
                        </span>
                        <span class="user-col">{{ $item->size ?? 'N/A' }}</span>
                        <span class="user-col">{{ Illuminate\Support\str::limit($item->description,15)}}</span>
                        <span class="action">
                            <a href="{{ route('shop.edit', ['shop' => $item]) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <form  id="deleteForm_{{ $item->id }}" action="{{ route('shop.destroy', ['shop' => $item->id]) }}" method="post">
                                @csrf
                                @method("DELETE")

                                <a href="javascript:void(0)" onclick="deleteItem({{ $item->id }}, 'shops');" >
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </form>
                        </span>
                    </div>
                @endforeach
            @endif      
        </div>
    </div>
</x-admin-layout>