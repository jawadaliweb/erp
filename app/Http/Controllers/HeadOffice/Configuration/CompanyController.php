<?php

namespace App\Http\Controllers\HeadOffice\Configuration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HeadOffice\Configuration\CompanyRequest;
use App\Repositories\HeadOffice\Configuration\Company\CompanyInterface;

class CompanyController extends Controller
{

    private $companyRepository;

    public function __construct(CompanyInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function render_list(Request $request, $pagination = 25)
    {
        return $this->companyRepository->renderList($request, $pagination);
    }

    public function store(CompanyRequest $request)
    {
        return $this->companyRepository->storeCompany($request);
    }
    
    public function edit($id)
    {
        return $this->companyRepository->findCompany($id);
    }
    
    public function update(CompanyRequest $request, $id)
    {
        return $this->companyRepository->updateCompany($request, $id);
    }
    
    public function destroy($id)
    {
        return $this->companyRepository->destroyCompany($id);
    }

    public function dropdown(Request $request)
    {
        return $this->companyRepository->dropdownCompany($request);
    }
}
