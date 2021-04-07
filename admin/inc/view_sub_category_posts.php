<div class="col-xs-4">
  <h1 class="mt-4">Sub Category Posts</h1>
</div>

<table class="table table-bordered table-hover">

  <thead>
    <tr>
      <th><input id='selectAllBoxes' type='checkbox'></th>
      <th>Id</th>
      <th>Author</th>
      <th>Title</th>
      <th>Sub Category</th>
      <th>Status</th>
      <th>Image</th>
      <th>Tags</th>
      <th>Date</th>
      <!-- <th>Post</th> -->
      <th>Edit</th>
      <th>Delete</th>
  </thead>
  <tbody>

    <?php

    $qry = "SELECT * FROM sub_categories_posts";
    $allPostStatment = mysqli_prepare($connection, $qry);
    mysqli_stmt_execute($allPostStatment);
    $getResult = mysqli_stmt_get_result($allPostStatment);

    foreach ($getResult as $row) {

      $subCategoryPostID = $row['subCategoryPostID'];
      $subCategoryID = $row['subCategoryID'];
      $post_title = $row['post_title'];
      $post_author = $row['post_author'];
      $post_date = $row['post_date'];
      $post_tags = $row['post_tags'];
      $post_image = $row['post_image'];
      $post_tags = $row['post_tags'];
      $post_status = $row['post_status'];

      echo "<tr>";
    ?>
      <!-- view post from this page -->
      <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?= $subCategoryPostID ?>'></td>
    <?php

      echo "<td>$subCategoryPostID</td>";
      echo "<td> $post_author</td>";
      echo "<td> $post_title</td>";

      $query = "SELECT * FROM sub_categories WHERE subCategoriesID = ?";
      $statement = mysqli_prepare($connection, $query);
      mysqli_stmt_bind_param($statement, 'i', $subCategoryID);
      mysqli_stmt_execute($statement);
      $result = mysqli_stmt_get_result($statement);

      foreach ($result as $row) {
        // Then assign the array to a variable
        $subCategoriesID = $row['subCategoriesID'];
        $subCategoriesTitle = $row['subCategoriesTitle'];
        // display the cat title 
        echo "<td>{$subCategoriesTitle}</td>";
      }

      echo "<td>$post_status</td>";
      echo "<td><img width='100' src='../img/$post_image' alt='image'></td>";
      echo "<td>$post_tags</td>";
      echo "<td>$post_date</td>";

      //echo "<td><a href='../post.php?p_id={$subCategoryPostID}'>View Post</a></td>";

      echo "<td><a href='sub_category_posts.php?source=edit_sub_category_post&p_id={$subCategoryPostID}'>Edit</a></td>";
      // send this page a message to delete by id
      echo "<td><a  href='sub_category_posts.php?delete_sub_category_post={$subCategoryPostID}'>Delete</a></td>";

      echo "</tr>";
    }

    ?>

  </tbody>
</table><!-- table table-bordered table-hover -->

<?php

if (isset($_GET['delete_sub_category_post'])) {

  $sub_category_post_id =  mysqli_real_escape_string($connection, $_GET['delete_sub_category_post']);

  $delete_post_sql = "DELETE FROM `sub_categories_posts` WHERE `sub_categories_posts`.`subCategoryPostID` = ?";

  $deleteStatement = mysqli_prepare($connection, $delete_post_sql);
  mysqli_stmt_bind_param($deleteStatement, 'i', $sub_category_post_id);
  mysqli_stmt_execute($deleteStatement);

  // after we delete a post the page will refresh
  header("Location: sub_category_posts.php");
}
?>