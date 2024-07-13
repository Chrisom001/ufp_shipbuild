<html>
<script>
    var selector1 = document.getElementById("color");
    var selector2 = document.getElementById("car");
    selector2.hidden = true;

function testSelector(){
    if(selector1.value==="red"){
        for(i=0; i<selector2.length; i++){
            selector2item = selector2[i];
            if(selector2item.valueOf() != "vw"){
                selector2item.hidden = true;
            } else {
                selector2.item.hidden = false;
            }
        }
    } else if(selector1.value === "green"){
        selector2item = selector2[i];
        if(selector2item.toString(). != "jag"){
            selector2item.hidden = true;
        } else {
            selector2.item.hidden = false;
        }
    } else if(selector1.value === "blue"){
        selector2item = selector2[i];
        if(selector2item.valueOf() != "vauxhall"){
            selector2item.hidden = true;
        } else {
            selector2.item.hidden = false;
        }
    }
}
</script>
<label for="color">Background Color:</label>
<select name="color" id="color" onchange="testSelector()">
	<option value="">--- Choose a color ---</option>
	<option value="red">Red</option>
	<option value="green">Green</option>
	<option value="blue">Blue</option>
</select>

<label for="car">Background Car:</label>
<select name="car" id="car">
	<option value="">--- Choose a car ---</option>
	<option value="vw">Volkswagen</option>
	<option value="jag">Jaguar</option>
	<option value="vauxhall">Vauxhall</option>
</select>
</html>