<?php

namespace App\Http\Controllers;

use App\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    private $model;

    public function __construct() {
        $this->model = new Technology();
    }

    function store(Request $request) {
       return $this->model->store($request->input());
    }
}
