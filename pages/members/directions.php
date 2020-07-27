<?php
  include('mem_functions.php');
#  $addressTo = 'WN2 4SA';

  $addressTo = $_POST['postcode'];

  $output = getDistance($addressTo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

<p>
<pre>
<?php print_r($output); ?> 
</pre>
</p>

</body>
</html>