@extends('principal')

@section('conteudo')
<div class="container-fluid">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titulo</th>
                <th scope="col">Gênero</th>
                <th scope="col">Classificação Indicativa</th>
            </tr>
        </thead>
        <tbody>  
            @foreach ($filmesDaLista as $f)
            <tr>
                <td>{{$f->filmeId}}</td>
                <td>{{$f->titulo}}</td>
                <td>{{$f->genero}}</td>
                <td>{{$f->cIndicativa}}</td>
                <td><a class="btn deep-orange" href="{{ route('deletar.filmes.lista',$f->filmeId) }}">Deletar</a></td>
            </tr>        
            @endforeach
        </tbody>
    </table>
</div>

@endsection