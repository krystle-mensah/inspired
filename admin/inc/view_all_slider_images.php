<?php 
//this is a bet strange i dont understand how the input apply is connected to the if set.

// first we check for activity on the checkbox
if( isset( $_POST['checkBoxArray'] ) ) {
  //echo 'receving data'; // output - there is output when the apply button is clicked
  
  // now we wont to loop around the checkbox

  foreach( $_POST['checkBoxArray'] as $postValueId ) {
    
    //print_r($_POST['checkBoxArray']); // OUTPUTS - Key and value
    //print_r($checkBoxValue);// OUTPUTS - Value  

    //echo $bulk_options = $_POST['bulk_options']; // output - option values

    $bulk_options = $_POST['bulk_options'];

    switch($bulk_options){
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

        if(!$update_to_published_status) {

          // Print a message and terminate the current script:
          die("QUERY FAILED" . mysqli_error($connection));
  
        }

      break;

    } //switch

  } // foreach

} // isset

?>

<div id="bulkOptionContainer" class="col-xs-4 col-lg-2">

    <select class="form-control" name="bulk_options" id="">
      <option value="">Select Options</option>
      <option value="published">Publish</option>
      <option value="draft">Draft</option>
      <option value="delete">Delete</option>
      <option value="clone">Clone</option>
    </select>

</div><!-- bulkOptionContainer --> 


<form class="col-lg-12" action="" method='post'>

  <table class="table table-bordered table-hover">

  <div class="col-xs-4">

    <input type="submit" name="submit" class="btn btn-success" value="Apply">
    <a class="btn btn-primary" href="posts.php?source=add_post">New Slide</a>

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

  <?php $sql = $connection->query("SELECT * FROM carousel");

    foreach($sql as $row ):

      // values we bring back

      $slide_id = $row['carousel_id'];
      $slide_author = $row['carousel_author'];
      $slide_title = $row['carousel_title'];
      $slide_category_id = $row['carousel_cat_id'];
      $slide_image = $row['carousel_image'];
      $slide_tages = $row['carousel_tags'];
      $slide_date = $row['carousel_date'];
      
      //display 
      echo "<tr>";

      echo "<td>$slide_id</td>";
      echo "<td> $slide_author</td>";
      echo "<td> $slide_title</td>";
        
      $sql = $connection->query("SELECT * FROM categories WHERE cat_id = {$slide_category_id} ");
        
        foreach($sql as $row) {
          
          $cat_id = $row['cat_id'];
          $cat_title = $row['cat_title'];
          
          echo "<td>$cat_title</td>";
        } 
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
if(isset($_GET['delete'])){

  echo $the_slide_id = $_GET['delete']; 

  $delete_slide_sql = $connection->query("DELETE FROM carousel WHERE carousel_id = {$the_slide_id}");
  
  // after we delete a post the page will refresh
  header("Location: slider_images.php");

}

?>