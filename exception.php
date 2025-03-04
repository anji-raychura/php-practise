<?php
function life($paap , $karmo)
{
if($karmo==0)
{
    throw new Exception("division by zero");
}
return $paap/$karmo;
}

try
{
    echo life(15,15);
}

catch(Exception $var)
{
    echo "unvalid";
}

?>  