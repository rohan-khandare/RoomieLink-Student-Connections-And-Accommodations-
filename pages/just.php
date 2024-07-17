<?php
include 'conection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search data</title>
</head>
<body>
<div class="container my-5">
    <form method="post">
        <input type="text" placeholder="Search data" name="Search">
        <button class="btn btn-dark" name="Submit">Search</button>
    </form>
</div>

<div class="container my-5">
    <table class="Table">
        <?php
        if (isset($_POST['Submit'])) {
            $Search = $_POST['Search'];

            $sql = "Select * from `rooms` where RoomID = $Search";
            $result = mysqli_query($mysqli, $sql); // This line executes the query

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    echo '<thead>
                            <tr>
                                <th>Room ID</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Capacity</th>
                            </tr>
                          </thead>';

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tbody>
                                <tr>
                                    <td>' . $row['RoomID'] . '</td>
                                    <td>' . $row['Contact'] . '</td>
                                    <td>' . $row['Email'] . '</td>
                                    <td>' . $row['Capacity'] . '</td>
                                </tr>
                              </tbody>';
                    }
                } else {
                    echo '<h2 class="text-danger">Data not found</h2>';
                }
            } else {
                echo 'Error executing query: ' . mysqli_error($mysqli);
            }
        }
        ?>
    </table>
</div>

</body>
</html>
