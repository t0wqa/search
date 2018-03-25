<div class="search-bar">
    <?php if (!empty($term)): ?>
        <h2 class="search-result-title">
            Поиск по запросу <?= $term ?> (<?= count($items) ?> результатов)
        </h2>
    <?php endif; ?>
    <form action="/search" method="get" class="search-bar__form">
        <input type="text" name="term" class="search-bar__input" value="<?= $term ?>" />
        <button class="search-bar__button" type="submit">Найти</button>
    </form>
    <div class="search-bar__additional-filters">
        <input type="checkbox" id="with-additional-filters" class="search-bar__additional-filters--input"/>
        <label for="with-additional-filters" class="search-bar__additional-filters--label">Дополнительный поиск</label>
    </div>
    <div class="search-bar__additional_inputs">
        <div class="input-item">
            <label for="select-author">Автор</label>
            <select id="select-author">
                <option value="0" selected>Выберите автора...</option>
                <?php foreach ($users as $user): ?>
                    <option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="input-item">
            <label for="input-date-from">Дата с</label>
            <input type="date" id="input-date-from"/>
        </div>
        <div class="input-item">
            <label for="input-date-to">Дата по</label>
            <input type="date" id="input-date-to"/>
        </div>
    </div>
    <?php if (!empty($term) && !empty($items)): ?>
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
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
