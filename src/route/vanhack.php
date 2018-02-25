<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

// Get All vanhackjobs
$app->get('/api/vanhackjobs', function (Request $request, Response $response) {

    $sql = "SELECT * FROM `jobs` LIMIT 5";

    try{
        // Get DB Oject
$db = new db();
// Connect
$db = $db->connect();

$stmt = $db->query($sql);
$vanhackjobs = $stmt->fetchAll(PDO::FETCH_OBJ);
$db= null;
echo json_encode($vanhackjobs,JSON_UNESCAPED_SLASHES);
    }catch(PDOException $e){
echo '{"error":{"text":'.$e->getMessage().'}}';
    }
});

// Get All vanhackjobs
$app->get('/api/vanhackjobsfilter', function (Request $request, Response $response) {

    $sql = "SELECT country, job_type FROM `jobs` ";

    try{
        // Get DB Oject
$db = new db();
// Connect
$db = $db->connect();

$stmt = $db->query($sql);
$vanhackjobs = $stmt->fetchAll(PDO::FETCH_OBJ);
$db= null;
echo json_encode($vanhackjobs,JSON_UNESCAPED_SLASHES);
    }catch(PDOException $e){
echo '{"error":{"text":'.$e->getMessage().'}}';
    }
});

// Get vanhackjobs for infinite loading
$app->get('/api/vanhackjobs/{lastid}', function (Request $request, Response $response) {
    $lastid = $request->getAttribute('lastid');
    $sql = "SELECT * FROM `jobs` WHERE id > $lastid LIMIT 2 ";

    try{
        // Get DB Oject
$db = new db();
// Connect
$db = $db->connect();

$stmt = $db->query($sql);
$vanhackjobs = $stmt->fetchAll(PDO::FETCH_OBJ);
$db= null;
echo json_encode($vanhackjobs,JSON_UNESCAPED_SLASHES);
    }catch(PDOException $e){
echo '{"error":{"text":'.$e->getMessage().'}}';
    }
});



// Get Single vanhackjob 
$app->get('/api/vanhackjob/{id}', function (Request $request, Response $response) {
   $id = $request->getAttribute('id');
    $sql = "SELECT * FROM jobs WHERE id = $id";

    try{
        // Get DB Oject
$db = new db();
// Connect
$db = $db->connect();

$stmt = $db->query($sql);
$vanhackjob = $stmt->fetchAll(PDO::FETCH_OBJ);
$db= null;
echo json_encode($vanhackjob,JSON_UNESCAPED_SLASHES);
    }catch(PDOException $e){
echo '{"error":{"text":'.$e->getMessage().'}}';
    }
});


