<?php
$doc = new DOMDocument();
$doc->load( 'mahasiswa.xml');
$xpath = new DOMXPath($doc);
$arts = $xpath->query("/mahasiswa/nim");
foreach ($arts as $art)
{
echo $art->nodeValue."";
}
$arts = $xpath->query("/mahasiswa/nama");
foreach ($arts as $art)
{
echo $art->nodeValue."";
}
?>