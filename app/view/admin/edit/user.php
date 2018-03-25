<div class="form-edit-box">
    <h1>Добавить автора</h1>
    <form action="/admin/user/save" method="post">
        <?php if (!empty($data['id'])): ?>
            <input type="hidden" name="id" value="<?= $data['id'] ?>" />
        <?php endif; ?>
        <div class="input-box">
            <label for="name">Имя</label>
            <input type="text" id="name" name="name" class="input" value="<?= $data['name'] ?? null ?>"/>
            <ul class="errors">
                <?php foreach ($errors['name'] as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="input-box">
            <button type="submit">Сохранить</button>
        </div>
    </form>
</div>