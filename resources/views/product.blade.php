
<x-app-layout>
    <form method="POST" action="{{ route('add_to_cart') }}">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="grid lg:grid-cols-12 gap-10 ml-10 mt-10">  
            <div class="col-span-4">
                <img class="bg-white rounded mr-5" src="{{env('APP_URL')}}/images/{{$product->file_name}}" alt=""/>
            </div>
                <div class="col-span-8">
                <h1 class="font-bold text-3xl Montserrat pb-2">{{$product->title}}</h1>
                <p class="Montserrat font-bold pb-3">                            
                    prijs: {{ Number::currency($product->price, in: 'EUR', locale: 'nl')}}                        
                </p> 
                <p class="font-bold text-base Montserrat pb-5"> {{$product->descriptions}}</P>
                <div>
                    @error('size') <p class="text-sm text-red-500">Je moet een maat selecteren</p> @enderror
                </div>
                <div class="grid lg:grid-cols-2 gap-4">
                    <div>
                        <select name="size" id="size" class="w-full rounded-md">
                            <option value="">Maak een keuze</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                    </div>
                    <div>
                        @guest
                        <button type="submit" disabled class="w-full pl-10 text-white bg-slate-700 hover:bg-slate-900 font-medium rounded-lg text-base px-5 py-2.5 flex justify-center items-center">
                            Log in om te bestellen
                        </button>
                        @else
                        <button type="submit" class="w-full pl-10 text-white bg-blue-700 hover:bg-blue-900 font-medium rounded-lg text-base px-5 py-2.5 flex justify-center items-center">
                            {{ __('winkelwagen') }}
                        </button>
                        @endguest
                    </div>
                </div>
                
                
            </div>
        </div>
    </form>


</x-app-layout>