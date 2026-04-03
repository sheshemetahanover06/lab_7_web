<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?? 'Portal Berita'; ?></title>
    <style>
        body {
            font-family: Arial;
            margin: 0;
        }
        header {
            background: #f4f4f4;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
        }
        nav {
            background: #2c6ebd;
            padding: 10px;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-weight: bold;
        }
        .container {
            display: flex;
            padding: 20px;
        }
        .content {
            flex: 3;
        }
        .sidebar {
            flex: 1;
            margin-left: 20px;
        }
        .widget {
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }
        .widget-header {
            background: #2c6ebd;
            color: white;
            padding: 10px;
            font-weight: bold;
        }
        .widget-body {
            padding: 10px;
        }
    </style>
</head>
<body>

<header>
    Portal Berita
</header>

<nav>
    <a href="/">Home</a>
    <a href="/artikel">Artikel</a>
    <a href="/about">About</a>
    <a href="/contact">Kontak</a>
</nav>

<div class="container">
    <div class="content">
        <?= $this->renderSection('content'); ?>
    </div>

    <div class="sidebar">
        <div class="widget">
            <div class="widget-header">Widget Header</div>
            <div class="widget-body">
                <p>Widget Link</p>
                <p>Widget Link</p>
            </div>
        </div>

        <div class="widget">
            <div class="widget-header">Widget Text</div>
            <div class="widget-body">
                <p>
                Vestibulum lorem elit, iaculis in nisl volutpat, malesuada tincidunt arcu.
                Proin in leo fringilla, vestibulum mi porta, faucibus felis.
                </p>
            </div>
        </div>
    </div>
</div>

</body>
</html>