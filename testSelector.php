<?php
include "scripts/db_connection.php";
global $pdo;
?>
<html>
<select name="campusselect">
    <?php
    $result= $pdo->query("select `shipTier` from `shipTiers`");
    while( $row = $result->fetch_assoc() ) {
        printf( '<option>%s', $row['shipTier'] );
    }
    ?>
</select>

<script>
    document.querySelector('select[name="campusselect"]').addEventListener('change', function(e){
        location.search='campus='+this.value;
    });
</script>


<!--room drop down-->
<select name="roomsselect">
    <?php
    if( isset( $_GET['campus'] ) ){
        $sql='select `shipName` from `ships` where `shipTierID`=?';
        $stmt=$pdo->prepare($sql);
        $stmt->bind_param('s',$_GET['campus']);
        $res=$stmt->execute();
        $stmt->bind_result($room);

        while( $stmt->fetch() )printf('<option>%s',$room);
    }
    ?>
</select>
</html>