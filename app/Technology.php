<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $fillable = ['name', 'description'];

    public function store(array $data) {
        return $this->create($data);
    }
    public function show($id) {
        return $this->show($id);
    }
}
