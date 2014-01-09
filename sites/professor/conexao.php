<?php
    mysql_connect("localhost", "igor", "152040mr") or die("Não foi possível conectar: " . mysql_error());
      
    mysql_select_db("g_portais");

    $query = "SELECT * FROM usuarios_teste WHERE username='igor'";
    $query_info = "SELECT * FROM portais_teste WHERE admin='igor'";

    $result = mysql_query($query) or die(mysql_error());
    $result_info = mysql_query($query_info) or die(mysql_error());

    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $row_info = mysql_fetch_array($result_info, MYSQL_ASSOC);
      
    mysql_free_result($result);
?>