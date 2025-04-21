<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">    
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js"></script>
    <title><?= isset($title) ? htmlspecialchars($title) : htmlspecialchars('Example') ?></title>
</head>
<body>
    <header>
        <nav>
            <a href="/" data-internal>Home</a>
            <a href="/fruits" data-internal>Fruits</a>
            <a href="/addfruit" data-internal>Add Fruit</a>
        </nav>
    </header>
    <main id="content">
        