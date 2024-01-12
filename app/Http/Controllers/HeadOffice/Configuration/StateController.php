<?php

namespace App\Http\Controllers\HeadOffice\Configuration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HeadOffice\Configuration\StateRequest;
use App\Repositories\HeadOffice\Configuration\State\StateInterface;

class StateController extends Controller
{

    private $stateRepository;

    public function __construct(StateInterface $stateRepository)
    {
        $this->stateRepository = $stateRepository;
    }

    public function render_list(Request $request, $pagination = 25)
    {
        return $this->stateRepository->renderList($request, $pagination);
    }

    public function store(StateRequest $request)
    {
        return $this->stateRepository->storeState($request);
    }
    
    public function edit($id)
    {
        return $this->stateRepository->findState($id);
    }
    
    public function update(StateRequest $request, $id)
    {
        return $this->stateRepository->updateState($request, $id);
    }
    
    public function destroy($id)
    {
        return $this->stateRepository->destroyState($id);
    }

    public function dropdown(Request $request)
    {
        return $this->stateRepository->dropdownState($request);
    }
}
