<?php

namespace App\Http\EndUserServices;

use App\Http\Controllers\EndUser\HomeController;
use App\Http\Traits\SliderTrait;
use App\Models\About;
use App\Models\AboutImage;
use App\Models\Slider;

class HomeService extends HomeController {

    private $sliderModel;
    private $aboutModel;
    private $AboutImageModel;
    use SliderTrait;


    public function __construct(Slider $slider, About $about, AboutImage $aboutImage)
    {
        $this->sliderModel = $slider;
        $this->aboutModel = $about;
        $this->AboutImageModel = $aboutImage;

    }

    public function index()
    {
        $slider = $this->sliderModel::first();
        $about = $this->aboutModel::first();
        $aboutImages = $this->AboutImageModel::get();
        return view('welcome', compact('slider', 'about', 'aboutImages'));
    }

    public function aboutPage()
    {
        $about = $this->aboutModel::first();
        $aboutImages = $this->AboutImageModel::get();
        return view('about', compact( 'about', 'aboutImages'));
    }
}
