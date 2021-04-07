<div id="bulkOptionContainer" class="col-xs-4">
  <h1 class="mt-4">All Slides Images</h1>

  <!-- <select class="form-control" name="bulk_options" id="">
    <option value="">Select Options</option>
    <option value="published">Publish</option>
    <option value="draft">Draft</option>
    <option value="delete">Delete</option>
    <option value="clone">Clone</option>
  </select> -->

</div><!-- bulkOptionContainer -->


<form class="col-lg-12" action="" method='post'>

  <table class="table table-bordered table-hover">

    <div class="col-xs-4">

      <!-- <input type="submit" name="submit" class="btn btn-success" value="Apply"> -->
      <!-- <a class="btn btn-primary" href="posts.php?source=add_post">New Slide</a> -->

    </div>

    <thead>
      <tr>
        <!-- <th><input id='selectAllBoxes' type='checkbox'></th> -->
        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody>

</form>

<?php

$qry = "SELECT * FROM carousel";
$all_statement = mysqli_prepare($connection, $qry);
mysqli_stmt_execute($all_statement);
$select_all = mysqli_stmt_get_result($all_statement);

foreach ($select_all as $row) :

  // values we bring back

  $slide_id = $row['carousel_id'];
  $slide_cat_title = $row['carouselCat_title'];
  $slide_title = $row['carousel_title'];
  $slide_author = $row['carousel_author'];
  $slide_image = $row['carousel_image'];
  $slide_tages = $row['carousel_tags'];
  $slide_date = $row['carousel_date'];

  //display 
  echo "<tr>";

  echo "<td>$slide_id</td>";
  echo "<td> $slide_author</td>";
  echo "<td> $slide_title</td>";

  echo "<td>$slide_cat_title</td>";

  echo "<td><img width='100' src='../img/$slide_image' alt='image'></td>";
  echo "<td>$slide_tages</td>";
  echo "<td>$slide_date</td>";

  // go to post page, query string post id and display it.
  //echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";

  //passing the page and the post id. 
  echo "<td><a href='slider_images.php?source=edit_slide_image&GET_carousel_id={$slide_id}'>Edit</a></td>";

  //sending post page and delete key equal to the post id
  // 203. PHP and Javascript Confirm Before Action. so we wont to add a messge to confirm a deleted post 
  echo "<td><a onClick=\"javascript: return confirm('Are you want to delete')\" href='slider_images.php?delete={$slide_id}'>Delete</a></td>";
  echo "</tr>";

endforeach;

?>

</tbody>
</table><!-- table table-bordered table-hover -->

<?php

// if this is set
if (isset($_GET['delete'])) {

  $the_slide_id =  mysqli_real_escape_string($connection, $_GET['delete']);

  $delete_slide_sql = "DELETE FROM carousel WHERE carousel_id = ?";
  $deleteStatement = mysqli_prepare($connection, $delete_slide_sql);
  mysqli_stmt_bind_param($deleteStatement, 'i', $the_slide_id);
  mysqli_stmt_execute($deleteStatement);

  // after we delete a post the page will refresh
  header("Location: slider_images.php");
}

?>