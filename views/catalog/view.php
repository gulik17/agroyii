<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\Units;
use yii\widgets\Breadcrumbs;

$this->params['breadcrumbs'][] = ['label' => 'Продукция', 'url' => ['catalog/']];
$this->params['breadcrumbs'][] = Html::encode($this->title); ?>

<div class="row">
    <div class="col-lg-3">
        <!--Sidebar-->
        <aside class="sidebar">
            <h3 class="sidebar__title-h3 title-h3 title-h3_white">
                Регионы
                <span class="btn-close region-close-js"></span>
            </h3>
            <div class="block__wrap">
                <div class="sidebar__block block">
                    <h4 class="sidebar__title-h4 title-h4 d-flex justify-content-between align-items-center toggle-js">Страна</h4>
                    <div class="block__wrap">
                        <ul class="block__list">
                            <li class="d-flex">
                                <input class="checkbox" value="#" id="sidebar-country1" name="country1" type="checkbox">
                                <label class="checkbox-marker" for="sidebar-country1"></label>
                                <p class="checkbox-label">Украина<span>1</span></p>
                            </li>
                            <li class="d-flex">
                                <input class="checkbox" value="#" id="sidebar-country2" name="country2" type="checkbox">
                                <label class="checkbox-marker" for="sidebar-country2"></label>
                                <p class="checkbox-label">Белоруссия<span>22</span></p>
                            </li>
                            <li class="d-flex">
                                <input class="checkbox" value="#" id="sidebar-country3" name="country3" type="checkbox">
                                <label class="checkbox-marker" for="sidebar-country3"></label>
                                <p class="checkbox-label">Казахста<span>3</span></p>
                            </li>
                            <li class="d-flex">
                                <input class="checkbox" value="#" id="sidebar-country4" name="country4" type="checkbox">
                                <label class="checkbox-marker" for="sidebar-country4"></label>
                                <p class="checkbox-label">Россия<span>122</span></p>
                            </li>
                            <li class="d-flex">
                                <input class="checkbox" value="#" id="country5" name="country5" type="checkbox">
                                <label class="checkbox-marker" for="country5"></label>
                                <p class="checkbox-label">Таджикистан<span>25</span></p>
                            </li>
                        </ul>
                        <div class="block__bottom d-flex justify-content-between">
                            <button type="button">Показать все</button>
                            <button type="button" class="filter-reset">Сбросить</button>
                        </div>
                    </div>
                </div>
                <div class="sidebar__block block">
                    <h4 class="sidebar__title-h4 title-h4 d-flex justify-content-between align-items-center toggle-js">Регион</h4>
                    <div class="block__wrap">
                        <ul class="block__list">
                            <li class="d-flex">
                                <input class="checkbox" value="#" id="region1" name="region1" type="checkbox">
                                <label class="checkbox-marker" for="region1"></label>
                                <p class="checkbox-label">Астраханская область<span>1</span></p>
                            </li>
                            <li class="d-flex">
                                <input class="checkbox" value="#" id="region2" name="region2" type="checkbox">
                                <label class="checkbox-marker" for="region2"></label>
                                <p class="checkbox-label">Волгоградская область<span>4</span></p>
                            </li>
                            <li class="d-flex">
                                <input class="checkbox" value="#" id="region3" name="region3" type="checkbox">
                                <label class="checkbox-marker" for="region3"></label>
                                <p class="checkbox-label">Краснодарский край<span>25</span></p>
                            </li>
                            <li class="d-flex">
                                <input class="checkbox" value="#" id="region4" name="region4" type="checkbox">
                                <label class="checkbox-marker" for="region4"></label>
                                <p class="checkbox-label">Республика Адыгея<span>1</span></p>
                            </li>
                            <li class="d-flex">
                                <input class="checkbox" value="#" id="region5" name="region5" type="checkbox">
                                <label class="checkbox-marker" for="region5"></label>
                                <p class="checkbox-label">Ростовская область<span>2</span></p>
                            </li>
                        </ul>
                        <div class="block__bottom d-flex justify-content-between">
                            <button type="button">Показать все</button>
                            <button type="button" class="filter-reset">Сбросить</button>
                        </div>
                    </div>
                </div>
                <div class="block">
                    <button type="button" class="btn sidebar__btn btn_green">Применить</button>
                    <button type="button" class="btn sidebar__btn btn_grey">Сбросить</button>
                </div>
            </div>
        </aside>
        <!--Sisebar End-->
    </div>
    <div class="col-lg-9">
        <ul class="breadcrumb">
        <?= Breadcrumbs::widget([
                'homeLink' => ['label' => 'АгроСити', 'url' => '/'],
                'itemTemplate' => "<li>{link}</li>\n",
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
        </ul>
        <h2 class="catalog__title-h2 title-h2"><?= Html::encode($this->title) ?></h2>

        <!--Sort-->

        <div class="catalog__sorting-block d-flex justify-content-between align-items-center">
            <p class="catalog__number">Предложений: 58</p>
            <div class="d-flex align-items-center justify-content-between">
                <div class="catalog__filter-region-title title-h3 title-h3_white region-toggle-js">
                    Регионы
                    <svg>
                        <use xlink:href="/images/svg-sprite.svg#map-pin"></use>
                    </svg>
                </div>
                <div class="catalog__filter-title filter-toggle-js">
                    Фильтры
                    <svg>
                        <use xlink:href="/images/svg-sprite.svg#filter"></use>
                    </svg>
                </div>
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
                                <input type="radio" id="price1" value="price-low" name="sort[]">
                                <label class="checkbox-marker" for="price1">Сначала дешевые</label>
                            </li>
                            <li>
                                <input type="radio" id="price2" value="price-high" name="sort[]">
                                <label class="checkbox-marker" for="price2">Сначала дорогие</label>
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

        <!--Filter-->
        <form class="catalog__filter-block">
            <div class="row">
                <div class="col-12">
                    <div class="catalog__filter">
                        <span>Фильтры:</span>
                        <div class="filter" id="country">
                            <button type="button" class="filter__btn filter__btn-js active">
                                Страна-производитель
                            </button>
                            <div class="filter__dropdown">
                                <p class="filter__title">Страна-производитель</p>
                                <span class="btn-close filter-close-js"></span>
                                <input type="search" class="filter__search">
                                <ul class="filter__list">
                                    <li>
                                        <input type="checkbox" id="country1" value="" class="filter__check-js" checked="checked">
                                        <label class="checkbox-marker" for="country1"></label>
                                        <p class="checkbox-label">Россия</p>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="country2" value="" class="filter__check-js">
                                        <label class="checkbox-marker" for="country2"></label>
                                        <p class="checkbox-label">Украина</p>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="country3" value="" class="filter__check-js">
                                        <label class="checkbox-marker" for="country3"></label>
                                        <p class="checkbox-label">Белоруссия</p>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="country4" value="" class="filter__check-js">
                                        <label class="checkbox-marker" for="country4"></label>
                                        <p class="checkbox-label">Казахстан</p>
                                    </li>
                                </ul>
                                <button type="submit" class="filter__submit btn btn_green">Применить
                                </button>
                            </div>
                        </div>
                        <div class="filter" id="grade">
                            <button type="button" class="filter__btn filter__btn-js">Сорт</button>
                            <div class="filter__dropdown">
                                <p class="filter__title">Сорт</p>
                                <span class="btn-close filter-close-js"></span>
                                <input type="search" class="filter__search">
                                <ul class="filter__list os-host-flexbox">
                                    <li>
                                        <input type="checkbox" id="grade1" value="">
                                        <label class="checkbox-marker" for="grade1"></label>
                                        <p class="checkbox-label">Сорт1</p>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="grade2" value="">
                                        <label class="checkbox-marker" for="grade2"></label>
                                        <p class="checkbox-label">Сорт1</p>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="grade3" value="">
                                        <label class="checkbox-marker" for="grade3"></label>
                                        <p class="checkbox-label">Сорт3</p>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="grade4" value="">
                                        <label class="checkbox-marker" for="grade4"></label>
                                        <p class="checkbox-label">Сорт4</p>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="grade5" value="">
                                        <label class="checkbox-marker" for="grade5"></label>
                                        <p class="checkbox-label">Сорт4</p>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="grade6" value="">
                                        <label class="checkbox-marker" for="grade6"></label>
                                        <p class="checkbox-label">Сорт4</p>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="grade7" value="">
                                        <label class="checkbox-marker" for="grade7"></label>
                                        <p class="checkbox-label">Сорт7</p>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="grade8" value="">
                                        <label class="checkbox-marker" for="grade8"></label>
                                        <p class="checkbox-label">Сорт8</p>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="grade9" value="">
                                        <label class="checkbox-marker" for="grade9"></label>
                                        <p class="checkbox-label">Сорт9</p>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="grade10" value="">
                                        <label class="checkbox-marker" for="grade10"></label>
                                        <p class="checkbox-label">Сорт10</p>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="grade11" value="">
                                        <label class="checkbox-marker" for="grade11"></label>
                                        <p class="checkbox-label">Сорт11</p>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="grade12" value="">
                                        <label class="checkbox-marker" for="grade12"></label>
                                        <p class="checkbox-label">Сорт12</p>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="grade13" value="">
                                        <label class="checkbox-marker" for="grade13"></label>
                                        <p class="checkbox-label">Сорт13</p>
                                    </li>
                                </ul>
                                <button type="submit" class="filter__submit btn btn_green">Применить
                                </button>
                            </div>
                        </div>
                        <div class="filter" id="size">
                            <button type="button" class="filter__btn filter__btn-js">Калибр</button>
                            <div class="filter__dropdown">
                                <p class="filter__title">Калибр</p>
                                <span class="btn-close filter-close-js"></span>
                                <input type="search" class="filter__search">
                                <ul class="filter__list">
                                    <li>
                                        <input type="checkbox" id="size1" value="">
                                        <label class="checkbox-marker" for="size1"></label>
                                        <p class="checkbox-label">4+</p>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="size2" value="">
                                        <label class="checkbox-marker" for="size2"></label>
                                        <p class="checkbox-label">5+</p>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="size3" value="">
                                        <label class="checkbox-marker" for="size3"></label>
                                        <p class="checkbox-label">6+</p>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="size4" value="">
                                        <label class="checkbox-marker" for="size4"></label>
                                        <p class="checkbox-label">7+</p>
                                    </li>
                                </ul>
                                <button type="submit" class="filter__submit btn btn_green">Применить
                                </button>
                            </div>
                        </div>
                        <div class="filter" id="packing">
                            <button type="button" class="filter__btn filter__btn-js">Фасовка</button>
                            <div class="filter__dropdown">
                                <p class="filter__title">Фасовка</p>
                                <span class="btn-close filter-close-js"></span>
                                <input type="search" class="filter__search">
                                <ul class="filter__list">
                                    <li>
                                        <input type="checkbox" id="packing1" value="">
                                        <label class="checkbox-marker" for="packing1"></label>
                                        <p class="checkbox-label">5кг</p>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="packing2" value="">
                                        <label class="checkbox-marker" for="packing2"></label>
                                        <p class="checkbox-label">10кг</p>
                                    </li>
                                </ul>
                                <button type="submit" class="filter__submit btn btn_green">Применить
                                </button>
                            </div>
                        </div>
                        <div class="filter" id="delivery">
                            <button type="button" class="filter__btn filter__btn-js">Доставка</button>
                            <div class="filter__dropdown">
                                <p class="filter__title">Доставка</p>
                                <span class="btn-close filter-close-js"></span>
                                <input type="search" class="filter__search">
                                <ul class="filter__list">
                                    <li>
                                        <input type="checkbox" id="delivery1" value="">
                                        <label class="checkbox-marker" for="delivery1"></label>
                                        <p class="checkbox-label">Почтой</p>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="delivery2" value="">
                                        <label class="checkbox-marker" for="delivery2"></label>
                                        <p class="checkbox-label">Транспортная компания</p>
                                    </li>
                                </ul>
                                <button type="submit" class="filter__submit btn btn_green">Применить
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row flex-wrap">
                <div class="col-12 d-lg-flex justify-content-between d-block">
                    <div class="filter__current">
                        <span class="filter__title">Страна-производитель:</span>
                        <a href="#" class="filter__value link">Россия<span class="filter__close"></span></a>
                    </div>
                    <div class="filter__current d-flex align-items-center"></div>
                </div>
                <div class="col-12">
                    <button type="button" class="catalog__filter-reset filter-reset">Сбросить все фильтры
                    </button>
                </div>
            </div>
        </form>
        <!--Filter End-->

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
            <div class="col-md-4 col-sm-6">
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
                        <a href="<?= yii\helpers\Url::to(['/catalog/detail', 'id' => $product->id, 'category_id' => $product->category_id]) ?>" class="card__title link"><?=$product->name?></a>
                        <p class="card__region"><?= $full_region ?></p>
                        <p class="card__provider"><?= $product->provider->name ?></p>
                        <div class="card__bottom">
                            <p class="card__price"><?=$product->price?> руб./<?= Units::getShortUnits($product->price_units) ?></p>
                            <p class="card__availability"><span>В наличии:</span><br><span><?= $product->quantity ?> <?= Units::getShortUnits($product->quantity_units) ?></span></p>
                        </div>
                    </div>
                    <div class="card__bookmark-wrap">
                        <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="В закладки" data-id="<?= $product->id ?>" class="card__bookmark card__bookmark_add <?= (getFavorites($product->id)) ? 'd-none' : ''; ?>">
                            <svg>
                                <use xlink:href="/images/svg-sprite.svg#bookmark"></use>
                            </svg>
                        </a>
                        <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Удалить закладку" data-id="<?= $product->id ?>" class="card__bookmark card__bookmark_remove <?= (getFavorites($product->id)) ? '' : 'd-none'; ?>">
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
        <div class="catalog__banner d-flex justify-content-between align-items-center flex-column">
            <h2 class="title-h2 title-h4_white">Подпишитесь на новые предложения<br> с выбранными параметрами фильтра</h2>
            <button type="button" class="btn btn_green catalog__btn">Подписаться</button>
        </div>
    </div>
</div>