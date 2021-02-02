<?php 

include 'database.php'; 
require 'header.php';
?>

<body>
    <header>
        <div class="container">
            <h1>Quizzer</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>Question <?= $number ?></h2>
            <div class="current">Question <?= $number ?> of <?= $total ?></div>
            <p class="question"><?= $question['text']; ?></p>
            <form action="process.php" method="post">
                <ul class="choices">
                <?php while ($row = $choices->fetch_assoc()) : ?>
                    <li><input type="radio" name="choice" value="<?= $row['id']; ?>" /><?=  $row['text']; ?></li>
                <?php endwhile; ?>
                </ul>
                <input type="submit" name="submit" value="Send">
                <input type="hidden" name="number" value="<?= $number ?>">
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