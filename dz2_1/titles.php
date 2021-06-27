<?php

$db = new mysqli("127.0.0.1", "root", "");
$s = $_REQUEST["s"];
if ($db) {
    $result = $db->select_db("university") or die("Doslo je do problema prilikom odabira baze...");
    if (strlen($s) !== 0) {
        $s = strtolower($s);
        $result2 = $db->query("SELECT * from titles t WHERE t.Type LIKE '%$s%'") or die("Doslo je do problema prilikom izvrsavanja upita...");
    } else {
        $result2 = $db->query("SELECT * from titles t") or die("Doslo je do problema prilikom izvrsavanja upita...");
    }
    $n = $result2->num_rows;
    if ($n > 0) {
        echo "<table>
            <tr>
            <th>#</th>
            <th>Type</th>
            </tr>";
        while ($row = mysqli_fetch_array($result2)) {
            echo "<tr>";
            echo "<td>" . $row['TitleId'] . "</td>";
            echo "<td>" . $row['Type'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nema rezultata<br>";
    }
} else {
    echo "<br>Nije proslo spajanje<br>";
}

mysqli_close($db);
