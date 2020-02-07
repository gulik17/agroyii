<?php foreach ($dialog AS $d) { ?>
    <?php if($d->from_id != Yii::$app->getUser()->id) { ?>
    <li class="modal__message-sent">
        <p><span class="modal__message-author"><?= $d->providerFrom->name ?></span> <span class="card__time"><?= date("d.m.Y, H:i", $d->ts_create) ?></span></p>
        <div class="modal__message-text">
            <p><?= $d->message ?></p>
            <?php if($d->files) { ?>
            <div class="modal__message-download d-flex align-items-center">
                <a href="#" class="d-flex align-items-center link" download>
                    <svg width="18" height="18">
                        <use xlink:href="/images/svg-sprite.svg#image"></use>
                    </svg>
                    <p>Схема проезда.jpg</p>
                </a>
                <a href="#" class="d-flex align-items-center link" download>
                    <svg width="18" height="20">
                        <use xlink:href="/images/svg-sprite.svg#file"></use>
                    </svg>
                    <p>Карточка организации.xlsx</p>
                </a>
            </div>
            <?php } ?>
        </div>
    </li>
    <?php } else { ?>
    <li class="modal__message-reply">
        <p><span class="modal__message-author">Вы</span> <span class="card__time"><?= date("d.m.Y, H:i", $d->ts_create) ?></span></p>
        <div class="modal__message-text">
            <p><?= $d->message ?></p>
            <?php if($d->files) { ?>
            <div class="modal__message-download d-flex align-items-center">
                <a href="#" class="d-flex align-items-center link" download>
                    <svg width="18" height="18">
                        <use xlink:href="/images/svg-sprite.svg#image"></use>
                    </svg>
                    <p>Схема проезда.jpg</p>
                </a>
                <a href="#" class="d-flex align-items-center link" download>
                    <svg width="18" height="20">
                        <use xlink:href="/images/svg-sprite.svg#file"></use>
                    </svg>
                    <p>Карточка организации.xlsx</p>
                </a>
            </div>
            <?php } ?>
        </div>
        <?php if($d->ts_read) { ?>
            <p class="modal__message-status card__text_fade">Прочитано</p>
        <?php } ?>
    </li>
    <?php } ?>
<?php } ?>