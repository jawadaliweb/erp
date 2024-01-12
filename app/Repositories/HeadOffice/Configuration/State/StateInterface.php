<?php
namespace App\Repositories\HeadOffice\Configuration\State;

Interface StateInterface{
    public function renderList($data, $pagination);
    public function storeState($data);
    public function findState($id);
    public function updateState($data, $id); 
    public function destroyState($id);
    public function dropdownState($data);

}