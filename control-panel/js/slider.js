
$(document).ready(function () {
    //Create slider
    $("#create").click(function (event) {
        event.preventDefault();

        //Start loading
        $('.box').jmspinner('large');
        $('.box').addClass('well');
        $('.box').css('z-index', '9999');

        if (!$('#title').val() || $('#title').val().length === 0) {

            swal({
                title: "Error!",
                text: "Please enter title..!",
                type: 'error',
                timer: 1500,
                showConfirmButton: false
            });


        } else if (!$('#image').val() || $('#image').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter  image..!",
                type: 'error',
                timer: 1500,
                showConfirmButton: false
            });
        } else if ($('#title').val().includes("'")) {
            swal({
                title: "Error!",
                text: "Sorry, Invalid character found ( ' ) in title. Please remove that character.",
                type: 'error',
                timer: 3500,
                showConfirmButton: false
            });
        } else {
            var formData = new FormData($('#form-data')[0]);
            $.ajax({
                url: "post-and-get/slider.php",
                type: "POST",
                data: formData,
                async: false,
                dataType: 'json',
                success: function (result) {


                    swal({
                        title: "Success!",
                        text: "Your data was saved successfully!.....!",
                        type: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    }, function () {
                        setTimeout(function () {
                            window.location.replace("create-slider.php");
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

    //Edit slider

    $("#update").click(function (event) {
        event.preventDefault();
        //Start loading
        $('.box').jmspinner('large');
        $('.box').addClass('well');
        $('.box').css('z-index', '9999');
        if (!$('#title').val() || $('#title').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter title..!",
                type: 'error',
                timer: 1500,
                showConfirmButton: false
            });
        } else if (!$('#image').val() || $('#image').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter  image..!",
                type: 'error',
                timer: 1500,
                showConfirmButton: false
            });
        } else if ($('#title').val().includes("'")) {
            swal({
                title: "Error!",
                text: "Sorry, Invalid character found ( ' ) in title. Please remove that character.",
                type: 'error',
                timer: 3500,
                showConfirmButton: false
            });
        } else {
            var formData = new FormData($('#form-data')[0]);
            $.ajax({
                url: "post-and-get/slider.php",
                type: "POST",
                data: formData,
                async: false,
                dataType: 'json',
                success: function (result) {
                    swal({
                        title: "Success!",
                        text: "Your data was saved successfully!.....!",
                        type: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    }, function () {
                        setTimeout(function () {
                            window.location.replace("edit-slider.php?id=" + result.id);
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
                url: "post-and-get/slider.php",
                type: "POST",
                data: formData,
                async: false,
                dataType: 'json',
                success: function (result) {
                    swal({
                        title: "Success!",
                        text: "Slider photos arranged successfully!.....!",
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

