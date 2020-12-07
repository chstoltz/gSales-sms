<?php
  
  include('config.inc.php');
  if(!isset($_GET['p'])) {
      
      echo 'Unberechtigter Zugriff!';
      
  } elseif(isset($_GET['p']) AND $_GET['p'] == $token) {
      
     $to = '0' . substr($_GET['to'],3);
     $cid = $_GET['cid'];

?>
<html>
<head>
<script src="jquery-3.5.1.min.js"></script>
<script>
// Zeilen, Wörter und Zeichen in einem Textarea zählen
window.addEventListener("DOMContentLoaded", counter);
function counter() {
 var str = document.getElementById("inhalt").value;
 var zeilen = 0;
 var pos = 0;
 while (pos !== -1) {
  zeilen++;
  pos = str.indexOf("\n", pos + 1);
 }
 var wort = str.split(" ");
 document.getElementById("zeichen").innerText = " " + (str.length + 1);
}

function changeContent() { 
  var x = document.getElementById('inhalt'); 
  x.value = "Guten Tag. Hiermit bestätige ich Ihren Termin am <Datum>, ab <Uhrzeit> Uhr. Fragen zum Termin? deine@email.de oder 022112345678.\nViele Grüße,\nDein Name"; 
} 
</script> 
</head>
<body>
<h3>SMS versenden</h3>
    <form id="myForm">
        Zielrufnummer: <?php echo $to; ?><br />
	<br />
        <input type="hidden" name="to" value="<?php echo $to; ?>">
        <input type="hidden" name="cid" value="<?php echo $cid; ?>">
        Nachricht: <a href="#" onclick="changeContent()">(Terminbestätigung)</a><br />
        <textarea id="inhalt" cols="40" rows="6" name="message" onInput="counter()"></textarea><br />
        <span id="zeichen"></span> /160
     </form>

     <button id="submitMyForm">SMS senden</button>
     <br>

     <!-- JUST SOME FEEDBACK TO LET US KNOW WHAT IS SENT -->
     <div id="console"></div>
     <script>

         $("#submitMyForm").on("click", function() {
         var dataFromForm = $('#myForm').serialize();
             $.ajax({
                 type: "POST",
                 data: dataFromForm,
                 url: "processsms.php",
                 success: function(data) {
                 $("#console").append("" + data + "<br>");
               },
               error: function(data) {
                    console.log("ERROR");
                     console.log(data);
                }
            });
        });
   </script>
<br /><br />
<center><button onclick="window.opener.location.reload();window.close()">Fenster schließen</button></center> 
  </body>
  </html>
<?php
      
  } else {
      
      echo 'Falscher Aufruf!';
      
  }

?>
