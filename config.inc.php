<?php

  $strAPIKey = 'XXXXXXXXXXXXXXXXXX';
  $strApiWsdlUrl = 'https://deinserver.de/gsales/api/api.php?wsdl';
  ini_set("soap.wsdl_cache_enabled", "0");
  
  $token = 'geheim'; // Token zur Authentifizierung
  $ownhost = 'deinedomain.de'; // Hostname deines Servers zur Authentifizierung
    
  $user = 'username'; // Benutzername SMS Dienst
  $pass = 'password'; // Passwort SMS Dienst
  
  $sms_from = '01710000000'; // Absender Rufnummer

  // URL des SMS Dienstes
  $url = "https://sdp.easybell.de/SMSGateway/smsgateway?username=$user&passwort=$pass&message=$message&to=$to&from=$sms_from"; 

?>
