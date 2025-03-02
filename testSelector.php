<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Dropdowns</title>
    <script>
        function generateDropdowns() {
            let num = document.getElementById("numDropdowns").value;
            let container = document.getElementById("dropdownContainer");
            container.innerHTML = ""; // Clear previous dropdowns

            for (let i = 0; i < num; i++) {
                let select = document.createElement("select");
                select.name = "dropdown" + (i + 1);

                let option1 = document.createElement("option");
                option1.value = "Option1";
                option1.text = "Option 1";

                let option2 = document.createElement("option");
                option2.value = "Option2";
                option2.text = "Option 2";

                select.appendChild(option1);
                select.appendChild(option2);
                container.appendChild(select);
                container.appendChild(document.createElement("br"));
            }
        }
    </script>
</head>
<body>

<form method="POST">
    <label for="numDropdowns">Select Number of Dropdowns:</label>
    <select id="numDropdowns" name="numDropdowns" onchange="generateDropdowns()">
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