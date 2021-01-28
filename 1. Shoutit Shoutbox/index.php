<?php include 'database.php'; ?>
<?php

    // Create a Select Query
    $sql    = "SELECT * FROM shouts ORDER BY id DESC";
    $shouts = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoutit Shoutbox</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="container">
        <header>
            <h1>SHOUT IT! Shoutbox</h1>
        </header>
        <div id="shouts">
            <ul>
                <?php while ($row = mysqli_fetch_assoc($shouts)) : ?>
                    <li class="shout"><span><?= $row['time'] ?> - </span><strong style="font-weight: bold;"> <?= $row['user'] ?>:</strong> <?= $row['message'] ?></li>
                <?php endwhile ?>
            </ul>
        </div>
        <div id="input">
            
            <?php if(isset($_GET['error'])) :?>
                <div class="error-msg"><?= $_GET['error']; ?></div>
            <?php endif; ?>
            <form action="process.php" method="post">
                <input type="text" name="user" placeholder="Enter your name">
                <input type="text" name="message" placeholder="Enter your message">
                <input class="shout-btn" type="submit" name="submit" value="shout it now">
            </form>    
        </div>
    </div>
    
</body>
</html>