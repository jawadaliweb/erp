<?php

namespace App\Repositories\HeadOffice\Configuration\SubCategory;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Configuration\SubCategory;

class SubCategoryRepository implements SubCategoryInterface
{
    public function renderList($request, $pagination)
    {
        $query = SubCategory::get();
        return response()->json($query);
    }

    public function storeSubCategory($request)
    {
        $run = SubCategory::create($request->except('submit'));
        return  $run ?
                response()->success($request->subcategory_name.' added successfully')
                :
                response()->error($request->subcategory_name.'Error occured please try again');
    }

    public function findSubCategory($id)
    {
        $data = SubCategory::find($id);
        if (!$data) {
            return response()->json(['msgErr' => 'SubCategory not found']);
        }
        return response()->json($data);
    }

    public function updateSubCategory($request, $id)
    {
        $data = SubCategory::find($id);
        if (!$data) {
            return response()->json(['msgErr' => 'SubCategory not found']);
        }
        $request['subcategory_slug'] = Str::slug($request->subcategory_name);
        $data = SubCategory::find($id)->update($request->except('submit'));

        return  $data ?
                response()->success($request->subcategory_name. ' has been updated')
                :
                response()->error($request->subcategory_name.'Error occured please try again');
    }

    public function destroySubCategory($id)
    {
        $run = SubCategory::find($id);
        if (!$run) {
            return response()->json(['msg' => 'SubCategory not found']);
        }
        $run = $run->delete();
        return  $run ?
                response()->success('Operation performed successfully')
                :
                response()->error('Error occured please try again');
    }


    public function dropdownSubCategory($request)
    {
        return response()->json(SubCategory::where('subcategory_status', 1)
        ->select('id AS value', 'subcategory_name AS label','subcategory_code AS code')->orderBy('subcategory_name')->get());
    }
}