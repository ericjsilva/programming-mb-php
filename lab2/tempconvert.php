<?php
  function tempFtoCelsius($fahrenheit) {
    if (!isset($fahrenheit)) {
      return false;
    }

    $celsius = (float)(($fahrenheit - 32) / 1.8);
    $returnText = "You converted " . round($fahrenheit) . "&deg;F to " . round($celsius) . "&deg;C";

    if ($fahrenheit < 32) {
      $returnText .= ": Pack Long Underwear";
    } elseif ($fahrenheit > 100) {
      $returnText .= ": Remember to Hydrate";
    }
    return $returnText;
  }

  if (isset($_GET["degree"])) {
    $setVar = $_GET["degree"];

    if (!is_numeric($setVar)) {
      echo "Please enter only numbers for the temperature.</span>";
    } else {
      echo tempFtoCelsius($setVar);
    }
  }
?>
<head>
    <title>BSA PHP Temperature Conversion</title>
</head>
<body>
  <h2>BSA PHP Temperature Conversion</h2>
  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET">
    <p>Enter a number in the box below to convert the temperature to Celsius.</p>
    Degrees: <input type="text" name="degree" size="5" />
      <input name="SubmitConvert" type="submit" />
  </form>
</body>