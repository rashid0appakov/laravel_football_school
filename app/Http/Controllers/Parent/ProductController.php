<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\DeliveryMethod;
use App\Models\Manager;
use App\Models\Notification;
use App\Models\ParentChild;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\ProductPurchase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends BaseController
{
    public function index()
    {
        $products = Product::get();
        return view('parents/products/index', compact('products'));
    }

    public function details($product_id)
    {
        $product = Product::find($product_id);
        return view('parents/products/show', compact('product'));
    }

    public function payment($product_id)
    {
        $product = Product::find($product_id);
        $deliveryMethods = DeliveryMethod::get();
        $paymentMethods = PaymentMethod::get();
        $userId = Auth::user()->id;
        $client = ParentChild::where('user_id', $userId)->first();
        return view('parents/products/payment',
            compact(
                'product_id',
                'client',
                            'deliveryMethods',
                            'paymentMethods'
            ));
    }

    public function purchase(Request $request)
    {

        $purchase = new ProductPurchase();
        $purchase->product_id = $request->product_id;
        $userId = Auth::user()->id;
        $parentId = ParentChild::where('user_id', $userId)->first()->id;
        $purchase->parent_id = $parentId;
        $purchase->uuid = rand(3333,9999);;
        $purchase->save();

        $notification = new Notification();
        $notification->user_id = Auth::user()->id;
        //$notification->link = "<a href='/manager/tasks'>$request->title</a>";
        $notification->title = "Родитель купил ".$purchase->product->name;
        $notification->type = 'parent';
        $notification->save();

        return view('parents/products/success');
    }
}
