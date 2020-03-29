@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">Editar</div>

                <div class="card-body">
                    <form name="formEdit" id="formEdit" method="post" action="{{url('technology/'.$technology->id.'/update')}}">
                        @method('PUT')
                        @csrf

                            <input class="form-control mt-2" type="text" name="name" id="name" placeholder="Nome:" value="{{$technology->name}}"required>
                            <input class="form-control mt-2" type="text" name="description" id="description" value="{{$technology->description ?? ''}}"placeholder="Descrição:" >
                            <input class="btn btn-primary mt-2" type="submit" value="Edit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
