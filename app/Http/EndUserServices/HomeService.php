<?php

namespace App\Http\EndUserServices;

use App\Http\Controllers\EndUser\HomeController;
use App\Http\Traits\SliderTrait;
use App\Models\About;
use App\Models\Slider;

class HomeService extends HomeController {

    private $sliderModel;
    private $aboutModel;
    use SliderTrait;


    public function __construct(Slider $slider, About $about)
    {
        $this->sliderModel = $slider;
        $this->aboutModel = $about;
    }

    public function index()
    {
        $slider = $this->sliderModel::first();
        $about = $this->aboutModel::first();
        return view('welcome', compact('slider', 'about'));
    }
}
