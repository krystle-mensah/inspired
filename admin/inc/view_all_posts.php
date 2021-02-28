<?php
//this is a bet strange i dont understand how the input apply is connected to the if set.

// first we check for activity on the checkbox
if (isset($_POST['checkBoxArray'])) {
  //echo 'receving data'; // output - there is output when the apply button is clicked

  // now we wont to loop around the checkbox

  foreach ($_POST['checkBoxArray'] as $postValueId) {

    //print_r($_POST['checkBoxArray']); // OUTPUTS - Key and value
    //print_r($checkBoxValue);// OUTPUTS - Value  

    //echo $bulk_options = $_POST['bulk_options']; // output - option values

    $bulk_options = $_POST['bulk_options'];

    switch ($bulk_options) {
      case 'published':
        $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";
        $update_to_published_status = mysqli_query($connection, $query);

        break;

      case 'draft':
        $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";

        $update_to_published_status = mysqli_query($connection, $query);

        break;

      case 'delete':
        $query = "DELETE FROM posts WHERE post_id = {$postValueId} ";

        $update_to_published_status = mysqli_query($connection, $query);

        if (!$update_to_published_status) {

          // Print a message and terminate the current script:
          die("QUERY FAILED" . mysqli_error($connection));
        }

        break;
    } //switch

  } // foreach

} // isset

?>

<div class="table_header">
  <div class="col-xs-4">
    <h1 class="mt-4">Posts</h1>

    <input type="submit" name="submit" class="btn btn-success" value="Apply">
    <a class="btn btn-primary" href="posts.php?source=add_post">New Post</a>

    <!-- <div id="bulkOptionContainer" class=""> -->

    <!-- <select class="form-control" name="bulk_options" id="">
      <option value="">Select Options</option>
      <option value="published">Publish</option>
      <option value="draft">Draft</option>
      <option value="delete">Delete</option>
      <option value="clone">Clone</option>
    </select> -->

    <!-- </div> -->
    <!-- bulkOptionContainer -->

  </div>



</div>


<form class="col-lg-12" action="" method='post'>

  <table class="table table-bordered table-hover">

    <thead>
      <tr>
        <th><input id='selectAllBoxes' type='checkbox'></th>
        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Sub Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Date</th>
        <th>Post</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody>

</form>

<?php //$sql = $connection->query("SELECT * FROM posts");

$qry = "SELECT * FROM posts";

$allPostStatment = mysqli_prepare($connection, $qry);

mysqli_stmt_execute($allPostStatment);

$getResult = mysqli_stmt_get_result($allPostStatment);

// while ($rows = mysqli_fetch_assoc($getResult)) {
//   print_r($rows);
// }

foreach ($getResult as $row) {

  // values we bring back and assign to variable
  $post_id = $row['post_id'];
  $post_author = $row['post_author'];
  $post_title = $row['post_title'];
  $post_category_id = $row['post_category_id'];
  $postSubCatID = $row['postSubCatID'];
  $post_status = $row['post_status'];
  $post_image = $row['post_image'];
  $post_tags = $row['post_tags'];
  $post_date = $row['post_date'];

  //display 
  echo "<tr>";
?>
  <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?= $post_id ?>'></td>
<?php

  echo "<td>$post_id</td>";
  echo "<td> $post_author</td>";
  echo "<td> $post_title</td>";

  $query = "SELECT * FROM categories WHERE cat_id = ?";
  $statement = mysqli_prepare($connection, $query);
  mysqli_stmt_bind_param($statement, 'i', $post_category_id);
  mysqli_stmt_execute($statement);
  $result = mysqli_stmt_get_result($statement);

  foreach ($result as $row) {
    // Then assign the array to a variable
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    // display the cat title 
    echo "<td>{$cat_title}</td>";
  }
  //SUB CATEGORY
  $query = "SELECT * FROM sub_categories WHERE subCategoriesID = ?";
  $statement = mysqli_prepare($connection, $query);
  mysqli_stmt_bind_param($statement, 'i', $postSubCatID);
  mysqli_stmt_execute($statement);
  $result = mysqli_stmt_get_result($statement);

  foreach ($result as $row) {
    $subCategoriesID = $row['subCategoriesID'];
    $subCategoriesTitle = $row['subCategoriesTitle'];
    // display the cat title 
    echo "<td>{$subCategoriesTitle}</td>";
  }
  echo "<td>$post_status</td>";
  echo "<td><img width='100' src='../img/$post_image' alt='image'></td>";
  echo "<td>$post_tags</td>";
  echo "<td>$post_date</td>";

  // go to post page, query string post id and display it.
  echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";

  //passing the page and the post id. 
  echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";

  //sending post page and delete key equal to the post id
  // 203. PHP and Javascript Confirm Before Action. so we wont to add a messge to confirm a deleted post 
  echo "<td><a onClick=\"javascript: return confirm('Are you want to delete')\" href='posts.php?delete={$post_id}'>Delete</a></td>";
  echo "</tr>";
}

?>

</tbody>
</table><!-- table table-bordered table-hover -->

<?php

if (isset($_GET['delete'])) {

  $the_post_id = $_GET['delete'];

  $delete_post_sql = "DELETE FROM posts WHERE post_id = ?";
  $deleteStatement = mysqli_prepare($connection, $delete_post_sql);
  mysqli_stmt_bind_param($deleteStatement, 'i', $the_post_id);
  mysqli_stmt_execute($deleteStatement);

  // after we delete a post the page will refresh
  header("Location: posts.php");
}

?>