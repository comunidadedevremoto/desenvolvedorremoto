<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Technology as AppTechnology;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class TechnologyApiController extends Controller
{
    private $model;

    public function __construct() {
        $this->middleware('auth');
        $this->model = new AppTechnology();
    }

    function store(Request $request) {
        return $this->model->store($request->input());
    }

    function show($id) {
        return $this->model->show($id);
    }

    function update(Request $request, $id) {
        return $this->model->edit($request->input(), $id);
    }

    function destroy($id) {
        $this->model->destroyTechnology($id);
        return ['message'=> 'Tecnologia excluída com sucesso.'];
    }
}
