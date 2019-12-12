@extends('principal')

@section('conteudo')
<div class="container-fluid">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Gênero</th>
                <th scope="col">Classificação Indicativa</th>
            </tr>
        </thead>
        <tbody>  
            @foreach ($filmesDaLista as $f)
            <tr>
                <td>{{$f->titulo}}</td>
                <td>{{$f->genero}}</td>
                <td>{{$f->cIndicativa}}</td>
            </tr>        
            @endforeach
        </tbody>
    </table>
</div>

@endsection