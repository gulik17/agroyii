<?php

/* @var $this yii\web\View */
use yii\helpers\Html; ?>

<a href="#" class="arrow-back">АгроСити</a>
<ul class="breadcrumb">
    <li><a href="/">agro-gator</a></li>
    <li><a href="#">Услуги</a></li>
    <li><?= $service->name ?></li>
</ul>
<div class="row">
    <div class="col-lg-9">
        <main class="product-card">
            <h2 class="product-card__title-h2 account__title-h2 title-h2"><?= $service->name ?></h2>
            <div class="bill__change-block">
                <p class="card__text_fade">Ростов-на-Дону, Ростовская обл., Россия</p>
                <p class="bill__text_bold"><?= $service->price ?> руб./кг</p>
            </div>
            <div class="tabs">
                <div class="change-block tabs-wrap">
                    <button class="filter__btn tariff-btn-js active">Описание</button>
                    <button class="filter__btn tariff-btn-js">Фото</button>
                </div>
                <div class="tab-content active">
                    <div class="product-card__info card">
                        <p>Организация ООО «Исток-1» в Ростовской области предлагает к реализации продовольственный
                            картофель собственного производства сорта Ред Скарлет, Импала, Артемис.</p>
                        <p>Качество отличное! Оплата за наличный и безначияный расчет с НДС.</p>
                        <p>Организуем доставку собственным транспортом.</p>
                        <table class="product-card__table table">
                            <tr>
                                <td>Сорт</td>
                                <td>Ред Скарлет</td>
                            </tr>
                            <tr>
                                <td>Калибр</td>
                                <td>5+</td>
                            </tr>
                            <tr>
                                <td>Страна происхождения</td>
                                <td>Россия</td>
                            </tr>
                            <tr>
                                <td>Производитель</td>
                                <td>ООО «Исток-1»</td>
                            </tr>
                            <tr>
                                <td>Фасовка</td>
                                <td>50 кг</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="row flex-wrap">
                        <div class="col-md-4">
                            <?= Html::img("@web/images/services/{$service->img}", ["alt" => $service->name, "class" => "product-card__img"]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= Html::img("@web/images/services/{$service->img}", ["alt" => $service->name, "class" => "product-card__img"]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= Html::img("@web/images/services/{$service->img}", ["alt" => $service->name, "class" => "product-card__img"]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= Html::img("@web/images/services/{$service->img}", ["alt" => $service->name, "class" => "product-card__img"]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= Html::img("@web/images/services/{$service->img}", ["alt" => $service->name, "class" => "product-card__img"]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="col-lg-3">
        <aside class="product-card-menu sidebar__menu card card-sticky-js">
            <div class="card__top">
                <p>Поставщик:</p>
                <p class="card__title">ООО «Исток-1»</p>
                <div class="d-flex align-items-center">
                    <p>Рейтинг:</p>
                    <ul class="card__rating d-flex align-items-center">
                        <li class="star star-fill"></li>
                        <li class="star star-fill"></li>
                        <li class="star star-fill"></li>
                        <li class="star star-full"></li>
                        <li class="star star-full"></li>
                    </ul>
                    <p class="card__check card__check-yes">Проверен</p>
                </div>
                <p class="card__reg-data">На сайте: <span class="card__text_fade">с 23.02.19</span></p>
            </div>
            <ul>
                <li>
                    <svg width="24">
                        <use xlink:href="/images/svg-sprite.svg#phone"></use>
                    </svg>
                    <a href="tel:+74951207447" class="card__title link">+7 495 120 74 47</a>
                </li>
                <li>
                    <svg width="24">
                        <use xlink:href="/images/svg-sprite.svg#mail-send"></use>
                    </svg>
                    <a href="#" class="card__title link">Отправить сообщение</a>
                </li>
                <li>
                    <svg width="24">
                        <use xlink:href="/images/svg-sprite.svg#mail-check"></use>
                    </svg>
                    <a href="#" class="card__title link">Подписаться на поставщика</a>
                </li>
                <li>
                    <a href="#" class="card__title link">Другие объявления поставщика</a>
                </li>
            </ul>
        </aside>
    </div>
</div>