<?php
include_once('autor.php');

$id = $_REQUEST['id']??'-1';
$action = $_REQUEST['action']??'show';
$suche = '%'.($_REQUEST['suche']??'').'%';

echo "<H2>Autoren</H2>";

$showform = false;
if ($action=='edit') {
  $autor = $dbh->getAutor($id);
  $showform = true;
} else if ($action=='new') {
  $autor = new TAutor;
  $showform = true;
} else if ($action=='delete') {
  $dbh->deleteAutor($id);
}

if ($showform) {
  ?>
<form method="post" action="?" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $autor->id ?>" /> 
<label for="autor">Autor: </label>
<input type="text" name="autor" value="<?php echo $autor->autor ?>" /> 
<input type="submit" value="Speichern" name="send" /> 
</form>
  <?php
  
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //in diesem Fall wurde ein Wert Autor gespeichert
  $autor = new TAutor($_REQUEST['id'], $_REQUEST['autor']);
  $dbh->saveAutor($autor);
}

$autoren = $dbh->getAutorenListe($suche);
?>
<TABLE>
<TR><TD>ID</TD><TD>Name</TD><TD><A HREF=?action=new>[new]</A></TD></TR>
<?php
foreach ($autoren as $autor) {
  ?>
  <TR>
  <TD> <?php echo $autor->id; ?> </TD>
  <TD> <?php echo $autor->autor; ?> </TD>
  <TD> <A HREF=?action=edit&id=<?php echo $autor->id; ?>> [edit]</A>
       <A HREF=?action=delete&id=<?php echo $autor->id; ?>>[delete]</A>
  </TD></TR>
  <?php
}
?>
</TABLE>
