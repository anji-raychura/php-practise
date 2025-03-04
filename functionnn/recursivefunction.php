<?php
function recursive($number){
    if($number <= 25){
        echo "$number";
        recursive($number+1);
    }
}

recursive(1);


?>