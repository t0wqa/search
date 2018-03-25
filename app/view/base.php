<html>
    <head>
        <title><?= $this->title ?></title>
        <link href="/assets/style.css" rel="stylesheet" />

        <?php foreach ($this->styles as $style): ?>
            <link href="/assets/<?= $style; ?>.css" rel="stylesheet" />
        <?php endforeach; ?>

    </head>
    <body>
        <header class="header">
            <div class="header__image--left"></div>
            <div class="header__text-box">
                <h1 class="header__text">
                    <span>Информационная система поиска на основе меры Солтона</span>
                </h1>
            </div>
            <div class="header__image--right"></div>
        </header>
        <main class="main">
            <?= $this->content ?>
        </main>
        <footer class="footer">
            <p>
                (с) Академия ФСО России, Колесников М.В., Бородащенко А.Ю., 2018
            </p>
        </footer>
        <?php foreach ($this->scripts as $script): ?>
            <script src="/assets/<?= $script; ?>.js"></script>
        <?php endforeach; ?>
    </body>
</html>