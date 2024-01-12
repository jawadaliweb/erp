<?php
namespace App\Repositories\HeadOffice\Configuration\Category;

Interface CategoryInterface{
    public function renderList($data, $pagination);
    public function storeCategory($data);
    public function findCategory($id);
    public function updateCategory($data, $id); 
    public function destroyCategory($id);
    public function dropdownCategory($data);

}