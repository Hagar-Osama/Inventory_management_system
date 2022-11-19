<?php

namespace App\Http\Controllers\Admin;

use App\Http\AdminServices\AboutService;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddAboutRequest;
use App\Http\Requests\DeleteAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    private $aboutService;

    public function __construct(AboutService $aboutService)
    {
        $this->aboutService = $aboutService;
    }

    public function index()
    {
        return $this->aboutService->index();
    }

    public function create()
    {
        return $this->aboutService->Create();
    }

    public function store(AddAboutRequest $request)
    {
        return $this->aboutService->store($request);
    }

    public function edit($aboutId)
    {
        return $this->aboutService->edit($aboutId);
    }

    public function update(UpdateAboutRequest $request)
    {
        return $this->aboutService->update($request);
    }

    public function destroy(DeleteAboutRequest $request)
    {
        return $this->aboutService->index($request);
    }
}
