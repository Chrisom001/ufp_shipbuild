$(document).ready(function() {
    $('#weaponRaritySelector').change(function() {
        var rarityValue = $(this).val();
        myFunction(rarityValue);
        $.ajax({
            url: 'scripts/getrarity.php',
            type: 'POST',
            data: { value: rarityValue },
            success: function(response) {
                myFunction(response);
                $('#modifierSelector').html(response);
            }
        });
    });
});

function myFunction(x) {
    alert("Value Selected: " + x);
}