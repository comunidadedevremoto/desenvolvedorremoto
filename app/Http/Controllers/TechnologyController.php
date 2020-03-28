<?php

namespace App\Http\Controllers;

use App\Technology;

use App\Http\Requests\StoreTechnology as RequestsStoreTechnology;

class TechnologyController extends Controller
{
    private $model;

    public function __construct() {
        $this->model = new Technology();
    }

    function store(RequestsStoreTechnology $request) {
       return $this->model->store($request->input());
    }
}
