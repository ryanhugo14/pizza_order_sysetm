<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // adminDashboard
    function list() {
        $categories = Category::when(request('key'), function ($query) {
            $query->where('name', 'like', '%' . request('key') . '%');
        })
            ->orderBy('id', 'desc')
            ->paginate(4);
        $categories->appends(request()->all());
        return view('admin.category.list', compact('categories'));
    }

    // category create page
    public function createPage()
    {
        return view('admin.category.createPage');
    }

    // category create
    public function create(Request $request)
    {
        $this->validatorCheck($request);
        $data = $this->requestCategoryData($request);
        Category::create($data);
        return redirect()->route('category#list');
    }

    // category delete
    public function delete($id)
    {
        Category::where('id', $id)->delete();
        return back()->with(['deleteSuccess' => 'Category deleted...']);
    }

    // category edit
    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    // category update
    public function update(Request $request)
    {
        $this->validatorCheck($request);
        $data = $this->requestCategoryData($request);
        Category::where('id',$request->categoryId)->update($data);
        return redirect()->route('category#list');
    }

    // privateFunction
    // validatorcheck
    private function validatorCheck($request)
    {
        Validator::make($request->all(), [
            'categoryName' => 'required|unique:categories,name,'.$request->categoryId
        ])->validate();
    }

    // request category data
    private function requestCategoryData($request)
    {
        return [
            'name' => $request->categoryName,
        ];
    }
}
