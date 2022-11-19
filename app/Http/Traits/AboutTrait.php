<?php
namespace App\Http\Traits;

trait AboutTrait {

    public function getAllAbout()
    {
        return $this->aboutModel::get();
    }

    public function getAboutById($aboutId)
    {
        return $this->aboutModel::findOrFail($aboutId);
    }
}
