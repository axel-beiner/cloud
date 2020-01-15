<?php
echo "Server '".gethostname()."' - private IP address = ".$_SERVER["SERVER_ADDR"]." / private public IP = ".$_SERVER["SERVER_NAME"];


// https://www.linuxtricks.fr/wiki/php-passer-de-mysql-a-mysqli-requetes-de-base

$mysqli = new mysqli('10.12.0.6', 'userweb', 'userweb@123', 'dbtest');
if ($mysqli->connect_errno) {
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    exit;
}

$res = $mysqli->query("SELECT * FROM clients;");

echo "<table>";
echo "<tr><td>Client name</td><td>Contract number</td><td>Subscription date</td></tr>";
while ($data = mysqli_fetch_array($res)) {
echo "<tr><td>".$data['nom']."</td><td>".$data['numcontrat']."</td><td>".$data['date-inscription']."</td></tr>";
}
echo "</table>";


$res2 = $mysqli->query("SELECT nom,date_achat,montant FROM clients,commands WHERE commands.id_client = clients.id_client;");

echo "<table>";
echo "<tr><td>Client name</td><td>Date</td><td>Cost</td></tr>";
while ($data2 = mysqli_fetch_array($res2)) {
echo "<tr><td>".$data2['nom']."</td><td>".$data2['date_achat']."</td><td>".$data2['montant']."</td></tr>";
}
echo "</table>";

mysqli_close($conn);
?>
