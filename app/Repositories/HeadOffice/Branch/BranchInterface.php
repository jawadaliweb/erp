<?php
namespace App\Repositories\HeadOffice\Branch;

Interface BranchInterface{
    public function renderList($data, $pagination);
    public function storeBranch($data);
    public function findBranch($id);
    public function updateBranch($data, $id); 
    public function destroyBranch($id);
    public function dropdownBranch($data);
}