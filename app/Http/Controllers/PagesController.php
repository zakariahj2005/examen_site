<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        // hij haalt alle $categories uit database en geeft ze mee naar de view met compact
        $categories = Category::all();

        return view('index', compact('categories'));
    }

    public function products($category_slug = null){
    if ($category_slug == null) {
        $category = null;
        $products = Product::all();
    } else {
        $category = Category::where('slug', $category_slug)->first();
        $products = Product::where('category_id', $category->id)->get();
    }

    $categories = Category::all();

        return view('products', compact('products', 'categories','category', 'category_slug'));
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if ($product == null) {
            return redirect()->route('products')->withErrors('Product niet gevonden...');
        }
        $categories = Category::all();

        return view('product', compact('product','categories'));
    }

    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'size'=> 'required',
        ]);
        
        //controleren of user cart heeft zo, nee dan aanmaken
        if(!auth()->user()->cart) {
            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->save();
        } else {
            $cart = Cart::where('user_id', auth()->user()->id)->first();
        }

        //product toevoegen
        $item = new CartItem;
        $item->cart_id = $cart->id;
        $item->product_id = request('product_id');
        $item->size = request('size');
        $item->save();

        return redirect()->route('cart')->withSuccess('Het product is toegevoegd');
    }

    

    public function cart()
    {
        //check of er items in cart zijn
        if (auth()->check() && auth()->user()->cart) {
            $cart = Cart::with('items.product')->where('user_id', auth()->user()->id)->first();
        } else {
            $cart = null;
        }

        $cart_total = 0;

        // bereken totale prijs 
        if ($cart) {
            foreach ($cart->items as $item) {
                $cart_total = $cart_total + $item->product->price;
            }
        }
        
        
        return view('cart', compact('cart', 'cart_total'));
    }

    public function deleteCartItem()
    {
        //verwijder item uit cart
        $item = CartItem::find(request('item_id'));
        $item->delete();

        return redirect()->route('cart')->withSuccess('Het item is verwijderd');
    }

    public function deleteCart()
    {
        //haal de hele cart leeg
        $cart = Cart::where('user_id', auth()->user()->id)->first();
        $cart->delete();

        return redirect()->route('cart')->withSuccess('Je winkelwagen is verwijderd');
    }

    public function checkout(Request $request)
    {
        //controleer of de gegeven zijn ingevuld
        $validated = $request->validate([
            'address'=> 'required',
            'zip' => 'required',
            'city' => 'required',
            'country' => 'required',
        ],
    [
        //als gegevens niet zijn ingevuld
        'address.required' => 'Adres is verplicht',
        'zip.required' => 'Postcode verplicht',
        'city.required' => 'Plaats is verplicht',
        'country.required' => 'Land is verplicht',
    ]);

        // maakt een order aan. vul het met gegevens van de gebruiker. Sla het op in de database.
        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->address = request('address');
        $order->zip = request('zip');
        $order->city = request('city');
        $order->country_code = request('country');
        $order->save();
        
        //vind cart voor de bij behorende user id
        $cart = Cart::with('items.product')->where('user_id', auth()->user()->id)->first();

        //maakt een order item aan en stopt info over dat item in.
        foreach ($cart->items as $item) {
            $order_item = new OrderItem;
            $order_item->order_id = $order->id;
            $order_item->product_id = $item->product->id;
            $order_item->title = $item->product->title;
            $order_item->size = $item->size;
            $order_item->price = $item->product->price;
            $order_item->save();
        }

        $cart->delete();

        return redirect()->route('confirmation', $order->id);
    }

    public function confirm($order_id)
    {
        $order = Order::with('items')->where('id', $order_id)->first();

        return view('confirm', compact('order'));
    }
}
