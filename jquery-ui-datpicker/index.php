<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <style>
    .event a {
    background-color: #5FBA7D !important;
    color: #ffffff !important;
}
    </style>
</head>

<body>
   <?php
    $conn = mysqli_connect('localhost','root','','forumui');
    $q = mysqli_query($conn, "select date from chatrooms");
    if(mysqli_num_rows($q)){

    ?>
   Date: <input type="text" id="datepicker" placeholder="select date">
    
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script>
        $(function() {
            // An array of dates
            var eventDates = {};
            <?php
                foreach($q as $rows){
					$date = $rows['date'];
					$new_format = explode('-',$date);
					$yy = $new_format[0];
					$mm = $new_format[1];
					$dd = $new_format[2];
            ?>
			//eventDates[ new Date( '03/12/2022' )] = new Date( '03/03/2022' );
			//eventDates[ new Date( '03/18/2022' )] = new Date( '03/03/2022' );
			//eventDates[ new Date( '03/23/2022' )] = new Date( '03/03/2022' );
			
			eventDates[ new Date( '<?php echo $yy;?>/<?php echo $mm;?>/<?php echo $dd;?>' )] = new Date( '<?php echo $yy;?>/<?php echo $mm;?>/<?php echo $dd;?>' );
			
            
            <?php } } ?>

            // datepicker
            $('#datepicker').datepicker({
				dateFormat: 'yy-mm-dd',
                beforeShowDay: function(date) {
                    var highlight = eventDates[date];
                    if (highlight) {
                        return [true, "event", 'Select date to see chat conversation'];
                    } else {
                        return [true, '', ''];
                    }
                }
            });
        });
    </script>
</body>

</html>