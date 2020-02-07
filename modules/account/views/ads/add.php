<?php

    use yii\bootstrap\ActiveForm;
    use yii\helpers\ArrayHelper;
    use app\models\Country;
    use app\models\Region;
    use app\models\City;
    use app\models\Grade;
    use app\models\Units;
    use app\models\Provider;
    use yii\helpers\Html;
    use yii\widgets\Breadcrumbs;

$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/account/']];
$this->params['breadcrumbs'][] = ['label' => 'Ваши объявления', 'url' => ['/account/ads']];
$this->params['breadcrumbs'][] = $product->name; ?>

<?= Breadcrumbs::widget([
    'homeLink' => ['label' => 'АгроСити', 'url' => '/'],
    'itemTemplate' => "<li>{link}</li>\n",
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
<div class="row">
    <div class="col-lg-9">
        <h2 class="catalog__title-h2 title-h2"><?= Html::encode($this->title) ?></h2>
        <?php
        $form = ActiveForm::begin([
            'options' => ['class' => 'description'],
        ]); ?>
        <div class="advert__toggle advert-toggle-js">
            <div class="description__row d-block">
                <div class="form-group field-product-country_origin_id">
                    <label class="control-label" for="product-category_id">Раздел каталога:</label>
                    <select id="product-category_id" class="description__select select-js" name="Product[category_id]">
                        <?= \app\components\MenuWidget::widget(['tpl' => 'select', 'model' => $product]) ?>
                    </select>
                </div>
            </div>
        </div>
        <p class="description__title">Описание товара</p>
        <div class="description__row">
            <div class="description__select-wrap">
                <?= $form->field($product, 'country_origin_id', ['inputOptions' => ['class' => 'description__select select-js', 'data-placeholder' => 'Выберите']])->dropDownList(ArrayHelper::map(Country::find()->all(), 'id', 'name')) ?>
            </div>
            <div class="description__select-wrap">
                <?= $form->field($product, 'grade_id', ['inputOptions' => ['class' => 'description__select select-js', 'data-placeholder' => 'Выберите']])->dropDownList(ArrayHelper::map(Grade::find()->all(), 'id', 'name')) ?>
            </div>
        </div>
        <div class="description__row">
            <div class="description__select-wrap d-flex justify-content-between align-content-end">
                <div class="description__select-wrap">
                    <?= $form->field($product, 'caliber', ['inputOptions' => ['class' => 'description__input']])->label('Калибр (необязательно)') ?>
                </div>
                <div class="description__select-wrap">
                    <?= $form->field($product, 'caliber_units', ['inputOptions' => ['class' => 'description__select select-js', 'data-placeholder' => 'Выберите']])->dropDownList(Units::getUnits())->label(false) ?>
                </div>
            </div>
            <div class="description__select-wrap d-flex justify-content-between align-content-end">
                <div class="description__select-wrap">
                    <?= $form->field($product, 'quantity', ['inputOptions' => ['class' => 'description__input']]) ?>
                </div>
                <div class="description__select-wrap">
                    <?= $form->field($product, 'quantity_units', ['inputOptions' => ['class' => 'description__select select-js', 'data-placeholder' => 'Выберите']])->dropDownList(Units::getUnits())->label(false) ?>
                </div>
            </div>
        </div>
        <div class="description__row">
            <div class="description__select-wrap d-flex justify-content-between align-content-end">
                <div class="description__select-wrap">
                    <?= $form->field($product, 'packing', ['inputOptions' => ['class' => 'description__input']])->label('Фасовка (необязательно)') ?>
                </div>
                <div class="description__select-wrap">
                    <?= $form->field($product, 'packing_units', ['inputOptions' => ['class' => 'description__select select-js', 'data-placeholder' => 'Выберите']])->dropDownList(Units::getUnits())->label(false) ?>
                </div>
            </div>
        </div>
        <div class="description__row">
            <div class="description__select-wrap d-flex justify-content-between align-content-end">
                <div class="description__select-wrap">
                    <?= $form->field($product, 'price', ['inputOptions' => ['class' => 'description__input']]) ?>
                </div>
                <span class="description__rub">руб. за</span>
                <div class="description__select-wrap">
                    <?= $form->field($product, 'price_units', ['inputOptions' => ['class' => 'description__select select-js', 'data-placeholder' => 'Выберите']])->dropDownList(Units::getUnits())->label(false) ?>
                </div>
            </div>
            <a href="#" class="description__link link">Какую цену указать?</a>
        </div>
        <div class="description__row justify-content-start">
            <div class="description__checkbox-wrap d-flex">
                <?= $form->field($product, 'price_from', [
                        'checkboxTemplate' => "{input}<label class=\"checkbox-marker\" for=\"product-price_from\"><p class=\"checkbox-label\">{labelTitle}</p></label>\n{error}"
                    ])->checkbox() ?>
            </div>
        </div>
        <div class="description__row d-block">
            <?= $form->field($product, 'content', ['inputOptions' => ['class' => 'description__text description__input']])->textarea(['rows' => '6']) ?>
        </div>
        <div class="description__row d-block">
            <?= $form->field($product, 'info', ['inputOptions' => ['class' => 'description__text description__input']])->textarea(['rows' => '6'])->label('Информация о доставке (не обязательно)') ?>
        </div>
        <div class="description__row d-block">
            <label>Фотографии, до 10 изображений (не обязательно):</label>
            <div class="description__img-block img-block-js">
                <?= $form->field($product, 'imageFiles[]', [
                        'template' => "<label class=\"description__file-wrap d-flex\" for=\"product-imagefiles\"><svg><use xlink:href=\"/images/svg-sprite.svg#add-photo\"></use></svg>{input}</label>\n{error}"
                    ])->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
            </div>
        </div>
        <p class="description__title">Местоположение товара</p>
        <div class="description__row">
            <div class="description__select-wrap">
                <?= $form->field($product, 'country_id', ['inputOptions' => ['class' => 'description__select select-js', 'data-placeholder' => 'Выберите']])->dropDownList(ArrayHelper::map(Country::find()->all(), 'id', 'name')) ?>
            </div>
            <div class="description__select-wrap">
                <?= $form->field($product, 'region_id', ['inputOptions' => ['class' => 'description__select select-js', 'data-placeholder' => 'Выберите']])->dropDownList(ArrayHelper::map(Region::find()->all(), 'id', 'name')) ?>
            </div>
        </div>
        <div class="description__row">
            <div class="description__select-wrap">
                <?= $form->field($product, 'city_id', ['inputOptions' => ['class' => 'description__select select-js', 'data-placeholder' => 'Выберите']])->dropDownList(ArrayHelper::map(City::find()->all(), 'id', 'name')) ?>
            </div>
        </div>
        <div class="description__btn-wrap description__row justify-content-start">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn_green']) ?>
            <?= Html::resetButton('Отмена', ['class' => 'btn btn_grey']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-lg-3">
        <div class="catalog__card card card-sticky-js">
            <div class="card__img-wrap">
                <img src="/images/camera.svg" alt="" class="card__img card__svg" id="card-id">
            </div>
            <div class="card__body">
                <a href="#" class="card__title link"><span></span><span>Заголовок объявления</span><span></span></a>
                <p class="card__region">Местоположение товара</p>
                <p class="card__provider">Производитель</p>
                <div class="card__bottom">
                    <p class="card__price"><span></span><span>0</span> <span>руб.</span></p>
                    <p class="card__availability"><span>В наличии:</span><br><span>-</span></p>
                </div>
            </div>
        </div>
    </div>
</div>