<?php

namespace App\Http\Controllers\HeadOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HeadOffice\BranchRequest;
use App\Repositories\HeadOffice\Branch\BranchInterface;

class BranchController extends Controller
{

    private $branchRepository;

    public function __construct(BranchInterface $branchRepository)
    {
        $this->branchRepository = $branchRepository;
    }

    public function render_list(Request $request, $pagination = 25)
    {
        return $this->branchRepository->renderList($request, $pagination);
    }

    public function store(BranchRequest $request)
    {

        return $this->branchRepository->storeBranch($request);
    }
    
    public function edit($id)
    {
        return $this->branchRepository->findBranch($id);
    }
    
    public function update(Request $request, $id)
    {
        return $this->branchRepository->updateBranch($request, $id);
    }
    
    public function destroy($id)
    {
        return $this->branchRepository->destroyBranch($id);
    }

    public function dropdown(Request $request)
    {
        return $this->branchRepository->dropdownBranch($request);
    }
}
