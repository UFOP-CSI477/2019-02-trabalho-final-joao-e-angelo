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
                            Id: {{$f->filmeId}}
                            <br>
                            Tútulo: {{$f->titulo}}
                            <br>
                            Descrição: {{$f->descricao}}
                            <br>
                            Gênero: {{$f->genero}}
                            <br>
                            Classificação Indicativa: {{$f->cIndicativa}}
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
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Incluir</button>
                            <p>
                            <form>
                                <select class="custom-select mr-sm-2" name="nota">
                                    
                                </select>
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Incluir</button>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>

            
        </div>
    </div> 


</form>  
@endforeach
@endsection