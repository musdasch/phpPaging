<?php
/**
 * File: index.php
 * The index.php loads the data from the pagination database and present the result in a
 * table limited bei $max_elements.
 * @author Tim Vögtli
 * @version 1.0 first version of a pagination page
 */

/**
 * This is for error reporting. Remove the commend for enable.
 */
//error_reporting( E_ALL );
//ini_set("display_errors", 1);

/**
 * $max_elements hods the nummber of max elements per page.
 * @var string
 */
$max_elements = '10';


/**
 * $mysqli halds the conection to the database.
 * @var mysqli
 */
$mysqli = new mysqli( "localhost", "demoUser", "12345678", "pagination" );

/**
 * This is used for testing the connection to the database. have the connection an error, it will
 * printt an Connect failed message. 
 */
if ( mysqli_connect_errno() ) {
    printf( "Connect failed: %s\n", mysqli_connect_error() );
    exit();
}

/**
 * $stmt holds the prepared query.
 * @var obj
 */
if ( $stmt = $mysqli->prepare( "SELECT counter FROM pagination LIMIT ?" ) ) {

	/**
	 * Bind the $max_element in the query.
	 */
	$stmt->bind_param('i', $max_elements); 

	/**
	 * Execute the query.
	 */
    $stmt->execute();

    /**
     * B
     */
    $stmt->bind_result( $res );

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