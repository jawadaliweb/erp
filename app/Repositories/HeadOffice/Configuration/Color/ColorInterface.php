<?php
namespace App\Repositories\HeadOffice\Configuration\Color;

Interface ColorInterface{
    public function renderList($data, $pagination);
    public function storeColor($data);
    public function findColor($id);
    public function updateColor($data, $id); 
    public function destroyColor($id);
    public function dropdownColor($data);

}