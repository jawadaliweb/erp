<?php

namespace App\Http\Controllers\HeadOffice\Configuration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HeadOffice\Configuration\CountryRequest;
use App\Repositories\HeadOffice\Configuration\Country\CountryInterface;

class CountryController extends Controller
{

    private $countryRepository;

    public function __construct(CountryInterface $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function render_list(Request $request, $pagination = 25)
    {
        return $this->countryRepository->renderList($request, $pagination);
    }

    public function store(CountryRequest $request)
    {
        return $this->countryRepository->storeCountry($request);
    }
    
    public function edit($id)
    {
        return $this->countryRepository->findCountry($id);
    }
    
    public function update(CountryRequest $request, $id)
    {
        return $this->countryRepository->updateCountry($request, $id);
    }
    
    public function destroy($id)
    {
        return $this->countryRepository->destroyCountry($id);
    }

    public function dropdown(Request $request)
    {
        return $this->countryRepository->dropdownCountry($request);
    }
}
