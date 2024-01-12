<?php
namespace App\Repositories\HeadOffice\Configuration\City;

Interface CityInterface{
    public function renderList($data, $pagination);
    public function storeCity($data);
    public function findCity($id);
    public function updateCity($data, $id); 
    public function destroyCity($id);
    public function dropdownCity($data);

}