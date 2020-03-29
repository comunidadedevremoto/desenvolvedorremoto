<?php

namespace App\Http\Controllers;

use App\Technology;

use App\Http\Requests\StoreTechnology as RequestsStoreTechnology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    private $model;

    public function __construct() {
        $this->middleware('auth');
        $this->model = new Technology();
    }

    function index(){
        return view('technology-store');
    }

    function store(Request $request) {
        Technology::create($request->all());
        return redirect('home');
    }

    function show($id) {
        $technology = $this->model->find($id);
        return view('show', ['technology' => $technology]);
    }

    function edit($id) {
        $technologyEdit = $this->model->find($id);

        return view('technology-edit', ['technology' => $technologyEdit]);
    }

    public function update(Request $request, $id) {
        $true = $this->model->where(['id'=>$id])->update([
            'name'=>$request->name,
            'description'=>$request->description
        ]);
        if($true)
        {
            return redirect('home');

        }
    }

    public function destroy($id) {
        $technology = $this->model->find($id);
        $technology->delete();
        return redirect('home')->with('success', "Dado Excluido com sucesso!!");
    }
}
