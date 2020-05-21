$(document).ready(function() {

    $('.ub').on('click', function () {
        $('#upload-image').trigger('click');
        return false;
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#upload-image').on('change', function () {
        var formDataImage = new FormData();
        formDataImage.append('image', $(this)[0].files[0]);

        $.ajax({
            url: path,
            data: formDataImage,
            processData: false,
            contentType: false,
            type: 'POST',
            dataType: 'json',
            beforeSend: function() {
                // setting a timeout
                $('.overlay').css({'display':'none'});
                $('.preload').attr('style', 'display: block');
            },
            success: function (result) {
                console.log(result);
                if (result.status == 'success')
                {
                    setTimeout(function(){
                        $('.uif').attr('src', result.path);
                        $('.preload').css({'display':'none'});
                        $('.final-image').attr('style', 'display: block');
                        $('input[name="image"]').attr('value', result.file);
                    }, 2800);

                    console.log(result);
                }
            },
            error: function (result) {
                alert('Error. Please, try later28.');
                console.log(result);
            }
        });
    });

}); // $(document).ready(function()