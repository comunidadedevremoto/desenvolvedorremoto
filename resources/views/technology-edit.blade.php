@extends('layouts.app')

@section('content')
<div class="container">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">
            <div class="py-5 text-center">
                <h2>Editar Tecnologia</h2>
            </div>
            <div class="order-md-1">
                <form action="{{url('/technology/'.$technology->id.'/update')}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Nome:</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $technology->name }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="description">Descrição:</label>
                            <input type="text" class="form-control" name="description" id="description" value="{{ $technology->description }}">
                        </div>
                        <div class="col-md-12">
                            <div class="text-right">
                                <input type="submit" class="btn btn-success mr-2" value="Atualizar">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection