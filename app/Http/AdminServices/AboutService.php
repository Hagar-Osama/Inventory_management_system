<?php

namespace App\Http\AdminServices;

use App\Http\Controllers\Admin\AboutController;
use App\Http\Traits\AboutTrait;
use App\Http\Traits\UploadTraits;
use App\Models\About;
use App\Models\AboutImage;
use Exception;
use Image;

class AboutService extends AboutController
{

    private $AboutModel;
    private $AboutImageModel;
    use UploadTraits;
    use AboutTrait;

    public function __construct(About $about, AboutImage $aboutImage)
    {
        $this->aboutModel = $about;
        $this->AboutImageModel = $aboutImage;
    }

    public function index()
    {
        $abouts = $this->getAllAbout();
        return view('dashboard.about.index', compact('abouts'));
    }

    public function create()
    {
        return view('dashboard.about.create');
    }

    public function store($request)
    {
        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->hashName();
                Image::make($image)->resize(636, 852)->save('storage/images/about/' . $imageName);
                // $this->uploadFile($image, 'images/sliders', $imageName)->resize(636,852);
            }
            $this->aboutModel::create([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'description' => $request->description,
                'short_description' => $request->short_description,
                'image' => (isset($imageName)) ? $imageName : null
            ]);
            $message = array(
                'message' => 'About is Added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('about.index')->with($message);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($aboutId)
    {
        $about = $this->getAboutById($aboutId);
        return view('dashboard.about.edit', compact('about'));
    }

    public function update($request)
    {
        try {
            $about = $this->getAboutById($request->aboutId);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->hashName();
                $this->uploadFile($image, 'images/about', $imageName, 'storage/images/about/' . $about->image);
            }
            $about->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'description' => $request->description,
                'short_description' => $request->short_description,
                'image' => (isset($imageName)) ? $imageName : $about->image
            ]);
            $message = array(
                'message' => 'about is Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('about.index')->with($message);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function aboutImagesIndex()
    {
        $aboutImages = $this->AboutImageModel::get();
        return view('dashboard.aboutImages.index', compact('aboutImages'));
    }

    public function createMultipleImages()
    {
        return view('dashboard.aboutImages.create');
    }

    public function addMultipleImages($request)
    {
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($images as $image) {
                $imageName = $image->hashName();
                Image::make($image)->resize(636, 852)->save('storage/images/about/' . $imageName);

                $this->AboutImageModel::create([
                    'image' =>  $imageName
                ]);
            }
            $message = array(
                'message' => 'About Image is Added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('about.images.index')->with($message);
        }
    }

    public function editMultipleImages($aboutImageId)
    {
        $aboutImage = $this->AboutImageModel::findOrfail($aboutImageId);
        return view('dashboard.aboutImages.edit', compact('aboutImage'));
    }


    public function updateMultipleImages($request)
    {
        $aboutImage = $this->AboutImageModel::findOrfail($request->aboutImageId);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->hashName();
            $this->uploadFile($image, 'images/about', $imageName, 'storage/images/about/' . $aboutImage->image);

            $aboutImage->update([
                'image' =>  $imageName
            ]);
        }

        $message = array(
            'message' => 'About Image is Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('about.images.index')->with($message);
    }

    public function destroyMultipleImages($aboutImageId)
    {
        $aboutImage = $this->AboutImageModel::findOrfail($aboutImageId);
        $aboutImage->delete();
        $this->deleteFile('storage/images/about/' . $aboutImage->image);
        $message = array(
            'message' => 'About Image is Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('about.images.index')->with($message);
    }



}
