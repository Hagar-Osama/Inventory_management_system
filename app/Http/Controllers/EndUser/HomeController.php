<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\EndUserServices\HomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $HomeService;

    public function __construct(HomeService $HomeService)
    {
        $this->HomeService = $HomeService;
    }

    public function index()
    {
        return $this->HomeService->index();
    }

    public function aboutPage()
    {
        return $this->HomeService->aboutPage();
    }

}
