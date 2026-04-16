<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;

class OrderController extends Controller
{
    public function orderindex()
    {
    $orders = Order::all();
    $menus = Menu::all();

    return view('orders.order',[
        'lists' => $orders,
        'sets' => $menus
    ]);

    }

    public function orderstore(Request $request)
    {
            $menu = Menu::findOrFail($request->menu_id);
             $totalAmount = $menu->price * $request->quantity;
        Order::create([
            'quantity' => $request->quantity,
            'total_amount' => $totalAmount,
            'menu_id'  => $request-> menu_id
        ]);
            return redirect('/order');
    }

public function orderedit($id)
{
    $order = Order::findOrFail($id);
    $menus = Menu::all();

    return view('orders.orderedit', [
        'lists' => $order,
        'sets' => $menus
    ]);
}
public function orderupdate(Request $request, $id)
{
    $order = Order::findOrFail($id);

    $menu = Menu::findOrFail($request->menu_id);
    $totalAmount = $menu->price * $request->quantity;

    $order->update([
        'quantity' => $request->quantity,
        'menu_id' => $request->menu_id,
        'total_amount' => $totalAmount
    ]);

    return redirect('/order');
}

public function orderdestroy($id)
{
    $order = Order::findOrFail($id);

    $order->delete();

    return redirect('/order');

}
}
