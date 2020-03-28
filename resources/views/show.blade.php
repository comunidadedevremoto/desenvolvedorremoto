@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Visualizar</div>
                <div class="card-body">
                    <ul class="list-group">
                        Id: {{$technology->id}}<br>
                        Nome: {{$technology->name}}<br>
                        Descrição: {{$technology->description}}<br>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
