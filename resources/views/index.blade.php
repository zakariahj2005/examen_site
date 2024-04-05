<x-app-layout>
        <div class="py-4 space-y-4">
            <div class="grid lg:grid-cols-12 gap-4">
                <!-- een link naar de winkelwagenpagina -->
                <a href="{{ route('cart') }}" class="lg:col-span-4 py-24 bg-white group hover:bg-slate-100 rounded-md shadow p-4 flex justify-center items-center">
                    <h3 class="text-sky-600 font-black tracking-widest uppercase text-lg group-hover:text-sky-800">{{ __('winkelwagen') }}</h3>
                </a>
                <!-- een link naar de producten -->
                <a href="{{ route('products') }}" class="lg:col-span-8 py-24 bg-white  hover:bg-slate-100 rounded-md shadow p-4 flex justify-center items-center">
                    <h3 class="text-sky-600 font-black tracking-widest uppercase text-lg group-hover:text-sky-800">{{ __('producten') }}</h3>
                </a>
            </div>
        </div>
        <!-- loopt door database table categorie en haalt de slug en titel er uit -->
        <div class="grid lg:grid-cols-3 gap-4">
            @foreach($categories as $category)
                <a href="{{ route('products', $category->slug) }}" class="bg-white group hover:bg-slate-100 rounded-md shadow p-4 py-20 flex justify-center items-center">
                    <h3 class="text-sky-600 font-black tracking-widest uppercase text-lg group-hover:text-sky-800">{{ $category->title }}</h3>
                </a>
            @endforeach
        </div>
</x-app-layout>
