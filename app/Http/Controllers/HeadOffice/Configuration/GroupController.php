<?php

namespace App\Http\Controllers\HeadOffice\Configuration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HeadOffice\Configuration\GroupRequest;
use App\Repositories\HeadOffice\Configuration\Group\GroupInterface;

class GroupController extends Controller
{

    private $groupRepository;

    public function __construct(GroupInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    public function render_list(Request $request, $pagination = 25)
    {
        return $this->groupRepository->renderList($request, $pagination);
    }

    public function store(GroupRequest $request)
    {
        return $this->groupRepository->storeGroup($request);
    }
    
    public function edit($id)
    {
        return $this->groupRepository->findGroup($id);
    }
    
    public function update(GroupRequest $request, $id)
    {
        return $this->groupRepository->updateGroup($request, $id);
    }
    
    public function destroy($id)
    {
        return $this->groupRepository->destroyGroup($id);
    }

    public function dropdown(Request $request)
    {
        return $this->groupRepository->dropdownGroup($request);
    }
}
