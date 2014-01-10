<div class="tab-conteudo" id="tabs5">
	<h3>Gerenciamento de páginas</h3>

  <ul class="nav nav-tabs" id="myTab">
    <li class="active"><a data-toggle="tab" href="#listaPaginas">Listagem de páginas</a></li>
    <li><a data-toggle="tab" href="#edicaoPaginas">Edição</a></li>
  </ul>

<div class="tab-content">

  <!-- Parte responsável pela listagem de páginas de determinado portal -->
  <div class="tab-pane active" id="listaPaginas">
  	<h4>Lista de páginas existentes em cada portal</h4>
  	<hr>
  	
  		<div class="form-group">
        	<label for="diretorio" class="col-lg-2 control-label">Escolha o portal</label>
        	<div class="col-lg-10">
			  	<select class="form-control" name="listaPaginas">

			        <!-- seleciona todos os portals em que o usuário é admin -->
			        <?php foreach ($query->result() as $row): ?>
			        	<?php if ($row->admin == $username) { ?>
			                <option value="<?php echo $row->url; ?>"><?php echo $row->nome; ?></option>
			            <?php } ?>
			        <?php endforeach; ?>

			    </select>
			    <br />
          <button class="btn btn-default" id="btn-show">
            <span class="glyphicon glyphicon-search"></span> Exibir
          </button>
			</div>
		</div>
      
      <div class="tab-pane" id="paginas">
    <div class="panel panel-default" id="show">
      <div class="panel-heading">
        <h3 class="panel-title">Páginas</h3>
      </div>
      <div class="panel-body">
      <?php
        foreach ($paginas as $rows) { 
          echo $rows->nome."<br>";
        }
      ?>
      </div>
      </div>
  </div>



    <hr />

  </div>
  <!-- Fim listagem -->
</div>

</div>