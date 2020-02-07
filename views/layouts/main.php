<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;

AppAsset::register($this);?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <base href="<?= yii\helpers\Url::base(true) ?>">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/images/agro-gator-32x32.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/agro-gator-180x180.png">
    <link rel="apple-touch-icon" sizes="192x192" href="/images/agro-gator-192x192.png">
    <link rel="apple-touch-icon" sizes="270x270" href="/images/agro-gator-270x270.png">
    <?php $this->head() ?>
</head>
<body class="page page-inner d-flex flex-column h-100">
    <?php $this->beginBody() ?>
    <!-- Header -->
    <header class="header header-inner">
        <div class="header__top">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6 col-md-4 col-5">
                        <button type="button" class="header__menu-btn btn-toggle-js">agro-gator</button>
                        <ul class="header__menu block-toggle-js">
                            <li><a href="#" class="link">a-platforma</a></li>
                            <li class="active"><a href="#" class="link">agro-gator</a></li>
                            <li><a href="#" class="link">agro-ct</a></li>
                            <li><a href="#" class="link">e-agro</a></li>
                            <li><a href="#" class="link">agro-live</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-8 col-7">
                        <div class="header__links d-flex justify-content-sm-end justify-content-center">
                            <a href="tel:+74951207447" class="header__phone link">
                                <svg>
                                    <use xlink:href="/images/svg-sprite.svg#phone"></use>
                                </svg>
                                <span>+7 495 120 74 47</span>
                            </a>
                            <a href="mailto:" class="header__phone link">
                                <svg>
                                    <use xlink:href="/images/svg-sprite.svg#mail"></use>
                                </svg>
                                <span>Написать нам</span>
                            </a>
                            <a href="#" class="header__phone link">
                                <svg>
                                    <use xlink:href="/images/svg-sprite.svg#map-pin"></use>
                                </svg>
                                <span>Контакты</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-lg-5 d-flex justify-content-between align-items-sm-end align-items-start">
                        <a href="<?= yii\helpers\Url::to('/') ?>" class="link d-sm-flex d-block align-items-end justify-content-between">
                            <img src="/images/agro-gator.svg" alt="АгроСити" class="img-fluid header__logo">
                            <span class="header__logo-description">Агрегатор предложений<br> поставщиков</span>
                        </a>
                        <button type="button" class="header__hamburger hamburger-js">
                            <svg>
                                <use xlink:href="/images/svg-sprite.svg#menu"></use>
                            </svg>
                            <svg>
                                <use xlink:href="/images/svg-sprite.svg#close"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="col-xl-8 col-lg-7 d-sm-flex d-block">
                        <form method="GET" action="<?= yii\helpers\Url::to(['/catalog/search']) ?>" class="header__form form d-flex align-items-center">
                            <input type="text" name="q" placeholder="Товар, услуга или поставщик">
                            <button type="button">
                                <svg>
                                    <use xlink:href="/images/svg-sprite.svg#search"></use>
                                </svg>
                            </button>
                        </form>
                        <a href="#" class="link btn btn_green header__btn">Подать объявление</a>
                    </div>
                </div>
                <div class="header__bottom">
                    <p class="sidebar__title-h3 title-h3 title-h3_white">
                        Меню
                        <span class="btn-close btn-close-js"></span>
                    </p>
                    <ul class="header__menu-main header__menu-main_1">
                        <li class="submenu-link-js">
                            <a href="<?= yii\helpers\Url::to('/catalog') ?>" class="link">
                                <svg>
                                    <use xlink:href="/images/svg-sprite.svg#food"></use>
                                </svg>
                                Продукция
                            </a>
                            <span class="submenu-link submenu-link-js"></span>
                            <ul id="w1" class="submenu">
                                <?= \app\components\MenuWidget::widget(['tpl' => 'menu']); ?>
                            </ul>
                        </li>
                        <li><a href="<?= yii\helpers\Url::to('/provider') ?>">Поставщики</a></li>
                        <li><a href="<?= yii\helpers\Url::to('/services') ?>">Услуги</a></li>
                        <li><a href="<?= yii\helpers\Url::to('/info') ?>">Информация</a></li>
                    </ul>
                    
                    <ul class="header__menu-main header__menu-main_2 justify-content-end">
                        <li>
                            <a href="<?= yii\helpers\Url::to('/favorites') ?>" class="header__bookmark link">
                                <svg>
                                    <use xlink:href="/images/svg-sprite.svg#bookmark"></use>
                                </svg>
                                <span>Закладки</span>
                                <span class="header__bookmark-number<? if(!count($_SESSION['favorites'])) echo ' d-none' ?>"><?= count($_SESSION['favorites']) ?></span>
                            </a>
                        </li>
                        <li>
                            <?php if(Yii::$app->user->isGuest) { ?>
                            <a href="#modal" class="header__user link modal-js">
                                <svg>
                                    <use xlink:href="/images/svg-sprite.svg#user"></use>
                                </svg>
                                <span>Личный кабинет</span>
                            </a>
                            <?php } else { ?>
                            <a href="<?= yii\helpers\Url::to(['/account']) ?>" class="header__user link">
                                <svg>
                                    <use xlink:href="/images/svg-sprite.svg#user"></use>
                                </svg>
                                <span>Личный кабинет</span>
                            </a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--Header End-->

    <div class="container">
        <?= Alert::widget() ?>
        <main class="catalog">
            <?= $content ?>
        </main>
    </div>

    <!--Footer-->
    <footer class="footer mt-auto">
        <div class="footer__top">
            <div class="container d-flex justify-content-between align-items-center">
                <a href="#" class="footer__link link">Правовая информация</a>
                <a href="#" class="link"><img src="/images/a-platforma.svg" alt="" class="footer__logo"></a>
                <a href="#" class="footer__link link">Политика конфиденциальности</a>
            </div>
        </div>
        <div class="footer__bottom">
            <p>Разработка сайта – <a href="#">интернет-агенство «Диаграмма»</a></p>
        </div>
    </footer>
    <!--Footer End-->

    <!--Modal-->
    <div class="modal mfp-hide mfp-fade" id="modal">
        <div class="sign-in sign-in-phone">
            <?= Html::button('Регистрация', ['class' => 'check-in-js form__btn']) ?>
            <p class="modal_title">Вход на сайт</p>
            <?php $model = new app\models\LoginByPhoneForm();
                if ($model->load(Yii::$app->request->post()) && $model->login()) {
                    return Yii::$app->getResponse()->redirect(yii\helpers\Url::to(['/account']));
                }
                $model->code = ''; ?>

            <?php $form = ActiveForm::begin([
                'id' => 'loginbyphone-form',
                'options' => ['class' => 'modal__form form'],
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"form__input-wrap\">{input}</div>\n<div class=\"mt-2\">{error}</div>",
                    'labelOptions' => ['class' => 'form__label'],
                ],
            ]); ?>
            <?= $form->field($model, 'phone', ['inputOptions' => ['class' => 'form__input phone', 'type' => 'tel', 'name' => 'phone', 'placeholder' => '+7 (000) 000-00-00', 'autocomplete' => 'off']])->textInput()->label('Мобильный телефон') ?>
            <?= $form->field($model, 'code', ['inputOptions' => ['autocomplete' => 'off'], 'template' => "<div class=\"code\">{label}\n{input}</div>"])->textInput()->label('Введите код из SMS') ?>
            <div class="form__bottom d-flex">
                <?= Html::submitButton('Продолжить', ['class' => 'form__btn_green btn btn_green', 'name' => 'signin-button']) ?>
                <?= Html::button('Войти по почте', ['class' => 'sign-in-toggle-js form__btn']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="sign-in d-none">
            <?= Html::button('Регистрация', ['class' => 'check-in-js form__btn']) ?>
            <p class="modal_title">Вход на сайт</p>
            <?php $model = new app\models\LoginByEmailForm();
                if ($model->load(Yii::$app->request->post()) && $model->login()) {
                    return Yii::$app->getResponse()->redirect(yii\helpers\Url::to(['/account']));
                }
                $model->password = ''; ?>
            
            <?php $form = ActiveForm::begin([
                'id' => 'loginbyemail-form',
                'options' => ['class' => 'modal__form form'],
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n<div class=\"mt-2\">{error}</div>",
                    'labelOptions' => ['class' => 'form__label'],
                ],
            ]); ?>
            <?= $form->field($model, 'email', ['inputOptions' => ['class' => 'form__input', 'type' => 'email', 'placeholder' => 'ivanov@info.ru', 'autocomplete' => 'off']])->textInput()->label('Ваш E-mail') ?>
            <?= $form->field($model, 'password', ['inputOptions' => ['autocomplete' => 'off']])->passwordInput()->label('Пароль') ?>
            <?= Html::button('Восстановить пароль', ['class' => 'restore-toggle-js form__btn']) ?>
            <div class="form__bottom d-flex">
                <?= Html::submitButton('Продолжить', ['class' => 'form__btn_green btn btn_green']) ?>
                <?= Html::button('Вход по телефону', ['class' => 'sign-in-toggle-js form__btn']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="restore-password d-none">
            <?= Html::button('Вход на сайт', ['class' => 'sign-in-js form__btn']) ?>
            <p class="modal_title">Восстановление пароля</p>

            <?php $model = new app\models\ForgotForm(); ?>

            <?php $form = ActiveForm::begin([
                'id' => 'forgot-form',
                'options' => ['class' => 'modal__form form'],
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n<div class=\"mt-2\">{error}</div>",
                    'labelOptions' => ['class' => 'form__label'],
                ],
            ]); ?>
            <?= $form->field($model, 'email', ['inputOptions' => ['class' => 'form__input email', 'type' => 'email', 'name' => 'email', 'placeholder' => 'ivanov@info.ru', 'autocomplete' => 'off']])->textInput()->label('E-mail, указанный при регистрации:') ?>
            <p class="form__text">На эту почту мы отправим ссылку для смены пароля</p>
            <div class="form__bottom">
                <?= Html::submitButton('Продолжить', ['class' => 'form__btn_green btn btn_green', 'name' => 'forgot-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="check-in d-none">
            <?= Html::button('Вход на сайт', ['class' => 'sign-in-js form__btn']) ?>
            <p class="modal_title">Регистрация</p>

            <p class="form__label">Мобильный телефон:</p>
            <div class="form__top d-flex align-items-center">
                <div class="form__radio-wrap">
                    <input type="radio" name="choice" value="phone" id="radio1" checked>
                    <label for="radio1" class="form__label-radio"></label>
                    <span>Телефон</span>
                </div>
                <div class="form__radio-wrap">
                    <input type="radio" name="choice" value="email" id="radio2">
                    <label for="radio2" class="form__label-radio"></label>
                    <span>Почту</span>
                </div>
            </div>

            <?php $model = new app\models\RegByPhoneForm(); ?>
            
            <?php $form = ActiveForm::begin([
                'id' => 'regbyphone-form',
                'options' => ['class' => 'modal__form form'],
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n<div class=\"mt-2\">{error}</div>",
                    'labelOptions' => ['class' => 'form__label'],
                ],
            ]); ?>
            <div class="form__phone-wrap">
                <div class="form__input-wrap">
                    <?= $form->field($model, 'phone', ['inputOptions' => ['class' => 'form__input phone', 'type' => 'tel', 'name' => 'phone', 'placeholder' => '+7 (000) 000-00-00', 'autocomplete' => 'off']])->textInput()->label('Использовать') ?>
                </div>
                <div class="code">
                    <?= $form->field($model, 'code', ['inputOptions' => ['class' => 'form__input', 'name' => 'code', 'placeholder' => '845|', 'autocomplete' => 'off']])->textInput()->label('Введите код из SMS:') ?>
                </div>
                <div class="form__bottom">
                    <?= Html::submitButton('Продолжить', ['class' => 'form__btn_green btn btn_green', 'name' => 'registration-button']) ?>
                    <p class="form__text">Регистрация означает согласие с <a href="#">правилами сайта</a> и <a href="#">политикой конфиденциальности</a></p>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
            
            <?php $model = new app\models\RegByEmailForm(); ?>
            
            <?php $form = ActiveForm::begin([
                'id' => 'regbyemail-form',
                'options' => ['class' => 'modal__form form'],
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n<div class=\"mt-2\">{error}</div>",
                    'labelOptions' => ['class' => 'form__label'],
                ],
            ]); ?>
            <div class="form__email-wrap">
                <?= $form->field($model, 'email', ['inputOptions' => ['class' => 'form__input email', 'type' => 'email', 'name' => 'email', 'placeholder' => 'ivanov@info.ru', 'autocomplete' => 'off']])->textInput()->label('Ваш E-mail') ?>
                <?= $form->field($model, 'password', ['inputOptions' => ['autocomplete' => 'off']])->passwordInput()->label('Придумайте пароль') ?>
                <?= $form->field($model, 'password2', ['inputOptions' => ['autocomplete' => 'off']])->passwordInput()->label('Повторите пароль') ?>
                
                <div class="form__bottom">
                    <?= Html::submitButton('Продолжить', ['class' => 'form__btn_green btn btn_green', 'name' => 'registration-button']) ?>
                    <p class="form__text">Регистрация означает согласие с <a href="#">правилами сайта</a> и <a href="#">политикой конфиденциальности</a></p>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <!--Modal End-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
