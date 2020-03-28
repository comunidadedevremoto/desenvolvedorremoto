@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tecnologias</div>
                <div class="text-right mt-3 mb-2 mr-2">
                        <a href="">
                            <button type="button" class="btn btn-success">Cadastrar</button>
                        </a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (empty($tecnologies))
                            <ul class="list-group">
                                Nenhuma tecnologia cadastrada...
                            </ul>

                    @else

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">name</th>
                                    <th scope="col">description</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                                <tbody>
                                        @foreach ($tecnologies as $item)
                                    <tr>
                                            <th scope="row">{{$item->id}}</td>
                                            <td >{{$item->name}}</td>
                                            <td >{{$item->description}}</td>
                                            <td >
                                                <a href='{{url("technology/$item->id")}}'>
                                                    <button type="button" class="btn btn-secondary">Visualizar</button>
                                                </a>
                                                <a href="">
                                                    <button type="button" class="btn btn-info">Editar</button>
                                                </a>
                                                <a href="">
                                                    <button type="button" class="btn btn-danger">Excluir</button>
                                                </a>
                                            </td>
                                    </tr>
                                        @endforeach
                                </tbody>
                        </table>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection