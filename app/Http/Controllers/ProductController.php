<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // prduct list
    function list() {
        $pizzas = Product::select('products.*', 'categories.name as category_name')
            ->when(request('key'), function ($query) {
                $query->where('products.name', 'like', '%' . request('key') . '%');
            })
            ->leftJoin('categories', 'products.category_id', 'categories.id')
            ->orderBy('products.created_at', 'desc')
            ->paginate(4);
        $pizzas->appends(request()->all());
        return view('admin.product.list', compact('pizzas'));
    }

    // product create page
    public function createPage()
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.product.createPage', compact('categories'));
    }

    // product create
    public function create(Request $request)
    {
        $this->checkProductValidation($request);
        $product = $this->requestProductInfo($request);

        if ($request->hasFile('image')) {
            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/', $fileName);
            $product['image'] = $fileName;

        }

        Product::create($product);
        return redirect()->route('product#list');
    }

    // product delete
    public function delete($id)
    {
        Product::where('id', $id)->delete();
        return back();
    }

    // product edit page
    public function editPage($id)
    {
        $product = Product::where('id', $id)->first();
        $category = Category::get();
        return view('admin.product.edit', compact('product', 'category'));
    }

    // product update
    public function update(Request $request) {
     $this->checkProductValidation($request);
     $updateProduct = $this->requestProductInfo($request);
     Product::where('id',$request->productId)->update($updateProduct);
     return redirect()->route('product#list')->with(['updateSuccess'=>'Product has been updated!']);
    }

    // product photo upload
    public function upload($id,Request $request) {
     $this->checkProductPhotoValidation($request);

     if($request->hasFile('image')) {
      $dbImage = Product::where('id',$id)->first();
      $dbImage = $dbImage->image;

      if($dbImage != null) {
       Storage::delete('public/'.$dbImage);
      }

      $fileName = uniqid() . $request->file('image')->getClientOriginalName();
      $request->file('image')->storeAs('public/',$fileName);
      $uploadProductPhoto['image'] = $fileName;

      Product::where('id',$id)->update($uploadProductPhoto);
      return redirect()->route('product#list')->with(['uploadSuccess' => "Product's photo has been uploaded!"]);
     }
    }

    // private function
    // check product validation
    private function checkProductValidation($request)
    {
        Validator::make($request->all(), [
            'productName' => 'required',
            'categoryName' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,png,jpg|file',
            'price' => 'required',
            'waitingTime' => 'required',
        ])->validate();
    }

    // request product info
    private function requestProductInfo($request)
    {
        return [
            'category_id' => $request->categoryName,
            'name' => $request->productName,
            'description' => $request->description,
            'price' => $request->price,
            'waiting_time' => $request->waitingTime,
        ];
    }

    // check product photo validation
    private function checkProductPhotoValidation($request) {
     Validator::make($request->all(), [
      'image' => 'required|mimes:png,jpg,jpeg|file'
     ])->validate();
    }
}
