<?php

namespace App\Repositories\HeadOffice\Configuration\Group;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Configuration\Group;

class GroupRepository implements GroupInterface
{
    public function renderList($request, $pagination)
    {
        $query = Group::get();
        return response()->json($query);
    }

    public function storeGroup($request)
    {
        $run = Group::create($request->except('submit'));
        return  $run ?
                response()->success($request->group_name.' added successfully')
                :
                response()->error($request->group_name.'Error occured please try again');
    }

    public function findGroup($id)
    {
        $data = Group::find($id);
        if (!$data) {
            return response()->json(['msgErr' => 'Group not found']);
        }
        return response()->json($data);
    }

    public function updateGroup($request, $id)
    {
        $data = Group::find($id);
        if (!$data) {
            return response()->json(['msgErr' => 'Group not found']);
        }
        $request['group_slug'] = Str::slug($request->group_name);
        $data = Group::find($id)->update($request->except('submit'));

        return  $data ?
                response()->success($request->group_name. ' has been updated')
                :
                response()->error($request->group_name.'Error occured please try again');
    }

    public function destroyGroup($id)
    {
        $run = Group::find($id);
        if (!$run) {
            return response()->json(['msg' => 'Group not found']);
        }
        $run = $run->delete();
        return  $run ?
                response()->success('Operation performed successfully')
                :
                response()->error('Error occured please try again');
    }


    public function dropdownGroup($request)
    {
        return response()->json(Group::where('group_status', 1)
        ->select('id AS value', 'group_name AS label','group_code AS code')->orderBy('group_name')->get());
    }
}