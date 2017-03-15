<?php
$doc = new DOMDocument();
$doc->load( 'mahasiswa.xml' );
 
$mahasiswas = $doc->getElementsByTagName( "mahasiswa" );
foreach( $mahasiswas as $mahasiswa )
{
$nims = $mahasiswa->getElementsByTagName( "nim" );
$nim = $nims->item(0)->nodeValue;
 
$namas = $mahasiswa->getElementsByTagName( "nama" );
$nama = $namas->item(0)->nodeValue;
 
$alamats = $mahasiswa->getElementsByTagName( "alamat" );
$alamat = $alamats->item(0)->nodeValue;
$progdis = $mahasiswa->getElementsByTagName( "progdi" );
$progdi = $progdis->item(0)->nodeValue;
 
echo "$nim - $nama - $alamat - $progdi\n";
}
?>