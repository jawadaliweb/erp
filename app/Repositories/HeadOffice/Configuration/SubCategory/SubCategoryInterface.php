<?php
namespace App\Repositories\HeadOffice\Configuration\SubCategory;

Interface SubCategoryInterface{
    public function renderList($data, $pagination);
    public function storeSubCategory($data);
    public function findSubCategory($id);
    public function updateSubCategory($data, $id); 
    public function destroySubCategory($id);
    public function dropdownSubCategory($data);

}