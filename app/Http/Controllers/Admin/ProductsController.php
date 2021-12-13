<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Child;
use App\Models\Club;
use App\Models\GroupProduct;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ProductsController extends BaseController
{
    public function index()
    {
        $products = Product::get();
        return view('admin/products/index', compact('products'));
    }

    public function create()
    {
        $group_products = GroupProduct::get();
        return view('admin/products/create', compact('group_products'));
    }

    public function edit($product_id)
    {
        $product = Product::find($product_id);
        $group_products = GroupProduct::get();
        return view('admin/products/edit', compact(
            'product',
            'group_products'
        ));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->fill($request->all());
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time().'.'.$extension;
            $path = public_path().'/products/images';
            $uplaod = $file->move($path,$fileName);
            $product->image = $fileName;
        }
        $product->uuid = rand(6,8);
        $product->save();
        return redirect('admin/products/'.$product->id.'/edit')
            ->with('success', 'Запись добавлена.');
    }


    public function update(Request $request)
    {
        $product = Product::find($request->product_id);
        $product->fill($request->all());
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time().'.'.$extension;
            $path = public_path().'/products/images';
            $uplaod = $file->move($path,$fileName);
            $product->image = $fileName;
        }
        $product->update();

        return redirect('admin/products/'.$product->id.'/edit')
            ->with('success', 'Запись изменена.');
    }


    public function destroy(Child $Child)
    {
        $product->delete();
        return redirect('/admin/products');
    }

    public function delete($product_id)
    {
        $product = Product::find($product_id);
        $product->delete();
        return redirect('/admin/products')->with('success', 'Продукт удален');
    }
}
