<?php
include 'db.php';

?>
<!DOCTYPE html>
<html>
<head>
<title>Anonymous Posting About Anything. Go Ahead, Just Say It!</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css" media="all" />
<script>
    function ajax(){
        var req = new XMLHttpRequest();
        req.onreadystatechange = function(){
            if(req.readyState == 4 && req.status == 200){   
                document.getElementById('chat').innerHTML = req.responseText;
            } 
        }
        req.open('GET','chat.php',true);
        req.send();
    }
    
    setInterval(function(){ajax()},1000);
</script>

</head>
<body onload="ajax();">
<div id="container">
<div class="row">
    <div class="col-sm-9">
        <div id="chat_box">
            <div id="chat"></div>
        </div>
    </div>
    <div class="col-sm-3">
        <form method="post" action="index.php">
            <div class="form-group">
                <label for="name">Enter your name:</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="msg">Enter your message:</label>
                <textarea name="msg" class="form-control" rows="4"></textarea>
            </div>

            <button type="submit" name="submit" id="submit" class="btn btn-lg btn-danger">FARKNOFF</button>
        </form>
        <p><img style="width:100%; height:auto" src="farknoff.gif"></p>
        <h1>Farknoff Disclaimer</h1>
        <p>The First Amendment guarantees freedom of speech. The First Amendment does not protect you against
            criminal or civil litigation if you threaten, slander or harass another person, institution, group
            or organization. The intended use of this website is to allow people to exercise their first amendment
            rights, anonymously. Opinions of users of this site do not reflect the opinions or beliefs of the
            owners of this site. Use at your own risk.</p>
        <h2>Farknoff<sup><span style="font-size:14px; color:black;"> v0.02</span></sup> Beta Release  </h2>
        <p>Site is under active development. Questions, concerns or comments can be directed
            to our <a href="http://twitter.com/farknoff" target="_blank">Twitter account</a>.</p>
        <h2>About Farknoff</h2>
        <p>Farknoff <em>(pronounced 'fark in off') verb </em>. <br>To passionately share your opinion about something.
            <br>Example: <em>"The President was farknoff about North Korea and how we should nuke them."</em></p>

    </div>

</div>
    <div class="row">
        <div class="col-sm-12">

        </div>
    </div>


	<div>


    <?php 
    if(isset($_POST['submit'])){
      
      $name = $_POST['name'];
      $msg = $_POST['msg'];
      
      $query = "INSERT INTO chat (name,msg) values ('$name','$msg')";
      
      $run = $connect->query($query);
      
      if($run) {
        echo "<embed loop='false' src='chat.mp3' hidden='true' autoplay='true' />"; 
      }
    }
    
    
    ?>
  </div>
</div>

</body>
</html>