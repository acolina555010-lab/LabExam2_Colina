<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class RiceController extends Controller
{
    public function index()
{
    $menus = Menu::all();

    return view('dashboard',[
        'rices'=> $menus
    ]);
}
public function store (Request $request)
{
    Menu::create([
        'rice_name' => $request->rice_name,
        'price'=> $request->price,
        'stock_quantity'=> $request->stock_quantity,
        'description'=> $request->description
    ]);

    return redirect('/dashboard');
}

public function edit($id)
{
    $menu = Menu::findOrFail($id);
   

    return view('dashboardedit', [
        'menu' => $menu,
       
        
    ]);
}
public function update(Request $request, $id)
{
    $menu = Menu::findOrFail($id);
    
    $menu->update([
        'rice_name'=> $request->rice_name,
        'price'=> $request->price,
        'stock_quantity'=>$request->stock_quantity,
        'menu_id' => $request->menu_id

    ]);
    return redirect('/dashboard');

}

public function destroy($id)
{
    $menu = Menu::findOrFail($id);

    $menu->delete();

    return redirect('/dashboard');

}



}
