<?php

namespace App\Repositories\HeadOffice\Configuration\Department;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Configuration\Department;
use App\Repositories\HeadOffice\Configuration\Department\DepartmentInterface;

class DepartmentRepository implements DepartmentInterface
{
    public function renderList($request, $pagination)
    {
        $query = Department::get();
        return response()->json($query);
    }

    public function storeDepartment($request)
    {
        $department = Department::create($request->except('submit'));
        return  $department ?
                response()->success($request->department_name.' added successfully')
                :
                response()->error($request->department_name.'Error occured please try again');
    }

    public function findDepartment($id)
    {
        $data = Department::find($id);
        if (!$data) {
            return response()->json(['msgErr' => 'Department not found']);
        }
        return response()->json($data);
    }

    public function updateDepartment($request, $id)
    {
        $data = Department::find($id);
        if (!$data) {
            return response()->json(['msgErr' => 'Department not found']);
        }
        $request['department_slug'] = Str::slug($request->department_name);
        $data = Department::find($id)->update($request->except('submit'));

        return  $data ?
                response()->success($request->department_name. ' has been updated')
                :
                response()->error($request->department_name.'Error occured please try again');
    }

    public function destroyDepartment($id)
    {
        $department = Department::find($id);
        if (!$department) {
            return response()->json(['msg' => 'Department not found']);
        }
        $run = $department->delete();
        return  $run ?
                response()->success('Operation performed successfully')
                :
                response()->error('Error occured please try again');
    }


    public function dropdownDepartment($request)
    {
        return response()->json(Department::where('department_status', 1)
        ->select('id AS value', 'department_name AS label','department_code AS code')->orderBy('department_name')->get());
    }
}