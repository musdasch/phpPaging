<?php
error_reporting( E_ALL );
ini_set("display_errors", 1);
/*
$mysqli = new mysqli( 'localhost', 'root', 'nas3o1818', 'pagination' );

if ( mysqli_connect_errno() ) {
    printf( "Connect failed: %s\n", mysqli_connect_error() );
    exit();
}
*/
//$stmt = $mysqli->prepare( "INSERT INTO users VALUES ( NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )" );

//$stmt = $mysqli->prepare( "SELECT * FROM pagination LIMIT 10" );

/*$stmt->bind_param( 
	'ssssssssss',
	$inDB[ 'firstname' ],
	$inDB[ 'latname' ],
	$inDB[ 'street' ],
	$inDB[ 'plz' ],
	$inDB[ 'city' ],
	$inDB[ 'country' ],
	$inDB[ 'username' ],
	$inDB[ 'password' ],
	$inDB[ 'email' ],
	$inDB[ 'phone' ]
);*/

//$stmt->execute()

//$stmt->bind_result( $district );

//print_r( $stmt->fetch() );

//print_r( $district );

//$stmt->close();

$mysqli = new mysqli("localhost", "demoUser", "12345678", "pagination");

/* check connection */
if (mysqli_connect_errno()) {
    printf( "Connect failed: %s\n", mysqli_connect_error() );
    exit();
}

/* create a prepared statement */
if ( $stmt = $mysqli->prepare( "SELECT counter FROM pagination LIMIT ?" ) ) {

	$var = '10';
	$stmt->bind_param('i', $var); 

    /* bind parameters for markers */
    //$stmt->bind_param( 'i', '10' );

    $stmt->execute();

    $stmt->bind_result( $district );

	while ( $stmt->fetch() ) {
		print_r( $district );
	}

    $stmt->close();
}

$mysqli->close();

?>
<!doctype html>
<html lang="de">
	<head>
		<meta charset="de_CH.UTF-8"/>
		<title>Paging</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/foundation.min.css">
	</head>
	<body>
		<div class="row">
			<div class="medium-12 columns">
				<h1>Paging</h1>
			</div>
		</div>
		<div class="row">
			<div class="medium-12 columns">
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th width="800">und so.</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="medium-12 columns">
				<a href="#" class="button radius"><</a>
				<a href="#" class="button radius">></a>
			</div>
		</div>
		<script type="text/javascript" src="js/foundation.min.js"></script>
	</body>
</html>