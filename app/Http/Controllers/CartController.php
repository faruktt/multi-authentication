<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
class CartController extends Controller
{

    public function addProductToCart($id){
        $cart = Cart::where('user_id', Auth::guard('customer')->id())->where('product_id', $id);
        if($cart->exists()){
            $cart->increment('quantity');
        }else{
            Cart::create([
                'user_id' => Auth::guard('customer')->id(),
                'product_id' => $id,
            ]);
        }
        return redirect()->route('carts');
    }

    public function carts(){
        $carts = Cart::where('user_id', Auth::guard('customer')->id())->where('order_status', 0)->get();
        $total_order = Cart::where('user_id', Auth::guard('customer')->id())->where('order_status', 1)->count();
        $success_order = Cart::where('user_id', Auth::guard('customer')->id())->where('order_status', 2)->count();

        return view('cart.cart', compact('carts', 'total_order', 'success_order'));
    }

    public function cart_delete($id){
        Cart::find($id)->delete();
        return back();
    }

    public function quantity_update(Request $request){

        Cart::find($request->id)->update([
            'quantity' => $request->quantity,
        ]);

        return response()->json(['success' => 'Quantity Updated successfully!']);
    }

    function cart_order($cart_id){
        $cart = Cart::find($cart_id);
        if($cart->order_status == 0){
            Cart::find($cart_id)->update([
                'order_status'=>1,

            ]);
            return back();
        }
        else{
            return back();
        }
       }

    public function view_order()
    {
        $orders = Cart::where('order_status', 1)->get();
        $total_order = Cart::where('order_status', 1)->count();
        return view('cart.order', compact('orders', 'total_order'));
    }

    public function confirm_order($id){
        Cart::find($id)->update([
            'order_status' => 2,
        ]);
        return back()->withSuccess('Order confirmed successfully!');
    }


}
