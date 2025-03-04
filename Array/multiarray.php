<?php
    $arr = [
        [1,"kallu kaliya","Multitask",5000],
        [2,"Anjali","Php",1000],
        [3,"Dharmik","Html",2000],
        [4,"Fenil","java",3000],
        
    ];

    // for($row=0;$row<=3;$row++)         //code 1
    //  {      
    //      for($col=0;$col<4;$col++)
    //     {
    //          echo $arr[$row][$col]."";
    //     }
    // echo "<br>";
    // }

    
echo "<table border='2px' cellpadding='5px' cellspacing='5px'>";
    // echo "<tr>                       // code2
    //     <th>ID</th>
    //     <th>NAME</th>
    //     <th>TASK</th>
    //     <th>SALARY</th>
    //     </tr>";
    // foreach($arr as $a1){
    //     echo "<tr>";
    //     foreach($a1 as $a2){

    //         echo "<td>$a2</td>";
    //     }
    //     echo "<tr>";
    //}

    foreach($arr as list($a,$b,$c,$d)){         //code 3
        echo"<tr>
        <td>$a</td>
        <td> $b</td>
        <td> $c</td>
        <td> $d </td>
        </tr>";
    }
    echo "</table>";
?>
