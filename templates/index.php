<?php
if(isset($_POST['submit'])) {
	
	echo '<div style="font-size:23px; color:red; margin-top:40px;">Changes are saved</div>';
}
?>

<h3>Modal Alert Popup Settings</h3>
<form action="options-general.php?page=popup_alert" method="post" name="">
	
<input type="checkbox"/ name="book" id="myCheck2"  onclick="myFunction2">  Show Popup on Book Custom Post Type <br /><br />

<input type="checkbox"/ name="book">  Show Popup on Test Custom Post Type<br /><br /> 

<input type="checkbox"/ name="book">  Show Popup on Company Custom Post Type<br /><br />

<input type="checkbox"/ name="status" value="1">  Show Popup on Posts<br /><br />

<input type="checkbox"/ name="book">  Show Popup on Pages <br /><br /><br />



<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script-->
<!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script-->
<script>
function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("text");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
	
function myFunction2() {
  var checkBox = document.getElementById("myCheck2");
  var text2 = document.getElementById("text2");
  if (checkBox.checked == true){
    text2.style.display = "block";
  } else {
     text2.style.display = "none";
  }
}
	
	
	
    $(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").show();
            } else {
                $("#dvPassport").hide();
            }
        });
    });
</script>
	
	
</script>



<?php






global $wpdb;

 

$items = get_posts( array (  
                                'post_type' => 'post',  
                                'posts_per_page' => -1  
));
if ($status = 1) {
foreach($items as $item) {
	
echo '<input type="checkbox" value="'.$item->ID.'" name="'.$field_related['id'].'[]" id="'.$item->ID.'"',$meta_related && in_array($item->ID, $meta_related) ? ' checked="checked"' : '',' /> 
<label for="'.$item->ID.'" >'.$item->post_title.'</label><br />';  
} } // end foreach



$items = get_posts( array (  
                                'post_type' => 'book',  
                                'posts_per_page' => -1  
)); 
if(!empty($_POST['status'])) {
foreach($items as $item) {
	
echo '<input type="checkbox"  value="'.$item->ID.'" name="'.$field_related['id'].'[]" id="'.$item->ID.'"',$meta_related && in_array($item->ID, $meta_related) ? ' checked="checked"' : '',' />  
<label for="'.$item->ID.'" >'.$item->post_title.'</label><br />';  
}  }// end foreach

?>



<br /><br /><br /><br /><br /><br /><br /><br /><br />
<input type="submit" class="button" name="submit" value="Save Changes">
</form>
