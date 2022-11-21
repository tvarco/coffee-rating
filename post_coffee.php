<html>
<body>
<?php
session_start();
$_SESSION['timenow'] = date('Y-m-d H:i:s');
$_SESSION['max_pours'] = 10;

$mysql_host	=	"localhost";
$mysql_username =	"php";
$mysql_password	=	"password";
$mysql_database =	"coffee";
$conn = mysqli_connect($mysql_host, $mysql_username, $mysql_password, $mysql_database);

echo "<hr>";
echo "<h3>Brew Session: " .  $_SESSION["timenow"] . "</h3>";

if(!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO pourover_test (
	datetime
	,beans
	,roast_date
	,method
	,filter
	,comandante_clicks
	,dose
	,temp
	,temp_units
	,temp_source
	,final_weight
	,final_time
	,output_weight
	,brew_comments
) VALUES (
'" . $_SESSION["timenow"] ."'
,'" . $_POST['beans'] . "'
,'" . $_POST['roast_date'] . "'
,'" . $_POST['method'] . "'
,'" . $_POST['filter'] . "'
,'" . $_POST['comandante_clicks'] . "'
,'" . $_POST['dose'] . "'
,'" . $_POST['temp'] . "'
,'" . $_POST['temp_units'] . "'
,'" . $_POST['temp_source'] . "'
,'" . $_POST['final_weight'] . "'
,'" . $_POST['final_time'] . "'
,'" . $_POST['output_weight'] . "'
,'" . $_POST['brew_comments'] . "'
)";

$pour_data = "INSERT INTO pour_test (
	datetime
	,sequence
	,start_time
	,grams
	,pattern
) VALUES ";


for($x = 0; $x < count($_POST['start_time']); $x++) {
  if($_POST['start_time'][$x] != "" and $_POST['grams'][$x] != "") {
    $y = $x + 1;
    $pour_data = $pour_data . "('" .
      $_SESSION['timenow'] . "', '" .
      $y . "', '" .
      $_POST['start_time'][$x] . "', '" .
      $_POST['grams'][$x] . "', '" .
      $_POST['pattern'][$x] . "'" /* . "," 
      $_POST['stir'][$x] */
      . "),";
   }
}

//remove the final comma
$pour_data = substr_replace($pour_data, "", -1);


if(mysqli_query($conn, $sql)) {
  if(mysqli_query($conn, $pour_data)) {
    echo "<br />Submission successful";
    } else {
    echo "Error: " . mysqli_error($conn) . "<br>" . $pour_data;
    }
  } else{
  echo "Error: " . mysqli_error($conn) . "<br>" . $sql;
}



$scoring_categories = array("aroma", "flavor", "acidity", "body", "aftertaste", "overall")
?>

<form method="post" action="post_coffee_rating.php" name="score_form" id="score_form">
  <fieldset>
    <legend>Scoring</legend>
    <table>
      <tr>
       <th>Element</th>
       <th>1</th>
       <th>2</th>
       <th>3</th>
       <th>4</th>
       <th>5</th>
      </tr>
    <?php
        for ($x = 0; $x <= count($scoring_categories)-1; $x++) {
        echo '<tr>';
            echo '<td>' . $scoring_categories[$x] . '</td>';
        echo '<td><input type="radio" id="1" name="score_' . $scoring_categories[$x] . '" value="1"></td>';
        echo '<td><input type="radio" id="2" name="score_' . $scoring_categories[$x] . '" value="2"></td>';
        echo '<td><input type="radio" id="3" name="score_' . $scoring_categories[$x] . '" value="3"></td>';
        echo '<td><input type="radio" id="4" name="score_' . $scoring_categories[$x] . '" value="4"></td>';
        echo '<td><input type="radio" id="5" name="score_' . $scoring_categories[$x] . '" value="5"></td>';
        echo '</tr>';
    }
    ?>
    </table>
    <label for="tasting_comments">Tasting comments: </label>
    <textarea id="tasting_comments" name="tasting_comments" rows="5" cols="30">
    </textarea>

    <input type="submit"  value="Submit">
  </fieldset>
</body>
</html>
<?php
mysqli_close($conn);
?>
