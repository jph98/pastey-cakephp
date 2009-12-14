<?php

include ("dbinfo.inc.php");

$connect = mysql_connect($host, $user, $password);

if(!connect) {

    print "FAILURE to connect";

} else {

      $query = "SELECT * from USERS)";

      mysql_select_db($database);

      if(mysql_query($query, $connect)) {
        print "SUCCESS in db query";

      } else {
        print "FAILURE in db query";
      }

   }

   mysql_close($connect);

?>