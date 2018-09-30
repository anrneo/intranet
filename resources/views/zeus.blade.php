
@php
    


$serverName = "200.122.220.74:8787\sqlexpress, 1433"; //serverName\instanceName
$connectionInfo = array( "Database"=>"AT_Salud", "UID"=>"sa", "PWD"=>"zeus", "Characterset"=>"UTF-8");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
$sql = "SELECT * FROM AC ";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
    print_r($row);
};



sqlsrv_free_stmt( $stmt);

/*$c = new PDO("sqlsrv:Server=192.168.0.5;Database=AT_Salud", "sa", "zeus");
print_r($c);*/
@endphp

