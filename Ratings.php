<!-- ======= Head ======= -->
<?php include('components/Head.php')?>
<!-- ======= Header ======= -->
<?php include('components/Header.php')?>
    <div class="container ">
        <h1><span>Deja un Comentario y Calificación</span></h1>
        <form action="functions.php" method="post">
            <textarea name="comment" rows="4" cols="50" maxlength="150" required></textarea><br>
            <label for="rating">Calificación (1 a 5 estrellas):</label>
            <input type="number" name="rating" min="1" max="5" required><br>
            <input type="submit" value="Submit">
        </form>
    </div>
<!-- ======= Footer ======= -->
<?php include('components/Footer.php')?>
<!-- Vendor JS Files -->
<?php include('components/Jsfiles.php')?>