<?php

try{
    
    $conexion = mysqli_connect(
        "localhost",
        "root",
        "root",
        "abp_requerimientos");

}catch(exception $e){
echo $e -> getMessage();
}

?>