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

<form action="" method='post'>

  <table class="table table-bordered table-hover">

  <div id="bulkOptionContainer" class="col-xs-4">

    <select class="form-control" name="bulk_options" id="">
      <option value="">Select Options</option>
      <option value="published">Publish</option>
      <option value="draft">Draft</option>
      <option value="delete">Delete</option>
      <option value="clone">Clone</option>
    </select>

  </div><!-- bulkOptionContainer --> 

  <div class="col-xs-4">

    <input type="submit" name="submit" class="btn btn-success" value="Apply">
    <a class="btn btn-primary" href="posts.php?source=add_post">New Post</a>

  </div>

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
        <th>Comments</th>
        <th>Date</th>  
        <th>Post</th>     
        <th>Edit</th>      
        <th>Delete</th>      
    </thead>
    <tbody>

</form>

  <?php 

  // select all from the posts table.
  $query = "SELECT * FROM posts";

  // mysqli_query function sends in the above query and connection. 
  $select_posts = mysqli_query($connection,$query);

  //condition is true fetch the row representing the array from ($variable)
  while($row = mysqli_fetch_array($select_posts)) {

    // values we bring back and assign to variable
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
    
    //display 
    echo "<tr>";
    ?>
      <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id ?>'></td>  
    <?php 
       
    echo "<td>$post_id</td>";
    echo "<td> $post_author</td>";
    echo "<td> $post_title</td>";
      
      // select ALL from the table where [column name] variable is equal to this [column name] variable.
      $request_to = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
      
      // function to send query into the database. 
      $select_categories_id = mysqli_query($connection,$request_to);
       
      // while the condition is true fetch the row representing the array from ($variable - see above)
      while($row = mysqli_fetch_array($select_categories_id)) {
        // Then assign the array to a variable
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        // display the cat title 
        echo "<td>{$cat_title}</td>";
      } 
    echo "<td>$post_status</td>";
    echo "<td><img width='100' src='../images/$post_image' alt='image'></td>";
    echo "<td>$post_tags</td>";
    echo "<td>$post_comment_count</td>";
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

// if this is set
if(isset($_GET['delete'])){

  // then convert this into the $the_post_id variable
  $the_post_id = $_GET['delete']; 

  // delete
  $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";

  // function performs a query against a database to send in. 
  $delete_query = mysqli_query($connection,$query);
  
  // after we delete a post the page will refresh
  header("Location: posts.php");

}

?>