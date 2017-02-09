<?php

    //these are necessary for the page to run efficiently
    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__.'/../src/jobs.php';
    session_start();

    //this is telling the server that if it is empty, start up the new session and create an array for it. it is also naming the variable of 'job_array'
    if (empty($_SESSION['job_array'])) {
        $_SESSION['job_array'] = array();
    }


    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'
    ));
    //this is the end of set up and the beginning of the app function.


    //this is telling the app that it needs to first get '/' as the first page accessable to the user
    $app->get('/', function() use ($app) {

        return $app['twig']->render('jobs.html.twig');

    });

    //post is a pre-set function (like get) that tells the server to post these bits of information to itself. dev does not need to create 'post' function.
    $app->post('/', function() use ($app) {

        $new_job = new Job($_POST['previous_title'], $_POST['previous_description'], $_POST['previous_pay'], $_POST['reason_for_leaving']);
        $new_job->save();
        return $app['twig']->render('jobs.html.twig', array('job_array' => Job::getAll()));

    });

    $app->post('/clear', function() use ($app){

      Job::clearall();
      return $app['twig']->render('jobs.html.twig');
    });

    //the app needs to be returned outside the the curly braces otherwise it will not show in the page
    return $app;
?>
