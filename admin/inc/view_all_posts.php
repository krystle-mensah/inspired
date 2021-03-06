<div class="table_header">
  <div class="col-xs-4">

    <h1 class="mt-4">Posts</h1>

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

<?php

$qry = "SELECT * FROM posts";
$allPostStatment = mysqli_prepare($connection, $qry);
mysqli_stmt_execute($allPostStatment);
$getResult = mysqli_stmt_get_result($allPostStatment);

foreach ($getResult as $row) {

  $post_id = $row['post_id'];
  $post_author = $row['post_author'];
  $post_title = $row['post_title'];
  $post_category_id = $row['post_category_id'];
  $post_status = $row['post_status'];
  $post_image = $row['post_image'];
  $post_tags = $row['post_tags'];
  $post_date = $row['post_date'];

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
  echo "<td><a onClick=\"javascript: return confirm('Are you sure want to delete')\" href='posts.php?delete={$post_id}'>Delete</a></td>";

  echo "</tr>";
}

?>

</tbody>
</table><!-- table table-bordered table-hover -->

<?php

if (isset($_GET['delete'])) {

  $the_post_id =  mysqli_real_escape_string($connection, $_GET['delete']);

  $delete_post_sql = "DELETE FROM posts WHERE post_id = ?";
  $deleteStatement = mysqli_prepare($connection, $delete_post_sql);
  mysqli_stmt_bind_param($deleteStatement, 'i', $the_post_id);
  mysqli_stmt_execute($deleteStatement);

  // after we delete a post the page will refresh
  header("Location: posts.php");
}

?>