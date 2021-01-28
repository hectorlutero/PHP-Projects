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
                <li class="shout"><span>11:52 - </span> Hector: What's up guys! How're doing?</li>
                <li class="shout"><span>11:52 - </span> Hector: What's up guys! How're doing?</li>
                <li class="shout"><span>11:52 - </span> Hector: What's up guys! How're doing?</li>
                <li class="shout"><span>11:52 - </span> Hector: What's up guys! How're doing?</li>
            </ul>
        </div>
        <div id="input">
            <form action="process.php" method="post">
                <input type="text" name="user" placeholder="Enter your name">
                <input type="text" name="message" placeholder="Enter your message">
                <input class="shout-btn" type="submit" name="submit" value="shout it now">
            </form>    
        </div>
    </div>
    
</body>
</html>