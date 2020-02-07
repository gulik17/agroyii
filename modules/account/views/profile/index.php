<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    use yii\helpers\ArrayHelper;
    use app\models\Provider;
    use app\models\Country;
    use app\models\Region;
    use app\models\City; ?>

<ul class="breadcrumb">
    <li><a href="#">agro-gator</a></li>
    <li><a href="#">Личный кабинет</a></li>
    <li>Профиль компании</li>
</ul>
<div class="row">
    <div class="col-lg-9">
        <main class="profile">
            <h2 class="account__title-h2 title-h2">Профиль компании</h2>
            <div class="bill__change-block bookmark__change-block change-block justify-content-between">
                <p><?= Provider::getStatus($provider->status) ?></p>
            </div>
            <div class="tabs">
                <div class="change-block tabs-wrap">
                    <button class="filter__btn tariff-btn-js active">Общая информация</button>
                    <button class="filter__btn tariff-btn-js">Контакты</button>
                    <button class="filter__btn tariff-btn-js">Реквизиты</button>
                    <button class="filter__btn tariff-btn-js">Прайс-листы</button>
                </div>
                <div class="tab-content active">
                    <?php $form = ActiveForm::begin([
                                'options' => ['class' => 'product-card__info card'],
                            ]); ?>
                        <?= $form->field($provider, 'scenarios')->hiddenInput(['value' => 'tab1save'])->label(false) ?>
                        <div class="description__row support__textarea-wrap">
                            <?= $form->field($provider, 'description', ['inputOptions' => ['class' => 'description__input support__textarea']])->textarea(['rows' => '6']) ?>
                        </div>
                        <div class="description__btn-wrap d-flex justify-content-start">
                            <?= Html::submitButton('Сохранить', ['class' => 'btn btn_green']) ?>
                            <?= Html::resetButton('Отмена', ['class' => 'btn btn_grey']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
                <div class="tab-content">
                    <?php $form = ActiveForm::begin([
                                'options' => ['class' => 'product-card__info card'],
                            ]); ?>
                        <?= $form->field($provider, 'scenarios')->hiddenInput(['value' => 'tab2save'])->label(false) ?>
                        <div class="description__row">
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'country_id', ['inputOptions' => ['class' => 'description__select select-js', 'data-placeholder' => 'Выберите']])->dropDownList(ArrayHelper::map(Country::find()->all(), 'id', 'name')) ?>
                            </div>
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'region_id', ['inputOptions' => ['class' => 'description__select select-js', 'data-placeholder' => 'Выберите']])->dropDownList(ArrayHelper::map(Region::find()->all(), 'id', 'name')) ?>
                            </div>
                        </div>
                        <div class="description__row">
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'city_id', ['inputOptions' => ['class' => 'description__select select-js', 'data-placeholder' => 'Выберите']])->dropDownList(ArrayHelper::map(City::find()->all(), 'id', 'name')) ?>
                            </div>
                        </div>
                        <div class="description__row">
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'address', ['inputOptions' => ['class' => 'description__input']]) ?>
                            </div>
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'phone', ['inputOptions' => ['class' => 'description__input']]) ?>
                            </div>
                        </div>
                        <div class="description__row">
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'email', ['inputOptions' => ['class' => 'description__input']]) ?>
                            </div>
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'site', ['inputOptions' => ['class' => 'description__input']]) ?>
                            </div>
                        </div>
                        <div class="description__btn-wrap d-flex justify-content-start">
                            <?= Html::submitButton('Сохранить', ['class' => 'btn btn_green']) ?>
                            <?= Html::resetButton('Отмена', ['class' => 'btn btn_grey']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
                <div class="tab-content">
                    <?php $form = ActiveForm::begin([
                                'options' => ['class' => 'product-card__info card'],
                            ]); ?>
                        <?= $form->field($provider, 'scenarios')->hiddenInput(['value' => 'tab3save'])->label(false) ?>
                        <div class="description__row">
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'name', ['inputOptions' => ['class' => 'description__input']]) ?>
                            </div>
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'full_name', ['inputOptions' => ['class' => 'description__input']]) ?>
                            </div>
                        </div>
                        <div class="description__row">
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'legal_country_id', ['inputOptions' => ['class' => 'description__select select-js', 'data-placeholder' => 'Выберите']])->dropDownList(ArrayHelper::map(Country::find()->all(), 'id', 'name')) ?>
                            </div>
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'legal_region_id', ['inputOptions' => ['class' => 'description__select select-js', 'data-placeholder' => 'Выберите']])->dropDownList(ArrayHelper::map(Region::find()->all(), 'id', 'name')) ?>
                            </div>
                        </div>
                        <div class="description__row">
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'legal_city_id', ['inputOptions' => ['class' => 'description__select select-js', 'data-placeholder' => 'Выберите']])->dropDownList(ArrayHelper::map(City::find()->all(), 'id', 'name')) ?>
                            </div>
                        </div>
                        <div class="description__row">
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'head_name', ['inputOptions' => ['class' => 'description__input']]) ?>
                            </div>
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'head_position', ['inputOptions' => ['class' => 'description__input']]) ?>
                            </div>
                        </div>
                        <div class="description__row">
                            <div class="description__select-wrap">
                                <?php  echo $form->field($provider, 'legal_ts_register')->widget(yii\jui\DatePicker::class,
                                    [
                                        'options' => ['class' => 'description__input'],
                                        'dateFormat' => 'dd-MM-yyyy',
                                    ]) ?>
                            </div>
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'legal_type', ['inputOptions' => ['class' => 'description__select select-js', 'data-placeholder' => 'Выберите']])->dropDownList($provider->getLegalType()) ?>
                            </div>
                        </div>
                        <div class="description__row">
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'legal_status', ['inputOptions' => ['class' => 'description__select select-js', 'data-placeholder' => 'Выберите']])->dropDownList($provider->getLegalStatus()) ?>
                            </div>
                        </div>
                        <div class="description__row">
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'legal_inn', ['inputOptions' => ['class' => 'description__input']]) ?>
                            </div>
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'legal_ogrn', ['inputOptions' => ['class' => 'description__input']]) ?>
                            </div>
                        </div>
                        <div class="description__row">
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'legal_kpp', ['inputOptions' => ['class' => 'description__input']]) ?>
                            </div>
                        </div>
                        <div class="description__row">
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'subdivision_type', ['inputOptions' => ['class' => 'description__select select-js', 'data-placeholder' => 'Выберите']])->dropDownList($provider->getSubdivisionType()) ?>
                            </div>
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'subdivision_branch', ['inputOptions' => ['class' => 'description__input']]) ?>
                            </div>
                        </div>
                        <div class="description__row">
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'legal_okved', ['inputOptions' => ['class' => 'description__input']]) ?>
                            </div>
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'legal_okopf', ['inputOptions' => ['class' => 'description__input']]) ?>
                            </div>
                        </div>
                        <div class="description__row">
                            <div class="description__select-wrap">
                                <?= $form->field($provider, 'legal_opf', ['inputOptions' => ['class' => 'description__input']]) ?>
                            </div>
                        </div>
                        <div class="description__btn-wrap d-flex justify-content-start">
                            <?= Html::submitButton('Сохранить', ['class' => 'btn btn_green']) ?>
                            <?= Html::resetButton('Отмена', ['class' => 'btn btn_grey']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
                <div class="tab-content">
                    <div class="product-card__price card list2">
                        <div class="download">
                            <svg width="30" height="35">
                                <use xlink:href="/images/svg-sprite.svg#pdf"></use>
                            </svg>
                            <p>
                                <span class="card__title">Картофель калиброванный</span><br>
                                <span class="card__text_fade">3.24 мб</span>
                            </p>
                        </div>
                        <div class="card__menu">
                            <button class="profile__btn-more filter__btn-js">
                                <svg height="20">
                                    <use xlink:href="/images/svg-sprite.svg#more"></use>
                                </svg>
                            </button>
                            <ul class="filter__dropdown">
                                <li><a href="#file-rename" class="link modal-js">Переименовать</a></li>
                                <li><a href="#" class="link">Удалить</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-card__price card list2">
                        <div class="download">
                            <svg width="30" height="35">
                                <use xlink:href="/images/svg-sprite.svg#pdf"></use>
                            </svg>
                            <p>
                                <span class="card__title">Капуста белокочанная</span><br>
                                <span class="card__text_fade">3.24 мб</span>
                            </p>
                        </div>
                        <div class="card__menu">
                            <button class="profile__btn-more filter__btn-js">
                                <svg height="20">
                                    <use xlink:href="/images/svg-sprite.svg#more"></use>
                                </svg>
                            </button>
                            <ul class="filter__dropdown">
                                <li><a href="#file-rename" class="link modal-js">Переименовать</a></li>
                                <li><a href="" class="link">Удалить</a></li>
                            </ul>
                        </div>
                    </div>
                    <form action="#" class="profile__files-upload">
                        <label for="file" id="fileAttached" class="modal__file-attached download d-flex">
                            <svg width="35" height="35">
                                <use xlink:href="/images/svg-sprite.svg#paper-clip"></use>
                            </svg>
                            <p>
                                <span class="card__title">Прикрепите файлы</span><br>
                                <span class="card__text_fade">до 10 файлов по 1 мб</span>
                            </p>
                            <input type="file" id="file">
                        </label>
                        <div class="modal__message-download files-wrap-js d-flex align-items-center"></div>
                        <div class="description__btn-wrap d-flex justify-content-start">
                            <button type="button" class="btn btn_green">Сохранить</button>
                            <button type="reset" class="btn btn_grey">Отмена</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <div class="col-md-3">
        <aside class="sidebar__menu card card-sticky-js">
            <ul>
                <?= \app\components\AccountMenuWidget::widget(['tpl' => 'amenu', 'active' => '/account/profile']); ?>
            </ul>
        </aside>
    </div>
</div>