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
            echo $rows->nome."<br><br>";
          }
        ?>
      </div>
      </div>
    <div class="tab-pane" id="paginas">

      <div class="panel panel-default" id="show">

        <div class="panel-heading">
          <h3 class="panel-title">Páginas</h3>  
        </div>

        <div class="panel-body">
          
          <!--
          <?php
            foreach ($paginas as $rows) { 
              echo $rows->nome."<br>";
            }
          ?>
          -->
          <br />

          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Nome da página</th>
                <th>Editar</th>
                <th>Remover</th>
              </tr>
            </thead>
            <td>id</td>
            <td>
              <?php
                foreach ($paginas as $rows) { 
                  echo $rows->nome."<br>";
                }
              ?>
            </td>
            <td></td>
            <td></td>

          </table>


          
            <button class="btn btn-default" id="addPage">Adicionar página</button>
            <br /><br />

          <form class="form-horizontal" role="form" action="Gerencia_paginas" method="POST">

            <!-- titulo da pag -->
            <div class="form-group">
              <label for="tituloPagina" class="col-lg-2 control-label">Título da Página</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" name="tituloPagina" placeholder="Título da Página" />
              </div>
            </div>

            
            <div class="form-group">
              <label for="tipoPagina" class="col-lg-2 control-label">Tipo de Página</label>
              <div class="col-lg-10">
                <select class="form-control" name="tipoPagina">
                  <option value="news">News</option>
                  <option value="galeria">Galeria</option>
                  <option value="upload">Upload</option>
                </select>
              </div>
            </div>

            <div class="form-group">
                  <label for="diretorio" class="col-lg-2 control-label">Escolha o portal</label>
                  <div class="col-lg-10">
                  

                  <select class="form-control" name="portalPagina">

                      <!-- seleciona todos os portals em que o usuário é admin -->
                      <?php foreach ($query->result() as $row): ?>
                        <?php if ($row->admin == $username) { ?>
                              <option value="<?php echo $row->url; ?>"><?php echo $row->nome; ?></option>
                          <?php } ?>
                        <?php endforeach; ?>

                  </select>
                  <br />
                  
              </div>
            </div>

            <button type="submit" name="botaoAddPage" class="btn btn-primary" >Enviar</button>

          </form>



          <!-- Formulário pada adição de páginas-->
          <form method="POST" action="Gerencia_paginas">
            


          </form>



        </div>

      </div>

    </div>



    <hr />

  </div>
  <!-- Fim listagem -->
</div>

</div>