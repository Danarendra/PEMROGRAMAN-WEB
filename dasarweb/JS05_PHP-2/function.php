<?php

function perkenalan($nama, $salam="Assalamualaikum"){
    echo $salam.", ";
    echo "Perkenalkan, nama saya ".$nama."<br/>";
    echo "Senang berkenalan dengan anda<br/>";
}

perkenalan("Narendra","Hallo");

echo "<hr>";

$saya = "Narendra";
$ucapanSalam = "Selamat pagi";
perkenalan($saya);
?>