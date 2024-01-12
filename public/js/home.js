
$(document).ready(function(){
    $('.form_comment').on('submit', function(e){
        e.preventDefault();
        let url = $(this).attr('action');
        let form_data = new FormData(e.target);

        $.ajax({
            type: 'post',
            url: url,
            data: form_data,
			dataType: 'JSON',
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function(){
                $('.msg_comment').css("color", "yellow").html('....Please wait');
            },
            success: function(response){
				console.log(response);

				$('.comment_row').append(response);
				$('.text_comment').val('');
                $('.msg_comment').html('');

            },
           /*  complete: function(response){
				console.log(response);
                $('.msg_comment').css("color", "green").html('Create New');
				$('.text_comment').val('');
            }, */
            error:function(){
				$('.msg_comment').css("color", "red").html('Write a comment !');
            }
        });
    });
});

 $(".cancel_comment").click(function () {
	 $('.text_comment').val('');
 });
