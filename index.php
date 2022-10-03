<?php
header('Access-Control-Allow-Origin: *');
	include 'CustomAnalytcs_class.php';
	$service_account_email = 'analyticspro@rugged-choir-479.iam.gserviceaccount.com';
	$key_file_location = 'MyProject-acfb11a1ebac.p12';
	$analytics = new CustomAnalytcs_class($service_account_email, $key_file_location);
	$sessiondata = $analytics->getSessonData();
	$realtimedata = $analytics->getRealtimeData();
	$anDataSession = $sessiondata['sessioncount']['rows']['0'];
	$anDataBouncRate = round($sessiondata['sessioncount']['rows']['3'],2);
	$anDataPageViews = $sessiondata['sessioncount']['rows']['6'];
	$anDataRealTime = $realtimedata['activeusers'];;

	$myObj = new \stdClass();
	$myObj->msg = 'Success';
	$myObj->real_time_visitors = $anDataRealTime;
	$myObj->bounce_rate = $anDataBouncRate;
	$myObj->page_views = $anDataPageViews;
	$myObj->tl_visitors = $anDataSession;
	$myObj->ttext = 'Hello';
	$myJSON = json_encode($myObj);
	echo $myJSON;

?>