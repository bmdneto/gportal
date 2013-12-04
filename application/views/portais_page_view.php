<div class="tab-conteudo" id="tabs2">
	<h3>Gerenciamento de portais</h3>
	<ul class="nav nav-tabs" id="myTab">
    <li class="active"><a data-toggle="tab" href="#listaPortal">Lista de Portais</a></li>
    <li><a data-toggle="tab" href="#criarPortal">Criar Portais</a></li>
    <!--<li><a data-toggle="tab" href="#editaPortal">Edição de Portais</a></li>-->
    <li><a data-toggle="tab" href="#paginas">Gerenciar páginas</a></li>
    <li><a data-toggle="tab" href="#templates">Gerenciar templates</a></li>
    <li><a data-toggle="tab" href="#configuracoes">Configurações</a></li>
  </ul>

<div class="tab-content">

  <!-- Esta parte é responsável pela listagem de portais existentes -->
  <div class="tab-pane active" id="listaPortal">
    <br/>
    
    <h4>Lista de portais existentes:</h4>
    <hr/>
    
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nome do Portal</th>
          <th>URL</th>
          <th>Administradores</th>
          <th>Descrição</th>
          <th>Editar</th>
          <th>Remover</th>
        </tr>
      </thead>

      <!-- Laço que exibe os portais do controller: principal.php -->

      <?php foreach ($query->result() as $row): ?>
        <?php if ($row->admin == $username) { ?>
        <tr>
          <td><?php echo $row->id_portal; ?></td>
          <td><?php echo $row->nome; ?></td>
          <td><a href="<?php echo $row->url; ?>"><?php echo $row->url; ?></a></td>
          <td><?php echo $username; ?></td>
          <td><?php echo $row->descricao; ?></td>

          <td>
            <!-- botao editar -->
            <form class="form-horizontal" role="form" action="Gerencia_portal/Edita_portal" method="POST">
              <button class="btn btn-primary" type="submit" name="edit" value="<?php echo $row->id_portal; ?>">
                <span class="glyphicon glyphicon-edit"></span>
              </button>
            </form>

            <!--
            <a data-toggle="tab" href="#editaPortal">
              <form class="form-horizontal" role="form" action="Gerencia_portal/Edita_portal" method="POST">
                <button class="btn btn-primary" type="submit" name="botaoEditar" value="<?php echo $row->id_portal; ?>">
                  <span class="glyphicon glyphicon-edit"></span>
                  <?php echo $row->id_portal; ?>
                </button>
              </form>
            </a>
            -->

          </td>

          <td>
            <!-- botao remover -->
            <form class="form-horizontal" role="form" action="Gerencia_portal/Remove_portal" method="POST">

              <button class="btn btn-primary" type="submit" name="botaoRemover" value="<?php echo $row->id_portal; ?>">
                <input type="hidden" id="Url" name="Url" value="<?php echo $row->url; ?>">
                <span class="glyphicon glyphicon-trash"></span>
              </button>
              
            </form>
          </td>
            
            <!-- fim botao remover -->
          </td>

        </tr>
        <?php } ?>
      <?php endforeach; ?>
        
      </tbody>
    </table>

  </div>
  <!-- Fim da listagem de portais -->


  <!-- Esta parte é responsável pelo formulário de criação de portais -->
  <div class="tab-pane" id="criarPortal">
  <br/>
  <h4>Formulário para criação de portais:</h4>
  <hr/>

    <form class="form-horizontal" role="form" action="Gerencia_portal" method="POST">

      <!-- Envia o usuário que está na sessão para o model_gerencia_portal -->
      <input type="hidden" id="username" name="username" value="<?php echo $username; ?>">

      <!-- nome -->
      <div class="form-group">
        <label for="nomePortal" class="col-lg-2 control-label">Nome do Portal</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="nomePortal" placeholder="Nome do portal">
        </div>
      </div>

      <!-- Seleciona o diretório em que o portal será criado -->
      <div class="form-group">
        <label for="diretorio" class="col-lg-2 control-label">Diretório</label>
        <div class="col-lg-10">

          <select class="form-control" name="diretorioPortal">
            <option value="default" selected="selected">Default</option>

            <!-- seleciona todos os portals em que o usuário é admin -->
            <?php foreach ($query->result() as $row): ?>
              <?php if ($row->admin == $username) { ?>

                <option value="<?php echo $row->url; ?>"><?php echo $row->url; ?></option>
              
              <?php } ?>
            <?php endforeach; ?>

          </select>
        </div>
      </div>

      <!-- tipo de portal 
           define o template padrão
      -->
      <div class="form-group">
        <label for="tipoPortal" class="col-lg-2 control-label">Tipo de Portal</label>
        <div class="col-lg-10">
          <select class="form-control">
            <option>Professor</option>
            <option>Projeto</option>
            <option>Página pessoal</option>
            <option>Grupo de pesquisa</option>
          </select>
        </div>
      </div>

      <!-- descricao -->
      <div class="form-group">
        <label for="descricaoPortal" class="col-lg-2 control-label">Descrição</label>
        <div class="col-lg-10">
          <textarea class="form-control" rows="3" name="descPortal" placeholder="Descrição do portal"></textarea>
        </div>
      </div>

      <!-- alerta -->
      <div class="form-group">
        <label for="alertaPortal" class="col-lg-2 control-label"></label>
        <div class="col-lg-10">          
          <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Atenção!</strong> O template inicial é padrão, caso deseje alterá-lo, é necessário editar o portal.</div>
          </div>
      </div>

      <!-- botão -->
      <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
          <button class="btn btn-default" data-toggle="modal" data-target="#myModal">
            Criar Portal
          </button>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Criar portal</h4>
            </div>
            <div class="modal-body">
              Deseja confirmar a criação do portal?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" name="botaoEnviar" class="btn btn-primary">Sim</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

    </form>

  </div>
  <!-- Fim da criação de portais -->



  <!-- Edição de portais -->
  <div class="tab-pane" id="editaPortal">
  <br/>
  <h4>Formulário para edição do portais</h4>
  <hr/>

    <form class="form-horizontal" role="form" action="Gerencia_portal/Edita_portal" method="POST">

