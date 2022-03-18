<script>
    function comment(){
    var post_content = $('#post_content').val();
    var page_post = $('#page_post').val();

    if (post_content == '') {
      alert('Your comment field is empty');
      $('#post_content').css('border-color', 'red');
      $('#post_content').focus();
       return false;
    }
     else{
            $.ajax({
            type:'POST',
            url:'action_data.php',
            data:'form_data=1&post_content='+post_content+'&page_post='+page_post,
            success:function(data){                               
                $('#post_content').val('');                
                  alert('Comment has been added');           
                 location.reload(); 
                 fetch_post();
                             
            }
        });
        
     
    }
  }

  fetch_post();

    function fetch_post()
    {
       var fetch_post = 'fetch_post';
       var page_post = '<?php echo $page_post; ?>';
       $.ajax({
            url:'action_data.php',
            method:"POST",
            //data:{action:action},
            data:'fetch_data=1&fetch_post='+fetch_post+'&page_post='+page_post,
            success:function(data)
            {
                $('#post_list').html(data);
            }
       })
    }

 
 </script> 