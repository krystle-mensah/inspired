<?php

//CONFIRM FUNCTION

function confirmQuery($result)
{

  // MAKE ME GLOBAL
  global $connection;

  //IF NOT 
  if (!$result) {

    // Print a message and terminate the current script:
    die("QUERY FAILED" . mysqli_error($connection));
  }
}

function deleteCategories()
{
  global $connection;
  // check url for get delete
  if (isset($_GET['delete'])) {
    // get the id to delete
    $the_cat_id = mysqli_real_escape_string($connection, $_GET['delete']);

    $deleteQry = "DELETE FROM categories WHERE cat_id = ?";
    $deleteStatement = mysqli_prepare($connection, $deleteQry);
    mysqli_stmt_bind_param($deleteStatement, 'i', $the_cat_id);
    mysqli_stmt_execute($deleteStatement);

    header("Location: categories.php");
  }
}

function insert_categories()
{
  global $connection;
  //check POST submit is set
  if (isset($_POST['submit'])) {
    // Post the cat title
    $cat_title = $_POST['cat_title'];

    // check the cat_title is equal to an empty string or function to check is var is empty
    if ($cat_title == "" || empty($cat_title)) {
      //if true display this message
      echo "This field should not empty";
    } else {

      $insertQry = 'INSERT INTO categories (cat_title) VALUE(?)';
      $insertStatement = mysqli_prepare($connection, $insertQry);
      mysqli_stmt_bind_param($insertStatement, 's', $cat_title);
      mysqli_stmt_execute($insertStatement);

      if (!$insertStatement) {
        printf("Error: %s\n", mysqli_error($connection));
        exit();
      }
    } // End else

  } // isset function

}
