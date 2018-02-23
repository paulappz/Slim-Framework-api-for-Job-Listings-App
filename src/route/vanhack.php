<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

// Get All vanhackjobs
$app->get('/api/vanhackjobs', function (Request $request, Response $response) {

    $sql = "SELECT * FROM `jobs`";

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
    $sql = "SELECT * FROM `jobs` WHERE id > $lastid LIMIT 5 ";

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



// // Add vanhackjob 
// $app->post('/api/vanhackjob/add', function (Request $request, Response $response) {
//     $role = $request->getParam('role');
//     $details = $request->getParam('details');
//     $comp_des = $request->getParam('comp_des');
//     $type = $request->getParam('type');
//     $country = $request->getParam('country');
//     $city = $request->getParam('city');
//     $mskills = $request->getParam('mskills');
//     $nskills = $request->getParam('nskills');
//     $time = $request->getParam('time');

       

//     $sql = "INSERT INTO `jobs` (`job_role`, `country`, `city`, `roles_details`, `company_description`, `nice_skills`, `must_skills`, `job_type`, `post_date`)
//     VALUES  ( :job_role, :country, :city, :roles_details, :company_description, :nice_skills, :must_skills, :job_type, :post_date)";

//         try{
//         // Get DB Oject
//     $db = new db();
//     // Connect
//     $db = $db->connect();

//     $stmt = $db->prepare($sql);

//     $role = $request->getParam('role');
//     $details = $request->getParam('details');
//     $comp_des = $request->getParam('comp_des');
//     $type = $request->getParam('type');
//     $country = $request->getParam('country');
//     $city = $request->getParam('city');
//     $mskills = $request->getParam('mskills');
//     $nskills = $request->getParam('nskills');
//     $time = $request->getParam('time');

//     $stmt->bindParam(':job_role', $role);
//     $stmt->bindParam(':roles_details', $details);
//     $stmt->bindParam(':company_description', $comp_des);
//     $stmt->bindParam(':job_type', $type);
//     $stmt->bindParam(':country', $country);
//     $stmt->bindParam(':city', $city);
//     $stmt->bindParam(':must_skills', $mskills);
//     $stmt->bindParam(':nice_skills', $nskills);
//     $stmt->bindParam(':post_date', $time);


//     $stmt->execute();

//     echo '{"notice":{"text": "vanhackjob Added"}';

//     }catch(PDOException $e){
//         echo '{"error":{"text":'.$e->getMessage().'}}';
//     }
// });

// // Update vanhackjob 
// $app->put('/api/vanhackjob/update/{id}', function (Request $request, Response $response) {

//  $id = $request->getAttribute('id');

//     $vanhackjobname = $request->getParam('vanhackjobname');
//     $title = $request->getParam('title');
//     $synopsis = $request->getParam('synopsis');
//     $vrating = $request->getParam('vrating');
//     $starring = $request->getParam('starring');
//     $runningtime = $request->getParam('runningtime');
//     $showtimes = $request->getParam('showtimes');
//     $trailerlink = $request->getParam('trailerlink');
//     $imagelink = $request->getParam('imagelink');
//     $state = $request->getParam('state');
//     $area = $request->getParam('area');
//     $extras = $request->getParam('extras');
       

//     $sql = "UPDATE `vanhackjobs` SET
//      vanhackjobname = :vanhackjobname,
//       title  = :title,
//       synopsis =:synopsis,
//       vrating =:vrating,
//       starring =:starring,
//       runningtime =:runningtime,
//       showtimes =:showtimes,
//       trailerlink =:trailerlink,
//       imagelink =:imagelink,
//       state =:state,
//       area =:area,
//       extras =:extras 
//     WHERE id = $id";

//     try{
//         // Get DB Oject
// $db = new db();
// // Connect
// $db = $db->connect();

// $stmt = $db->prepare($sql);

// $stmt->bindParam(':vanhackjobname', $vanhackjobname);
// $stmt->bindParam(':title', $title);
// $stmt->bindParam(':synopsis', $synopsis);
// $stmt->bindParam(':vrating', $vrating);
// $stmt->bindParam(':starring', $starring);
// $stmt->bindParam(':runningtime', $runningtime);
// $stmt->bindParam(':showtimes', $showtimes);
// $stmt->bindParam(':trailerlink', $trailerlink);
// $stmt->bindParam(':imagelink', $imagelink);
// $stmt->bindParam(':state', $state);
// $stmt->bindParam(':area', $area);
// $stmt->bindParam(':extras', $extras);

// $stmt->execute();

// echo '{"notice":{"text": "vanhackjob Updated"}';

//     }catch(PDOException $e){
// echo '{"error":{"text":'.$e->getMessage().'}}';
//     }
// });



// // Delete vanhackjob 
// $app->delete('/api/vanhackjob/delete/{id}', function (Request $request, Response $response) {
//    $id = $request->getAttribute('id');
//     $sql = "DELETE FROM vanhackjobs WHERE id = $id";

//     try{
//         // Get DB Oject
// $db = new db();
// // Connect
// $db = $db->connect();

// $stmt = $db->prepare($sql);
// $stmt->execute();
// $db= null;
// echo '{"notice":{"text": "vanhackjob Deleted"}';
//     }catch(PDOException $e){
// echo '{"error":{"text":'.$e->getMessage().'}}';
//     }
// });
