<!-- ======= Head ======= -->
<?php include('components/Head.php')?>
    <div class="position-relative">
        <div class=" align-items-center justify-content-center m" data-aos="fade-up"  >
            <h1 class="active" ><span>Deja un Comentario y Calificación</span></h1>
            <form action="functions.php" method="post">
                <textarea name="comment" rows="4" cols="50" maxlength="150" required></textarea><br>
                <label for="rating">Calificación (1 a 5 estrellas):</label>
                <input type="number" name="rating" min="1" max="5" required><br>
                <button class="get-started-btn" type="submit" value="Submit"></button>
            </form>
        </div>
    </div>

<!-- Vendor JS Files -->
<?php include('components/Jsfiles.php')?>