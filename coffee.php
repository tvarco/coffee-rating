<html>
<h2>Coffee Rating</h2>
<?php

?>


</script> 

<form method="post" action="post_coffee.php" onsubmit="fillNulls()" name="pourover_form" id="pourover_form">
  <fieldset>
    <legend>Basic info</legend>
    <label for="beans">Beans: </label>
    <input type="text" id="beans" name="beans">
    <br />
    <label for="roast_date">Roast Date: </label>
    <input type="date" id="roast_date" name="roast_date">
    <br />
    <label for="method">Method: </label>
    <select name="method" id = "method" required>
      <option value="">Select a method</option>
      <option value="Chemex">Chemex</option>
      <option value="Wave185Ceramic">Kalita Wave</option>
      <option value="Beehouse">Beehouse</option>
      <option value="Aeropress">Aeropress</option>
      <option value="French Press">French Press</option>
    </select>
	
    <br />
    <label for="filter">Filter: </label>
    <input type="text" id="filters" name="filter">
    <br />
    <label for="comandante_clicks">Comandante Setting: </label>
    <input type="number" id="comandnate_clicks" name="comandante_clicks">
  </fieldset>
  <fieldset>
    <legend>Dose/Water</legend>
    <label for="dose">Dose: </label>
    <input type="text" id="dose" name="dose">
    <br />
    <label for="temp">Temp: </label>
    <input type="text" id="temp" name="temp">
    <label for="C">C</label>
    <input type="radio" id="temp_units" name="temp_units" value="C" checked="checked">
    <label for="F">F</label>
    <input type="radio" id="temp_units" name="temp_units" value="F">
    <br />
    <label for="temp_source">Temp Source: </label>
    <input type="text" id="temp_source" name="temp_source">
  </fieldset>
  <fieldset>
    <legend>Pours</legend>
    <table>
      <tr>
        <th>Pour Number</th>
        <th>Time started (sec)</th>
        <th>Grams after pour</th>
        <th>Pattern</th>      
        <th>Stir?</th>
      </tr>
      <tr>
        <td>1</td>
        <td><input type="number" id="start_time_1" name="start_time[]" value="0"></td>
	<td><input type="text" id="grams_1" name="grams[]"></td>
        <td><input type="text" id="pattern_1" name="pattern[]"></td>
	<td>
	  <label for="FALSE_1">N</label>
	  <input type="radio" id="stir_1" name="stir[]" value="FALSE" checked="checked">	
  	  <label for="TRUE_1">Y</label>
          <input type="radio" id="stir_1" name="stir[]" value="TRUE">
     	</td>
      </tr>
<?php
for ($x = 2; $x <= 10; $x++) {
	echo '<tr>' . PHP_EOL;
	echo '  <td>' . $x .'</td>' . PHP_EOL;
	echo '  <td><input type="number" id="start_time_' . $x . '" name="start_time[]"></td>' .PHP_EOL;
	echo '  <td><input type="text" id="grams_' . $x . '" name="grams[]"></td>' . PHP_EOL;
	echo '  <td><input type="text" id="pattern_' . $x . '" name="pattern[]"></td>' . PHP_EOL;
//	echo '  <td><input type="checkbox" id="stir_' . $x . '" name="stir[]" value="TRUE"></td>' . PHP_EOL;
	echo '  <td>';
	echo '    <label for="FALSE">N</label>';
	echo '    <input type="radio" id="stir_' . $x . '" name="stir[]" value="FALSE" checked="checked">';
        echo '    <label for="TRUE">Y</label>';
	echo '    <input type="radio" id="stir_' . $x . '" name="stir[]" value="TRUE">';
	echo '  </td>';

	echo '</tr>';

}
?>
    </table>
  </fieldset>
  <fieldset>
    <legend>Final Data</legend>
    <label for="final_weight">Final weight (g): </label>
    <input type="text" id="final_weight" name="final_weight">
    <label for="final_time">Final time (sec): </label>
    <input type="number" id="final_time" name="final_time">
    <label for="output_weight">Output weight (g): </label>
    <input type="text" id="output_weight" name="output_weight">
    <br />
    <label for="brew_comments">Brew comments: </label>
    <textarea id="brew_comments" name="brew_comments" rows="5" cols="30">
    </textarea>
  </fieldset>
  <input type="submit" class="submit" id="submit" value="Submit" />
</form>

<script>
function fillNulls() {
  var elements = document.getElementById("pourover_form").elements;
  
  for (var i = 0, element; element = elements[i++];) {
    if (!element.value) {
        element.value = "NULL";
    }
  }
} 
</script>
