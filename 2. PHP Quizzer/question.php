<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzer</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Quizzer</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>test your knowledge</h2>
            <div class="current">Question 1 of 5</div>
            <p class="question">Some question, question?</p>
            <form action="process.php" method="post">
                <ul class="choices">
                    <li><input type="radio" name="choice" value="1" />Some answer</li>
                    <li><input type="radio" name="choice" value="1" />Some answer</li>
                    <li><input type="radio" name="choice" value="1" />Some answer</li>
                    <li><input type="radio" name="choice" value="1" /> Some answer</li>
                </ul>
                <input type="submit" value="Send">
            </form>
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; 2021, Quizzer
        </div>
    </footer>
</body>
</html>