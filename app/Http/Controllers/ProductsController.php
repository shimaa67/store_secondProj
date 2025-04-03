<?php

namespace App\Http\Controllers;


use App\Models\products;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index()
    {
        $products = products::paginate(2 );
        // $products = Products::with('category')->get();
        return view('admin.products.index', compact('products'));

    }
    /**
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $products = new products;

        $products->name = $request->name;
        $products->quantity = $request->quantity;
        $products->price = $request->price;
        $products->category_id = $request->category;
        $products->description = $request->description;
        $products->save();
        return redirect()->back();
    }
    /**
     *
     * @param \App\Models\Admin\Products $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products) {}
    /**
     *
     * @param \App\Models\Admin\Products $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $products = products::find($id);
        $categories = Category::all();
        $category_name = Category::find($products->category_id);
        return view('admin.products.edit', compact('products', 'categories', 'category_name'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Products $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $products = products::find($id);

        $products->name = $request->name;
        $products->quantity = $request->quantity;
        $products->price = $request->price;
        $products->category_id = $request->category;
        $products->description = $request->description;

        $products->save();

        return redirect('products');
    }
    /**
     *
     * @param \App\Models\Admin\Products $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $products = products::find($id)->delete();
        return redirect()->back();
    }
}
