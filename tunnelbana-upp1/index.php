<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tunnelbana</title>
    <link rel="stylesheet" href="./css/style.css"> <!-- Linking to external CSS file -->
</head>
<body>

<div class="container">
  <form method="post">
    <label for="fromStation">Från:</label><br><br>
    <select id="fromStation" name="from_station">
        <?php
        $linje19 = ['','Hagsätra', 'Rågsved', 'Högdalen', 'Bandhagen', 'Stureby', 'Svedmyra', 'Sockenplan', 'Enskede Gård', 'Globen', 'Gullmarsplan', 'Skanstull', 'Medborgarplatsen', 'Slussen', 'Gamla Stan', 'T-Centralen', 'Hötorget', 'Rådmansgatan', 'Odenplan', 'S:T Eriksplan', 'Fridhemsplan', 'Thorildsplan', 'Kristineberg', 'Alvik', 'Stora Mossen', 'Abrahamsberg', 'Brommaplan', 'Åkeshov', 'Ängbyplan', 'Islandstorget', 'Blackeberg', 'Råcksta', 'Vällingby', 'Johannelund', 'Hässelby Gård', 'Hässelby Strand'];
        foreach ($linje19 as $station) {
            echo "<option value='$station'>$station</option>"; // Generating dropdown options dynamically
        }
        ?>
    </select><br><br>
  
    <label for="toStation">Till:</label><br><br>
    <select id="toStation" name="to_station">
        <?php
        foreach ($linje19 as $station) {
            echo "<option value='$station'>$station</option>"; // Generating dropdown options dynamically
        }
        ?>
    </select><br><br>
  
    <button type="submit">Skicka</button> <!-- Submit button -->
  </form>
</div>

<?php
if (!empty($_POST)) {
    $from_station = $_POST['from_station'];
    $to_station = $_POST['to_station'];

    $from_index = array_search($from_station, $linje19); // Finding index of selected starting station
    $to_index = array_search($to_station, $linje19); // Finding index of selected destination station

    if ($from_index !== false && $to_index !== false) { // Checking if stations are valid
        $stations_between = abs($from_index - $to_index); // Calculating number of stations between
        $travel_time = $stations_between * 3; // Assuming 3 minutes per station
        $current_time = strtotime(date("Y-m-d H:i:s")); // Getting current time
        $arrival_time = date("H:i", $current_time + ($travel_time * 60)); // Calculating arrival time

        echo "<div class='result'>";
        echo "<p>Antal stationer mellan $from_station och $to_station: $stations_between</p>"; // Displaying results
        echo "<p>Beräknad restid: $travel_time minuter</p>";
        echo "<p>Förväntad ankomsttid till $to_station: $arrival_time</p>";
        echo "</div>";
    }}

?>

</body>
</html>
