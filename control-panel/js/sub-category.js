$(document).ready(function() {
    $('#category').change(function() {
        var catID = $(this).val();

        $.ajax({
            url: "post-and-get/sub-category.php",
            type: "POST",
            data: {
                category: catID,
                action: 'GETSUBCATSBYCATEGORY'
            },
            dataType: "JSON",
            success: function(jsonStr) {
                var html = '<option value=""> -- Please  Select Sub Category -- </option>';
                $.each(jsonStr, function(i, data) {
                    html += '<option value="' + data.id + '">';
                    html += data.name;
                    html += '</option>';
                });
                $('#sub-category').empty();
                $('#sub-category').append(html);
            }
        });
    });
});