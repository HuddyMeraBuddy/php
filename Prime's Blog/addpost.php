<?php
    require('config/config.php');
    require('config/db.php');
//    Check for submit button 
    if(isset($_POST['submit'])){
        // Get the form data 
        $title = mysqli_real_escape_string($conn,$_POST['title']);
        $author = mysqli_real_escape_string($conn,$_POST['author']);
        $body = mysqli_real_escape_string($conn,$_POST['body']);

        $query = "INSERT INTO posts(title,author,body) VALUES('$title','$author','$body')";
        
        if(mysqli_query($conn , $query)){
            header ('Location :'.ROOT_URL.'');
        }else{
            echo 'Error'.mysqli_error($conn);
        }


    }

?>
<?php include('include/header.php');?>
    <div class="container">
    <h1>Create Posts</h1>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method='POST'>
    
            <div class="form-group">
            
                <label >TITLE</label>
                <input type="text" name='title' class="form-control">
            
            </div>

            <div class="form-group">
            
                <label >AUTHOR</label>
                <input type="text" name='author' class="form-control">
            
            </div>

            <div class="form-group">
            
                <label >BODY</label>
                <textarea name='body' class="form-control"></textarea>
            
            </div>
            <input type="submit" value="submit" name='submit' class='btn btn-primary'>
        </form>
    </div>
<?php include('include/footer.php');?>
