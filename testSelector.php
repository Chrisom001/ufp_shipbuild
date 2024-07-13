<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dynamic Select Update</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<h1>Select Form Update Example</h1>
<form>
    <label for="select1">Select 1:</label>
    <select id="select1">
        <option value="">Select an option</option>
        <option value="1">Option 1</option>
        <option value="2">Option 2</option>
        <option value="3">Option 3</option>
    </select>

    <br><br>

    <label for="select2">Select 2:</label>
    <select id="select2">
        <option value="">Select an option</option>
    </select>
</form>

<script>
    $(document).ready(function() {
        $('#select1').change(function() {
            var selectedValue = $(this).val();

            $.ajax({
                url: 'scripts/getoptions.php',
                type: 'POST',
                data: { value: selectedValue },
                success: function(response) {
                    $('#select2').html(response);
                }
            });
        });
    });
</script>
</body>
</html>