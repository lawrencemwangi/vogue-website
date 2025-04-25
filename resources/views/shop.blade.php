<x-app-layout>
    @include('partials.navbar')

    <div class="main_container">
        <h1>Items</h1>
        
        <div class="service_container">
            @if ($Items->isempty())
                <p class="paragraph">No Service is available for at the moment</p>
            @else
                <div class="service_items">
                    @include('partials.list_items')
                </div>
            @endif
        </div>
    </div>
    
    @include('partials.footer')
</x-app-layout>