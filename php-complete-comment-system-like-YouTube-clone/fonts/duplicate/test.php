<?php
date_default_timezone_set("Asia/Kolkata");
//date('Y-m-d H:i:s')
$time = date('2020-12-16 08:31:00');
function timeago($time, $tense='ago') {
    // declaring periods as static function var for future use
    static $periods = array('year', 'month', 'day', 'hour', 'minute', 'second');

    // checking time format
    if(!(strtotime($time)>0)) {
        return trigger_error("Wrong time format: '$time'", E_USER_ERROR); //E_USER_ERROR user defined error
    }

    // getting diff between now and time
    $now  = new DateTime('now');
    $time = new DateTime($time);
    $diff = $now->diff($time)->format('%y %m %d %h %i %s'); //to remove extra spaces
    // combining diff with periods
    $diff = explode(' ', $diff);
    $diff = array_combine($periods, $diff);
    // filtering zero periods from diff
    $diff = array_filter($diff);
    // getting first period and value
    /*The key() function simply returns the key of the array element that's currently being pointed to by the internal pointer. It does not move the pointer in any way. If the internal pointer points beyond the end of the elements list or the array is empty, key() returns null . */
    $period = key($diff); 

    $value  = current($diff); //Return the value of the current element in an array

    // if input time was equal now, value will be 0, so checking it
    if(!$value) {
    	$period = '';
    	$tense = '';
        $value  = 'just now';
    } else {
        // converting days to weeks
        if($period=='day' && $value>=7) {
            $period = 'week';
            $value  = floor($value/7); //The floor() function rounds a number DOWN to the nearest integer, if necessary, and returns the result.


        }
        // adding 's' to period for human readability
        if($value>1) {
            $period .= 's';
        }
    }

    // returning timeago
    return "$value $period $tense";
}
//$post_datetime = date('Y-m-d H:i:s');
$timeago = timeago($time);
echo $timeago;

//Just use the LIMIT clause.

//SELECT * FROM `msgtable` WHERE `cdate`='18/07/2012' LIMIT 10

//And from the next call you can do this way:

//SELECT * FROM `msgtable` WHERE `cdate`='18/07/2012' LIMIT 10 OFFSET 10


// date_default_timezone_set("Africa/Lagos");
//echo date('M-dS-Y \a\t h:i A', time())
//$test = " i am going out with you only";
//echo substr($test, 0, 7);


// how to convert number to 1k to 1M to 1B
/*
$view = 19373333;
$view = number_format($view);
$view_count = substr_count($view, ',');
if ($view_count != '0'){
    
	if ($view_count == '1') {
	     echo substr($view, 0, -4).'K';
	
	}
	elseif ($view_count == '2')
	{
	       echo substr($view, 0, -8).'M';
	
	}
	elseif($view_count == '3') 
	{
	      echo substr($view, 0, -12).'B';
	
	}
	
          }

     else {
	     echo $view;
	 }
  
 */
 ///not good one
// date_default_timezone_set("Africa/Lagos");
//echo date('M d, Y \a\t h:i a', time());

           // $date = new DateTime();
           // echo $date->format('l, F jS, Y');
		 
       /*
php code to generate referal code for my referal user code of this project
<?php
$length = 12;
$refcode   = strtoupper(substr(md5(time()), 0, $length));
  echo $refcode;
  OR
  $length = 10;
$code   =  strtoupper(substr(base_convert(sha1(uniqid(time())), 16, 36), 0, 10));
  echo $refcode;
?> 

                 $email = 'gjhwatters@gmail.com';
                   $length = 8;
                  $code   = strtoupper(substr(md5(time()), 0, $length));
				  $finalcode = '?'.$code;
				  $userrefcode = $email.$finalcode;
				  var_dump($userrefcode);
				 // $userrefcode = $email?.$code;  

				  $password = 'ojimba.watters';
				  $hash_password = password_hash($password, PASSWORD_BCRYPT);
				  var_dump($hash_password);

*/

?>
<!DOCTYPE html>
<html>
<head>
<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
  <meta charset="utf-8">
  <title>JS Bin</title>
</head>

<body>
  <form id="radio_form">
          <label><input type="radio" id="report" name="report" value="Unwanted Commercial Content or Spam"/> Unwanted Commercial Content or Spam</label><br>
    <label><input type="radio" id="report" name="report" value="Pornography or Sexually Explicit Material"/> Porno or Sexually Explicit Material</label><br>
    <label><input type="radio" id="report" name="report" value="Child Abuse"/> Child Abuse</label><br>
    <label><input type="radio" id="report" name="report" value="Hate Speech or Graphic Violence"/> Hate Speech or Graphic Violence</label><br>
    <label><input type="radio" id="report" name="report" value="Harrassment or Bullying"/> Harrassment of Bullying</label><br>
       
    
     
      <div class="modal-footer">
       <button type='button' class='btn btn-secondary btn-sm' data-dismiss="modal">
    <strong>Cancel</strong></button> 
            <button type='button' id="report_btn" class='btn btn-danger btn-sm report'>
                <strong>Report</strong></button>
          </form>     
  <script>

 $(document).ready(function(){
  $('#report_btn').click(function() {
        var report_checked = $('input:radio:checked').val();

    if (!report_checked) {
       alert('Nothing is checked!');
        return false;
    }
    else {
      alert('One of the radio buttons is checked! '+report_checked);
    }
  });
});
   </script> 
</body>
</html>
<script>
  $('#viewless').hide();
$('#viewmore').click(function(){
    var el = $('#resize01'),
        curHeight = el.height(),
        autoHeight = el.css('height', 'auto').height();
    el.height(curHeight).animate({height: autoHeight}, 500);
    $('#viewmore').hide();
    $('#viewless').show();

    $.cookie('viewmore', true);

});

$('#viewless').click(function(){
    $('#resize01').animate({height: '190'}, 500);
    $('#viewmore').show();
    $('#viewless').hide();

    $.cookie('viewmore', false);
});

if($.cookie('viewmore') == 'true'){
    $('#viewmore').click();
} else {
    $('#viewless').click();
}
</script>