	<div id="box">
		
		<div class="row">
			<div id="bar" class="col-md-12">

					<div class="logo">
						<a href=""><img src='img/logo.fw.png' /></a>
					</div>
					<div class="inicio">
						<span class="glyphicon glyphicon-cog"></span><a href="">Gerenciar portais</a>					</div>
					<div class="user-bar col-md-7">
						<div class="status">
							<p>Bem vindo, <?php echo $username ?></p>
						</div>
					</div>
					<div class="sair">
						<span class="glyphicon glyphicon-off"></span>
						<p><a href="principal/logout">Sair</a></p>
					</div>
			</div>
		</div>
		<div id="menu">
			<div>
				<input type="text" name="Busca" id="">
			</div>
			<ul class="tabs">
				<li class="tab">
					<span id="tabs1span" class="glyphicon glyphicon-home"></span><a href="#" class="defaulttab" rel="tabs1">Principal</a>
				</li>
				<li class="tab">
					<span id="tabs2span" class="glyphicon glyphicon-cog"></span><a href="#" rel="tabs2">Gerenciar portais</a>
				</li>
				<li class="tab">
					<span id="tabs5span" class="glyphicon glyphicon-wrench"></span><a href="#" rel="tabs5">Gerenciar páginas</a>
				</li>
				<li class="tab">
					<span id="tabs3span" class="glyphicon glyphicon-flag"></span><a href="#" rel="tabs3">Idioma do sistema</a>
				</li>
				<li class="tab">
					<span id="tabs4span" class="glyphicon glyphicon-user"></span><a href="#" rel="tabs4">Gerenciar usuarios</a>
				</li>
			</ul>
		</div>
		<div id="content-box" class="row">