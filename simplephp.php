<?php
$xml=simplexml_load_file("mahasiswa.xml") or die("Error: Cannot create object");
echo $xml->mahasiswa[0]->nim . "<br>";
echo $xml->mahasiswa[0]->nama . "<br>";
echo $xml->mahasiswa[0]->alamat . "<br>";
echo $xml->mahasiswa[0]->progdi . "<br>";
?> 