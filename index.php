<?php
include 'db.php';

function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}
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
    
    setInterval(function(){ajax()},2000);
</script>


</head>
<body onload="ajax();">
<div id="container">
    <div class="row">
        <div class="col-sm-12">

            <form method="post" action="">

                <div class="form-group btm-4">
                    <h1 class="txt-center"><label for="msg">What bothers you? Go ahead, Just say it!</label></h1>
                    <textarea name="msg" class="form-control txtarea" rows="2"></textarea>
                </div>

                <h3 class="frk-btn">
                    <button <?php echo "style=\"background-color:#" . random_color() . "\""; ?>
                            type="submit" name="submit" id="submit" class="btn btn-lg btn-danger btn-shadow">FARKNOFF
                    </button>
                </h3>
            </form>



            <div id="chat_box">
                <div id="chat"></div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">

            <p class="txt-center"><img class="logo" src="farknoff.gif"></p>
            <h1>Farknoff Disclaimer</h1>
            <p>The First Amendment guarantees freedom of speech. The First Amendment does not protect you against
                criminal or civil litigation if you threaten, slander or harass another person, institution, group
                or organization. The intended use of this website is to allow people to exercise their first amendment
                rights, anonymously. Opinions of users of this site do not reflect the opinions or beliefs of the
                owners of this site. Use at your own risk.</p>

            <h2>Farknoff<sup><span style="font-size:14px; color:black;"> v0.08</span></sup> <br> Beta Release  </h2>
            <p>Site is under active development. Questions, concerns or comments can be directed
                to our <a href="http://twitter.com/farknoff" target="_blank">Twitter account</a>.</p>
            <h2>About Farknoff</h2>



            <p>Farknoff <em><br>(pronounced 'fark in off') verb </em>. <br>To passionately share your opinion
                about something.<br>Example: <em>"The President was farknoff about North Korea and how we should
                nuke them."</em></p>

        </div>

    </div>




</div>

    <?php
        if(isset($_POST['submit'])) {

          $msg = $_POST['msg'];
          $remote_ip = $_SERVER['REMOTE_ADDR'];

          $msg = mysqli_real_escape_string($connect, $msg); //sanitize, prevent sql injection
          $remote_ip = mysqli_real_escape_string($connect, $remote_ip);

            $is_forwarded = isset($_SERVER['HTTP_X_FORWARDED_FOR']);

            if($is_forwarded == true) {
                $forwarded_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                $forwarded_ip = mysqli_real_escape_string($connect, $forwarded_ip);
            }
            else {
                $forwarded_ip = "IP ADDRESS NOT FORWARDED";
                $forwarded_ip = mysqli_real_escape_string($connect, $forwarded_ip);
            }

          $query = "INSERT INTO chat (msg, ip_address, spoofed, spoofed_ip) 
                    values ('$msg', '$remote_ip', '$is_forwarded', '$forwarded_ip')";

          $run = $connect->query($query);

          if($run) {
            echo "<embed loop='false' src='chat.mp3' hidden='true' autoplay='true' />";
          }
        }

    ?>



</body>
</html>