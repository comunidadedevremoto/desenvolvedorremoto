<?php

namespace App\Http\Controllers;

use App\Technology;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $model;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->model = new Technology();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lisOfTechnologies = $this->model->allTechnologies();
        return view('home', ['tecnologies' => $lisOfTechnologies]);
    }
}
