<?php
header('Content-type: text/json');
echo '[';
$separator = "";
$days = 16;

	echo '	{ "date": "", "type": "meeting", "title": "Test Last Year", "description": "Lorem Ipsum dolor set", "url": "http://www.event3.com/" },';
	echo '	{ "date": "", "type": "meeting", "title": "Test Next Year", "description": "Lorem Ipsum dolor set", "url": "http://www.event3.com/" },';
for ($i = 1 ; $i < 20; $i++) {
	echo $separator;
	$initTime = (intval(microtime(true))*1000) + (86400000 * ($i-($days/2)));
	echo '	{ "date": "'.$initTime.'", "type": "", "title": "", "description": "", "url": "" },';
	echo '	{ "date": "", "type": "", "title": "", "description": "", "url": "" },';

	echo '	{ "date": "", "type": "", "title": "", "description": "", "url": "" },';
	echo '	{ "date": "", "type": "", "title": "", "description": "", "url": "" },';
	echo '	{ "date": "", "type": "", "title": "", "description": "", "url": "" },';
	echo '	{ "date": "", "type": "", "title": "", "description": "", "url": "" },';
	echo '	{ "date": "", "type": "", "title": "", "description": "", "url": "" },';
	echo '	{ "date": "", "type": "", "title": "", "description": "", "url": "" },';
	echo '	{ "date": "", "type": "", "title": "", "description": "", "url": "" },';
	echo '	{ "date": "", "type": "", "title": "", "description": "", "url": "" },';
	echo '	{ "date": "", "type": "", "title": "", "description": "", "url": "" }';
	$separator = ",";
}
echo ']';
?>