<?php

namespace App\Repositories\HeadOffice\Configuration\Designation;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Configuration\Designation;

class DesignationRepository implements DesignationInterface
{
    public function renderList($request, $pagination)
    {
        $query = Designation::get();
        return response()->json($query);
    }

    public function storeDesignation($request)
    {
        $run = Designation::create($request->except('submit'));
        return  $run ?
                response()->success($request->designation_name.' added successfully')
                :
                response()->error($request->designation_name.'Error occured please try again');
    }

    public function findDesignation($id)
    {
        $data = Designation::find($id);
        if (!$data) {
            return response()->json(['msgErr' => 'Designation not found']);
        }
        return response()->json($data);
    }

    public function updateDesignation($request, $id)
    {
        $data = Designation::find($id);
        if (!$data) {
            return response()->json(['msgErr' => 'Designation not found']);
        }
        $request['designation_slug'] = Str::slug($request->designation_name);
        $data = Designation::find($id)->update($request->except('submit'));

        return  $data ?
                response()->success($request->designation_name. ' has been updated')
                :
                response()->error($request->designation_name.'Error occured please try again');
    }

    public function destroyDesignation($id)
    {
        $run = Designation::find($id);
        if (!$run) {
            return response()->json(['msg' => 'Designation not found']);
        }
        $run = $run->delete();
        return  $run ?
                response()->success('Operation performed successfully')
                :
                response()->error('Error occured please try again');
    }


    public function dropdownDesignation($request)
    {
        return response()->json(Designation::where('designation_status', 1)
        ->select('id AS value', 'designation_name AS label','designation_code AS code')->orderBy('designation_name')->get());
    }
}