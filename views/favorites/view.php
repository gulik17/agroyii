<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager; ?>

<div class="row">
    <div class="col-lg-12">
        <a href="#" class="arrow-back">Овощи</a>
        <ul class="breadcrumb">
            <li><a href="/">АгроСити</a></li>
            <li><?= $this->title ?></li>
        </ul>
        <h2 class="catalog__title-h2 title-h2"><?= $this->title ?></h2>
        <!--Sort-->

        <div class="catalog__sorting-block d-flex justify-content-between align-items-center">
            <p class="catalog__number">Предложений: <?= $pages->totalCount ?></p>
            <div class="d-flex align-items-center justify-content-end">
                <div class="sorting">
                    <button type="button" class="filter__btn-js">
                        <span class="sorting__btn">Сортировка</span>
                        <svg>
                            <use xlink:href="/images/svg-sprite.svg#sort"></use>
                        </svg>
                    </button>
                    <form class="filter__dropdown" method="get">
                        <ul class="filter__list">
                            <li>
                                <input type="checkbox" id="price1" value="" class="filter__check-js">
                                <label class="checkbox-marker" for="price1"></label>
                                <p class="checkbox-label">Сначала дешевые</p>
                            </li>
                            <li>
                                <input type="checkbox" id="price2" value="" class="filter__check-js">
                                <label class="checkbox-marker" for="price2"></label>
                                <p class="checkbox-label">Сначала дорогие</p>
                            </li>
                        </ul>
                    </form>
                </div>

                <button type="button" class="btn-toggle btn-card active">
                    <svg>
                        <use xlink:href="/images/svg-sprite.svg#cards"></use>
                    </svg>
                </button>
                <button type="button" class="btn-toggle btn-list">
                    <svg>
                        <use xlink:href="/images/svg-sprite.svg#list"></use>
                    </svg>
                </button>
                <button type="button" class="btn-toggle btn-list2">
                    <svg>
                        <use xlink:href="/images/svg-sprite.svg#list-2"></use>
                    </svg>
                </button>
            </div>
        </div>
        <!--Sort End-->

        <!--Catalog-->
        <div class="row">
            <?php if (!empty($favorites)) { ?>
            <?php foreach ($favorites as $key => $product) { ?>
            <div class="col-lg-3 col-sm-6">
                <div class="catalog__card card">
                    <div class="card__img-wrap">
                        <p class="card__date">Сегодня, 08:58</p>
                        <?= Html::img("@web/images/products/{$product->img}", ["alt" => $product->name, "class" => "card__img"]) ?>
                    </div>
                    <div class="card__body">
                        <a href="<?= yii\helpers\Url::to(['catalog/detail', 'id' => $product->id, 'category_id' => $product->category_id]) ?>" class="card__title link"><?=$product->name?></a>
                        <p class="card__region">Ростов-на-Дону, Ростовская обл.</p>
                        <p class="card__provider">ООО «Исток-1»</p>
                        <div class="card__bottom">
                            <p class="card__price"><?=$product->price?> руб./кг</p>
                            <p class="card__availability"><span>В наличии:</span><br><span>40т.</span></p>
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
                <h2>Вы пока ничего не добавили...</h2>
            </div>
            <?php } ?>
            <div class="col-12 d-flex justify-content-between align-items-center catalog__bottom">
                <p class="catalog__item-number">Показано: <span><?= count($favorites) ?> из <?= $pages->totalCount ?></span></p>
                <button type="button" class="catalog__btn-more">Показать еще
                    <svg>
                        <use xlink:href="/images/svg-sprite.svg#restart"></use>
                    </svg>
                </button>
            </div>
        </div>
        <!--Catalog End-->
    </div>
</div>