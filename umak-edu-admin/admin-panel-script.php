
<script>
$(document).ready(function(){
  
    $("#add-user").hide();
  
});


$(document).ready(function(){
  $("#btnadduser").click(function(){
   
    $("#add-user").fadeToggle(500);
  
  });
});

</script>


<?php if($_SESSION["updatemessage"]!=""){?>
<script>
     $(document).ready(function()
     {

  		 $("#message").fadeOut(5000);
     });
  	 
</script>


<div class="fade-message" id="message">
	<center>
		<p class="fade-message-text"> <?php echo$_SESSION["updatemessage"]." ";?><span class="glyphicon glyphicon-refresh"></p>
	</center>	
</div>

<?php $_SESSION["updatemessage"]=""; }?>


<!--========LIVE SEARCH==============-->
<script>
function showUser(str) {
    if (str == "") {
        //document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }

        }
        xmlhttp.open("GET","live-search.php?q="+str,true);
        xmlhttp.send();
    }

	  
	$(document).ready(function(){
	  
  	   $("#firstload").fadeOut(500);
	});



}
</script>

<!--========END OF LIVE SEARCH==============-->

