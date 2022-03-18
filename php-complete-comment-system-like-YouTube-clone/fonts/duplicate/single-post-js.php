<script>  
  
$(document).ready(function(){
//disable comment button on empty field 
$('input[type="submit"]').attr('disabled', true);    
    $('textarea').on('keyup',function() {
        var textarea_value = $("#post_content").val();
        
        if(textarea_value != '') {
            $('input[type="submit"]').attr('disabled', false);
                $('#cancel_comment').show();
                
        } else {
            $('input[type="submit"]').attr('disabled', true);
                $('#cancel_comment').hide(); 
                
        }
    });

//clear textarea and hide cancel button
$('#cancel_comment').click(function() {
  $('#post_content').val('');
  $('input[type="submit"]').attr('disabled', true);
  $('#cancel_comment').hide(); 
});
   
 $('#post_form').on('submit', function(event){    
        event.preventDefault();
        if($('#post_content').val() == '')
        {
            alert('Your comment field is empty!');
             $('#post_content').focus();
             return false;
        }
        else
        {
            var form_data = $(this).serialize();
            $.ajax({
                url:"action.php",
                method:"POST",
                data:form_data,                
                success:function(data)
                {    
                    $('#post_form')[0].reset();
                    fetch_post();

                }
            })
        }
    });

    fetch_post();

    function fetch_post()
    { 
       var action = 'fetch_post';
       var page_post = '<?php echo $page_post; ?>';
            $.ajax({
            url:'action.php',
            method:"POST",
            data:{action:action, page_post:page_post},
            success:function(data)
            {           
                $('#post_list').html(data);
                //In other to fetch older comments in order                
                fetch_oldest(); 

            }
       })
    }

   //I will get to see if this code is useful for this comment system
    $(document).on('click', '.action_button', function(){
        var sender_id = $(this).data('sender_id');
        var action = $(this).data('action');
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{sender_id:sender_id, action:action},
            success:function(data)
            {
                fetch_user();
                fetch_post();
            }
        })
    });

    var post_id;
    var email;

    $(document).on('click', '.post_comment', function(){
        post_id = $(this).attr('id');
        email = $(this).data('email');
        var action = 'fetch_comment';
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{post_id:post_id, email:email, action:action},
            success:function(data){
                $('#old_comment'+post_id).html(data);
                $('#comment_form'+post_id).slideToggle('slow');
            }
        })
        
    });

   
    $(document).on('click', '.submit_comment', function(event){
      event.preventDefault();
        var comment = $('#comment'+post_id).val();
        var action = 'submit_comment';
        var receiver_id = email;
        if(comment != '')
        {
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{post_id:post_id,receiver_id:receiver_id,comment:comment,action:action},
                success:function(data)
                {  
                     fetch_post();  
                  
             $('#comment_form'+post_id).slideToggle('fast');               
                   
                }
            })
        }
        else {
              alert('Your reply field is empty!');
                 $('.focusReply').focus();
                 return false;
        }
    });

       
  $(document).on('mouseenter', '.target_border', function(){      
       var showIcon = this.id;
       $('.showIcon'+showIcon).show();
   $(document).on('mouseleave', '.target_border', function(){      
       $('.showIcon'+showIcon).hide();
});
});

    $(document).on('mouseenter', '.target_border_reply', function(){      
       var showIcon = this.id;
       $('.showIcon2'+showIcon).show();
   $(document).on('mouseleave', '.target_border_reply', function(){      
       $('.showIcon2'+showIcon).hide();
});
});

 $(document).on('click', '.delete', function(event){
     event.preventDefault();
        if(confirm('Delete your comment permanently?')){ 
           
            var del_id = $(this).attr('id');
            $.ajax({
                type:'POST',
                url:'delete_comment.php',
                data:'delete_id='+del_id,
                success: function(data)
                {  
                   //confirmation of deletion                
                     $(".hideComment"+del_id).hide('slow');                  
                }
            });
             }     
        });



 //Edit Comment 

 $(document).on('click', '.edit', function(event){
     event.preventDefault(); 
  var del_id = $(this).attr('id'); 
    $('.hide_edit'+del_id).hide(); //hides the like and reply button 
    $('#message_' + del_id ).show();     

var currentMessage = $("#message_" + del_id + " .message-content").html();
var editText = '<div class="contact-form-area"><form id="post_form2"><div class="row"><div class="col-12"><textarea name="post_content2" id="post_content'+del_id+'" class="edit_comment">'+currentMessage+'</textarea></div><div class="col-12"><input type="hidden" class="id_content" id="'+del_id+'" /><button type="button" class="cancel btn vizew-btn" style="float:left;" data-message="'+currentMessage+'" id="'+del_id+'"> Cancel</button> <button type="button" class="save btn vizew-btn" id="'+del_id+'" style="float:right;"> Save</button></div></div></form></div>';

   $("#message_" + del_id + " .message-content").html(editText);
   $('#post_content'+del_id).focus();

//Auto adjust textarea height with input
   $(".edit_comment").keyup(function (e) {
    autoheight(this);
});
function autoheight(a) {
    if (!$(a).prop('scrollTop')) {
        do {
            var b = $(a).prop('scrollHeight');
            var h = $(a).height();
            $(a).height(h - 5);
        }
        while (b && (b != $(a).prop('scrollHeight')));
    };
    $(a).height($(a).prop('scrollHeight') + 20);
}
autoheight($(".edit_comment"));


  });

 
 $(document).on('click', '.cancel', function(event){
    event.preventDefault(); 
  var del_id = $(this).attr('id'); 
  var message = $(this).attr('data-message');

    $("#message_" + del_id + " .message-content").html(message);
    $('.hide_edit'+del_id).show(); // the like and reply button 
    $('#message_' + del_id ).hide();  
});

