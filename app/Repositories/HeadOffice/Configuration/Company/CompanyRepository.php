<?php

namespace App\Repositories\HeadOffice\Configuration\Company;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Configuration\Company;
use App\Repositories\HeadOffice\Configuration\Company\CompanyInterface;

class CompanyRepository implements CompanyInterface
{
    public function renderList($request, $pagination)
    {
        $query = Company::get();
        return response()->json($query);
    }

    public function storeCompany($request)
    {
        $run = Company::create($request->except('submit'));
        return  $run ?
                response()->success($request->company_name.' added successfully')
                :
                response()->error($request->company_name.'Error occured please try again');
    }

    public function findCompany($id)
    {
        $data = Company::find($id);
        if (!$data) {
            return response()->json(['msgErr' => 'Company not found']);
        }
        return response()->json($data);
    }

    public function updateCompany($request, $id)
    {
        $data = Company::find($id);
        if (!$data) {
            return response()->json(['msgErr' => 'Company not found']);
        }
        $request['company_slug'] = Str::slug($request->company_name);
        $data = Company::find($id)->update($request->except('submit'));

        return  $data ?
                response()->success($request->company_name. ' has been updated')
                :
                response()->error($request->company_name.'Error occured please try again');
    }

    public function destroyCompany($id)
    {
        $run = Company::find($id);
        if (!$run) {
            return response()->json(['msg' => 'Company not found']);
        }
        $run = $run->delete();
        return  $run ?
                response()->success('Operation performed successfully')
                :
                response()->error('Error occured please try again');
    }


    public function dropdownCompany($request)
    {
        return response()->json(Company::where('company_status', 1)
        ->select('id AS value', 'company_name AS label','company_code AS code')->orderBy('company_name')->get());
    }
}