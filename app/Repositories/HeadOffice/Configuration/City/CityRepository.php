<?php

namespace App\Repositories\HeadOffice\Configuration\City;

use Illuminate\Support\Str;
use App\Models\Configuration\City;
use Illuminate\Support\Facades\DB;

class CityRepository implements CityInterface
{
    public function renderList($request, $pagination)
    {
        $query = City::get();
        return response()->json($query);
    }

    public function storeCity($request)
    {
        $run = City::create($request->except('submit'));
        return  $run ?
                response()->success($request->city_name.' added successfully')
                :
                response()->error($request->city_name.'Error occured please try again');
    }

    public function findCity($id)
    {
        $data = City::find($id);
        if (!$data) {
            return response()->json(['msgErr' => 'City not found']);
        }
        return response()->json($data);
    }

    public function updateCity($request, $id)
    {
        $data = City::find($id);
        if (!$data) {
            return response()->json(['msgErr' => 'City not found']);
        }
        $request['city_slug'] = Str::slug($request->city_name);
        $data = City::find($id)->update($request->except('submit'));

        return  $data ?
                response()->success($request->city_name. ' has been updated')
                :
                response()->error($request->city_name.'Error occured please try again');
    }

    public function destroyCity($id)
    {
        $run = City::find($id);
        if (!$run) {
            return response()->json(['msg' => 'City not found']);
        }
        $run = $run->delete();
        return  $run ?
                response()->success('Operation performed successfully')
                :
                response()->error('Error occured please try again');
    }


    public function dropdownCity($request)
    {
        return response()->json(City::where('city_status', 1)
        ->select('id AS value', 'city_name AS label','city_code AS code')->orderBy('city_name')->get());
    }
}