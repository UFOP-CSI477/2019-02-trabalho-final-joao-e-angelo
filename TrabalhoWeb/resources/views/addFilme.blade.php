<div class="container">
    <h3 class="center">Adicionar Curso</h3>
    <div class="row">
    <form class="" action="{{route('addFilme.salvar')}}" method="post">
        {{ csrf_field() }}
        <div class="input-field">
            <input type="text" name="titulo">
            <label>Título</label>
          </div>
          
          <div class="input-field">
            <input type="text" name="descricao">
            <label>Descrição</label>
          </div>
          
          <div class="input-field">
            <input type="text" name="genero">
            <label>genero</label>
          </div>

          <div class="input-field">
            <input type="text" name="cIndicativa">
            <label>Classificação Indicativa</label>
          </div>

          <div class="input-field">
            <input type="text" name="nota">
            <label>Nota</label>
          </div>
          
          <div class="file-field  input-field">
          
            <div class="btn blue">
              <span>Imagem</span>
              <input type="file" name="foto">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
          </div>
          @if(isset($registro->imagem))
          <div class="input-field">
            <img width="150" src="{{asset($registro->imagem)}}" />
          </div>
          @endif
          
          
          
        <button class="btn deep-orange" type="submit">Salvar</button>
      </form>
    </div>
  </div>