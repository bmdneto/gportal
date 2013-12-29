<?php
//  Configurações de Conexão com o Banco De Dados 
// ==============================
$_SG['conectaServidor'] = true;    // Abre uma conexão com o servidor MySQL
$_SG['abreSessao'] = true;         // Inicia a sessão com um session_start()

$_SG['caseSensitive'] = false;     // Usar case-sensitive

$_SG['validaSempre'] = true;       // Deseja validar o usuário e a senha a cada carregamento de página

$_SG['servidor'] = 'localhost';    // Servidor MySQL

$_SG['usuario'] = 'igor';          // Usuário MySQL

$_SG['senha'] = '152040mr';                // Senha MySQL

$_SG['banco'] = 'g_portais';            // Banco de dados MySQL

//$_SG['paginaLogin'] = 'home.php'; // Página de login

//$_SG['tabela'] = 'usuarios';       // Nome da tabela onde os usuários são salvos

// ==============================



// Verifica se precisa fazer a conexão com o MySQL
	$_SG['link'] = mysql_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha']) or die("MySQL: Não foi possível conectar-se ao servidor [".$_SG['servidor']."].");
	mysql_select_db($_SG['banco'], $_SG['link']) or die("MySQL: Não foi possível conectar-se ao banco de dados [".$_SG['banco']."].");
?>