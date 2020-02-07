<?php

use app\models\Messages;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->params['breadcrumbs'][] = $this->title; ?>

<?= Breadcrumbs::widget([
    'homeLink' => ['label' => 'АгроСити', 'url' => '/'],
    'itemTemplate' => "<li>{link}</li>\n",
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
<h2 class="account__title-h2 title-h2"><?= $this->title ?></h2>
<div class="row">
    <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="<?= Url::to(['/account/ads']) ?>" class="catalog__card account__card card link">
            <div class="card__svg-wrap">
                <svg width="42" height="48">
                    <use xlink:href="/images/svg-sprite.svg#paper"></use>
                </svg>
            </div>
            <p class="card__title">Ваши объявления</p>
            <p class="card__text card__text_fade">Идут показы</p>
        </a>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="<?= Url::to(['/account/messages']) ?>" class="catalog__card account__card card link">
            <div class="card__svg-wrap">
                <svg width="50" height="50">
                    <use xlink:href="/images/svg-sprite.svg#talk"></use>
                </svg>
            </div>
            <p class="card__title">Сообщения</p>
            <p class="card__text"><?= Messages::getUnreadName() ?></p>
            <?php $count = Messages::getUnreadCount(); ?>
            <?php if ($count) {
                echo "<span class=\"card__sign card__sign_orange\">$count</span>";
            } ?>
        </a>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="<?= Url::to(['/account/balance']) ?>" class="catalog__card account__card card link">
            <div class="card__svg-wrap">
                <svg width="50" height="33">
                    <use xlink:href="/images/svg-sprite.svg#ruble"></use>
                </svg>
            </div>
            <p class="card__title">Ваш счет</p>
            <p class="card__text">0 руб.</p>
            <span class="card__sign card__sign_red">!</span>
        </a>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="<?= Url::to(['/favorites']) ?>" class="catalog__card account__card card link">
            <div class="card__svg-wrap">
                <svg width="35" height="48">
                    <use xlink:href="/images/svg-sprite.svg#bookmark2"></use>
                </svg>
            </div>
            <p class="card__title">Закладки</p>
            <p class="card__text">Продукция - 3, Поставщики - 2, Услуги - 3</p>
            <span class="card__sign card__sign_orange">8</span>
        </a>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="<?= Url::to(['/account/subscriptions']) ?>" class="catalog__card account__card card link">
            <div class="card__svg-wrap">
                <svg width="36" height="48">
                    <use xlink:href="/images/svg-sprite.svg#shoping-list"></use>
                </svg>
            </div>
            <p class="card__title">Подписки</p>
            <p class="card__text">Обновлений - 2</p>
            <span class="card__sign card__sign_orange">2</span>
        </a>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="<?= Url::to(['/account/profile']) ?>" class="catalog__card account__card card link">
            <div class="card__svg-wrap">
                <svg width="50" height="41">
                    <use xlink:href="/images/svg-sprite.svg#name"></use>
                </svg>
            </div>
            <p class="card__title">Профиль компании</p>
            <p class="card__text card__text_fade">Заполнен, идет проверка</p>
        </a>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="<?= Url::to(['/account/support']) ?>" class="catalog__card account__card card link">
            <div class="card__svg-wrap">
                <svg width="50" height="50">
                    <use xlink:href="/images/svg-sprite.svg#question"></use>
                </svg>
            </div>
            <p class="card__title">Техническая поддержка</p>
            <p class="card__text card__text_fade">Нет сообщений</p>
        </a>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="<?= Url::to(['/site/logout']) ?>" class="catalog__card account__card card link">
            <div class="card__svg-wrap">
                <svg width="50" height="50">
                    <use xlink:href="/images/svg-sprite.svg#question"></use>
                </svg>
            </div>
            <p class="card__title">Выйти</p>
        </a>
    </div>
    
</div>