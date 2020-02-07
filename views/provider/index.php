<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;?>

<div class="row">
    <div class="col-lg-3">
        <!--Sidebar-->
        <aside class="sidebar">
            <h3 class="sidebar__title-h3 title-h3 title-h3_white block-toggle-js">
                Регионы
                <svg>
                    <use xlink:href="/images/svg-sprite.svg#map-pin"></use>
                </svg>
            </h3>
            <div class="block__wrap">
                <div class="sidebar__block block">
                    <h4 class="sidebar__title-h4 title-h4 d-flex justify-content-between align-items-center block-toggle-js">Страна</h4>
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
                    <h4 class="sidebar__title-h4 title-h4 d-flex justify-content-between align-items-center block-toggle-js">Регион</h4>
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
        <main class="catalog">
            <a href="#" class="arrow-back">Поставщики</a>
            <ul class="breadcrumb">
                <li><a href="/">АгроСити</a></li>
                <li>Поставщики</li>
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
                </div>
            </div>
            <!--Sort End-->

            <!--Filter-->
            <form class="catalog__filter-block">
                <p class="catalog__filter-title block-toggle-js">
                    Фильтры
                    <svg>
                        <use xlink:href="/images/svg-sprite.svg#filter"></use>
                    </svg>
                </p>
                <div class="block__wrap">
                    <div class="row">
                        <div class="col-12">
                            <div class="catalog__filter">
                                <span>Фильтры:</span>
                                <div class="filter" id="country">
                                    <button type="button" class="filter__btn filter__btn-js active">
                                        Страна-производитель
                                    </button>
                                    <div class="filter__dropdown">
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
                                        <button type="submit" class="filter__submit btn btn_green">Применить</button>
                                    </div>
                                </div>
                                <div class="filter" id="packing">
                                    <button type="button" class="filter__btn filter__btn-js">Фасовка</button>
                                    <div class="filter__dropdown">
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
                                        <button type="submit" class="filter__submit btn btn_green">Применить</button>
                                    </div>
                                </div>
                                <div class="filter" id="delivery">
                                    <button type="button" class="filter__btn filter__btn-js">Доставка</button>
                                    <div class="filter__dropdown">
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
                                        <button type="submit" class="filter__submit btn btn_green">Применить</button>
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
                            <button type="button" class="catalog__filter-reset filter-reset">Сбросить все фильтры</button>
                        </div>
                    </div>
                </div>
            </form>
            <!--Filter End-->

            <!--Catalog-->
            <div class="row">
                <?php if (!empty($providers)) { ?>
                <?php foreach ($providers as $provider) { ?>
                <div class="col-12">
                    <div class="catalog__card card card-provider">
                        <div class="card__body">
                            <a href="<?= yii\helpers\Url::to(['provider/view', 'id' => $provider->id]) ?>" class="card__title link"><?= $provider->short_name ?></a>
                            <p class="card__region"><?= $provider->address ?></p>
                            <p class="card__provider"><?= $provider->short_name ?></p>
                            <div class="card__bottom">
                                <ul class="card__rating d-flex align-items-center">
                                    <li class="star star-fill"></li>
                                    <li class="star star-fill"></li>
                                    <li class="star star-fill"></li>
                                    <li class="star star-full"></li>
                                    <li class="star star-full"></li>
                                </ul>
                                <div class="card__check-wrap">
                                    <p class="card__check card__check-yes">Проверен</p>
                                    <p class="card__check card__check-no d-none">Идет проверка</p>
                                </div>
                            </div>
                        </div>
                        <div class="card__bookmark-wrap">
                            <p class="card__bookmark card__bookmark_add">
                                <span>В закладки</span>
                                <svg>
                                    <use xlink:href="/images/svg-sprite.svg#bookmark"></use>
                                </svg>
                            </p>
                            <p class="card__bookmark card__bookmark_remove d-none">
                                <sapn class="d-lg-block d-none">Удалить закладку</sapn>
                                <svg>
                                    <use xlink:href="/images/svg-sprite.svg#bookmark-fill"></use>
                                </svg>
                            </p>
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
                    <h2>Поставщиков пока нет</h2>
                </div>
                <?php } ?>
                <div class="col-12 d-flex justify-content-between align-items-center catalog__bottom">
                    <p class="catalog__item-number">Показано: <span><?= count($providers) ?> из <?= $pages->totalCount ?></span></p>
                    <button type="button" class="catalog__btn-more">Показать еще
                        <svg>
                            <use xlink:href="/images/svg-sprite.svg#restart"></use>
                        </svg>
                    </button>
                </div>
            </div>
            <!--Catalog End-->
        </main>
    </div>
</div>