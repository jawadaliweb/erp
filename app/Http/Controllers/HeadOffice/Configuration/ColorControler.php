<?php

namespace App\Http\Controllers\HeadOffice\Configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HeadOffice\Configuration\ColorRequest;
use App\Repositories\HeadOffice\Configuration\Color\ColorInterface;

class ColorControler extends Controller
{

    private $colorRepository;

    public function __construct(ColorInterface $colorRepository)
    {
        $this->colorRepository = $colorRepository;
    }

    public function render_list(Request $request, $pagination = 25)
    {
        return $this->colorRepository->renderList($request, $pagination);
    }
    public function store(ColorRequest $request)
    {
        return $this->colorRepository->storeColor($request);
    }
    
    public function edit($id)
    {
        return $this->colorRepository->findColor($id);
    }
    
    public function update(ColorRequest $request, $id)
    {
        return $this->colorRepository->updateColor($request, $id);
    }
    
    public function destroy($id)
    {
        return $this->colorRepository->destroyColor($id);
    }

    public function dropdown(Request $request)
    {
        return $this->colorRepository->dropdownColor($request);
    }
}
