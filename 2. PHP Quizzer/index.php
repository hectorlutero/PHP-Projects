<?php require 'header.php'; ?>
<body>
    <header>
        <div class="container">
            <h1>Quizzer</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>test your knowledge</h2>
            <p>This is a multiple choice quiz</p>
            <ul>
                <li><strong>Number of questions: </strong><?= $total ?></li>
                <li><strong>Type: </strong>Multiple Choice</li>
                <li><strong>Estimated Time: </strong><?= $total * .5; ?> minutes</li>
            </ul>
            <a href="question.php?n=1" class="start">Start Quiz</a>
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; 2021, Quizzer
        </div>
    </footer>
</body>
</html>