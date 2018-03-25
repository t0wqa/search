<div class="form-edit-box">
    <h1>Добавить новость</h1>
    <form action="/admin/article/save" method="post">
        <?php if (!empty($data['id'])): ?>
            <input type="hidden" name="id" value="<?= $data['id'] ?>" />
        <?php endif; ?>
        <div class="input-box">
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title" class="input" value="<?= $data['title'] ?? null ?>"/>
            <ul class="errors">
                <?php foreach ($errors['title'] as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="input-box">
            <label for="text">Текст</label>
            <textarea rows="10" id="text" name="text" class="textarea"><?= $data['text'] ?? null ?></textarea>
            <ul class="errors">
                <?php foreach ($errors['text'] as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="input-box">
            <label for="author_id">Автор</label>
            <select id="author_id" name="author_id" class="select">
                <?php foreach ($users as $user): ?>
                    <option value="<?= $user['id'] ?>" <?= !empty($data['author_id']) && $data['author_id'] == $user['id'] ? ' selected' : null ?>><?= $user['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <ul class="errors">
                <?php foreach ($errors['author_id'] as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="input-box">
            <label for="created_at">Дата создания (*текущая, если не указывать)</label>
            <input type="date" id="created_at" name="created_at" class="input" value="<?= !empty($data['created_at']) ? (new DateTime())->setTimestamp($data['created_at'])->format('Y-m-d') : null ?>"/>
            <ul class="errors">
                <?php foreach ($errors['created_at'] as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="input-box">
            <button type="submit">Сохранить</button>
        </div>
    </form>
</div>