$(document).on('click', '.save', function(event){
    event.preventDefault(); 
    var del_id = $(this).attr('id');
  var edit_comment = $('#post_content'+del_id).val(); 
  
  if(edit_comment == '')
        {
            alert('Your comment field is empty!');
             $('#post_content'+del_id).focus();
             return false;
        }
        else
        {             
            $.ajax({
                type:'POST',
                url:'update_comment.php',
                data: {edit_id:del_id, edit_comment:edit_comment},
                success: function(msg)
                {  
                    if(msg == 'ok'){
                      //confirmation of update               
                     fetch_post();  
                    }
                    else{
                        alert('There was a problem');
                    }
                              
                }
            }); 
            
        }
    });

  $(document).on('click', '.reportPostID', function(event){
    event.preventDefault();
      var comment_postID = $(this).attr('id');
      var reported_email = $(this).attr('data-reportEmail');
      var reported_content = $(this).attr('data-content');
      var reported_user = $(this).attr('data-user');
  $('#report_btn').click(function() {
   var report_checked = $('input:radio:checked').val();
     var pageId = $(this).attr('data-pageid');

    if (!report_checked) {
  alert('Choose Report Type');
        return false;
    }
    else {
      $.ajax({
            type:'POST',
            url:'report.php',
            data:{report:report_checked, comment_postID:comment_postID, page_post:pageId, reported_email:reported_email, reported_content:reported_content, reported_user:reported_user},           
            success:function(response){
                if(response == 'ok'){     
                         $('.responseMsg').html('<span style="color:green; text-align:center;">Report Submitted!.. Under Review!</p>');
                          setTimeout(
                    function() 
                          {
                   location.reload();
                        }, 4000);
                
                }else{
                    alert('A problem occurred Try Again');
                }
               
            }
        });
    }
  });
});
  //Reload page on close of modal to prevent double report of wrong comment_postid
  $('#myModal').on('hidden.bs.modal', function () {
  location.reload();
});


  $(document).on('click', '.liked, .unliked', function(event){
    event.preventDefault();
        var id = this.id;   // Getting Button id
        var split_id = id.split("_");

        var text = split_id[0];
        var comment_id = split_id[1];  // postid
    //
        // Finding click type from the css liked or unliked
       var type = 0;
        if(text == "liked"){
            type = 1;
          // alert('1');
        }if (text == "unliked") {
            type = 0;
           // alert('0');
        }

     
        // AJAX Request
        $.ajax({
            url: 'like-cancel.php',
            type: 'post',
            data: {comment_id:comment_id,type:type},
            dataType: 'json',
            success: function(data){
                var liked = data['liked'];
                var unliked = data['unliked'];
                var NewType = data['cancel'];

                $("#likes_"+comment_id).text(liked);        // setting likes
                $("#unlikes_"+comment_id).text(unliked);    // setting unlikes

                if(type == 1){
                    $("#liked_"+comment_id).css("color","#db4437");
                    $("#unliked_"+comment_id).css("color","");
                }
                if(type == 0){
                    $("#unliked_"+comment_id).css("color","#db4437");
                    $("#liked_"+comment_id).css("color","");
                }
                 if(NewType == -1){
                    $("#unliked_"+comment_id).css("color","");
                    $("#liked_"+comment_id).css("color","");
                }                                                
               
            },
             error: function (data) {
                        alert("error : " + JSON.stringify(data));
                    }
        });

     
  
});

//Auto resize textarea to fit post content
$(".comment").keyup(function (e) {
    autoheight(this);
});
function autoheight(a) {
    if (!$(a).prop('scrollTop')) {
        do {
            var b = $(a).prop('scrollHeight');
            var h = $(a).height();
            $(a).height(h - 5);
        }
        while (b && (b != $(a).prop('scrollHeight')));
    };
    $(a).height($(a).prop('scrollHeight') + 20);
}

autoheight($(".comment"));
 
  
//Sorting starts here
$(document).on('click', '#newest', function(event){
    event.preventDefault();
   $('#older_comment').hide();
   $('#post_list').show(); 
  $('#newest').css('color', '#db4437');
  $('#oldest').css('color', '');
   location.reload();
   
  
    });

$(document).on('click', '#oldest', function(event){
    event.preventDefault(); 
 $('#post_list').detach(); //reply for oldest sort doesnt work if its hide unless its detach before it works
 $('#older_comment').show();
 $('#oldest').css('color', '#db4437');
 $('#newest').css('color', '');
  fetch_oldest();

    });

 function fetch_oldest()
    {
       var action = 'fetch_oldest';
       var page_post = '<?php echo $page_post; ?>';

       $.ajax({
            url:'sorting.php',
            method:"POST",
            data:{action:action, page_post:page_post},
             beforeSend: function() {
              $('#loader').show();
           },
            success:function(data)
            {
                $('#older_comment').html(data);
                $('#loader').hide();
            },
             error: function (data) {
                        alert("error : " + JSON.stringify(data));
                    }
       })
    }

});
</script>