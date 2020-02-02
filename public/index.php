<?php

$dbconn = pg_connect("host=localhost port=5432 dbname=phpapp");
$result = pg_query($dbconn, "SELECT * FROM schema_migrations");
$data = pg_fetch_all($result);
?>

<pre>
  <?php print_r($data); ?>
</pre>
