<?php
    include 'db.php';
    $query = "SELECT * FROM chat ORDER BY id DESC LIMIT 30";
    $run = $connect->query($query);

    while ($row = $run->fetch_array()) :


?>

    <div id="chat_data">
        <p class="output">
            <span class="id">&nbsp; #<?php echo $row['id']; ?>  &nbsp;</span>
            <span class="usr_chat swatch"><?php echo $row['msg']; ?></span>
            <span class="time"><?php echo formatDate($row['date']); ?></span>
        </p>

        <script>
            var hex = Math.floor( Math.random() * 0xFFFFFF );
            var res = document.getElementById('result');
            var result = "#" + hex.toString(16);

            res.style.color = result;
            //    res.innerHTML = result;
        </script>
    </div>
    <?php endwhile; ?>