@extends('principal')

@section('conteudo')
@foreach ($filme as $f)
<form method="post" action="{{route('adicionar.filmes.lista', $f->filmeId)}}">
@csrf
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-3">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="chart-area">
                            <img src="{{$f->foto}}">
                        </div>
                    </div>
                </div>  
            </div>

            <div class="col-xl-6 col-lg-3">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Descrição</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
                            Tútulo: {{$f->titulo}}
                            <br>
                            Descrição: {{$f->descricao}}
                            <br>
                            Gênero: {{$f->genero}}
                            <br>
                            Classificação Indicativa: {{$f->cIndicativa}}
                            <br>
                            {{$f->ave}} <i class="fas fa-star"></i> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Opções</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area"> 
                            
                            <select class="custom-select mr-sm-2" name="listaId">
                                @foreach ($lista as $l)
                                    <option value="{{ $l->listaId }}">{{ $l->nomeLista }}</option>
                                @endforeach
                            </select>
                            <p>
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Adicionar na Lista</button>
                            <p>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div> 
</form>  
<form action="{{route('avaliar', $f->filmeId)}}" method="post">
    <div class="container-fluid">
    @csrf
    <select class="custom-select mr-sm-2 col-xl-3" name="nota">
        <option value="1">1</option>   
        <option value="2">2</option> 
        <option value="3">3</option> 
        <option value="4">4</option> 
        <option value="5">5</option> 
    </select>
    <button class="btn btn-outline-success my-2 my-sm-0 " type="submit">Dar Nota</button>
    </div>
</form>
@endforeach
@endsection