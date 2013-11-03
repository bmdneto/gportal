<div class="tab-conteudo" id="tabs2">
	<h3>Gerenciamento de portais</h3>
	<ul class="nav nav-tabs" id="myTab">
    <li class="active"><a data-toggle="tab" href="#listaPortal">Lista de Portais</a></li>
    <li><a data-toggle="tab" href="#criarPortal">Criar Portais</a></li>

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
          <th>Ações</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td>1</td>
          <td>Portal 1</td> <!-- Puxar informações do BD -->
          <td><a href="#">/ben10/pessoal/</a></td>
          <td>bmdneto</td>
          <td>
            <span class="glyphicon glyphicon-edit"></span>
            <span class="glyphicon glyphicon-trash"></span>
          </td>
        </tr>
        
        <?php foreach ($query as $row): ?>
        <tr>
          <td><?php echo $row->id_portal; ?></td>
          <td><?php echo $row->nome; ?></td>
          <td><?php echo $row->url; ?></td>
          <td>bmdneto</td>
          <td>
            <span class="glyphicon glyphicon-edit"></span>
            <span class="glyphicon glyphicon-trash"></span>
          </td>
        </tr>
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

    <form class="form-horizontal" role="form" action="index.php/Gerencia_portal" method="POST">

      <div class="form-group">
        <label for="nomePortal" class="col-lg-2 control-label">Nome do Portal</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="nomePortal" placeholder="Nome do portal">
        </div>
      </div>

      <div class="form-group">
        <label for="descricaoPortal" class="col-lg-2 control-label">Descrição</label>
        <div class="col-lg-10">
          <textarea class="form-control" rows="3" name="descPortal" placeholder="Descrição do portal"></textarea>
        </div>
      </div>

      <!-- botão -->
      <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
          <button type="submit" name="botaoEnviar" class="btn btn-default">Enviar solicitação</button>
        </div>
      </div>

    </form>

  </div>
  <!-- Fim da criação de portais -->

  <div class="tab-pane" id="templates">...</div>
  <div class="tab-pane" id="configuracoes">...</div>
</div>

</div>