<?php
session_start();
	$mysql_host = "localhost";
	$mysql_database = "es-db";
	$mysql_user = "root";
	$mysql_password = "";

	$db = mysql_connect($mysql_host,$mysql_user,$mysql_password);
	mysql_connect($mysql_host,$mysql_user,$mysql_password);
	mysql_select_db($mysql_database);
	
	extract($_POST);
	$user_id = $_SESSION['uid'];

	// check if the user has already clicked on the unlike (rate = 2) or the like (rate = 1)
		$dislike_sql = mysql_query('SELECT COUNT(*) FROM  event_rate WHERE id_user = "'.$user_id.'" and id_event = "'.$eventID.'" and rate = 2 ');
		$dislike_count = mysql_result($dislike_sql, 0); 

		$like_sql = mysql_query('SELECT COUNT(*) FROM  event_rate WHERE id_user = "'.$user_id.'" and id_event = "'.$eventID.'" and rate = 1 ');
		$like_count = mysql_result($like_sql, 0); 

	if($act == 'like'): //if the user click on "like"
		if(($like_count == 0) && ($dislike_count == 0)){
			mysql_query('INSERT INTO event_rate (id_event, id_user, rate )VALUES("'.$eventID.'", "'.$user_id.'", "1")');
		}
		if($dislike_count == 1){
			mysql_query('UPDATE event_rate SET rate = 1 WHERE id_event = '.$eventID.' and id_user ="'.$user_id.'"');
		}

	endif;
	if($act == 'dislike'): //if the user click on "dislike"
		if(($like_count == 0) && ($dislike_count == 0)){
			mysql_query('INSERT INTO event_rate (id_event, id_user, rate )VALUES("'.$eventID.'", "'.$user_id.'", "2")');
		}
		if($like_count == 1){
			mysql_query('UPDATE event_rate SET rate = 2 WHERE id_event = '.$eventID.' and id_user ="'.$user_id.'"');
		}

	endif;

    // count all the rate 
    $rate_all_count = mysql_query('SELECT COUNT(*) FROM  event_rate WHERE id_event = "'.$eventID.'"');
    $rate_all_count = mysql_result($rate_all_count, 0);  

    $rate_like_count = mysql_query('SELECT COUNT(*) FROM  event_rate WHERE id_event = "'.$eventID.'" and rate = 1');
    $rate_like_count = mysql_result($rate_like_count, 0);  

    //$rate_like_percent = percent($rate_like_count, $rate_all_count);
    if ($rate_like_count != 0) {
    	$count1 = $rate_like_count / $rate_all_count;
        $count2 = $count1 * 100;
        $count = number_format($count2, 0);
        $rate_like_percent = $count;
    }					        

    $rate_dislike_count = mysql_query('SELECT COUNT(*) FROM  event_rate WHERE id_event = "'.$eventID.'" and rate = 2');
    $rate_dislike_count = mysql_result($rate_dislike_count, 0);  

    //$rate_dislike_percent = percent($rate_dislike_count, $rate_all_count);
    if ($rate_dislike_count != 0) {
        $count1 = $rate_dislike_count / $rate_all_count;
        $count2 = $count1 * 100;
        $count = number_format($count2, 0);
        $rate_dislike_percent = $count;
    }

    if(!mysql_errno()){

?>

<div class="stat-cnt">
    <div class="rate-count"><?php echo $rate_all_count; ?></div>
    <div class="stat-bar">
        <div class="bg-green" style="width:<?php echo $rate_like_percent; ?>%;"></div>
        <div class="bg-red" style="width:<?php echo $rate_dislike_percent; ?>%"></div>
    </div><!-- stat-bar -->
    <div class="dislike-count"><?php echo $rate_dislike_count; ?></div>
    <div class="like-count"><?php echo $rate_like_count; ?></div>
</div>

<?php } ?>