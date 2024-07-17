<?php

include 'conection.php';



    if (isset($_POST['Send'])) {

        
        $Area=$_POST['Area'];       

        $sql = "Select * from rooms where Area = $Area";
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
}



?>