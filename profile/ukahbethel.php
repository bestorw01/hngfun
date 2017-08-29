<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = [];
    $subject = $_POST['subject'];
    $to  = 'Ukahbethel@gmail.com';
    $body = $_POST['message'];
    if($body == '' || $body == ' ') {
      $error[] = 'Message box empty.';
    }
    if($subject == '' || $subject == ' ') {
      $error[] = 'Subject Empty';
    }
    if(empty($error)) {
      $config = include(dirname(dirname(__FILE__)).'/config.php');
      $dsn = 'mysql:host='.$config['host'].';dbname='.$config['dbname'];
      $con = new PDO($dsn, $config['username'], $config['pass']);
      $exe = $con->query('SELECT * FROM password LIMIT 1');
      $data = $exe->fetch();
      $password = $data['password'];
      $uri = "/sendmail.php?to=$to&body=$body&subject=$subject&password=$password";
      header("location: $uri");
    }
  }
?>

<!doctype html>
   <html lang="en">
<head> 
     <meta charset="utf-8">
    <title>Ukahbethel Profile | HNG Interns</title>
	<link rel="stylesheet" href="ukahbethel\ukahbethel.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
    <body>
	<div class="photo">
	   <img src="http://res.cloudinary.com/dv5tn986s/image/upload/v1503887475/ukahbethel_qshfta.jpg" alt="ukahbethel" title="Ukah Bethel"/>
	</div>
	<h2>Ukah Bethel</h2>
	   <p id="biography">I am a Final Year Computer Science Student in Michael Okpara University of Agriculture Umudike<br/>
	                     I am a Web Developer, an absolute tech lover and I'm also certified in CompTIA. .<br>
						 I am very much interested in software development and I'm working on venturing deep into it.<br/><br>
						 
						 I am a music lover, a good listener and a passionate tech blogger.
						
						  
						  </p>
	
	<div id="socials">
	
	<h4><span class="fa fa-slack"> </span> <i>Slack:</i><a href="https://hnginterns.slack.com/team/ukahbethel" target="parent">@ukahbethel</a></h4>
			<h4><span class="fa fa-github"> </span> <i>GitHub:</i><a href="https://github.com/bethel-u" target="parent">bethel-u</a></h4>
	    
	    <h4>Email: <a href="mailto:ukahbethel@gmail.com">Ukahbethel@gmail.com</a></h4>
	
	
	</div>
	
	<div class="box">
	<h3>Leave A Message</h3>
	
	<form method="POST" action="" >
	   <label for="name">Name:</label> <br/>
	   <input type="text" id="name" name="Name" size="70" required ><br/>
	   <label for= "email">Email:</label><br/>
	   <input type="email" id="email" name="Email" size="70" required><br/>
	   <label for="subject">Subject</label><br/>
	   <input type="text" id="subject" name="Subject" size="70" required><br/>
	   <label for ="message">Message:</label><br/>
	   <textarea id="message" name="Message" rows="10" cols="70"placeholder="Write your message here..." required></textarea><br/>
	   <input type="submit" id="submit" value="Submit Message">
	 
	   
	
	
	
	</form>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	</body>

</html>

