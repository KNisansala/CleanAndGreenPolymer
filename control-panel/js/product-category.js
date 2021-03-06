$(document).ready(function () {

    //Create 
    $("#create").click(function (event) {
        event.preventDefault();
        //Start loading
        $('.box').jmspinner('large');
        $('.box').addClass('well');
        $('.box').css('z-index', '9999');
        if (!$('#name').val() || $('#name').val().length === 0) {
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
                text: "Please select image..!",
                type: 'error',
                timer: 1500,
                showConfirmButton: false
            });
        } else {
            var formData = new FormData($('#form-data')[0]);
            $.ajax({
                url: "post-and-get/product-category.php",
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
        if (!$('#name').val() || $('#name').val().length === 0) {
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
                text: "Please select image..!",
                type: 'error',
                timer: 1500,
                showConfirmButton: false
            });
        } else {
            var formData = new FormData($('#form-data')[0]);
            $.ajax({
                url: "post-and-get/product-category.php",
                type: "POST",
                data: formData,
                async: false,
                dataType: 'json',
                success: function (result) {
                    swal({
                        title: "Success!",
                        text: "Your data was changed successfully!.....!",
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
                url: "post-and-get/product-category.php",
                type: "POST",
                data: formData,
                async: false,
                dataType: 'json',
                success: function (result) {
                    swal({
                        title: "Success!",
                        text: "Product categories were arranged successfully!.....!",
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