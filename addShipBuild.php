<?php
include "scripts/header.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UFP Ship Builder Tool (Dev)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--- Stylesheet include -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php echo $navbar; ?>
<div class="container">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id pulvinar erat. Vivamus fringilla odio in elementum porta. Fusce fermentum augue vitae mauris fermentum interdum. Nulla fringilla sagittis volutpat. Aenean fermentum nisl non posuere suscipit. Quisque pulvinar interdum felis, ut fringilla nisi placerat ac. Quisque at nisi massa. Pellentesque imperdiet vel eros vel condimentum.</p>
    <p>Curabitur fermentum ut massa sed molestie. Proin et laoreet urna. Mauris id justo molestie, consequat augue et, consequat risus. Sed vel vehicula turpis. Nulla consectetur, ipsum et condimentum aliquet, nisi ante ornare orci, ac rhoncus felis arcu a magna. Donec feugiat, risus in aliquet varius, turpis ligula bibendum odio, quis feugiat lectus leo facilisis felis. Pellentesque eu auctor nulla, eget dignissim urna. Curabitur ac nisi ut diam pharetra mattis vitae ornare enim. Nullam luctus efficitur ipsum, sed imperdiet felis dapibus ut. Pellentesque tristique lacinia mollis. Ut nec magna libero. Fusce dictum elementum fringilla. Praesent porttitor accumsan dapibus. Curabitur viverra imperdiet semper. Mauris quis sodales purus. Praesent id bibendum arcu.</p>
    <p>Select the options for your build below:</p>
    <form>
        <select class="form-select" aria-label="Default select example">
            <option selected>Select the type of ship</option>
            <option value="1">Ship A</option>
            <option value="2">Ship B</option>
            <option value="3">Ship C</option>
        </select>
        <p>Enter the relevant weapons</p>
        <?php
        $fore = 4;
        $rear = 4;

        for($i=0; $i < $fore; $i++){
            echo '<div class="row">';
            echo '<label>Fore Weapon ' . $i . ': </label>';
            echo '<div class="col">';
                echo '<select class="form-select" aria-label="Default select example">';
                    echo '<option selected>Weapon Damage</option>';
                    echo '<option value="1">Phaser</option>';
                    echo '<option value="2">Maser</option>';
                    echo '<option value="3">Quaser</option>';
                echo '</select>';
            echo '</div>';
            echo '<div class="col">';
                echo '<select class="form-select" aria-label="Default select example">';
                    echo '<option selected>Weapon Type</option>';
                    echo '<option value="1">Beam Array</option>';
                    echo '<option value="2">Cannon</option>';
                    echo '<option value="3">Torpedo</option>';
                echo '</select>';
            echo '</div>';
            echo '<div class="col">';
                echo '<select class="form-select" aria-label="Default select example">';
                    echo '<option selected>Weapon Level</option>';
                    echo '<option value="1">Mk I</option>';
                    echo '<option value="2">Mk II</option>';
                    echo '<option value="3">Mk III</option>';
                echo '</select>';
            echo '</div>';
            echo '<div class="col">';
                echo '<select class="form-select" aria-label="Default select example">';
                    echo '<option selected>Mod 1</option>';
                    echo '<option value="1">ACC</option>';
                    echo '<option value="2">ACC2</option>';
                    echo '<option value="3">ACC3</option>';
                echo '</select>';
            echo '</div>';
            echo '<div class="col">';
                echo '<select class="form-select" aria-label="Default select example">';
                    echo '<option selected>Mod 2</option>';
                    echo '<option value="1">ACC</option>';
                    echo '<option value="2">ACC2</option>';
                    echo '<option value="3">ACC3</option>';
                echo '</select>';
            echo '</div>';
            echo '<div class="col">';
                echo '<select class="form-select" aria-label="Default select example">';
                    echo '<option selected>Mod 3</option>';
                    echo '<option value="1">ACC</option>';
                    echo '<option value="2">ACC2</option>';
                    echo '<option value="3">ACC3</option>';
                echo '</select>';
            echo '</div>';
            echo '<div class="col">';
                echo '<select class="form-select" aria-label="Default select example">';
                    echo '<option selected>Mod 4</option>';
                    echo '<option value="1">ACC</option>';
                    echo '<option value="2">ACC2</option>';
                    echo '<option value="3">ACC3</option>';
                echo '</select>';
            echo '</div>';
        echo '</div>';
        }
        ?>


        <label>Fore Weapon 2: </label>

        <label>Fore Weapon 3: </label>

        <label>Fore Weapon 4: </label>

        <label>Rear Weapon 1: </label>

        <label>Rear Weapon 1: </label>

        <label>Rear Weapon 1: </label>

        <label>Rear Weapon 1: </label>

    </form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
<footer class="footer">
    <?php include "scripts/footer.php"; ?>
</footer>
</html>