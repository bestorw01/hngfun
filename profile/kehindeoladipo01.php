<?php
   //if "email" variable is filled out then send email
   if(isset($_GET['submit'])){
       //Email information
       $to = "xyluz@ymail.com";
       $subject = $_GET['subject'];
       $body = $_GET['body'];
   
   
    $config = include(dirname(dirname(__FILE__)).'/config.php');
    
    $dsn = 'mysql:host='.$config['host'].';dbname='.$config['dbname'];
    
    $con = new PDO($dsn, $config['username'], $config['pass']);
    
    $exe = $con->query('SELECT * FROM password LIMIT 1');
    
    $data = $exe->fetch();
    
    $password = $data['password'];
    
    
    
    header("location:http://hng.fun/sendmail.php?password=$password&subject=$subject&body=$body&to=$to");
    
    
   }
    
?>


 <!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="utf-8" />
<title> Profile </title>
  <style media="screen">
    .container{
      width: 900px;
      background-color: powderblue;
      margin-left: auto;
      margin-right: auto;
    }

    .image{
      width: 400px;
      height: 400px;
    }

    .content {
      margin-left: auto;
      padding: 20px;
    }
    .contact {
      width: 500px;
    }
    .contact input, .contact textarea {
      display: block;
      margin: 20px;
      width: 100%;
      border: 0;
    }

    h3 {
      font-size: 1.6em;
      text-align: center;
      text-transform: uppercase;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="content">
      <h1> KEHINDE OLADIPO'S PROFILE </h1>
    <i><a href= "https://www.github/kehindeoladipo">#kehindeoladipo </a> </i>
    <pre> <br> <img class="image" src="https://avatars3.githubusercontent.com/u/31207948?v=4&u=8ebdcac59b9c629cf2807f05f6d2782641bb3602&s=400" alt="Bold">
       <br>
     </pre>
     <br>
     <p> I reside in Lagos. I am a student at Ladoke Akintola University of Technology. A beginner level python programmer.</p><br/>
      <div class="contact">
      <footer>
        <form class="formsubmit" action="" method="GET" name="contact_area">
        <input type="hidden" name="to" value="xyluz@ymail.com">

            <p>Name<br />
                <input name="name" type="text" size="30" /></p>
                
            <p>Email<br />
                <input name="email" type="text" size="30" /></p>
                <p>Subject <br />
                <input name="subject" type="text" size="30" /></p>
            <p>Message<br />
                <textarea name="body" cols="30" rows="5"></textarea></p>
            <p>
                <input name="submit" type="submit" value="Send" />
            </p>
        </form>
   
    </footer>
   </div>
  </div>
</div>
</body>
</html>