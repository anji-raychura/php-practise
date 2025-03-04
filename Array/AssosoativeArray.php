<?php
//  echo "<pre>";
$marks = 
[
    "kallu kaliya"=> [
        "pysics"=>53,
        "Chemistry"=>58,
        "Maths"=>79
    ],
    "Anjali"=>[
        "pysics"=>67,
        "Chemistry"=>80,
        "Maths"=>89
    ],
    "Priya"=>[
        "pysics"=>82,
        "Chemistry"=>95,
        "Maths"=>70
    ]
];

echo "<table border='2px',cellpadding='5px',cellspacing='3px'>
    <tr>
        <th>Name</th>
        <th>Physics</th>
        <th>Chemistry</th>
        <th>Maths</th>
    </tr>";
foreach($marks as $key => $value1){
    echo "<tr>
            <td>$key</td>";
   // echo $key;
    foreach($value1 as $value2){
        echo "<td>$value2</td>";
    }
    echo "</tr>";
}
echo "<pre>";
print_r($marks);
echo "</pre>";
echo "</table>";
?>