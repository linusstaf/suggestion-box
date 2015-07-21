<!DOCTYPE html>
<html lang="en">
<head>
    <title>Suggestion box</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<header class="header">
    <div class="container">
        <h1 class="site-name">Suggestion box</h1>
    </div>
</header>
<main class="main">
    <div class="container">
        <form action="/api/entry/store" method="post">
            <input type="text" name="suggestion" id="suggestion-input" placeholder="Type your suggestion here">
        </form>
    </div>
</main>
<footer class="footer">
    <div class="container">
        <p>&copy; <?= date('Y') ?> <a href="http://linusstaf.com">Linus Staf</a></p>
        <p><a href="#">Admin</a></p>
    </div>
</footer>
<div class="container">
    <h2>Application var_dump()</h2>
    <?php var_dump($this) ?>
</div>
<script src="/js/app.js"></script>
</body>
</html>