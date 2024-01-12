<?php
namespace App\Repositories\HeadOffice\Configuration\Country;

Interface CountryInterface{
    public function renderList($data, $pagination);
    public function storeCountry($data);
    public function findCountry($id);
    public function updateCountry($data, $id); 
    public function destroyCountry($id);
    public function dropdownCountry($data);

}