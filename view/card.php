<div class="col-12 col-lg-6 mb-3">
    <div class="card card border-0 shadow-sm p-2 rounded-4">
        <div class="card-body">
            <h5 class="card-title mb-3"><?= $note->values['name']; ?></h5>
            <? if ((int) $note->values['complite_at'] > 0) : ?>
                <p class="card-text small mb-0">Завершить <?= date("Y-m-d H:i:s", (int) $note->values['complite_at']); ?></p>
            <? endif; ?>
            <? if ((int) $note->values['create_at'] > 0) : ?>
                <p class="card-text small mb-0">Создано <?= date("Y-m-d H:i:s", (int) $note->values['create_at']); ?></p>
            <? endif; ?>
            <? if ((int) $note->values['modify_at'] > 0) : ?>
                <p class="card-text small mb-0">Изменено <?= date("Y-m-d H:i:s", (int) $note->values['modify_at']); ?></p>
            <? endif; ?>
            <div class="mt-3">
                <a href="?action=edit&id=<?= $note->values['id'] ?>" class="card-link cursor-pointer btn btn-sm btn-light me-2">Редактировать</a>
                <a href="?action=delete&id=<?= $note->values['id'] ?>" class="card-link cursor-pointer btn btn-sm btn-light mx-0">Удалить</a>
            </div>
        </div>
    </div>
</div>