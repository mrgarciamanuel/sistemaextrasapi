<?php 
    $db_user = "garciamanuel";
    $db_password = "ceciliaJoao01";
    $db_name = "sistemaextras";
    $servername = "extra-workers-server.mysql.database.azure.com";

    $db = new PDO ("mysql:host=$servername; dbname=$db_name", $db_user, $db_password);

     //attributes
     $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
     $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     define('APP_NAME', 'PHP SISTEMA EXTRAS REST API');

     echo "Conexão feita";

?>