<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddSliderRequest;
use App\Http\Requests\DeleteSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Http\Services\SliderService;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    private $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    public function index()
    {
        return $this->sliderService->index();
    }

    public function create()
    {
        return $this->sliderService->Create();
    }

    public function store(AddSliderRequest $request)
    {
        return $this->sliderService->store($request);
    }

    public function edit($sliderId)
    {
        return $this->sliderService->edit($sliderId);
    }

    public function update(UpdateSliderRequest $request)
    {
        return $this->sliderService->update($request);
    }

    public function destroy(DeleteSliderRequest $request)
    {
        return $this->sliderService->index($request);
    }
}
