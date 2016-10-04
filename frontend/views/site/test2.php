<html>
 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

 <script type="text/javascript">

 $(document).ready(function() {

    $("#display").click(function() {                

      $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        //url: "display.php",             
        url: Url::to(['hallo']),
		
		dataType: "html",   //expect html to be returned                
        success: function(response){                    
            //$("#responsecontainer").html(response); 
            alert(response);
        }

    });
});
});

</script>

<body>
<h3 align="center">Manage Student Details</h3>
<table border="1" align="center">
   <tr>
       <td> <input type="button" id="display" value="Display All Data" /> </td>
   </tr>
</table>
<?php echo $data_isi; ?>
<div id="responsecontainer" align="center">

</div>
</body>
</html>