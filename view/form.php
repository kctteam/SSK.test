<form action="" method="post">
    <? if ($editNote->edit) : ?>
        <h2 class="mb-4">Edit <small class="text-muted">#<?= $editNote->values["id"] ?></small></h2>
    <? else : ?>
        <h2 class="mb-4">Create new</h2>
    <? endif; ?>

    <? foreach (Note::$keys as $key => $value) : ?>
        <? if (!in_array($key, Note::$visible)) : ?>
            <input type="hidden" name="<?= $key ?>" value="<?= $editNote->values[$key] ?>">
        <? else : ?>
            <div class="mb-3">
                <label for="<?= $key ?>" class="form-label"><?= $value ?></label>
                <input type="text" class="form-control" id="<?= $key ?>" aria-describedby="<?= $key ?>" name="<?= $key ?>" value="<?= ($key=="complite_at") ? date("Y-m-d H:i:s", (int) $editNote->values['complite_at']) : $editNote->values[$key] ?>">
            </div>
        <? endif; ?>

    <? endforeach; ?>
    <? if ($editNote->edit) : ?>
        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a href="/" class="btn btn-primary">Отмена</a>
    <? else : ?>
        <button type="submit" class="btn btn-primary">Создать</button>
    <? endif; ?>
</form>