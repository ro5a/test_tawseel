<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Enum\CRUDMESSAGE;
use App\Http\Requests\AddCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show()
    {
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $category = isset($_GET['Id']) ? $category = Category::where('id', $_GET['Id'])->first() : 'all';


        $data = Category::get()->toJson();

        return view('admin.category', [
            'data' => $data,
            'category' => $category,
            'do' => $do,
        ]);
    }

    public function add(AddCategoryRequest $request)
    {
        $request->validated();
        try {

            $category = Category::create([
                'name' =>  $request->name,

            ]);

            return to_route('categories')->with([
                'success' => CRUDMESSAGE::MESSAGE_ADD_SUCCESS,
            ]);
        } catch (\Exception) {
            return redirect()->route('categories')->with([
                'error' => CRUDMESSAGE::MESSAGE_ADD_ERROR,
            ]);
        }
    }

    public function update(AddCategoryRequest $request, $id)
    {
        $request->validated();
        try {

            $data = Category::where('id', $id)->first();

            $data->update([
                'name' =>  $request->name,
            ]);

            return redirect()->route('categories')->with([
                'success' => CRUDMESSAGE::MESSAGE_UPDATE_SUCCESS,
            ]);
        } catch (\Exception) {
            return redirect()->route('categories')->with([
                'error' => CRUDMESSAGE::MESSAGE_UPDATE_ERROR,
            ]);
        }
    }



    public function delete($id)
    {
        try {

            $category = Category::where('id', $id)->first();
            $category->delete();
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
