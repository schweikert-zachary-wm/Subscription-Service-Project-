<link rel="stylesheet" type="text/css" href="style.css">
<?php


//The only way to get to the admin page is to type in the url in the url bar thing.


error_reporting(0);
$username = '1';
$password = '1';
if (!isset($_SERVER['PHP_AUTH_USER']) ||
    !isset($_SERVER['PHP_AUTH_PW']) ||
    ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm= "Guitar Wars"');
    exit('<h2> Username and Password are not vaild. </h2>');
}

$dbh = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'root');

$query = "SELECT * FROM subscription WHERE username1 IS NOT NULL AND username2 IS NOT NULL";
$stmt = $dbh->prepare($query);
$stmt->execute(array());
$result = $stmt->fetchAll();

echo "<div id='table2'>
<table id='table2'> <tr><th> Ongoing games</th> </tr>";
foreach ($result as $row) {
    echo "<tr>
<td> Game ID: ". $row['id'] . "</td>
<td> Username1: " . $row['username1'] . " </td>
<td> Username2: " . $row['username2'] . " </td>
<td> <a href='admin.php?end=" . $row['id'] . "'> End game </a></td>
    </tr>


    ";
}
echo "</table> </div>";

if ($_GET['end'] != "") {
    echo "
<div id='form2'>
<form method='post' >
Are you sure you would like to end game" . $_GET['end'] . "?
<button type='submit' name='yes'>Yes</button>
<button type='submit' name='no'>No</button>
</form>
</div>";


}

//if ($_POST['yes'] != null) {
if ( isset( $_POST['yes'] ) ) {

    $dbh = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'root');

    $query =  "DELETE FROM subscription WHERE id = :id";
    $stmt = $dbh->prepare($query);
    $stmt->execute(array('id' => $_GET['end']));
    header('Location: admin.php');
}
if ( isset( $_POST['no'] ) ) {
    header('Location: admin.php');
}








?>
