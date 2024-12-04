<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Enum\CRUDMESSAGE;
use App\Http\Requests\AddProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use DoniaShaker\MediaLibrary\MediaController;
use DoniaShaker\MediaLibrary\Models\Media;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function show(Request $request, $id = null)
    {
        $do = $request->query('do', 'Manage');
        $productId = $request->query('Id');
        $categories = Category::orderBy('id', 'DESC')->get();

        if ($request->ajax()) {
            $query = Product::with(['media', 'category']);

            // Filter by category name if provided
            if ($request->has('category_name') && $request->category_name != '') {
                $query->whereHas('category', function ($q) use ($request) {
                    $q->where('name', 'LIKE', '%' . $request->category_name . '%');
                });
            }

            $products = $query->get();
            return response()->json($products);
        }

        return view('admin.product', [
            'product' => $productId ? Product::with(['media'])->find($productId) : 'all',
            'categories' => $categories,
            'do' => $do,
            'category_id' => $id,
        ]);
    }

    public function getProducts(Request $request)
{
    $query = Product::with(['category','media']);

    // Filter by category
    if ($request->has('category_id') && $request->category_id) {
        $query->where('category_id', $request->category_id);
    }

    // Search functionality (optional)
    if ($request->has('search') && $request->search) {
        $query->where('name', 'LIKE', '%' . $request->search . '%');
    }

    // Paginate and return data
    $products = $query->paginate(10);



    Log::info(json_encode($products));

    return response()->json($products, 200, ['Content-Type' => 'application/json']);
}


    public function add(AddProductRequest $request)
    {

        $request->validated();
        try {
            $product = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'category_id' => $request->category_id,
            ]);
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $media_functions = new MediaController();
                $media_functions->saveImage('product', $product->id,$request->file('image'));
            }

            return to_route('products',$request->category_id)->with([
                'success' => CRUDMESSAGE::MESSAGE_ADD_SUCCESS,
            ]);
        } catch (\Exception) {
            return to_route('products',$request->category_id)->with([
                'error' => CRUDMESSAGE::MESSAGE_ADD_ERROR,
            ]);
        }
    }

    public function update(AddProductRequest $request, $id)
    {
        $request->validated();
        try {

            $product = Product::where('id', $id)->with('media')->first();

            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'category_id' => $request->category_id,
            ]);
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                if (isset($data->media)) {
                    Media::where('id', $data->media->id)->delete();
                }
                $media_functions = new MediaController();
                $media_functions->saveImage('product', $product->id,$request->file('image'));
            }
            return redirect('products')->with([
                'success' => CRUDMESSAGE::MESSAGE_UPDATE_SUCCESS,
            ]);
        } catch (\Exception) {
            return redirect()->route('products')->with([
                'error' => CRUDMESSAGE::MESSAGE_UPDATE_ERROR,
            ]);
        }
    }




    public function delete($id)
    {
        try {

            $product = Product::where('id', $id)->first();
            $product->delete();
            return redirect()->back()->with([
                'success' => CRUDMESSAGE::MESSAGE_DELETE_SUCCESS,
            ]);
        } catch (\Exception) {
            return redirect()->back()->with([
                'error' => CRUDMESSAGE::MESSAGE_DELETE_ERROR,
            ]);
        }
    }
}
