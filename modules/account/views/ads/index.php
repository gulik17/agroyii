<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
    use app\models\Product;
    use yii\widgets\Breadcrumbs;
    use yii\helpers\Url;
    use app\models\Units;
    
    $this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/account/']];
    $this->params['breadcrumbs'][] = $this->title; ?>

<?= Breadcrumbs::widget([
    'homeLink' => ['label' => 'АгроСити', 'url' => '/'],
    'itemTemplate' => "<li>{link}</li>\n",
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
<div class="row">
    <div class="col-lg-9">
        <h2 class="account__title-h2 title-h2">Ваши объявления</h2>
        <div class="bill__change-block bookmark__change-block change-block justify-content-between">
            <p>Объявлений: <span class="card__text_fade"><?= count($products) ?></span></p>
            <div class="btn-toggle-block">
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
        <div class="tabs">
            <div class="change-block tabs-wrap">
                <button class="filter__btn tariff-btn-js active">Все</button>
                <button class="filter__btn tariff-btn-js">Идут показы</button>
                <button class="filter__btn tariff-btn-js">Не показывается</button>
            </div>
            <div class="tab-content active">
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
                        <div class="col-lg-4 col-sm-6 mb-3">
                            <div class="catalog__card card">
                                <div class="card__img-wrap">
                                    <?php if ($product->status == Product::STATUS_EXPIRED) { ?>
                                    <p class="card__date card__stop">Истек срок</p>
                                    <?php } ?>
                                    <?php if ($product->img) { ?>
                                        <?= Html::img("@web/images/products/" . $product->ts_create ."/". unserialize($product->img)[0], ["alt" => $product->name, "class" => "card__img"]) ?>
                                    <?php } else { ?>
                                        <?= Html::img("@web/images/camera.svg", ["alt" => $product->name, "class" => "card__img card__svg"]) ?>
                                    <?php } ?>
                                </div>
                                <div class="card__body">
                                    <a href="<?= Url::to(['/account/ads/edit/', 'id' => $product->id]) ?>" class="card__title link"><?= $product->name ?></a>
                                    <p class="card__region"><?= $full_region ?></p>
                                    <p class="card__provider"><?= $product->provider->name ?></p>
                                    <div class="card__bottom">
                                        <p class="card__price"><?= $product->price ?> руб./<?= Units::getShortUnits($product->price_units) ?></p>
                                        <p class="card__availability"><span>В наличии:</span><br><span><?= $product->quantity ?> <?= Units::getShortUnits($product->quantity_units) ?></span></p>
                                    </div>
                                </div>
                                <div class="card__menu">
                                    <button class="card__btn-more filter__btn-js">
                                        <svg height="20">
                                            <use xlink:href="/images/svg-sprite.svg#more"></use>
                                        </svg>
                                    </button>
                                    <ul class="filter__dropdown" style="display: none;">
                                        <li class="prolong" style="display: none;"><a href="" class="link">Продлить</a></li>
                                        <li><a href="<?= Url::to(['/account/ads/edit/', 'id' => $product->id]) ?>" class="link">Редактировать</a></li>
                                        <li><a href="<?= Url::to(['/account/ads/del/', 'id' => $product->id]) ?>" class="link">Удалить</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-lg-4 col-sm-6 mb-3">
                        <a href="<?= Url::to(['/account/ads/add/']) ?>" class="catalog__card card card-empty">
                            Добавить<br> объявление
                        </a>
                    </div>
                    <div class="col-12">
                        <nav>
                        <?php
                            echo LinkPager::widget([
                                'pagination' => $pages,
                            ]); ?>
                        </nav>
                    </div>
                    <?php } else { ?>
                    <div class="col-lg-4 col-sm-6 mb-3">
                        <a href="<?= Url::to(['/account/ads/add/']) ?>" class="catalog__card card card-empty">
                            Добавить<br> объявление
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="tab-content">
                <div class="row">
                    <?php if (!empty($products)) { ?>
                    <?php foreach ($products as $product) { ?>
                        <?php if ($product->status == Product::STATUS_ACTIVE) { ?>
                        <?php
                            $full_region = $product->city->name;
                            if ($product->region->name) {
                                $full_region .= ', '.$product->region->name;
                            }
                            if ($product->country->name) {
                                $full_region .= ', '.$product->country->name;
                            } ?>
                        <div class="col-lg-4 col-sm-6 mb-3">
                            <div class="catalog__card card">
                                <div class="card__img-wrap">
                                    <?php if ($product->img) { ?>
                                    <img src="/images/products/<?= $product->ts_create ?>/<?= unserialize($product->img)[0] ?>" alt="<?= $product->name ?>" class="card__img">
                                    <?php } else { ?>
                                    <img src="/images/camera.svg" class="card__img card__svg">
                                    <?php } ?>
                                </div>
                                <div class="card__body">
                                    <a href="<?= Url::to(['/account/ads/edit/', 'id' => $product->id]) ?>" class="card__title link"><?= $product->name ?></a>
                                    <p class="card__region"><?= $full_region ?></p>
                                    <p class="card__provider"><?= $product->provider->name ?></p>
                                    <div class="card__bottom">
                                        <p class="card__price"><?= $product->price ?> руб./<?= Units::getShortUnits($product->price_units) ?></p>
                                        <p class="card__availability"><span>В наличии:</span><br><span><?= $product->quantity ?> <?= Units::getShortUnits($product->quantity_units) ?></span></p>
                                    </div>
                                </div>
                                <div class="card__menu">
                                    <button class="card__btn-more filter__btn-js">
                                        <svg height="20">
                                            <use xlink:href="/images/svg-sprite.svg#more"></use>
                                        </svg>
                                    </button>
                                    <ul class="filter__dropdown" style="display: none;">
                                        <li class="prolong" style="display: none;"><a href="" class="link">Продлить</a></li>
                                        <li><a href="<?= Url::to(['/account/ads/edit/', 'id' => $product->id]) ?>" class="link">Редактировать</a></li>
                                        <li><a href="<?= Url::to(['/account/ads/del/', 'id' => $product->id]) ?>" class="link">Удалить</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    <?php } ?>
                    <div class="col-lg-4 col-sm-6 mb-3">
                        <a href="<?= Url::to(['/account/ads/add/']) ?>" class="catalog__card card card-empty">
                            Добавить<br> объявление
                        </a>
                    </div>
                    <div class="col-12">
                        <nav>
                        <?php
                            echo LinkPager::widget([
                                'pagination' => $pages,
                            ]); ?>
                        </nav>
                    </div>
                    <?php } else { ?>
                    <div class="col-lg-4 col-sm-6 mb-3">
                        <a href="<?= Url::to(['/account/ads/add/']) ?>" class="catalog__card card card-empty">
                            Добавить<br> объявление
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="tab-content">
                <div class="row">
                    <?php if (!empty($products)) { ?>
                    <?php foreach ($products as $product) { ?>
                        <?php if ($product->status != Product::STATUS_ACTIVE) { ?>
                        <?php
                            $full_region = $product->city->name;
                            if ($product->region->name) {
                                $full_region .= ', '.$product->region->name;
                            }
                            if ($product->country->name) {
                                $full_region .= ', '.$product->country->name;
                            } ?>
                        <div class="col-lg-4 col-sm-6 mb-3">
                            <div class="catalog__card card">
                                <div class="card__img-wrap">
                                    <?php if ($product->status == Product::STATUS_EXPIRED) { ?>
                                    <p class="card__date card__stop">Истек срок</p>
                                    <?php } ?>
                                    <?php if ($product->img) { ?>
                                    <img src="/images/products/<?= $product->ts_create ?>/<?= unserialize($product->img)[0] ?>" alt="<?= $product->name ?>" class="card__img">
                                    <?php } else { ?>
                                    <img src="/images/camera.svg" class="card__img card__svg">
                                    <?php } ?>
                                </div>
                                <div class="card__body">
                                    <a href="<?= Url::to(['/account/ads/edit/', 'id' => $product->id]) ?>" class="card__title link"><?= $product->name ?></a>
                                    <p class="card__region"><?= $full_region ?></p>
                                    <p class="card__provider"><?= $product->provider->name ?></p>
                                    <div class="card__bottom">
                                        <p class="card__price"><?= $product->price ?> руб./<?= Units::getShortUnits($product->price_units) ?></p>
                                        <p class="card__availability"><span>В наличии:</span><br><span><?= $product->quantity ?> <?= Units::getShortUnits($product->quantity_units) ?></span></p>
                                    </div>
                                </div>
                                <div class="card__menu">
                                    <button class="card__btn-more filter__btn-js">
                                        <svg height="20">
                                            <use xlink:href="/images/svg-sprite.svg#more"></use>
                                        </svg>
                                    </button>
                                    <ul class="filter__dropdown" style="display: none;">
                                        <li class="prolong" style="display: none;"><a href="" class="link">Продлить</a></li>
                                        <li><a href="<?= Url::to(['/account/ads/edit/', 'id' => $product->id]) ?>" class="link">Редактировать</a></li>
                                        <li><a href="<?= Url::to(['/account/ads/del/', 'id' => $product->id]) ?>" class="link">Удалить</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    <?php } ?>
                    <div class="col-lg-4 col-sm-6 mb-3">
                        <a href="<?= Url::to(['/account/ads/add/']) ?>" class="catalog__card card card-empty">
                            Добавить<br> объявление
                        </a>
                    </div>
                    <div class="col-12">
                        <nav>
                        <?php
                            echo LinkPager::widget([
                                'pagination' => $pages,
                            ]); ?>
                        </nav>
                    </div>
                    <?php } else { ?>
                    <div class="col-lg-4 col-sm-6 mb-3">
                        <a href="<?= Url::to(['/account/ads/add/']) ?>" class="catalog__card card card-empty">
                            Добавить<br> объявление
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div id="sticky-wrapper" class="sticky-wrapper" style="height: 308px;">
            <aside class="sidebar__menu card card-sticky-js" style="">
                <ul>
                    <?= \app\components\AccountMenuWidget::widget(['tpl' => 'amenu', 'active' => '/account/ads']); ?>
                </ul>
            </aside>
        </div>
    </div>
</div>