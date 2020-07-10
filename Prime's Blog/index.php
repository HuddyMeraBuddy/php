<?php

require('config/config.php');
require('config/db.php');


 $query = "SELECT * FROM posts ORDER BY created_at DESC";

    // Get result 
    $result = mysqli_query($conn,$query);

    // Fetch Result

    $posts = mysqli_fetch_all($result ,MYSQLI_ASSOC);
    // var_dump($posts);
    // Free the result

    mysqli_free_result($result);


    // close the connection
    mysqli_close($conn);

?>
<?php include('include/header.php');?>
    <div class="container">
    <h1>Posts</h1>
    <br>
        <?php foreach($posts as $post) : ?>
            <div class="well ">
                <br>
                <h3><?php echo $post['title'];?> </h3>
                <small><?php echo 'Created on '.$post['created_at'] ?></small>
                <small><?php echo ' by '. $post['author']; ?></small>
                <p><?php echo $post['body'];?><p>
                <a class="btn btn-primary " href='<?php echo ROOT_URL;?>post.php?id=<?php echo $post['id']?>'>Read more</a>
                
                <br>
            </div>
        <?php endforeach; ?>
    </div>
<?php include('include/footer.php');?>
