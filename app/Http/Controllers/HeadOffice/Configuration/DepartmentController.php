<?php

namespace App\Http\Controllers\HeadOffice\Configuration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HeadOffice\Configuration\DepartmentRequest;
use App\Repositories\HeadOffice\Configuration\Department\DepartmentInterface;

class DepartmentController extends Controller
{

    private $departmentRepository;

    public function __construct(DepartmentInterface $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function render_list(Request $request, $pagination = 25)
    {
        return $this->departmentRepository->renderList($request, $pagination);
    }
    public function store(DepartmentRequest $request)
    {
        return $this->departmentRepository->storeDepartment($request);
    }
    
    public function edit($id)
    {
        return $this->departmentRepository->findDepartment($id);
    }
    
    public function update(DepartmentRequest $request, $id)
    {
        return $this->departmentRepository->updateDepartment($request, $id);
    }
    
    public function destroy($id)
    {
        return $this->departmentRepository->destroyDepartment($id);
    }

    public function dropdown(Request $request)
    {
        return $this->departmentRepository->dropdownDepartment($request);
    }
}
