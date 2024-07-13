<?php
include "scripts/db_connection.php";
global $pdo;
?>
<html>
<body>
<script>
    function sendRecords() {
        // Creating XMLHttpRequest object
        var zhttp = new XMLHttpRequest();

        // JSON document
        const mParameters = {
            title: document.querySelector('#Utitle').value,
            userid: document.querySelector('#UId').value,
            body: document.querySelector('#Ubody').value
        }
        // Creating call back function
        zhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 201) {
                document.getElementById("example").innerHTML = this.responseText;
                console.log("Data Posted Successfully")
            }
            console.log("Error found")
        };
        // Post/Add JSON document on the given API
        zhttp.open("POST", "https://jsonplaceholder.typicode.com/todos", true);

        // Setting HTTP request header
        zhttp.setRequestHeader('Content-type', 'application/json')

        // Sending the request to the server
        zhttp.send(JSON.stringify(mParameters));
    }
</script>

<!--Creating simple form-->
<h2>Enter data</h2>
<label for="Utitle">Title</label>
<input id="Utitle" type="text" name="title"><br>

<label for="UId">UserId</label>
<input id="UId" type="number" name="UserID"><br>

<label for="Ubody">Body</label>
<input id="Ubody" type="text" name="body"><br>

<button type="button" onclick="sendRecords()">Submit</button>
<div id="example"></div>
</body>
</html>