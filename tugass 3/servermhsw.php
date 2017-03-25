<?php
// Pull in the NuSOAP code
require_once('nusoap.php');
// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('SERVER AKADEMIK DENGAN SOAP', 'urn:servermhsw');
// Register the method to expose
$server->register('insertdata',                // method name
    array('nim' => 'xsd:string','nama' => 'xsd:string','prodi' => 'xsd:string'), // input parameters
    array('return' => 'xsd:string'),    // output parameters
    'urn:servermhsw',                    // namespace
    'urn:servermhsw#insertdata',                // soapaction
    'rpc',                                // style
    'encoded',                            // use
    'Says hello to the caller'            // documentation
);
$server->register('ambilnim',                // method name
    array('nim' => 'xsd:string'),        // input parameters
    array('return' => 'xsd:string'),    // output parameters
    'urn:servermhsw',                    // namespace
    'urn:servermhsw#ambilnama',                // soapaction
    'rpc',                                // style
    'encoded',                            // use
    'Says hello to the caller'            // documentation
);
// Define the method as a PHP function
function insertdata($nim,$nama,$prodi) {
        //return 'Hellooo, ' . $name;
		$cn = mysql_connect("localhost", "root", "");
		mysql_select_db("akademik",$cn);
		$hasil = mysql_query("INSERT INTO `mahasiswa` (`nim`, `nama`, `prodi`) VALUES ('$nim', '$nama', '$prodi')",$cn);
		$hasil2 = mysql_query("SELECT nim,nama,prodi FROM `mahasiswa` where nim = '$nim'",$cn);
		$data = mysql_fetch_row($hasil2);
		
		$m = 'nim= '.$data[0].' nama ='.$data[1].' prodi= '.$data[2];
		return 'Hasil query insert data, ' .$m;	 
}
function ambilnim($nim) {
        //return 'Hellooo, ' . $name;
		$cn = mysql_connect("localhost", "root", "");
		mysql_select_db("akademik",$cn);
		$hasil = mysql_query("SELECT nim,nama,prodi FROM `mahasiswa` where nim = '$nim'",$cn);
		
		$data = mysql_fetch_row($hasil);
		
		$m = 'nim= '.$data[0].' nama ='.$data[1].' prodi= '.$data[2];
		return 'Hasil query, ' .$m;	 
}
// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>