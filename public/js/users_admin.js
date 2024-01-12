
$(document).ready(function(){
    $('.form_status').on('submit', function(e){
        e.preventDefault();
        let url = $(this).attr('action');
        let form_data = new FormData(e.target);
        let div = $(this).children('.div_submit');

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
            success: function(response){
                if (response['success'] == 1) {
                    div.html('<button type="submit" class="btn btn-success">On</button>');
                } else {
                    div.html(' <button type="submit" class="btn btn-danger">Off</button>');
                }
            }
        });
    });
});

