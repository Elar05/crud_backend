<?php

class Conexion 
{
    /*Get ip adress from a dns
Resolve-DnsName -Name {dpg-ca74hvsobjd80oe3a8i0-a.oregon-postgres.render.com}
*/
$dbconn = pg_connect("host=35.227.164.209 dbname=crud_dyxv user=slapfi password=JKhIurpIEb0nSJu4EzOQaHjkStmgrT3b");
//connect to a database named "postgres" on the host "host" with a username and password  
if ($dbconn) {
    echo "correcto";
} else {
    echo "no funciono";
}
}
