

<div id="planeseat" >
<input type="button" id="seat1" class="<?= $seat1 ?>"/>
<input type="button" id="seat2" class="<?= $seat2 ?>"/>
<input type="button" id="seat3" class="<?= $seat3 ?>"/>
</div>
<?php
echo form_open('validateinfo');
if ($seat1==="green" && $seat2!=="green" && $seat3!=="green") {
	echo form_submit($seat1,"Proceed");
} else if($seat2==="green" && $seat1!=="green" && $seat3!=="green") {
	echo form_submit($seat2,"Proceed");
} else if($seat3==="green" && $seat1!=="green" && $seat2!=="green") {
	echo form_submit($seat3,"Proceed");
} else {
	echo redirect('');
}
echo form_close();

?>