<?php

namespace App\Http\Controllers\HeadOffice\Configuration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HeadOffice\Configuration\SubCategoryRequest;
use App\Repositories\HeadOffice\Configuration\SubCategory\SubCategoryInterface;

class SubCategoryController extends Controller
{

    private $subcategoryRepository;

    public function __construct(SubCategoryInterface $subcategoryRepository)
    {
        $this->subcategoryRepository = $subcategoryRepository;
    }

    public function render_list(Request $request, $pagination = 25)
    {
        return $this->subcategoryRepository->renderList($request, $pagination);
    }

    public function store(SubCategoryRequest $request)
    {
        return $this->subcategoryRepository->storeSubCategory($request);
    }
    
    public function edit($id)
    {
        return $this->subcategoryRepository->findSubCategory($id);
    }
    
    public function update(SubCategoryRequest $request, $id)
    {
        return $this->subcategoryRepository->updateSubCategory($request, $id);
    }
    
    public function destroy($id)
    {
        return $this->subcategoryRepository->destroySubCategory($id);
    }

    public function dropdown(Request $request)
    {
        return $this->subcategoryRepository->dropdownSubCategory($request);
    }
}
