<?php
include_once('zutat.php');

$id = $_REQUEST['id']??'-1';
$action = $_REQUEST['action']??'show';
$suche = '%'.($_REQUEST['suche']??'').'%';

echo "<H2>Zutaten</H2>";

$showform = false;
if ($action=='edit') {
  $zutat = $dbh->getZutat($id);
  $showform = true;
} else if ($action=='new') {
  $zutat = new TZutat;
  $showform = true;
} else if ($action=='delete') {
  $dbh->deleteZutat($id);
}

if ($showform) {
  ?>
 <p>
<form method="post" action="?" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $zutat->id ?>" /> 
<label for="zutat">Zutat: </label> <input type="text" name="zutat" value="<?php echo $zutat->zutat ?>" /><BR /> 
<label for="einheit">Einheit: </label> <input type="text" name="einheit" value="<?php echo $zutat->einheit ?>" /><BR /> 
<label for="art">Art: </label> <input type="text" name="art" value="<?php echo $zutat->art ?>" /><BR /> 
<input type="submit" value="Speichern" name="send" /> 
</form>
</p>
  <?php
  
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //in diesem Fall wurde ein Wert Autor gespeichert
  $zutat = new TZutat($_REQUEST['id'], $_REQUEST['zutat'], $_REQUEST['art'], $_REQUEST['einheit']);
  $dbh->saveZutat($zutat);
}

$zutaten = $dbh->getZutatenListe($suche);
?>
<TABLE border=1>
<TR><TH>ID</TH><TH>Zutat</TH><TH>Einheit</TH><TH>Art</TH><TH><A HREF=?action=new>[new]</A></TH></TR>
<?php
foreach ($zutaten as $zutat) {
  ?>
  <TR>
  <TD> <?php echo $zutat->id; ?> </TD>
  <TD> <?php echo $zutat->zutat; ?> </TD>
  <TD> <?php echo $zutat->einheit; ?> </TD>
  <TD> <?php echo $zutat->art; ?> </TD>
  <TD> <A HREF=?action=edit&id=<?php echo $zutat->id; ?>> [edit]</A>
       <A HREF=?action=delete&id=<?php echo $zutat->id; ?>>[delete]</A>
  </TD></TR>
  <?php
}
?>
</TABLE>
