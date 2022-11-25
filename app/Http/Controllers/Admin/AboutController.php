<?php

namespace App\Http\Controllers\Admin;

use App\Http\AdminServices\AboutService;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddAboutRequest;
use App\Http\Requests\AddImagesRequest;
use App\Http\Requests\DeleteAboutRequest;
use App\Http\Requests\DeleteImagesRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Http\Requests\UpdateImagesRequest;
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

    public function addMultipleImages(AddImagesRequest $request)
    {
        return $this->aboutService->addMultipleImages($request);
    }

    public function aboutImagesIndex()
    {
        return $this->aboutService->aboutImagesIndex();
    }

    public function createMultipleImages()
    {
        return $this->aboutService->createMultipleImages();
    }

    public function editMultipleImages($aboutImageId)
    {
        return $this->aboutService->editMultipleImages($aboutImageId);

    }


    public function updateMultipleImages(UpdateImagesRequest $request)
    {
        return $this->aboutService->updateMultipleImages($request);
    }

    public function destroyMultipleImages($aboutImageId)
    {
        return $this->aboutService->destroyMultipleImages($aboutImageId);
    }
}
