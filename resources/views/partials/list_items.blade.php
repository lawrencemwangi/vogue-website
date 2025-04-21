@foreach ($Items as $item)
    <div class="item_details">
        <div class="item_image">
            <img src="{{ $item->getImage() }}"  alt="{{ $item->title }}">
        </div>

        <a href="#"><h2>{{ $item->item_name }}</h2></a>

        @if ($item->category)
            <div class="link">
                <span>{{ $item->category->category }}</span>
            </div>
        @else
            <div class="link">
                <span>Uncategorized</span>
            </div>
        @endif

        <p>{{ Illuminate\Support\str::limit( $item->description, 28 ) }}</p>

        <div class="item_group">
            <p class="price">ksh. {{ number_format(trim($item->price)) }}</p> 
            
            <form action="{{ route('cart.add', $item->id) }}" method="post">
                @csrf

                <button type="submit">
                    <i class="fas fa-shopping-cart"></i>
                </button>
            </form>                         
        </div>
    </div>
@endforeach