<!--
          <?php echo $row->id_portal; ?>
          <?php echo $row->nome; ?>
          <?php echo $row->url; ?>
          <?php echo $username; ?>
          <?php echo $row->descricao; ?>
-->
      

      <!-- edita nome -->
      <div class="form-group">
        <label for="EditaNomePortal" class="col-lg-2 control-label">Novo nome do portal</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="editaNomePortal" placeholder="Novo nome do portal">
        </div>
      </div>

      <!-- muda url -->
      <div class="form-group">
        <label for="exampleInputFile" class="col-lg-2 control-label">Nova diretório</label>
        <div class="col-lg-10">
          <input type="file" id="exampleInputFile">
          <p class="help-block">Escolha o novo diretório para seu portal.</p>
        </div>
      </div>

      <!-- tipo de portal 
      define o template padrão
      -->
      <div class="form-group">
        <label for="tipoPortal" class="col-lg-2 control-label">Novo tipo de portal</label>
        <div class="col-lg-10">
          <select class="form-control">
            <option>Professor</option>
            <option>Projeto</option>
            <option>Página pessoal</option>
            <option>Grupo de pesquisa</option>
          </select>
        </div>
      </div>

      <!-- edita descricao -->
      <div class="form-group">
        <label for="editaDescricaoPortal" class="col-lg-2 control-label">Nova descrição</label>
        <div class="col-lg-10">
          <textarea class="form-control" rows="3" name="editaDescPortal" placeholder="Descrição do portal"></textarea>
        </div>
      </div>

      <!-- edita template -->
      <div class="form-group">
        <label for="editaTemplate" class="col-lg-2 control-label">Novo template</label>
        <div class="col-lg-10">
          <div class="row">
            <div class="col-sm-6 col-md-3">
              <a href="#" class="thumbnail">
                <img src="img/user-icon.png" alt="...">
              </a>
            </div>
            ...
          </div>
        </div>
      </div>
      
      <hr/>

    
      <button type="submit" name="botaoEnviarEdicao" class="btn btn-primary">Editar Portal</button>
      

    </form>

  </div>
  <!-- FIM edição de portais -->


  <div class="tab-pane" id="paginas">paginas</div>
  <div class="tab-pane" id="templates">templates</div>
  <div class="tab-pane" id="configuracoes">config</div>
</div>

