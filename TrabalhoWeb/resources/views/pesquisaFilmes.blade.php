@extends('principal')

@section('conteudo')

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 col-lg-3">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="chart-area">
                        
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

@endsection