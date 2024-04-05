<x-app-layout>
    @if ($message = Session::get('success'))
    <div class="bg-green-500 text-center text-white py-2 rounded-md font-bold">
        {!! $message !!}
    </div>
    @endif
    <div class="py-4 space-y-4">
        @if($cart)
        <div class="grid lg:grid-cols-12 gap-4">
            <div class="lg:col-span-8 bg-white rounded-md shadow p-4">
                <div class="flex justify-end">

                    <form method="POST" action="{{ route('delete_cart') }}">
                        @csrf
                        <button type="submit" class="text-red-500 font-bold">Winkelwagen verwijderen</button>
                    </form>
                </div>
                <div class="space-y-3">
                @forelse($cart->items as $item)
                <div class="flex items-start justify-between space-x-3">
                    <div class="flex items-start space-x-3">
                        <div>
                            <form method="POST" action="{{ route('delete_cart_item') }}">
                                @csrf
                                <input type="hidden" name="item_id" value="{{ $item->id }}">
                                <button type="submit" class="text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                      </svg>
                                    </button>
                                </form>     
                        </div>
                        <div><span class="font-bold">{{ $item->product->title }}</span> <br> Maat: {{ $item->size }}</div>
                    </div>
                    
                    <div class="text-lg font-bold">prijs: {{ Number::currency($item->product->price, in: 'EUR', locale: 'nl')}}</div>
                </div>
                @empty
                <p>Nog geen items...</p>
                @endforelse
                </div>
            </div>
            <div class="lg:col-span-4 bg-white rounded-md shadow p-4">

                <div class="grid grid-cols-2 gap-2 py-2">
                    <div class="text-right">Subtotaal</div>
                    <div class="text-right font-bold">{{ Number::currency($cart_total, in: 'EUR', locale: 'nl') }}</div>
                </div>

                <h3 class="font-bold mb-4">Bestellen</h3>
                <form method="POST" action="{{ route('checkout') }}">
                    @csrf

                    <div class="mb-3">
                        <span class="block text-sm font-semibold">Adres<span class="text-red-500">*</span></span>
                        <input type="text" class="w-full rounded" name="address" value="{{ old('address') }}">
                        @error('address') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="mb-3">
                                <span class="block text-sm font-semibold">postcode<span class="text-red-500">*</span></span>
                                <input type="text" class="w-full rounded" name="zip" value="{{ old('zip') }}">
                                @error('zip') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <span class="block text-sm font-semibold">Plaats<span class="text-red-500">*</span></span>
                                <input type="text" class="w-full rounded" name="city" value="{{ old('city') }}">
                                @error('city') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <span class="block text-sm font-semibold">Land<span class="text-red-500">*</span></span>
                        <select name="country" id="country" class="w-full rounded">
                            <option value="">Maak een keuze</option>
                            <option value="NL">Nederland</option>
                            <option value="BE">Belgie</option>
                            <option value="DE">Duitsland</option>
                        </select>
                        @error('country') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="w-full pl-10 text-white bg-blue-700 hover:bg-blue-900 font-medium rounded-lg text-base px-5 py-2.5 flex justify-center items-center">
                        Bestellen
                    </button>
                </form>
            </div>
        </div>
        @else
        <p class="text-center text-slate-600 italic">Je hebt nog niks in je winkelwagen...</p>
        @endif
    </div>

</x-app-layout>