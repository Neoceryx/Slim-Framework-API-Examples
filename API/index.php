<?php

// include slim library
include("Slim/Slim.php");

// Slim Instace Register
\Slim\Slim::registerAutoloader();

// Application
$app = new \Slim\Slim();

// Routing

{/* Region api test */
  $app->get(
    '/',function() use ($app){

      // echo "HELLO WORLD";

      /* here you could do
       *Database queries
      *Peticiones a otro rest,
      *etc.
      */

      $datos=array('name' => "Daniel "
                   ,'edad'=>"24" );

      // Imprime la variable datos en formato json.
      echo json_encode($datos);


    } // End function

    )->setParams(array($app)); // End Get.

}/*End Region*/

{/* Region database test */
  $app->get(
      // require a name as parameter.
    '/Users/:localusr',function($localusr) use ($app){

      // storage localuser value
      $LocalUser=$localusr;

      // Include the connection string
      include 'DataAccess\connection.php';

      // Build the query
      $GetUserByLocalUser="SELECT * FROM Users WHERE(LocalUser like '%$LocalUser%')";

      // Query executes.
      $stm=sqlsrv_query($Connection,$GetUserByLocalUser);

      // Handling errors
      if ($stm==false ) {
        die(print_r(sqlsrv_errors(),true));
      }

      while ($result = sqlsrv_fetch_array($stm)) {
        echo $result[0]." ".$result[1]." " .$result[2]." " .$result[3] ."<br>";
      }


    } // End function
    ); // End Get.

}/*End Region*/

{ /* Region Multiples parameters */

  $app->get( '/Add/:n1/:n2', function($n1,$n2){
    $oper = $n1 + $n2;
    echo "Firts Number: ".$n1." <br> Second Number: ".$n2 ;

    echo "<br> the add is: ".$oper;
  }); // End get
} /* End region */

{ /* Region POST AND GET */
  $app->map( '/Mul(/:n1)', function(){
    global $app;
    $n1=$app->request->get('n1');

    if ($n1 == null) {
      $n1=$app->request->post('n1');
    }

    echo "The id was:". $n1;

  })->via('GET','POST');
}/* end Region */

{/* Region POST */
  $app->post('/test',function() use($app){

        // $name=$app->request()->getBody(); Get all the body like json

    // parameters N1 is a varoiable recibed via ajax.
    $name=$app->request()->post('N1');

    echo "HELLO $name";
  });
}/* End region */

{ /* Region Multiples Parameters POST */
$app->post('/param',function()use($app){

  // fnum and snum are comes from ajax on js_Oper function
  $n1=$app->request()->post('fnum');
  $n2=$app->request()->post('snum');

  echo $n1." ".$n2;
});
}/* End Region */



  // Start api
  $app->run();


 ?>
