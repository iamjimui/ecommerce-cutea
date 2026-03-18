<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function showcart(){
        return view('panier');
    }
    public function show(){
        return view('commande');
    }

    public function getAllOrdersAndDetails(Request $request) {
        $page = $request->has('page') ? intval($request->get('page')) : 0;

        $allOrdersByUserIdCount = DB::table('orders')
        ->select('*')
        ->where('orders.users_id','=',auth()->user()->id)
        ->orderBy('orders.id','DESC')
        ->get();

        $allOrdersByUserId = DB::table('orders')
            ->select('*')
            ->where('orders.users_id','=',auth()->user()->id)
            ->orderBy('orders.id','DESC')
            ->skip(0)
            ->take(6)
            ->get();

        $numberOfOrders = count($allOrdersByUserIdCount);

        $orderAndDetails = DB::table('order_details')
        ->select('orders.id as orders_id',
        'orders.total_price',
        'orders.created_at as order_date',
        'order_details.price as bbt_price',
        'order_details.toppings_price',
        'order_details.products_quantity',
        'order_details.sugar_quantity',
        'products.name as products_name',
        'products.description as products_description',
        'products.url as products_url',
        'products.price as products_price',
        'product_sizes.name as product_sizes_name',
        'product_sizes.price as product_sizes_price',
        'toppings.name as toppings_name')
        ->join('orders', 'order_details.orders_id', '=', 'orders.id')
        ->join('products', 'order_details.products_id', '=', 'products.id')
        ->join('product_sizes', 'order_details.product_sizes_id', '=', 'product_sizes.id')
        ->join('toppings', 'order_details.toppings_id', '=', 'toppings.id')
        ->where('orders.users_id','=',auth()->user()->id)
        ->orderBy('orders.id','DESC')
        ->get();

        $numberOfPages = ceil($numberOfOrders / 6);

        if ($page !== 0) {
            $allOrdersByUserId = DB::table('orders')
            ->select('*')
            ->where('orders.users_id','=',auth()->user()->id)
            ->orderBy('orders.id','DESC')
            ->skip(($page-1)*6)
            ->take(6)
            ->get();
        }
        return view('commandes', compact('orderAndDetails', 'allOrdersByUserId', 'numberOfOrders', 'numberOfPages', 'page'));
    }

    public function store(Request $request){
        $order = new Order();
        $order->users_id = auth()->user()->id;
        $order->total_price = floatval($request->total_price);
        $order->created_at = date("Y-m-d H:i:s");
        $order->save();
        $length = intval($request->quantity);
        for ($i = 1; $i < $length+1; $i++) {
            $orderdetail = new OrderDetail();
            $orderdetail->products_id = intval($request->all()["id".$i]);
            $orderdetail->product_sizes_id = intval($request->all()["product_sizes".$i]);
            $orderdetail->toppings_id = intval($request->all()["toppings".$i]);
            $orderdetail->orders_id = intval($order->id);
            $orderdetail->price = floatval($request->all()["price".$i]);
            $orderdetail->toppings_price = floatval($request->all()["toppings".$request->all()["toppings".$i].''.$i]);
            $orderdetail->products_quantity = intval($request->all()["quantity".$i]);
            $orderdetail->sugar_quantity = $request->all()["sucres".$i];
            $orderdetail->save();
        }
        return redirect('/panier')->with('success', "Payé avec succès!");
    }
}
