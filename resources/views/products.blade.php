<link rel="stylesheet" href="/styles/style.css">

<x-app-layout>
<div class="py-4 space-y-4">
    <div class="space-y-4">
         <!-- loopt door database table categorie en haalt de slug en titel er uit en linkt het naar product/slug -->
        <div class="grid lg:grid-cols-3 gap-4 hover:opacity-75">
            @foreach($categories as $category)
            <a href="{{ route('products', $category->slug)}}">
                <div class="bg-white rounded-md shadow p-4 pb-15 {{ $category_slug == $category->slug ? 'border-b-2 border-indigo-700' : 'border-b-2 border-transparent' }}">
                    {{ $category->title }}
                </div>
                </a>       
            @endforeach
        </div>

       

        <div class="grid grid-cols-4 gap-4">
            <!-- loopt door database table products en haalt de slug en foto en de titel er uit en linkt het naar producten/slug -->
                @foreach($products as $product)
                    <a href="{{ route('product', $product->slug) }}" class="bg-white rounded">
                        <div class="hover:opacity-75">    
                            <img class="rounded-lg" src="{{env('APP_URL')}}/images/{{$product->file_name}}" alt=""/>    
                            <p class="Montserrat font-bold text-lg">{{ $product->title }}</h4>
                            <p class="Montserrat font-bold">prijs: {{ Number::currency($product->price, in: 'EUR', locale: 'nl')}}</p> 
                        </div>      
                    </a>
                @endforeach
            
        </div>
    </div>
</div>
    
</x-app-layout>