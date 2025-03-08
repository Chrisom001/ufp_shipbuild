$(document).ready(function() {
    $('#shipTierSelector').change(function() {
        var selectedValue = $(this).val();

        $.ajax({
            url: 'scripts/getoptions.php',
            type: 'POST',
            data: { value: selectedValue },
            success: function(response) {
                $('#shipSelector').html(response);
            }
        });
    });
});