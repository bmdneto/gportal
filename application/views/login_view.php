	<!doctype html>
<html lang="pt-br">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Titulo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="../css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="../css/principal.css">
  <link rel="stylesheet" href="../css/flags.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="body-login">
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
    <!--Abas do menu lateral-->
    <script src="js/tabs.js"></script>
    <div class="login-box">
      <div class="row">
        <div class="col-md-5 login-box">
          <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Login</h3>
              </div>
              <div class="panel-body">
              <form class="form-horizontal" role="form" method="post" action="verifylogin">
                <div class="form-group">
                  <label for="username" class="col-sm-2 control-label">Usuario</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Usuário">
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Senha</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Login</button>
                  </div>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>