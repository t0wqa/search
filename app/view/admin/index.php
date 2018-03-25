<div class="admin-panel">
    <div class="admin-panel__articles">
        <h2>Новости</h2><span class="add-link">(<a href="/admin/article/edit">Добавить</a>)</span>
        <div class="search-results">
            <?php foreach ($items as $item): ?>
                <div class="result-card">
                    <div class="result-card__header">
                        <a href="/article?id=<?= $item['id'] ?>" class="result-card__header--link"><?= $item['title'] ?></a>
                    </div>
                    <div class="result-card__body">
                        <span class="result-card__body--text">
                            <?= mb_substr($item['text'], 0, 255) . '...' ?>
                        </span>
                    </div>
                    <div class="result-card__footer">
                        <ul class="result-card__footer-list">
                            <li><?= (new \DateTime())->setTimestamp($item['created_at'])->format('d-m-Y') ?></li>
                            <li><?= !empty($item['author']) ? $item['author'] : 'Автор удален' ?></li>
                            <li><a href="/admin/article/edit?id=<?= $item['id'] ?>">Ред.</a></li>
                            <li><a href="/admin/article/delete?id=<?= $item['id'] ?>">Уд.</a></li>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="admin-panel__users">
        <h2>Авторы</h2><span class="add-link">(<a href="/admin/user/edit">Добавить</a>)</span>
        <div class="user-list">
            <?php foreach ($users as $user): ?>
                <ul class="user-list__item">
                    <li><?= $user['name'] ?></li>
                    <li><a href="/admin/user/edit?id=<?= $user['id'] ?>">Ред.</a></li>
                    <li><a href="/admin/user/delete?id=<?= $user['id'] ?>">Уд.</a></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>