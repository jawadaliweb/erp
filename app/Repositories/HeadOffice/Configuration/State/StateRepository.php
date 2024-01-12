<?php

namespace App\Repositories\HeadOffice\Configuration\State;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Configuration\State;

class StateRepository implements StateInterface
{
    public function renderList($request, $pagination)
    {
        $query = State::get();
        return response()->json($query);
    }

    public function storeState($request)
    {
        $run = State::create($request->except('submit'));
        return  $run ?
                response()->success($request->state_name.' added successfully')
                :
                response()->error($request->state_name.'Error occured please try again');
    }

    public function findState($id)
    {
        $data = State::find($id);
        if (!$data) {
            return response()->json(['msgErr' => 'State not found']);
        }
        return response()->json($data);
    }

    public function updateState($request, $id)
    {
        $data = State::find($id);
        if (!$data) {
            return response()->json(['msgErr' => 'State not found']);
        }
        $request['state_slug'] = Str::slug($request->state_name);
        $data = State::find($id)->update($request->except('submit'));

        return  $data ?
                response()->success($request->state_name. ' has been updated')
                :
                response()->error($request->state_name.'Error occured please try again');
    }

    public function destroyState($id)
    {
        $run = State::find($id);
        if (!$run) {
            return response()->json(['msg' => 'State not found']);
        }
        $run = $run->delete();
        return  $run ?
                response()->success('Operation performed successfully')
                :
                response()->error('Error occured please try again');
    }


    public function dropdownState($request)
    {
        return response()->json(State::where('state_status', 1)
        ->select('id AS value', 'state_name AS label','state_code AS code')->orderBy('state_name')->get());
    }
}