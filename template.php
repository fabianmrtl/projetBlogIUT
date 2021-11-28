<?php
        require_once 'config/init.conf.php';
        require_once 'vendor/autoload.php';

        $loader = new \Twig\Loader\FilesystemLoader('templates/');
        $twig = new \Twig\Environment($loader, ['debug'=>true]);

        $users = [['username' => 'Bite']];
        echo $twig->render('template.html.twig', ['prenom' => 'Fabibi','go' => 'here', 'users' => $users]);
?>