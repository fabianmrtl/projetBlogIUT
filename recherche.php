<?php require_once "config/init.conf.php"; ?>
<!DOCTYPE html>
    <html lang="en">
        <?php include 'include/header.inc.php'; ?>
    <body>
        <!-- Responsive navbar-->
        <?php include 'include/nav.inc.php'; ?>

        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            
        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center my-5"></div>
        <form action="recherche.php" method="POST" enctype='multipart/form-data'>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Recherche</label>
                <input type="text" name="text" class="form-control">
            </div>
            <center>
                <div class="col-auto">
                    <button name="submit" type="submit" class="btn btn-primary mb-3">Rechercher</button>
                </div>
            </center>
        </form>
        <!-- Footer-->
        <?php include 'include/footer.inc.php'; ?>
    </body>
</html>