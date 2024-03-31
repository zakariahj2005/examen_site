<x-app-layout>
<div class="py-4 space-y-4">
    <div class="space-y-4">

        <div class="grid lg:grid-cols-3 gap-4">
            @foreach($categories as $category)
                <div class="bg-white rounded-md shadow p-4">
                    <h3><a href="{{ route('products', $category->slug)}}">{{ $category->title }}</a></h3></div>
            @endforeach
        </div>
        <div class="grid lg:grid-cols-3 gap-4">
            @foreach($products as $product)
                <a href="{{ route('product', $product->slug) }}" class="bg-white rounded">
                    <h4>{{ $product->title }}</h4>
                    <p>                            
                        prijs: {{ Number::currency($product->price, in: 'EUR', locale: 'nl')}}                        
                    </p>
                </a>
            @endforeach
        </div>
    </div>
</div>
    
</x-app-layout>