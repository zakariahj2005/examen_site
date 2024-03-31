<x-app-layout>
        <div class="py-4 space-y-4">
            <div class="grid lg:grid-cols-12 gap-4">
                
                <a href="{{ route('cart') }}" class="lg:col-span-4 bg-white rounded-md shadow p-4 flex justify-center items-center">
                    {{ __('cart') }}
                </a>
        
                <a href="{{ route('products') }}" class="lg:col-span-8 bg-white rounded-md shadow p-4 flex justify-center items-center">
                    {{ __('producten') }}
                </a>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-4">
            @foreach($categories as $category)
                <a href="{{ route('products', $category->slug) }}" class="bg-white rounded-md shadow p-4 flex justify-center items-center">
                    <h3>{{ $category->title }}</h3>
                </a>
            @endforeach
        </div>
</x-app-layout>