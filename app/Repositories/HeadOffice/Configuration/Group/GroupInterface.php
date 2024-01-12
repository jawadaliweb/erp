<?php
namespace App\Repositories\HeadOffice\Configuration\Group;

Interface GroupInterface{
    public function renderList($data, $pagination);
    public function storeGroup($data);
    public function findGroup($id);
    public function updateGroup($data, $id); 
    public function destroyGroup($id);
    public function dropdownGroup($data);

}