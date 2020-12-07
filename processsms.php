<?php

  include('config.inc.php');

if($_SERVER['HTTP_HOST'] == $ownhost) {

  $to = $_POST['to']; 
  $comment = "SMS Versand an $to erfolgreich: " . $_POST['message'];
  $message = urlencode($_POST['message']);
  $cid = $_POST['cid'];
  
  $open = file_get_contents($url);

  $arrayCreateComment = array('sub'=>'subcustomer', 'recordid'=>$cid, 'comment'=>$comment);
  $client = new soapclient($strApiWsdlUrl);

  switch ($open) {
    case 10:
      echo "$open: Zielrufnummer inkorrekt";
      break;
    case 20:
      echo "$open: Absender inkorrekt";
      break;
    case 30:
      echo "$open: Nachrichtenfehler";
      break;
    case 31:
      echo "$open: Nachrichtenfehler";
      break;
    case 40:
      echo "$open: Netzwerkfehler";
      break;
    case 50:
      echo "$open: Interner Fehler";
      break;
    case 60:
      echo "$open: Interner Fehler";
      break;
    case 70:
      echo "$open: Netzwerkfehler";
      break;
    case 71:
      echo "$open: Netzwerkfehler";
      break;
    case 80:
      echo "$open: Netzwerkfehler";
      break;
    case 100:
      $client->CreateComment($strAPIKey,$arrayCreateComment);
      echo "$open: Erfolgreich";
      break;
    case 407:
      echo "$open: Authorisation fehlgeschlagen";
      break;
    case 603:
      echo "$open: Ziel gesperrt";
      break;
    case 408:
      echo "$open: Zeitüberschreitung";
      break;
    case 403:
      echo "$open: Ziel gesperrt";
      break;
    case 999:
      echo "$open: anderer Fehler";
      break;
  }

} 
   
?>
