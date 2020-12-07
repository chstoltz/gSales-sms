# gSales-sms
Einfaches PHP Script um aus gSales heraus SMS an Kunden zu schicken. Nützlich zur Bestätigung von Terminen.

Beispielprovider für den SMS Versand: easybell

Wenn die SMS erfolgreich verschickt wurde, erstellt das Script automatisch einen Kommentar für den Kunden, damit später nachvollzogen werden kann, ob und wann eine SMS an den Kunden verschickt wurde.

# Anpassungen in gSales:

Datei lib/tpl/subcustomer/subShowCustomer.tpl:
```html
Im ersten <ul> Block (Zeile 18) am Ende einen <li> Eintrag hinzufügen:
  
  <li><a href="#sms"><span>SMS</span></a></li>
  
Suchen nach <div id="docs"> und nach </div> folgenden <div> Container hinzufügen

<div id="sms">
   <h3>SMS Versand</h3>
   {if $cdata.cellular != ''}
     <a href="/pfadzur/sendsms.php?p=token&to={$cdata.cellular}&cid={$cdata.id}" target="_blank" onclick="window.open(this.href,this.target,'width=640,height=480'); return false;">Neue SMS</a> an {$cdata.cellular}<br />
   {/if}
   {if $cdata.cellular == ''}
     Keine Mobilfunknummer hinterlegt!
   {/if}
 </div>
```
Statt token bitte den selbst gewählten Token der config.inc.php einfügen.

