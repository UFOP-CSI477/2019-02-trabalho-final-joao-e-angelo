@extends('principal')

@section('conteudo')

@foreach ($filme as $f)
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
                            
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>   
@endforeach


@endsection