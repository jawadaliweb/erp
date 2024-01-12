<?php

namespace App\Repositories\HeadOffice\Configuration\Color;
use App\Models\Color;
use Illuminate\Support\Str;
use App\Repositories\HeadOffice\Configuration\Color\ColorInterface;

class ColorRepository implements ColorInterface
{
    public function renderList($request, $pagination) 
    {
        $query = Color::get();
        return response()->json($query);
    }
    public function storeColor($request) 
    {
        $color = Color::create($request->all());
        return $color ? 
        response()->success($request->color_name.' Added Sucessfully')
        :
        response()->error($request->color_name.'Error occured please try again');
    }

    public function findColor($id){
        $data = Color::find($id);
        if(!$data) {
            return response()->json(['msgErr' => 'Color not found']);
        } 
        return response()->json($data);
    }

    public function updateColor($request, $id){
        $data = Color::find($id);
        if (!$data) {
            return response()->json(['msgErr' => 'Color not found']);
        }
        $request['color_slug'] = Str::slug($request->color_name);
        $data = Color::find($id)->update($request->except('submit'));

        return $data ?
                response()->success($request->color_name. ' has been added')
                :
                response()->error($request->color.' Error occured please try again');
    }
    public function destroyColor($id)
    {
        $color = Color::find($id);
        if (!$color) {
            return response()->json(['msg' => 'Color not found']);
        }
        $run = $color->delete();
        return  $run ?
                response()->success('Operation performed successfully')
                :
                response()->error('Error occured please try again');
    }
    public function dropdownColor($request)
    {
        return response()->json(Color::where('color_status', 1)
        ->select('id AS value', 'color_name AS label','color_code AS code')->orderBy('color_name')->get());
    }
}