 <?php
$file_name=$_SERVER['HTTP_HOST'];
$name =   "http://".$file_name."/does.svn/public";
header( "location: $name" );
exit(0);
?>