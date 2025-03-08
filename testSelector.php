<?php
include "scripts/db_connection.php";
include "model/api_modifiers.php";
include "model/api_rarity.php";

$options = getAllModifiersByEquipmentType(9);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Level Dynamic Dropdowns</title>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let options = <?php echo $options; ?>; // Convert PHP array to JavaScript

            function createDropdown(name) {
                let select = document.createElement("select");
                select.name = name;
                select.classList.add("main-dropdown");

                let defaultOption = document.createElement("option");
                defaultOption.value = "";
                defaultOption.text = "Select an option";
                select.appendChild(defaultOption);

                options.forEach(option => {
                    let opt = document.createElement("option");
                    opt.value = option.id;
                    opt.text = option.modifier;
                    select.appendChild(opt);
                });

                return select;
            }
                return select;
            }

            document.getElementById("numDropdowns").addEventListener("change", function () {
                let num = this.value;
                let container = document.getElementById("dropdownContainer");
                container.innerHTML = ""; // Clear previous dropdowns

                for (let i = 1; i <= num; i++) {
                    let label = document.createElement("label");
                    label.textContent = "Primary Dropdown " + i + ": ";

                    let dropdown = createDropdown("main_dropdown" + i);
                    dropdown.addEventListener("change", function () {
                        let subContainer = document.getElementById("subDropdownContainer" + i);
                        subContainer.innerHTML = ""; // Clear previous sub-dropdowns
                    });

                    let subContainer = document.createElement("div");
                    subContainer.id = "subDropdownContainer" + i;

                    container.appendChild(label);
                    container.appendChild(dropdown);
                    container.appendChild(document.createElement("br"));
                    container.appendChild(subContainer);
                }
            });
        });
    </script>
</head>
<body>

<form method="POST">
    <label for="numDropdowns">Select Number of Top-Level Dropdowns:</label>
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
