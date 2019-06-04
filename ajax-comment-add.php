<?php
session_start();

extract($_POST);
if($_POST['act'] == 'add-com'):
	$role = htmlentities($role);
    $uid = htmlentities($uid);
    $comment = htmlentities($comment);
 
	$mysql_host = "localhost";
	$mysql_database = "es-db";
	$mysql_user = "root";
	$mysql_password = "";

	mysql_connect($mysql_host,$mysql_user,$mysql_password);
	mysql_select_db($mysql_database); 

	if(strlen($role) <= '1'){ $role = 'Guest';}
    //insert the comment in the database
    mysql_query("INSERT INTO comments (`role`, `uid`, `comment`, `id_event`)VALUES( '$role', '$uid', '$comment', '$id_event')");
    $datetime = date("Y-m-d  g:i a");
    if(!mysql_errno()){
?>

    <div class="cmt-cnt">
    	<?php if(!$_SESSION['thumb_img']){ ?>
    	<img src="uploads/profile/profile-img.jpg" alt="" />
    	<?php } else{?>
    	<img src="uploads/profile/<?php echo $_SESSION['thumb_img']; ?>" alt="" />
    	<?php } ?>
		<div class="thecom">
	        <h5 style="text-transform:none;"><?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?></h5><span  class="com-dt"><?php echo date("F j, Y, g:i a", strtotime($datetime)); ?></span>
	        <br/>
	       	<p><?php echo $comment; ?></p>
	    </div>
	</div>

	<?php } ?>
<?php endif; ?>