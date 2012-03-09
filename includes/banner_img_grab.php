<?php 

	$results = array();

	$handler = opendir('../images/faces');

	while ($file = readdir($handler)) {

      // if file isn't this directory or its parent, add it to the results
      if ($file != "." && $file != "..") {
        $results[] = $file;
      }

    }

    // tidy up: close the handler
    closedir($handler);

   	$image = $results[rand(0,count($results) - 1)];

    // done!
    echo json_encode($image);

 ?>