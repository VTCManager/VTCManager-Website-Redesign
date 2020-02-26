<?php  
foreach ($_POST as $key => $value) {
    switch ($key) {
        case 'version':
            $version = $value;
            break;
        default:
            break;
    }
}
echo "1.1.0";
?> 