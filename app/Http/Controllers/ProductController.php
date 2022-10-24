<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete|product-purchase', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
         $this->middleware('permission:product-purchase', ['only' => ['purchase']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'code' => 'required',
            'price' => 'required',
        ]);
    
        Product::create($request->all());
    
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
         request()->validate([
            'name' => 'required',
            'code' => 'required',
            'price' => 'required',
        ]);
    
        $product->update($request->all());
    
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
    // product puchase
     public function purchase()
    {
        $products = Product::all();
        return view('products.order',compact('products'));
    }

    // product puchase
     public function order(Request $request)
    {
        request()->validate([
            'product_id' => 'required'
        ]);
        // get product items
        $product_items = json_encode($request->product_id);

        // duplicate item
        $unique = array_unique($request->product_id);
        $duplicates = array_diff_assoc($request->product_id, $unique);

        // calculation
        $getOrderItems =  Product::whereIn('code', $request->product_id)->get();

        $delivery_charges = 0;
        $order_charges = 0;
        foreach($getOrderItems as $value) {
            $order_charges += $value->price;
        }

        if($order_charges <= 50 ) {
            $delivery_charges = 4.95;
        } elseif ($order_charges <= 90) {
            $delivery_charges = 2.95;
        } else {
            $delivery_charges = 0;
        }

        $totalCharges = $delivery_charges + $order_charges;

        $order = Order::create([
            'product_id' => $product_items,
            'user_id' => auth()->user()->id,
            'total_price' => $totalCharges,
        ]);
    
        return redirect()->route('products.index')
                        ->with('success','Order has been places successfully.');
    }

    // all order fetch
    public function allOrder(Request $request)
    {
        $orders = Order::all();
        return view('products.allorder',compact('orders'));
    }
}
