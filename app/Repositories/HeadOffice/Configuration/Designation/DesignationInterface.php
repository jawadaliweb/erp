<?php
namespace App\Repositories\HeadOffice\Configuration\Designation;

Interface DesignationInterface{
    public function renderList($data, $pagination);
    public function storeDesignation($data);
    public function findDesignation($id);
    public function updateDesignation($data, $id); 
    public function destroyDesignation($id);
    public function dropdownDesignation($data);

}