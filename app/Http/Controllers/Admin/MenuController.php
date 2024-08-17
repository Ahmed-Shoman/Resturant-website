<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use App\Models\Category;
use App\Models\Menu; // استخدم التسمية الصحيحة للنموذج
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all(); // استخدم التسمية الصحيحة للنموذج
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.menus.create', compact('categories'));
    }

  public function store(MenuStoreRequest $request)
{
    $validated = $request->validated();
    

    $image = $request->file('image')->store('public/menus'); 

     Menu::create([
        'name' => $request->name,
        'description' => $request->description,
        'image' => $image,
        'price' =>$request->price
    ]);
   
    return to_route('admin.menus.index');
}



    public function show($id)
    {
        //
    }

   public function edit($id)
{
     $menu = Menu::findOrFail($id);
    $categories = Category::all(); // جلب جميع الفئات
    return view('admin.menus.edit', compact('menu', 'categories'));
}

    public function update(MenuStoreRequest $request, Menu $menu)
    {
        
        $validated = $request->validated();

        $image = $menu->image;
        if ($request->hasFile('image')) {
            Storage::delete($menu->image);
            $image = $request->file('image')->store('public/menus');
        }

        $menu->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'image' => $image,
        ]);
        return to_route('admin.menus.index');
    }

    public function destroy(menu $menu)
    {
    storage::delete($menu->image);
    $menu->delete();
    return to_route('admin.menus.index');

    }
}