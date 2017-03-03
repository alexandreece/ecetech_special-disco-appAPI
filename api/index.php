<?php
require_once '../bdd.php';
require_once '../vendor/autoload.php';

// intialisation de Silex app
$app = new Silex\Application();

//connection a la base de données
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'host' => '127.0.0.1',
        'dbname' => 'lamapp',
        'user' => 'root',
        'password' => '',
        'charset' => 'utf8',
    ),
));

// route pour "/teams" affiche toutes les équipes par dates d'ajout
$app->get('/teams', function () use ($app) {
    $sql = "SELECT `NomTeam`, `Score`, `Date`, `NbPlayer`, `Niveau` FROM `Score` ORDER BY Date ASC";
    $teams = $app['db']->fetchAll($sql);

    return $app->json($teams);
});

// route pour "/teams/Best" affiche les meilleures équipes
$app->get('/teams/Best', function () use ($app) {
    $sql = "SELECT `NomTeam`, `Score`, `Date`, `NbPlayer`, `Niveau` FROM `Score` ORDER BY Score DESC";
    $teams = $app['db']->fetchAll($sql);

    return $app->json($teams);
});

// route pour "/teams/Best/1" affiche les meilleures équipes du niveau facile
$app->get('/teams/Best/1', function () use ($app) {
    $sql = "SELECT `NomTeam`, `Score`, `Date`, `NbPlayer`, `Niveau` FROM `Score` WHERE Niveau =1 ORDER BY Score DESC LIMIT 10";
    $teams = $app['db']->fetchAll($sql);

    return $app->json($teams);
});

// route pour "/teams/Best/2" affiche les meilleures équipes du niveau intermédiaire
$app->get('/teams/Best/2', function () use ($app) {
    $sql = "SELECT `NomTeam`, `Score`, `Date`, `NbPlayer`, `Niveau` FROM `Score` WHERE Niveau =2 ORDER BY Score DESC LIMIT 10";
    $teams = $app['db']->fetchAll($sql);

    return $app->json($teams);
});

// route pour "/teams/Best/3" affiche les meilleures équipes du niveau difficile
$app->get('/teams/Best/3', function () use ($app) {
    $sql = "SELECT `NomTeam`, `Score`, `Date`, `NbPlayer`, `Niveau` FROM `Score` WHERE Niveau =3 ORDER BY Score DESC LIMIT 10";
    $teams = $app['db']->fetchAll($sql);

    return $app->json($teams);
});

// route pour "/teams/Worst" affiche les pires équipes
$app->get('/teams/worst', function () use ($app) {
    $sql = "SELECT `NomTeam`, `Score`, `Date`, `NbPlayer`, `Niveau` FROM `Score` ORDER BY Score ASC";
    $teams = $app['db']->fetchAll($sql);

    return $app->json($teams);
});

// route pour "/teams/worst/1" affiche les pires équipes du niveau facile
$app->get('/teams/worst/1', function () use ($app) {
    $sql = "SELECT `NomTeam`, `Score`, `Date`, `NbPlayer`, `Niveau` FROM `Score` WHERE Niveau =1 ORDER BY Score ASC LIMIT 10";
    $teams = $app['db']->fetchAll($sql);

    return $app->json($teams);
});

// route pour "/teams/Best/2" affiche les pires équipes du niveau intermediaire
$app->get('/teams/worst/2', function () use ($app) {
    $sql = "SELECT `NomTeam`, `Score`, `Date`, `NbPlayer`, `Niveau` FROM `Score` WHERE Niveau =2 ORDER BY Score ASC LIMIT 10";
    $teams = $app['db']->fetchAll($sql);

    return $app->json($teams);
});

// route pour "/teams/worst/3" affiche les pires équipes du niveau difficile
$app->get('/teams/worst/3', function () use ($app) {
    $sql = "SELECT `NomTeam`, `Score`, `Date`, `NbPlayer`, `Niveau` FROM `Score` WHERE Niveau =3 ORDER BY Score ASC LIMIT 10";
    $teams = $app['db']->fetchAll($sql);

    return $app->json($teams);
});


$app->post('{NomTeam}&{Score}&{NbPlayer}&{Niveau}', function ($NomTeam, $Score,$NbPlayer, $Niveau) use ($app) {
    $IdTeam = uuid();
    $user = array(
        'IdTeam' => $IdTeam,
        'NomTeam' => $NomTeam,
        'Score' => $Score,
        'NbPlayer' => $NbPlayer,
        'Niveau' => $Niveau,
    );
    $app['db']->insert('Score', $user);
    return "id inscrit : " . $IdTeam;


});

// default route
$app->get('/', function () {
    return "Liste des méthodes disponibles:
Get
  - /teams - affiche toutes les équipes par dates d'ajout
  - /teams/Best - affiche les meilleures équipes
  - /teams/Best/1 - affiche les meilleures équipes du niveau facile
  - /teams/Best/2 - affiche les meilleures équipes du niveau intermediaire
  - /teams/Best/3 - affiche les meilleures équipes du niveau difficile
  - /teams/worst - affiche les pires équipes
  - /teams/worst/1 - affiche les pires équipes du niveau facile
  - /teams/worst/2 - affiche les pires équipes du niveau intermediaire
  - /teams/worst/3 - affiche les pires équipes du niveau difficile
 Post : 
  - {NomTeam}&{Score}&{NbPlayer}&{Niveau}    
  ";
});


$app->run();