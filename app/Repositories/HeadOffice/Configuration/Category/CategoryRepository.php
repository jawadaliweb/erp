<?php

namespace App\Repositories\HeadOffice\Configuration\Category;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Configuration\Category;

class CategoryRepository implements CategoryInterface
{
    public function renderList($request, $pagination)
    {
        $query = Category::get();
        return response()->json($query);
    }

    public function storeCategory($request)
    {
        $run = Category::create($request->except('submit'));
        return  $run ?
                response()->success($request->category_name.' added successfully')
                :
                response()->error($request->category_name.'Error occured please try again');
    }

    public function findCategory($id)
    {
        $data = Category::find($id);
        if (!$data) {
            return response()->json(['msgErr' => 'Category not found']);
        }
        return response()->json($data);
    }

    public function updateCategory($request, $id)
    {
        $data = Category::find($id);
        if (!$data) {
            return response()->json(['msgErr' => 'Category not found']);
        }
        $request['category_slug'] = Str::slug($request->category_name);
        $data = Category::find($id)->update($request->except('submit'));

        return  $data ?
                response()->success($request->category_name. ' has been updated')
                :
                response()->error($request->category_name.'Error occured please try again');
    }

    public function destroyCategory($id)
    {
        $run = Category::find($id);
        if (!$run) {
            return response()->json(['msg' => 'Category not found']);
        }
        $run = $run->delete();
        return  $run ?
                response()->success('Operation performed successfully')
                :
                response()->error('Error occured please try again');
    }


    public function dropdownCategory($request)
    {
        return response()->json(Category::where('category_status', 1)
        ->select('id AS value', 'category_name AS label','category_code AS code')->orderBy('category_name')->get());
    }
}