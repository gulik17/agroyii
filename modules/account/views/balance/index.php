<?php
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
        <main class="bill">
            <h2 class="account__title-h2 title-h2"><?= $this->title ?></h2>
            <div class="bill__change-block change-block">
                <div class="change-block__wrap">
                    <p>Текущий баланс:</p>
                    <span class="bill__text_bold">0 руб</span><a href="#bill-modal" class="advert__link modal-js">Пополнить</a>
                </div>
                <div class="change-block__wrap">
                    <p>Текущий тариф:</p>
                    <span class="bill__text_bold tariff">«Оптима»</span><a href="#tariff-modal" class="advert__link modal-js">Изменить</a>
                </div>
            </div>
            <div class="bill__change-block change-block">
                <button class="filter__btn bill-btn-js active">Все платежи</button>
                <button class="filter__btn bill-btn-js">Пополнения</button>
                <button class="filter__btn bill-btn-js">Списания</button>
            </div>
            <div class="bill__card-block">
                <div class="bill__card card">
                    <p class="card__operation-date">31.07.19 <span class="card__time">(23:11:12)</span></p>
                    <p class="card__text">Пополнение счета
                        <sapn class="card__text_fade">(Безналичная оплата)</sapn>
                    </p>
                    <p class="card__price card__price_fade">3 450 руб.</p>
                    <span class="card__check card__check-time"></span>
                </div>
                <div class="bill__card card">
                    <p class="card__operation-date">31.07.19 <span class="card__time">(23:11:12)</span></p>
                    <p class="card__text">Оплата за объявление по тарифу «Оптима»</p>
                    <p class="card__price card__price_red">-150 руб.</p>
                    <span class="card__check card__check-yes"></span>
                </div>
                <div class="bill__card card">
                    <p class="card__operation-date">31.07.19 <span class="card__time">(23:11:12)</span></p>
                    <p class="card__text">Пополнение счета <span class="card__text_fade">(Яндекс Касса)</span></p>
                    <p class="card__price card__price_green">3 550 руб.</p>
                    <span class="card__check card__check-yes"></span>
                </div>
                <div class="d-flex justify-content-between align-items-center catalog__bottom">
                    <p class="catalog__item-number">Показано: <span>9 из 54</span></p>
                    <button type="button" class="catalog__btn-more">Показать еще
                        <svg>
                            <use xlink:href="/images/svg-sprite.svg#restart"></use>
                        </svg>
                    </button>
                </div>
            </div>
        </main>
    </div>
    <div class="col-lg-3">
        <div id="sticky-wrapper" class="sticky-wrapper" style="height: 308px;">
            <aside class="sidebar__menu card card-sticky-js" style="width: 270px;">
                <ul>
                    <?= \app\components\AccountMenuWidget::widget(['tpl' => 'amenu', 'active' => '/account/balance']); ?>
                </ul>
            </aside>
        </div>
    </div>
</div>