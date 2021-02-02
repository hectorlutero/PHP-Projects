<?php require 'header.php'; ?>

<body>
    <header>
        <div class="container">
            <h1>Quizzer</h1>
        </div>
    </header>
    <main>
        <div class="container">
           <h2>You're Done!</h2>
            <p>Congrats! You have completed the test.</p>
            <p>Final Score: <?= $_SESSION['score']; ?></p>
            <a href="question.php?n=1" class="start">Take again</a>
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; 2021, Quizzer
        </div>
    </footer>

    <?php session_unset(); session_destroy(); ?>
</body>
</html>