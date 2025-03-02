<?php
include "model/api_rarity.php";

$options = getAllModifiers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Dropdowns with DB Options</title>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let options = <?php echo $options; ?>; // Convert PHP array to JavaScript

            document.getElementById("numDropdowns").addEventListener("change", function () {
                let num = this.value;
                let container = document.getElementById("dropdownContainer");
                container.innerHTML = ""; // Clear previous dropdowns

                for (let i = 0; i < num; i++) {
                    let select = document.createElement("select");
                    select.name = "dropdown" + (i + 1);

                    options.forEach(option => {
                        let opt = document.createElement("option");
                        opt.value = option.id;
                        opt.text = option.name;
                        select.appendChild(opt);
                    });

                    container.appendChild(select);
                    container.appendChild(document.createElement("br"));
                }
            });
        });
    </script>
</head>
<body>

<form method="POST">
    <label for="numDropdowns">Select Number of Dropdowns:</label>
    <select id="numDropdowns" name="numDropdowns">
        <option value="0">Select</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>

    <div id="dropdownContainer"></div>

    <br>
    <input type="submit" value="Submit">
</form>

</body>
</html>