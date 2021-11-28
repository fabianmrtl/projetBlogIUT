<?php require_once 'config/init.conf.php';
    require_once 'classes/comManager.php';

    $actualy_article = htmlspecialchars($_GET['id']);
    $articlesManager = new articlesManager($bdd);
    $articles = $articlesManager->get($actualy_article);
    $commentaire = new Commentaires();
    $user = new user();
    $prenom = $user->getprenom();

    $commentaireManager = new commentairesManager($bdd);
    $commentaires = $commentaireManager->getCommentaire($actualy_article);

    if (isset($_POST['submit'])){
        $commentaire = new Commentaires();
        $commentaire->hydrate($_POST);

        $commentaire->setDate(date('Y-m-d'));
        $commentaire->setIdArticle($actualy_article);

        $commentaireManager->add($commentaire);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'include/header.inc.php'; ?>
    <body>
        <script type="text/javascript">
            function ValidForm() {
                let form = document.getElementsByTagName('form');

                form.addEventListener('submit', function(e) {
                    let auteur = document.getElementsByTagName('auteur');

                    if (author.value.trim() === "") {
                        let myError = document.getElementsByClassName('error');
                        myError.innerHTML = "Veuillez remplir";
                        console.log(myError)
                        e.preventDefault()
                    }
                })
            }
        </script>
        <!-- Responsive navbar -->
        <?php include 'include/nav.inc.php'; ?>

        <!-- Page Content -->
        <div class="container">
            <h2><?= $articles->getTitre() ?></h2>
            <div class="container">
                <img class="card-img-top" src="img/<?= $articles->getId() ?>.jpg" alt="">
            </div>
            <p><?= $articles->getText() ?></p>
            <div class="container">
                <span class="error"></span>
                <h2>Écrire un commentaire :</h2>
                <form id="form" action="" method="post">
                    <input type="text" class="form-control" name="auteur" placeholder="votre pseudo" id="auteur">
                    <input type="email" class="form-control" name="email" placeholder="votre mail" id="email">
                    <textarea class="form-control" name="content" cols="50" rows="10" placeholder="votre commentaire" id="content"></textarea>
                    <input class="btn btn-primary" onclick="ValidForm()Ò" type="submit" name="submit" value="Envoyer">
                </form>
                <div class="container">
                    <h2><strong>Les commentaires :</strong></h2>
                    <?php foreach ($commentaires as $key => $ListCommentaires) {?>
                    <div class="container">
                        <h2>Utilisateur : <?= $ListCommentaires->getAuteur() ?></h2>
                        <p><?= $ListCommentaires->getContent(); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- Footer-->
        <?php include_once("include/footer.inc.php") ?>
    </body>
</html>