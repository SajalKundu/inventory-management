<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('status', 'active')->get();
        return view('product.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'category_id'        => 'required|exists:categories,id',
            'sub_category_id'    => 'required|exists:sub_categories,id',
            'name'               => 'required|string|max:255',
            'price'              => 'required|numeric',
            'details'            => 'nullable|string',
            'available_quantity' => 'required|numeric',
            'image'              => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'status'             => 'required|in:active,inactive',
        ]);

        $path = 'assets/products/';

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move($path, $image_name);
        }else{
            $image_name = null;
        }

        $product = new Product();
        $product->category_id        = $request->category_id;
        $product->sub_category_id    = $request->sub_category_id;
        $product->name               = $request->name;
        $product->price              = $request->price;
        $product->details            = $request->details;
        $product->available_quantity = $request->available_quantity;
        $product->status             = $request->status;
        $product->image              = $image_name;
        $product->image_path         = $path;

        if($product->save()){
            $stock = new ProductStock();
            $stock->product_id = $product->id;
            $stock->qunatity   = $request->available_quantity;
            $stock->stock_type = 'add';
            $stock->save();
            return redirect()->route('admin.product.index')->with('msg', 'Product created successfully');
        }else{
            return redirect()->back()->with('emsg', 'Something went wrong');
        }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::where('status', 'active')->get();

        return view('product.edit', compact('product', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id'        => 'required|exists:categories,id',
            'sub_category_id'    => 'required|exists:sub_categories,id',
            'name'               => 'required|string|max:255',
            'price'              => 'required|numeric',
            'details'            => 'nullable|string',
            // 'available_quantity' => 'required|numeric',
            'image'              => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'status'             => 'required|in:active,inactive',
        ]);

        $product = Product::findOrFail($id);
        $path = 'assets/products/';

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move($path, $image_name);

            if($product->image != null){
                if(file_exists($path.$product->image)){
                    unlink($path.$product->image);
                }
            }

            $product->image = $image_name;
            $product->image_path = $path;

        }elseif($request->del_image == 1){
            if($product->image != null){
                if(file_exists($path.$product->image)){
                    unlink($path.$product->image);
                }
            }
            $product->image = null;
            $product->image_path = null;
        }else{
            $product->image = $product->image;
            $product->image_path = $product->image_path;
        }


        $product->category_id        = $request->category_id;
        $product->sub_category_id    = $request->sub_category_id;
        $product->name               = $request->name;
        $product->price              = $request->price;
        $product->details            = $request->details;
        // $product->available_quantity = $request->available_quantity;
        $product->status             = $request->status;
        $product->save();

        return redirect()->route('admin.product.index')->with('msg', 'Product updated successfully');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $path = 'assets/products/';

        if($product->image != null){
            if(file_exists($path.$product->image)){
                unlink($path.$product->image);
            }
        }

        $product->productStocks()->delete();

        if($product->delete()){
            return redirect()->route('admin.product.index')->with('msg', 'Product deleted successfully');
        }else{
            return redirect()->back()->with('emsg', 'Something went wrong');
        }
    }

    public function changeStatus($id, $status)
    {
        $product = Product::findOrFail($id);
        $product->status = $status;
        if($product->save()){
            return redirect()->route('admin.product.index')->with('msg', 'Product status updated successfully');
        }else{
            return redirect()->back()->with('emsg', 'Something went wrong');
        }
    }


    public function getSubCategoryList(Request $request)
    {
        $sub_categories = SubCategory::where('category_id', $request->category_id)->where('status', 'active')->get();
        return response()->json([
            'sub_categories' => $sub_categories,
            'status' => 'success'
        ], 200);
    }

    public function addStock(Request $request)
    {
        $request->validate([
            'available_quantity'   => 'required|numeric',
        ]);

        $product = Product::find($request->product_id);
        $product->available_quantity = $product->available_quantity + $request->available_quantity;
        if($product->save()){
            $stock = new ProductStock();
            $stock->product_id = $product->id;
            $stock->qunatity   = $request->available_quantity;
            $stock->stock_type = 'add';
            $stock->save();
            return redirect()->route('admin.product.index')->with('msg', 'Stock added successfully');
        }else{
            return redirect()->back()->with('emsg', 'Something went wrong');
        }

    }

    public function viewStock($id)
    {
        $product = Product::findOrFail($id);
        $stocks = ProductStock::with(['product'])->where('product_id', $id)->orderBy('id', 'desc')->get();
        return view('product.stock', compact('product', 'stocks'));
    }

    public function stockReportDownload(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d');

        $results = ProductStock::with(['product'])->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->orderBy('id', 'desc')->get();
        $filename = 'Product-stock-' . $start_date . '-to-' . $end_date . '.csv';
        $fopen = fopen('php://output', 'w');
        $fields = array('Product', 'Stock Type', 'Quantity', 'Date');

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');

        fputcsv($fopen, $fields);
        foreach ($results as $result) {
            $row['product'] = $result->product->name;
            $row['stock_type'] = str_pad($result->stock_type, 20);
            $row['quantity'] = str_pad($result->qunatity, 20);
            fputcsv($fopen, array(str_pad($row['product'],20), $row['stock_type'], $row['quantity'], Carbon::parse($result->created_at)->format('Y-m-d')));
        }
        fclose($fopen);
    }


}
