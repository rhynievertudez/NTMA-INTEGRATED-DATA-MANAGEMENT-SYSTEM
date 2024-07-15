<?php

$conn = mysqli_connect("localhost", "root", "", "ntma_stud");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["search_keyword"])) {
        $searchKeyword = $_POST["search_keyword"];
        $sql = "SELECT * FROM students_files WHERE 
                id LIKE '%$searchKeyword%' OR 
                year LIKE '%$searchKeyword%' OR
                name LIKE '%$searchKeyword%' OR
                course LIKE '%$searchKeyword%' OR
                status LIKE '%$searchKeyword%'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["year"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["course"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>
                  <td colspan='5'>No results found.</td>
                  </tr>";
        }
    }
}
?>
