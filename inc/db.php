<?php

// db array assigned to value's
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "inspired";

// foreach db array use key to loop through each value.
foreach($db as $key => $value){
  
  define(strtoupper($key),$value);

}

// Create connection
$connection = new mysqli(DB_HOST, DB_USER,DB_PASS,DB_NAME);

// Check connection
// if ($connection->connect_error) {
//   die("Connection failed: " . $connection->connect_error);
// }
// echo "Connected successfully";


//Playing with code

//$query = "SELECT * FROM posts";

//$sent_in = mysqli_query($connection,$query);

// foreach($sent_in as $number_key):
//   echo $post = $number_key['post_title'];
// endforeach;


//JOINS

// $query = "SELECT posts.post_category_id AS post_category_id, carousel.carousel_cat_id AS carousel_cat_id FROM posts, carousel WHERE posts.post_category_id AND carousel.carousel_cat_id = $post_category_id";

// if ($result=mysqli_query($connection,$query))
//   {
//   // Return the number of rows in result set
//   $rowcount=mysqli_num_rows($result);
//   printf("Result set has %d rows.\n",$rowcount);
//   // Free result set
//   mysqli_free_result($result);
//   }

// mysqli_close($connection);


//$db->query ("SELECT *  FROM posts");

// foreach($posts as $row){
//   echo $row;
// }

?>