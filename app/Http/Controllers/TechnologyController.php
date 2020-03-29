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

    function show($id) {
        $technology = $this->model->find($id);
        return view('show', ['technology' => $technology]);
    }

    function edit($id) {
        $technologyEdit = $this->model->find($id);

        return view('edit', ['technology' => $technologyEdit]);
    }

    public function update(RequestsStoreTechnology $request, $id) {
        $true = $this->model->where(['id'=>$id])->update([
            'name'=>$request->name,
            'description'=>$request->description
        ]);
        if($true)
        {
            return redirect('home');

        }
    }
}
