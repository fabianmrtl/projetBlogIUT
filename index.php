<?php require_once "config/init.conf.php";

    define('nb_articles_par_page', 4);
    $articlesManager = new articlesManager($bdd);

    $page = !empty($_GET['p']) ? $_GET['p'] : 1;
    $indexDepart = ($page - 1) * nb_articles_par_page;

    $nbArticlesTotalPublie = $articlesManager->countArticlesPublie();
    $nbPages = ceil($nbArticlesTotalPublie / nb_articles_par_page);

    $articles = $articlesManager->getList($indexDepart, nb_articles_par_page);
?>

<!DOCTYPE html>
    <html lang="en">
        <?php include 'include/header.inc.php'; ?>
    <body>
        <!-- Responsive navbar-->
        <?php require_once("include/nav.inc.php") ?>

        <!-- Page Content-->
        <div class="container px-4 px-lg-5">

        <!-- Notification-->
            <?php if (isset($_SESSION['notification'])) { ?>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Well done!</h4>
                    <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                    <hr>
                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>
            <?php unset($_SESSION['notification']); } ?>

            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-md-12">
                    <h1 class="font-weight-light"><?= "Yo les plus beaux" ?></h1>
                    <p>Sur ce blog, retrouve toute l'actualité de tes acteurs préféré.</p>
                </div>
            </div>

            <!-- Content Row-->
            <div class="row gx-4 gx-lg-5">
                <?php foreach ($articles as $key => $listArticles) { ?>
                    <div class="col-md-4 mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="img/<?= $listArticles->getId(); ?>.jpg">
                            <div class="card-body">
                                <h2 class="card-title"><a href="voirarticle.php?id=<?php echo $listArticles->getId(); ?>"><?= $listArticles->getTitre(); ?></h2>
                                <p class="card-text"><?= $listArticles->getText(); ?></p>
                            </div>
                            <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!"><?= $listArticles->getDate() ?></a></div>
                            <div class="card-footer"><a class="btn btn-primary btn-sm" href="modifarticle.php?id=<?= $listArticles->getId(); ?>">Modifier</a></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <?php for ($index = 1; $index <= $nbPages; $index++) { ?>
                                <li class="page-item <?php if ($page == $index) { ?> active <?php } ?>"> 
                                    <a class="page-link" href="index.php?p= <?= $index ?>"><?= $index ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>    
        <!-- Footer-->
        <?php include_once("include/footer.inc.php") ?>
    </body>
</html>