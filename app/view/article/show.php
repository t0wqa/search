<div class="article">
    <h1>
        <?= $article['title'] ?>
    </h1>
    <p>
        <?= $article['text'] ?>
    </p>
    <p><strong>Дата: </strong> <?= (new \DateTime())->setTimestamp($article['created_at'])->format('d-m-Y') ?></p>
    <p><strong>Автор: </strong> <?= $article['author'] ?></p>
</div>