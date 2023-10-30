<!-- ======= Head ======= -->
<?php include('../components/Head.php')?>
    <div class='container form-control my-2'>

        <h2>Crear Horario</h2>
        <form action="../functions/Update_times.php" method="post">
            <label for="available_times">Seleccionar Horario:</label>
            <input type="time" name="available_times" required><br>
            <button class='btn btn-outline-primary px-1 py-0' type='submit' value='Book Appointment'>Agregar</button>
        </form><br>
    </div>
    <div class='container form-control'>
        <h1 class='border-bottom '>Citas</h1>
        <table class='row'>
            <tr>
                <th class='col-2'>Dia</th>
                <th class='col-2'>Hora</th>
                <th class='col-2'>Nombre</th>
                <th class='col-2'>Telefono</th>
                <th class='col-2'>Correo Electronico</th>
            </tr>
            <?php
                $filepath = '../textFiles/appointments.txt';
                $appointments = file($filepath, FILE_IGNORE_NEW_LINES);
                
                foreach ($appointments as $key => $appointment) {
                    list($date, $time, $name, $phone, $email) = explode(' | ', $appointment);
                    echo "<tr class='col-2'>";
                    echo "<td>$date</td>";
                    echo "<td>$time</td>";
                    echo "<td>$name</td>";
                    echo "<td>$phone</td>";
                    echo "<td>$email</td>";
                    echo "<td><form class = 'px-2' action='../functions/delete_appointment.php' method='post'>
                        <input type='hidden' name='appointment_key' value='$key'>
                    <button class='btn btn-outline-danger px-1 py-0' type='submit' value='Book Appointment'><i class='fas fa-trash-alt'></i> </button></form></td>
                    ";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
<!-- Vendor JS Files -->
<?php include('../components/Jsfiles.php')?>
