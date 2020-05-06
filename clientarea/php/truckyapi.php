<?php
$json_trucky = file_get_contents("https://vtc.northwestvideo.de/api/web/traffic/data");
$obj_trucky = json_decode($json_trucky);
for($i=0; $i < 10; $i++) {
  echo '<a class="list-group-item list-group-item-action waves-effect elegant-color white-text">'.$obj_trucky->response[$i]->name;
  if($obj_trucky->response[$i]->severity == 'Congested' or $obj_trucky->response[$i]->severity == 'Heavy') {
    echo ' <span class="badge badge-danger badge-pill pull-right">'.$obj_trucky->response[$i]->players.'</span>';
  } else if ($obj_trucky->response[$i]->severity == 'Moderate') {
    echo ' <span class="badge badge-warning badge-pill pull-right">'.$obj_trucky->response[$i]->players.'</span>';
  }else {
    echo ' <span class="badge badge-primary badge-pill pull-right">'.$obj_trucky->response[$i]->players.'</span>';
  }
  echo '</a>';
}
?>
