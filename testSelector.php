<html>
<link href="css/style.css" rel="stylesheet">
<select name="test1" id="test1">
    <option value="Select">Select</option>
    <option value="a">a</option>
    <option value="b">b</option>
</select>


<select id="test2" name="test2">
    <option value="Select">Select</option>
    <option class="a" value="a">a</option>
    <option class="a" value="b">b</option>
    <option class="a" value="c">c</option>
    <option class="b" value="1">1</option>
    <option class="b" value="2">2</option>
    <option class="b" value="3">3</option>
</select>
<script>jQuery(document).ready(function($){
        $('#test1').on('change', function(e){
            var className = e.target.value;
            $('#test2 option').prop('disabled', true);
            $('#test2').find('option.' + className).prop('disabled', false);
        });
    });</script>
</html>