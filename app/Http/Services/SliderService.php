<?php

namespace App\Http\Services;

use App\Http\Controllers\Admin\SliderController;
use App\Http\Traits\SliderTrait;
use App\Http\Traits\UploadTraits;
use App\Models\Slider;
use Exception;

class SliderService extends SliderController
{

    private $sliderModel;
    use SliderTrait;
    use UploadTraits;

    public function __construct(Slider $slider)
    {
        $this->sliderModel = $slider;
    }

    public function index()
    {
        $sliders = $this->getAllSliders();
        return view('dashboard.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('dashboard.sliders.create');
    }

    public function store($request)
    {
        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->hashName();
                $this->uploadFile($image, 'images/sliders', $imageName);
            }
            $this->sliderModel::create([
                'title' => $request->title,
                'description' => $request->description,
                'video' => $request->video,
                'image' => $imageName
            ]);
            $message = array(
                'message' => 'Slider is Added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('slider.index')->with($message);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($sliderId)
    {
        $slider = $this->getSliderById($sliderId);
        return view('dashboard.sliders.edit', compact('slider'));
    }

    public function update($request)
    {
        try {
            $slider = $this->getSliderById($request->sliderId);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->hashName();
                $this->uploadFile($image, 'images/sliders', $imageName, 'storage/images/sliders/'. $slider->image);
            }
            $slider->update([
                'title' => $request->title,
                'description' => $request->description,
                'video' => $request->video,
                'image' => (isset($imageName)) ? $imageName : $slider->image
            ]);
            $message = array(
                'message' => 'Slider is Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('slider.index')->with($message);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
