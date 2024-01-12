<?php

namespace App\Http\Controllers\HeadOffice\Configuration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HeadOffice\Configuration\CategoryRequest;
use App\Repositories\HeadOffice\Configuration\Category\CategoryInterface;

class CategoryController extends Controller
{

    private $categoryRepository;

    public function __construct(CategoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function render_list(Request $request, $pagination = 25)
    {
        return $this->categoryRepository->renderList($request, $pagination);
    }

    public function store(CategoryRequest $request)
    {
        return $this->categoryRepository->storeCategory($request);
    }
    
    public function edit($id)
    {
        return $this->categoryRepository->findCategory($id);
    }
    
    public function update(CategoryRequest $request, $id)
    {
        return $this->categoryRepository->updateCategory($request, $id);
    }
    
    public function destroy($id)
    {
        return $this->categoryRepository->destroyCategory($id);
    }

    public function dropdown(Request $request)
    {
        return $this->categoryRepository->dropdownCategory($request);
    }
}
