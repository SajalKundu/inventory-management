<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Debtors;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Sale;
use App\Models\SaleProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::orderBy('id', 'desc')->get();
        return view('sale.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::where('status', 'active')->orderBy('id', 'desc')->get();
        $customers = Customer::where('status', 'active')->orderBy('id', 'desc')->get();

        $sale = Sale::orderBy('id', 'desc')->first();

        if($sale == null) {
            $sale_no = "00000001";
        }else{
            $invoice_id = Sale::orderBy('id', 'desc')->first()->invoice_id;
            $sale_no = (int) $invoice_id + 1;
        }
        return view('sale.create', compact('products', 'customers', 'sale_no'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'invoice_date' => 'required|date',
            'customer_id' => 'required|exists:customers,id',
            'mobile' => 'required|string|min:11|max:11',
            'customer_address' => 'required|string',
            'grand_total_amount' => 'required|numeric',
            'advanced_amount' => 'required|numeric',
            'due_amount' => 'required|numeric',
            'product_id' => 'required|array',
            'product_id.*' => 'required|exists:products,id',
            'sale_price' => 'required|array',
            'sale_price.*' => 'required|numeric',
            'sale_quantity' => 'required|array',
            'sale_quantity.*' => 'required|numeric',
            'total_price' => 'required|array',
            'total_price.*' => 'required|numeric',
        ]);

        $customer = Customer::where('id', $request->customer_id)->first();

        $sale = new Sale();
        $sale->invoice_id = $request->invoice_id;
        $sale->invoice_create_date = Carbon::parse($request->invoice_date)->format('Y-m-d');
        $sale->customer_id = $request->customer_id;
        $sale->customer_name = $customer->name;
        $sale->customer_mobile = $request->mobile;
        $sale->customer_address = $request->customer_address;
        $sale->grand_total_amount = $request->grand_total_amount;
        $sale->advanced_amount = $request->advanced_amount;
        $sale->due_amount = $request->due_amount;
        $sale->save();

        foreach ($request->product_id as $key => $product_id) {
            $saleProduct = new SaleProduct();
            $saleProduct->sale_id = $sale->id;
            $saleProduct->product_id = $product_id;
            $saleProduct->product_name = Product::where('id', $product_id)->first()->name;
            $saleProduct->buy_price_price = Product::where('id', $product_id)->first()->price;
            $saleProduct->sale_price = $request->sale_price[$key];
            $saleProduct->sale_quantity = $request->sale_quantity[$key];
            $saleProduct->total_price = $request->total_price[$key];
            $saleProduct->save();


            $product = Product::where('id', $product_id)->first();
            $product->available_quantity = $product->available_quantity - $request->sale_quantity[$key];
            $product->sold_quantity = $product->sold_quantity + $request->sale_quantity[$key];
            $product->save();

            $productStcock = new ProductStock();
            $productStcock->product_id = $product_id;
            $productStcock->stock_type = 'sale';
            $productStcock->qunatity = $request->sale_quantity[$key];
            $productStcock->save();
        }

        $debitor = new Debtors();
        $debitor->name = $customer->name;
        $debitor->mobile = $customer->mobile;
        $debitor->address = $request->customer_address;
        $debitor->email = $customer->email;
        $debitor->amount = $request->due_amount;
        $debitor->deal_date = Carbon::now()->format('Y-m-d');
        $debitor->save();

        return redirect()->route('admin.sale.index')->with('msg', 'Sale created successfully');
    }

    public function show($id){
        $sale = Sale::with(['customer', 'saleProducts' => function($sale){
            $sale->with('product');
        }])->where('id', $id)->first();
        return view('sale.show', compact('sale'));
    }

    public function print($invoice_id){
        $invoice_info = Sale::with(['customer', 'saleProducts' => function($sale){
            $sale->with('product');
        }])->where('invoice_id', $invoice_id)->first();
        return view('sale.print', compact('invoice_info'));
    }


    public function customerDetail(Request $request)
    {
        $customer = Customer::where('id', $request->customer_id)->first();
        return response()->json([
            'customer' => $customer,
            'status' => 'success'
        ], 200);
    }

    public function productDetail(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        return response()->json([
            'product' => $product,
            'status' => 'success'
        ], 200);
    }
}
