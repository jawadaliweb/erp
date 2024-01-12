<?php
namespace App\Repositories\HeadOffice\Configuration\Company;

Interface CompanyInterface{
    public function renderList($data, $pagination);
    public function storeCompany($data);
    public function findCompany($id);
    public function updateCompany($data, $id); 
    public function destroyCompany($id);
    public function dropdownCompany($data);

}