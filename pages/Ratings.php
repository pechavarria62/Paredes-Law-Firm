<!-- ======= Head ======= -->
<?php include('../components/Head.php')?>
    <div class='container w-50 border my-5 rounded'>
            <h1 class="active" ><span>Dejanos tu Comentario</span></h1>
            <form action="/functions/Cmmnts_function.php" method="post">

                <label  class="form-label" for="first_name">Nombre/s</label>
                <input  class="form-control form-control-sm my-0" placeholder="First Name" type="text" name="first_name" required>

                <label  class="form-label" for="last_name">Apellido/s</label>
                <input  class="form-control form-control-sm"  placeholder="Last Name" type="text" name="last_name" required>

                <label  class="form-label" for="comment">Comentario</label>
                <textarea class="form-control form-control-sm" name="comment" rows="4" cols="50" maxlength="100" required></textarea>

                <button class='btn btn-outline-primary px-1 py-0 my-1' type='submit' value='Submit'>
                    Enviar <i class="fa-regular fa-share-from-square"></i>
                </button>
            </form>
    </div>

<!-- Vendor JS Files -->
<?php include('../components/Jsfiles.php')?>