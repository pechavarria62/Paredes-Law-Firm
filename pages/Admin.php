<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <h1>Appointments</h1>
    <table>
        <tr>
            <th>Date & Time</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>
        <?php
            $filepath = '../textFiles/appointments.txt';
            $appointments = file($filepath, FILE_IGNORE_NEW_LINES);
            
            foreach ($appointments as $appointment) {
                list($datetime, $name, $phone, $email) = explode(' | ', $appointment);
                echo "<tr>";
                echo "<td>$datetime</td>";
                echo "<td>$name</td>";
                echo "<td>$phone</td>";
                echo "<td>$email</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>
