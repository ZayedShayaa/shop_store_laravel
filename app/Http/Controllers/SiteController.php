<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Section;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class SiteController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        $products = Product::all();
        $lastproduct = Product::orderBy('created_at')->limit(3)->get();
        $cart_count = 0;
        return view('site.index', ['sections' => $sections, 'products' => $products, 'lastproduct' => $lastproduct, 'cart_count' => $cart_count]);
    }
    public function section_show($id)
    {
        $sections = Section::all();
        $products = Product::where('section_id', $id)->get();
        $lastproduct = Product::orderBy('created_at')->limit(3)->get();

        return view('site.section', ['sections' => $sections, 'products' => $products, 'lastproduct' => $lastproduct]);
    }
    public function product_details($id)
    {
        $sections = Section::all();
        $product = Product::find($id);
        $lastproduct = Product::orderBy('created_at')->limit(3)->get();

        return view(
            'site.product_details',
            [
                'sections' => $sections,
                'lastproduct' => $lastproduct,
                'product' => $product,
            ]
        );
    }
    public function show_cart()
    {
        $sections = Section::all();
        $carts = Cart::where('user_id', Auth()->user()->id)->with('product')->get();
        $lastproduct = Product::orderBy('created_at')->limit(3)->get();

        return view(
            'site.cart',
            [
                'sections' => $sections,
                'lastproduct' => $lastproduct,
                'carts' => $carts
            ]
        );
    }
    public function cart(Request $request)
    {
        $cart = Cart::where('user_id', Auth()->user()->id)->where('product_id', $request->product_id)->first();
        if ($cart) {
            $cart->quantity = $cart->quantity + $request->quantity;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => Auth()->user()->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
        }
        $cart_count = Cart::where('user_id', Auth()->user()->id)->count('id');
        $request->session()->put('cart_count', $cart_count);
        // Session::put('cart_count',$cart_count);
        return back();
        // dd($cart_count);
    }
    public function  delete_item(Request $request, $id)
    {
        Cart::where('id', $id)->delete();
        $cart_count = Cart::where('user_id', Auth()->user()->id)->count('id');
        $request->session()->put('cart_count', $cart_count);
        return redirect()->route('cart.index')->with('success', __('app.Deleted_successfully'));
    }
    public function search(Request $request)
    {
        $sections = Section::all();
        $products = Product::whereLike('proname', $request->search)->orwherelike('prodescription', $request->search)->get();
        $lastproduct = Product::orderBy('created_at')->limit(3)->get();

        if (count($products) == 0) {
            $message = 'المنتج الذي تبحث عنه غير موجود حاليا';
            return redirect()->route('/')->with('success', __($message));
        }

        return view('site.index', ['sections' => $sections, 'products' => $products, 'lastproduct' => $lastproduct]);
    }
    public function order(Request $request)
    {
        $carts = Cart::where('user_id', Auth()->user()->id)->get();
        if (count($carts) == 0) {
            return back()->with('error', 'لا يمكن انشاء الطلب بدون منتجات');
        }
        $request->validate([
            'city' => 'required|string|max:255',

        ]);
        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id' => Auth()->user()->id,
                'order_date' => now(),
                'total_price' => $request->total_price,
                'shipping_address' => $request->shipping_address,
                'city' => $request->city,
                'phone_number' => $request->phone,
                'payment_method' => $request->payment_method,
                // 'credit_card_type' => $request->credit_card_type,
                'zip_code' => $request->zip_code,
                'order_status' => 'قيد المعالجة',
            ]);
            foreach ($carts as $item) {
                OrderItem::create([
                    'product_id' => $item->product_id,
                    'order_id' => $order->id,
                    'quantity' => $item->quantity
                ]);
            }
            Cart::where('user_id', Auth()->user()->id)->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', $e->getMessage());
        }
        $cart_count = Cart::where('user_id', Auth()->user()->id)->count('id');
        $request->session()->put('cart_count', $cart_count);
        return redirect()->route('/')->with('success', __('تم حفظ طلبك بنجاح'));
    }
}
