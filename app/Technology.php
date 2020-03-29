<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Technology extends Model
{
    protected $fillable = ['name', 'description'];

    public function allTechnologies() {
        return $this->all();
    }

    public function store(array $data) {
        return $this->create($data);
    }

    public function show($id) {
        return $this->findOrFail($id);
    }

    public function destroyTechnology($id) {
        $technology = $this->findOrFail($id);
        return $this->destroy($technology->id);
    }

    public function edit($data, $id) {
        $technology = $this->findOrFail($id);
        $technology->name = $data['name'];
        $technology->description = $data['description'];
        $technology->save();
        return $technology;
    }

    public function findOrFail($id) {
        $data = $this->find($id);
        if (is_null($data)) {
            throw new ModelNotFoundException("Tecnologia não encontrada.", 404);
        }
        return $data;
    }
}
