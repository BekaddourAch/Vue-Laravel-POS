<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use App\Models\Model\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
            ->join('catigories', 'products.category_id', 'catigories.id')
            ->join('suppliers', 'products.supplier_id', 'suppliers.id')
            ->select('catigories.name AS N1', 'suppliers.name AS N2', 'products.*')
            ->orderBy('products.id', 'DESC')
            ->get();
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'product_name' => 'required|max:255',
            'product_code' => 'required|unique:products',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'root' => 'required',
            'supplier_id' => 'required',
            'category_id' => 'required',
            'buying_date' => 'required',
            'product_quantity' => 'required',
        ));

        if ($request->image) {
            $position = strpos($request->image, ';');
            $sub = substr($request->image, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time() . "." . $ext;
            // create an image manager instance with favored driver
            $manager = new ImageManager();

            // to finally create image instances 
            $img = $manager->make($request->image)->resize(240, 200);
            $upload_path = './backend/product/';
            $image_url = $upload_path . $name;
            $img->save($image_url);

            $product = new Product;
            $product->category_id = $request->category_id;
            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->root = $request->root;
            $product->buying_price = $request->buying_price;
            $product->selling_price = $request->selling_price;
            $product->supplier_id = $request->supplier_id;
            $product->buying_date = $request->buying_date;
            $product->product_quantity = $request->product_quantity;
            $product->image = $image_url;

            error_log($image_url);
            $product->save();
        } else {
            $product = new Product;
            $product->category_id = $request->category_id;
            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->root = $request->root;
            $product->buying_price = $request->buying_price;
            $product->selling_price = $request->selling_price;
            $product->supplier_id = $request->supplier_id;
            $product->buying_date = $request->buying_date;
            $product->product_quantity = $request->product_quantity;
            $product->save();
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = DB::table('products')
            ->join('catigories', 'products.category_id', 'catigories.id')
            ->join('suppliers', 'products.supplier_id', 'suppliers.id')
            ->select('catigories.name AS N1', 'suppliers.name AS N2', 'products.*')
            ->orderBy('products.id', 'DESC')
            ->where('products.id', $id)->first();
        return response()->json($products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['root'] = $request->root;
        $data['buying_price'] = $request->buying_price;
        $data['selling_price'] = $request->selling_price;
        $data['supplier_id'] = $request->supplier_id;
        $data['buying_date'] = $request->buying_date;
        $data['product_quantity'] = $request->product_quantity;
        $data['image'] = $request->image;
        $image = $request->newimage;

        if ($image) {
            $position = strpos($image, ';');
            $sub = substr($image, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time() . "." . $ext;
            // create an image manager instance with favored driver
            $manager = new ImageManager();
            // to finally create image instances  
            $img = $manager->make($image)->resize(240, 200);
            $upload_path = 'backend/product/';
            $image_url = $upload_path . $name;
            $success = $img->save($image_url);
            error_log($success);
            if ($success) {
                $data['image'] = $image_url;
                $img = DB::table('products')->where('id', $id)->first();
                $image_path = $img->image;
                $done = @unlink($image_path);
                $user = DB::table('products')->where('id', $id)->update($data);
            }
        } else {
            $oldphoto = $request->image;
            $data['image'] =  $oldphoto;
            $user = DB::table('products')->where('id', $id)->update($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $photo = $product->image;
        if ($photo) {
            @unlink($photo);
            DB::table('products')->where('id', $id)->delete();
        } else {
            DB::table('products')->where('id', $id)->delete();
        }
    }
    public function stockUpdate(Request $request,$id){
        $data=array();
        $data['product_quantity']=$request->product_quantity;
        DB::table('products')->where('id',$id)->update($data);
    }
}