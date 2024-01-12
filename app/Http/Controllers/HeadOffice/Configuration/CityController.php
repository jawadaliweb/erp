<?php

namespace App\Http\Controllers\HeadOffice\Configuration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HeadOffice\Configuration\CityRequest;
use App\Repositories\HeadOffice\Configuration\City\CityInterface;

class CityController extends Controller
{

    private $cityRepository;

    public function __construct(CityInterface $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function render_list(Request $request, $pagination = 25)
    {
        return $this->cityRepository->renderList($request, $pagination);
    }

    public function store(CityRequest $request)
    {
        return $this->cityRepository->storeCity($request);
    }
    
    public function edit($id)
    {
        return $this->cityRepository->findCity($id);
    }
    
    public function update(CityRequest $request, $id)
    {
        return $this->cityRepository->updateCity($request, $id);
    }
    
    public function destroy($id)
    {
        return $this->cityRepository->destroyCity($id);
    }

    public function dropdown(Request $request)
    {
        return $this->cityRepository->dropdownCity($request);
    }
}
