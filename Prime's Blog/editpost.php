<?php
    require('config/config.php');
    require('config/db.php');
//    Check for submit button 
    if(isset($_POST['submit'])){
        // Get the form data 
        $update_id = mysqli_real_escape_string($conn , $_POST['update_id']);
        $title = mysqli_real_escape_string($conn,$_POST['title']);
        $author = mysqli_real_escape_string($conn,$_POST['author']);
        $body = mysqli_real_escape_string($conn,$_POST['body']);

        $query = "UPDATE posts SET
                    title = '$title',
                    author = '$author',
                    body = '$body' 
                    WHERE id = {$update_id}"; 


        if(mysqli_query($conn , $query)){
            header ('Location :'.ROOT_URL.'');
        }else{
            echo 'Error'.mysqli_error($conn);
        }


    }
    
        // Get ID
    $id = mysqli_real_escape_string($conn,$_REQUEST['id']);
        // $newid = $_GET['id'];

    $query = 'SELECT * FROM posts WHERE id = '.$id;
    // Get result 
    $result = mysqli_query($conn,$query);

    // Fetch Result

    $post = mysqli_fetch_assoc($result);
    // var_dump($posts);
    // Free the result

    mysqli_free_result($result);


    // close the connection
    mysqli_close($conn);
?>
<?php include('include/header.php');?>
    <div class="container">
    <h1>Create Posts</h1>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method='POST'>
    
            <div class="form-group">
            
                <label >TITLE</label>
                <input type="text" name='title' class="form-control" value="<?php echo $post['title'];?>">
            
            </div>

            <div class="form-group">
            
                <label >AUTHOR</label>
                <input type="text" name='author' class="form-control"value="<?php echo $post['author'];?>">
            
            </div>

            <div class="form-group">
            
                <label >BODY</label>
                <textarea name='body' class="form-control"><?php echo $post['body'];?></textarea>
            
            </div>  
            <input type="hidden" name="update_id" value='<?php echo $post['id'];?>' >
            <input type="submit" value="submit" name='submit' class='btn btn-primary'>
        </form>
    </div>
<?php include('include/footer.php');?>
