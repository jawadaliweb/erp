<?php

namespace App\Http\Controllers\HeadOffice\Configuration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HeadOffice\Configuration\DesignationRequest;
use App\Repositories\HeadOffice\Configuration\Designation\DesignationInterface;

class DesignationController extends Controller
{
    private $designationRepository;

    public function __construct(DesignationInterface $designationRepository)
    {
        $this->designationRepository = $designationRepository;
    }

    public function render_list(Request $request, $pagination = 25)
    {
        return $this->designationRepository->renderList($request, $pagination);
    }
    
    
    public function store(DesignationRequest $request)
    {
        return $this->designationRepository->storeDesignation($request);
    }
    
    public function edit($id)
    {
        return $this->designationRepository->findDesignation($id);
    }
    
    public function update(DesignationRequest $request, $id)
    {
        return $this->designationRepository->updateDesignation($request, $id);
    }
    
    public function destroy($id)
    {
        return $this->designationRepository->destroyDesignation($id);
    }

    public function dropdown(Request $request)
    {
        return $this->designationRepository->dropdownDesignation($request);
    }

   
}
