<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\Units;?>

<!--Catalog-->
<div class="row">
    <?php if (!empty($products)) { ?>
        <?php foreach ($products as $product) { ?>
        <?php
            $full_region = $product->city->name;
            if ($product->region->name) {
                $full_region .= ', '.$product->region->name;
            }
            if ($product->country->name) {
                $full_region .= ', '.$product->country->name;
            } ?>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="catalog__card card">
                <div class="card__img-wrap">
                    <p class="card__date"><?= humanDate($product->ts_create) ?></p>
                    <?php if ($product->img) { ?>
                        <?= Html::img("@web/images/products/" . $product->ts_create ."/". unserialize($product->img)[0], ["alt" => $product->name, "class" => "card__img"]) ?>
                    <?php } else { ?>
                        <?= Html::img("@web/images/camera.svg", ["alt" => $product->name, "class" => "card__img card__svg"]) ?>
                    <?php } ?>
                </div>
                <div class="card__body">
                    <a href="<?= yii\helpers\Url::to(['catalog/detail', 'id' => $product->id, 'category_id' => $product->category_id]) ?>" class="card__title link"><?= $product->name ?></a>
                    <p class="card__region"><?= $full_region ?></p>
                    <p class="card__provider"><?= $product->provider->name ?></p>
                    <div class="card__bottom">
                        <p class="card__price"><?= $product->price ?> руб./<?= Units::getShortUnits($product->price_units) ?></p>
                        <p class="card__availability"><span>В наличии:</span><br><span><?= $product->quantity ?> <?= Units::getShortUnits($product->quantity_units) ?></span></p>
                    </div>
                </div>
                <div class="card__bookmark-wrap">
                    <a href="javascript:void(0)" data-id="<?= $product->id ?>" class="card__bookmark card__bookmark_add <?= (getFavorites($product->id)) ? 'd-none' : ''; ?>">
                        <span>В закладки</span>
                        <svg>
                            <use xlink:href="/images/svg-sprite.svg#bookmark"></use>
                        </svg>
                    </a>
                    <a href="javascript:void(0)" data-id="<?= $product->id ?>" class="card__bookmark card__bookmark_remove <?= (getFavorites($product->id)) ? '' : 'd-none'; ?>">
                        <sapn class="d-lg-block d-none">Удалить закладку</sapn>
                        <svg>
                            <use xlink:href="/images/svg-sprite.svg#bookmark-fill"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
            <div class="col-12">
                <nav>
                <?php
                    echo LinkPager::widget([
                        'pagination' => $pages,
                    ]); ?>
                </nav>
            </div>
        <?php } else { ?>
        <div class="col-12">
            <h2>Товаров пока нет</h2>
        </div>
        <?php } ?>
    
    <div class="col-12 d-flex justify-content-between align-items-center catalog__bottom">
        <p class="catalog__item-number">Показано: <span><?= count($products) ?> из <?= $pages->totalCount ?></span></p>
        <button type="button" class="catalog__btn-more">Показать еще
            <svg>
                <use xlink:href="/images/svg-sprite.svg#restart"></use>
            </svg>
        </button>
    </div>
</div>
<!--Catalog End-->