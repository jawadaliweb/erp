<?php

namespace App\Repositories\HeadOffice\Configuration\Country;
use App\Models\Country;
use Illuminate\Support\Str;
use App\Repositories\HeadOffice\Configuration\Country\CountryInterface;

class CountryRepository implements CountryInterface
{
    public function renderList($request, $pagination) 
    {
        $query = Country::get();
        return response()->json($query);
    }
    public function storeCountry($request) 
    {
        $country = Country::create($request->all());
        return $country ? 
        response()->success($request->country_name.' Added Sucessfully')
        :
        response()->error($request->country_name.'Error occured please try again');
    }

    public function findCountry($id){
        $data = Country::find($id);
        if(!$data) {
            return response()->json(['msgErr' => 'Country not found']);
        } 
        return response()->json($data);
    }

    public function updateCountry($request, $id){
        $data = Country::find($id);
        if (!$data) {
            return response()->json(['msgErr' => 'Country not found']);
        }
        $request['country_slug'] = Str::slug($request->country_name);
        $data = Country::find($id)->update($request->except('submit'));

        return $data ?
                response()->success($request->country_name. ' has been added')
                :
                response()->error($request->country.' Error occured please try again');
    }
    public function destroyCountry($id)
    {
        $country = Country::find($id);
        if (!$country) {
            return response()->json(['msg' => 'Country not found']);
        }
        $run = $country->delete();
        return  $run ?
                response()->success('Operation performed successfully')
                :
                response()->error('Error occured please try again');
    }
    public function dropdownCountry($request)
    {
        return response()->json(Country::where('country_status', 1)
        ->select('id AS value', 'country_name AS label','country_code AS code')->orderBy('country_name')->get());
    }
}