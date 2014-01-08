<script type="text/javascript"></script>


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
  	
  	<form class="form-horizontal" role="form" action="Gerencia_paginas" method="POST">
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
			    <button type="submit" name="botaoListaPaginas" class="btn btn-primary" onclick="carregaItens()">
			    	<span class="glyphicon glyphicon-search"></span> Buscar páginas
			    </button>
			</div>
		</div>

    </form>
    <hr />

  </div>
  <!-- Fim listagem -->





  <div class="tab-pane" id="edicaoPaginas">Edição</div>
 
</div>

</div>