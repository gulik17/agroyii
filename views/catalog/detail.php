<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\models\Units;
use app\models\Provider;

$this->params['breadcrumbs'][] = ['label' => 'Продукция', 'url' => ['catalog/']];
$this->params['breadcrumbs'][] = ['label' => $product->category->name, 'url' => ['catalog/view', 'category_id' => $product->category_id]];
$this->params['breadcrumbs'][] = $product->name;?>

<ul class="breadcrumb">
    <?= Breadcrumbs::widget([
        'homeLink' => ['label' => 'АгроСити', 'url' => '/'],
        'itemTemplate' => "<li>{link}</li>\n",
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
</ul>
<?php
    $full_region = $product->city->name;
    if ($product->region->name) {
        $full_region .= ', '.$product->region->name;
    }
    if ($product->country->name) {
        $full_region .= ', '.$product->country->name;
    } ?>
<div class="row">
    <div class="col-lg-9">
        <main class="product-card">
            <h2 class="product-card__title-h2 account__title-h2 title-h2"><?= $product->name ?></h2>
            <div class="bill__change-block">
                <p class="card__text_fade"><?= $full_region ?></p>
                <p class="bill__text_bold"><?= $product->price ?> руб./<?= Units::getShortUnits($product->price_units) ?></p>
            </div>
            <div class="tabs">
                <div class="change-block tabs-wrap">
                    <button class="filter__btn tariff-btn-js active">Описание</button>
                    <button class="filter__btn tariff-btn-js">Фото</button>
                </div>
                <div class="tab-content active">
                    <div class="product-card__info card">
                        <?= $product->content ?>
                        <table class="product-card__table table">
                            <tr>
                                <td>Сорт</td>
                                <td><?= $product->grade->name ?></td>
                            </tr>
                            <tr>
                                <td>Калибр</td>
                                <td><?= $product->caliber ?> <?= Units::getUnits($product->caliber_units) ?></td>
                            </tr>
                            <tr>
                                <td>Страна происхождения</td>
                                <td><?= $product->countryOrigin->name ?></td>
                            </tr>
                            <tr>
                                <td>Производитель</td>
                                <td><?= $product->provider->name ?></td>
                            </tr>
                            <tr>
                                <td>Фасовка</td>
                                <td><?= $product->packing ?> <?= Units::getUnits($product->packing_units) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="row flex-wrap">
                        <?php $images = unserialize($product->img); ?>
                        <?php if ($images) { ?>
                            <?php foreach ($images as $img) { ?>
                            <div class="col-md-4">
                                <?= Html::img("@web/images/products/" . $product->ts_create ."/". $img, ["alt" => $product->name, "class" => "product-card__img"]) ?>
                            </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="col-lg-3">
        <aside class="product-card-menu sidebar__menu card card-sticky-js">
            <div class="card__top">
                <p>Поставщик:</p>
                <p class="card__title"><?= $product->provider->name ?></p>
                <div class="d-flex align-items-center">
                    <p>Рейтинг:</p>
                    <ul class="card__rating d-flex align-items-center">
                        <li class="star star-fill"></li>
                        <li class="star star-fill"></li>
                        <li class="star star-fill"></li>
                        <li class="star star-full"></li>
                        <li class="star star-full"></li>
                    </ul>
                    <p class="card__check card__check-yes"><?= Provider::getStatus($product->provider->status) ?></p>
                </div>
                <p class="card__reg-data">На сайте: <span class="card__text_fade">с <?= date("d.m.Y", $product->ts_create) ?></span></p>
            </div>
            <ul>
                <li>
                    <svg width="24">
                        <use xlink:href="/images/svg-sprite.svg#phone"></use>
                    </svg>
                    <a href="tel:<?= $product->provider->phone ?>" class="card__title link"><?= $product->provider->phone ?></a>
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