$(document).ready(function() {
    $('#comment-form').submit(function(e) {
        e.preventDefault(); // Prevent default form submission
        var formData = $(this).serialize(); // Serialize form data
        
        $.ajax({
            type: 'POST',
            url: '../actions/make_comment.php',
            data: formData,
            success: function(response){
                // Parse JSON response
                var jsonResponse = JSON.parse(response);
                
                // Check the status
                if(jsonResponse.status === 'success') {
                    // Show success message
                    alert(jsonResponse.message);

                    // Redirect to the item page
                    var item_id = formData.id;
                    window.location.href = '../pages/item.php?id=' + item_id;
                } else {
                    // Show error message
                    alert(jsonResponse.message);
                }
            },
            error: function(xhr, status, error){
                // Handle error
                console.error(xhr.responseText);
            }
        });
    });
});
