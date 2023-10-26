<!-- ======= Head ======= -->
<?php include('../components/Head.php')?>
    <div class='container w-50 border my-5 rounded' >
        <form class="  py-0 m-md-5 align-middle 
        " action="/functions/Appmnts_function.php" method="post">
            <h1 class='border-bottom text-warning'>Reservar Una Cita</h1>
            <label  class="form-label" for="date">Seleccionar Fecha</label>
            <input class="form-control form-control-sm" type="date" name="date" required>
            
            <label  class="form-label" for="time">Seleccionar Horario</label>
            <select name="time" required>
                <!-- Get the time set in the admin panel -->
                <?php
                $available_times = file('../textFiles/available_times.txt', FILE_IGNORE_NEW_LINES);
                foreach ($available_times as $time) {
                    echo "<option value=\"$time\">$time</option>";
                }
                ?>
            </select><br>
            
            <label  class="form-label" for="first_name">Nombre/s</label>
            <input  class="form-control form-control-sm" placeholder="First Name" type="text" name="first_name" required>
            
            <label  class="form-label" for="last_name">Apellido/s</label>
            <input  class="form-control form-control-sm"  placeholder="Last Name" type="text" name="last_name" required>
            
            <label  class="form-label" for="phone">Numero de Telefono</label>
            <input  class="form-control form-control-sm" placeholder='8091234567' type="tel" name="phone" required>
            
            <label  class="form-label" for="email">Correo Electronico</label>
            <input  class="form-control form-control-sm" placeholder="name@example.com" type="email" name="email" required>
            
            <button class="btn btn-primary mt-1" type="submit" value="Book Appointment">Enviar</button>
        </form>
    </div>
<!-- Vendor JS Files -->
<?php include('../components/Jsfiles.php')?>
