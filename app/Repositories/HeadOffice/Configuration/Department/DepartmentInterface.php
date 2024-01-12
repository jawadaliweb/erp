<?php
namespace App\Repositories\HeadOffice\Configuration\Department;

Interface DepartmentInterface{
    public function renderList($data, $pagination);
    public function storeDepartment($data);
    public function findDepartment($id);
    public function updateDepartment($data, $id); 
    public function destroyDepartment($id);
    public function dropdownDepartment($data);
}