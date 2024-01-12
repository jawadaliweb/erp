<?php

namespace App\Repositories\HeadOffice\Branch;
use App\Models\User;
use App\Models\Branch;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Repositories\HeadOffice\Branch\BranchInterface;

class BranchRepository implements BranchInterface
{
    public function renderList($request, $pagination)
    {
        $query = Branch::get();
        return response()->json($query);
    }

    public function storeBranch($request)
    {
        $request['password'] = bcrypt($request->password);
        $request['account_type'] = 'admin';
        $user = User::create($request->except('submit'));
        $request['user_id'] = $user->id;
        $run = Branch::create($request->except('submit','name','email','password','account_type'));
        return  $run ?
                response()->success($request->branch_name.' added successfully')
                :
                response()->error($request->branch_name.'Error occured please try again');
    }

    public function findBranch($id)
    {
        $data = Branch::find($id);
        if (!$data) {
            return response()->json(['msgErr' => 'Branch not found']);
        }
        return response()->json($data);
    }

    public function updateBranch($request, $id)
    {
        $data = Branch::find($id);
        if (!$data) {
            return response()->json(['msgErr' => 'Branch not found']);
        }
        $request['branch_slug'] = Str::slug($request->branch_name);
        $data = Branch::find($id)->update($request->except('submit','name','email'));

        return  $data ?
                response()->success($request->branch_name. ' has been updated')
                :
                response()->error($request->branch_name.'Error occured please try again');
    }

    public function destroyBranch($id)
    {
        $run = Branch::find($id);
        if (!$run) {
            return response()->json(['msg' => 'Branch not found']);
        }
        $run = $run->delete();
        return  $run ?
                response()->success('Operation performed successfully')
                :
                response()->error('Error occured please try again');
    }

    public function dropdownBranch($request)
    {
        return response()->json(Branch::where('branch_status', 1)
        ->select('id AS value', 'branch_name AS label','branch_code AS code')->orderBy('branch_name')->get());
    }
    
}