<?php
    include 'db.php';
    $query = "SELECT * FROM chat ORDER BY id DESC LIMIT 50";
    $run = $connect->query($query);

    while ($row = $run->fetch_array()) :

?>

    <div id="chat_data">
        <span class="id">&nbsp; #<?php echo $row['id']; ?>  &nbsp;</span>
        <span class="usr_chat"><?php echo $row['msg']; ?></span>
        <span class="time"><?php echo formatDate($row['date']); ?></span>
    </div>
    <?php endwhile; ?>