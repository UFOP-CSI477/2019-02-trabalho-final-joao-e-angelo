@extends('principal')

@section('conteudo')
<div class="container-fluid">
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Título</th>
            <th scope="col">Nota</th>
            </tr>
        </thead>
        <tbody>  
            @foreach ($listaAvaliacoes as $li)
            <tr>
                <td>{{$li->titulo}}</td>
                <td><i class="fas fa-star"></i> {{$li->avaliacao}}</td>
            </tr>        
            @endforeach
        </tbody>
    </table>
</div>
    
@endsection