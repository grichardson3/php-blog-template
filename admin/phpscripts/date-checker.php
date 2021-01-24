<?php
    date_default_timezone_set('America/New_York');
    $date = date('G T');
    if ($date < 12) {
        echo " Good Morning";
    } else if ($date > 12 && $date < 18) {
        echo " Good Afternoon";
    } else {
        echo " Good Evening";
    }
?>