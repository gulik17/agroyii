<?php

use app\models\Messages;
use yii\widgets\Breadcrumbs;

$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/account/']];
$this->params['breadcrumbs'][] = $this->title; ?>

<?= Breadcrumbs::widget([
    'homeLink' => ['label' => 'АгроСити', 'url' => '/'],
    'itemTemplate' => "<li>{link}</li>\n",
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
<div class="row">
    <div class="col-lg-9">
        <h2 class="account__title-h2 title-h2"><?= $this->title ?></h2>
        <div class="bill__change-block bookmark__change-block change-block justify-content-between">
            <p>Новых сообщений: <span class="card__text_fade"><?= $this->title ?></span></p>
        </div>
        <div class="tabs">
            <div class="change-block tabs-wrap">
                <button class="filter__btn tariff-btn-js active">Активные</button>
                <button class="filter__btn tariff-btn-js">Заблокированные</button>
            </div>
            <div class="tab-content active">
                <form action="#" class="header__form d-flex align-items-center">
                    <input type="search" placeholder="Поиск в сообщениях ...">
                    <button type="button">
                        <svg>
                            <use xlink:href="/images/svg-sprite.svg#search"></use>
                        </svg>
                    </button>
                </form>
                <?php foreach ($messages as $msg) { ?>
                <?php if ($msg->from_id != Yii::$app->getUser()->id) {
                    $userName = $msg->providerFrom->name;
                    $sender_id = $msg->from_id;
                } else {
                    $userName = $msg->providerTo->name;
                    $sender_id = $msg->to_id;
                } ?>
                <?php $unreadMsgCount = Messages::getUnreadCount($msg->m_group); ?>
                <div class="messages__card <?= ($unreadMsgCount) ? 'messages__card_unread' : 'messages__card_read' ?> card modal-js" data-mfp-src="#message-modal" data-group-id="<?= $msg->m_group ?>" data-user-id="<?= $sender_id ?>" data-user-name="<?= $userName ?>">
                    <div>
                        <p class="card__message-title"><?= $userName ?></p>
                        <p><?= $msg->message ?></p>
                    </div>
                    <div>
                        <span class="card__time"><?= date("H:i", $msg->ts_create) ?></span>
                        <?php if ($unreadMsgCount) { ?>
                        <span class="card__sign card__sign_orange"><?= $unreadMsgCount ?></span>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="tab-content">
                <form action="#" class="header__form d-flex align-items-center">
                    <input type="search" placeholder="Поиск в сообщениях...">
                    <button type="button">
                        <svg>
                            <use xlink:href="/images/svg-sprite.svg#search"></use>
                        </svg>
                    </button>
                </form>
                <?php foreach ($messages as $msg) { ?>
                <?php if ($msg->from_id != Yii::$app->getUser()->id) {
                    $userName = $msg->providerFrom->name;
                    $sender_id = $msg->from_id;
                } else {
                    $userName = $msg->providerTo->name;
                    $sender_id = $msg->to_id;
                } ?>
                <?php $unreadMsgCount = Messages::getUnreadCount($msg->m_group); ?>
                <div class="messages__card <?= ($unreadMsgCount) ? 'messages__card_unread' : 'messages__card_read' ?> card modal-js" data-mfp-src="#message-modal" data-group-id="<?= $msg->m_group ?>" data-user-id="<?= $sender_id ?>" data-user-name="<?= $userName ?>">
                    <div>
                        <p class="card__message-title"><?= $userName ?></p>
                        <p><?= $msg->message ?></p>
                    </div>
                    <div>
                        <span class="card__time"><?= date("H:i", $msg->ts_create) ?></span>
                        <?php if ($unreadMsgCount) { ?>
                            <span class="card__sign card__sign_orange"><?= $unreadMsgCount ?></span>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div id="sticky-wrapper" class="sticky-wrapper" style="height: 308px;">
            <aside class="sidebar__menu card card-sticky-js">
                <ul>
                    <?= \app\components\AccountMenuWidget::widget(['tpl' => 'amenu', 'active' => '/account/messages']); ?>
                </ul>
            </aside>
        </div>
    </div>
</div>