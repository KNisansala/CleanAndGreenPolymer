$(document).ready(function () {

    //Create 
    $("#create").click(function (event) {
        event.preventDefault();
        //Start loading
        $('.box').jmspinner('large');
        $('.box').addClass('well');
        $('.box').css('z-index', '9999');

        if (!$('#image').val() || $('#image').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter  image..!",
                type: 'error',
                timer: 1500,
                showConfirmButton: false
            });
        } else if (!$('#caption').val() || $('#caption').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter caption..!",
                type: 'error',
                timer: 1500,
                showConfirmButton: false
            });
        } else if ($('#caption').val().includes("'")) {
            swal({
                title: "Error!",
                text: "Sorry, Invalid character found ( ' ) in caption. Please remove that character.",
                type: 'error',
                timer: 3500,
                showConfirmButton: false
            });
        } else {
            var formData = new FormData($('#form-data')[0]);
            $.ajax({
                url: "post-and-get/product-photo.php",
                type: "POST",
                data: formData,
                async: false,
                dataType: 'json',
                success: function (result) {
                    swal({
                        title: "Success!",
                        text: "Your data was saved successfully!.....",
                        type: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    }, function () {
                        setTimeout(function () {
                            location.reload();
                        }, 1500);
                    });
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
        //end Loarding
        $('.box').jmspinner(false);
        $('.box').removeClass('well');
        $('.box').css('z-index', '-1111');
    });
    //update  
    $("#update").click(function (event) {
        event.preventDefault();
        //Start loading
        $('.box').jmspinner('large');
        $('.box').addClass('well');
        $('.box').css('z-index', '9999');
        if (!$('#image').val() || $('#image').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter  image..!",
                type: 'error',
                timer: 1500,
                showConfirmButton: false
            });
        } else if (!$('#caption').val() || $('#caption').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter caption..!",
                type: 'error',
                timer: 1500,
                showConfirmButton: false
            });
        } else if ($('#caption').val().includes("'")) {
            swal({
                title: "Error!",
                text: "Sorry, Invalid character found ( ' ) in caption. Please remove that character.",
                type: 'error',
                timer: 3500,
                showConfirmButton: false
            });
        } else {
            var formData = new FormData($('#form-data')[0]);
            $.ajax({
                url: "post-and-get/product-photo.php",
                type: "POST",
                data: formData,
                async: false,
                dataType: 'json',
                success: function (result) {
                    swal({
                        title: "Success!",
                        text: "Your changes saved successfully!...",
                        type: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    }, function () {
                        setTimeout(function () {
                            location.reload();
                        }, 1500);
                    });
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
        //end Loarding
        $('.box').jmspinner(false);
        $('.box').removeClass('well');
        $('.box').css('z-index', '-1111');
    });
    //arrange
    $("#arrange").click(function (event) {
        event.preventDefault();
        //Start loading
        $('.box').jmspinner('large');
        $('.box').addClass('well');
        $('.box').css('z-index', '9999');
        
            var formData = new FormData($('#form-data')[0]);
            $.ajax({
                url: "post-and-get/product-photo.php",
                type: "POST",
                data: formData,
                async: false,
                dataType: 'json',
                success: function (result) {
                    swal({
                        title: "Success!",
                        text: "Product photos arranged successfully!.....!",
                        type: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    }, function () {
                        setTimeout(function () {
                            location.reload();
                        }, 1500);
                    });
                },
                cache: false,
                contentType: false,
                processData: false
            });
        
        //end Loarding
        $('.box').jmspinner(false);
        $('.box').removeClass('well');
        $('.box').css('z-index', '-1111');
    });
});
