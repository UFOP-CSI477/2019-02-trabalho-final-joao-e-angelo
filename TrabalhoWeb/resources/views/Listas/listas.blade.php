@extends('principal')

@section('conteudo')
<div class="container-fluid">
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">ID da Lista</th>
            <th scope="col">Nome</th>
            </tr>
        </thead>
        <tbody>  
            @foreach ($listas as $l)
            <tr>
                <td>{{$l->listaId}}</td>
                <td>{{$l->nomeLista}}</td>
                <td><a class="btn deep-orange" href="{{ route('filmes.lista',$l->listaId) }}">Ir!</a></td>
                <td><a class="btn deep-orange" href="{{ route('deletar.listas',$l->listaId) }}">Deletar</a></td>
            </tr>        
            @endforeach
        </tbody>
    </table>
</div>
    
@endsection