<?php 
// MESSAGE VARS
$msg='';
$msgClass='';
// validate submit 
if(filter_has_var(INPUT_POST,'submit')){
  
    // Get from data
  
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
  
    if(!empty($name) && !empty($email) && !empty($message)){
  
        // passed
  
        // Validate Email
        if(filter_var($email,FILTER_VALIDATE_EMAIL)===false){
        
            // failed
            $msg='Please fill the correct email';
            $msgClass='alert-danger';
        
        }else{
            $mail = 'mishramanvendra76@gmail.com';
            $subject = 'Contact mail from '.$name;
            $body = '<h2> Contact Request</h2>
                    <h3>Name :</h3><p>.$name.</p>
                    <h3>Email :</h3><p>.$email.</p>
                    <h3>Message :</h3><br><p>.$message</p>';
            $header = "MIME-Version: 1.0"."\r\n";
            $header.="Content-Type:text/html;charset=UTF-8"."\r\n";
            $header.="From: ".$name."<".$email.">".'\r\n';       
            if(mail($mail , $subject , $body , $header)){
                // passed
            $msg='SUBMITTED & Send';
            $msgClass='alert-success';
        }else{
            $msg='SUBMITTED!!  But message couldn\'t send';
            $msgClass='alert-warning';
        }
    }
    
    }else{
     
        // failed
        $msg='Please fill all the fields';
        $msgClass='alert-danger';
    }
};

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel='stylesheet' href='https://bootswatch.com/4/cosmo/bootstrap.min.css'>

</head>
<body>
    <nav class='navbar navbar-dark bg-dark'>
        <div class="container">
            <div class="navbar-header mr-auto">
                <a href="index.php" class='navbar-brand '>My Contact</a>
            </div>
        </div>
    </nav>
    <div class="container">

        <?php if($msg != ''){ ?>
            <div class="alert <?php echo $msgClass?>"> <?php echo $msg; ?> </div>
        <?php }else{ ?>
            <div class="alert <?php echo $msgClass?> "> <?php echo $msg; ?> </div>
        <?php } ?>

        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <div class="form-group">
                <label >Name</label>
                <input type="text" name='name' class='form-control' 
                value="<?php echo isset($_POST['name'])?$name : " ";?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name='email' 
                value="<?php echo isset($_POST['email'])? $email : " ";?>">
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea class="form-control" name='message'></textarea>
            </div>
            <div class="form-group">
                <button type="Submit" class="btn btn-primary" name='submit'>SUBMIT</button>
            </div>
        </form>
    </div>
</body>
</html>