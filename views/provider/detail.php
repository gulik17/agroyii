<a href="#" class="arrow-back">АгроСити</a>
<ul class="breadcrumb">
    <li><a href="/">agro-gator</a></li>
    <li><a href="/provider/">Поставщики</a></li>
    <li><?= $provider->short_name ?></li>
</ul>
<div class="row">
    <div class="col-lg-9">
        <main class="product-card">
            <h2 class="product-card__title-h2 account__title-h2 title-h2"><?= $provider->short_name ?></h2>
            <div class="bill__change-block">
                <p class="card__text_fade"><?= $provider->address ?></p>
            </div>
            <div class="tabs">
                <div class="change-block tabs-wrap">
                    <button class="filter__btn tariff-btn-js active">Общая информация</button>
                    <button class="filter__btn tariff-btn-js">Контакты</button>
                    <button class="filter__btn tariff-btn-js">Реквизиты</button>
                    <button class="filter__btn tariff-btn-js">Прайс-листы</button>
                    <button class="filter__btn tariff-btn-js">Продукция</button>
                    <button class="filter__btn tariff-btn-js">Услуги</button>
                </div>
                <div class="tab-content active">
                    <div class="product-card__info card">
                        <div class="d-flex align-items-center">
                            <p>Рейтинг:</p>
                            <ul class="card__rating d-flex align-items-center"><?php 
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $provider->rating) { ?>
                                        <li class="star star-fill"></li><?php
                                    } else { ?>
                                        <li class="star star-full"></li><?php
                                    }
                                } ?>
                            </ul><?php
                            if ($provider->checked == 'CHECK_SUCCESS') {
                                echo "<p class=\"card__check card__check-yes\">Проверен</p>";
                            } ?>
                        </div>
                        <p class="card__reg-data">На сайте: <span class="card__text_fade">с <?= date("d.m.Y", $provider->ts_create) ?></span></p>
                        <p><?= $provider->description ?></p>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="product-card__info card">
                        <ul class="product-card__contacts">
                            <li>
                                <p class="card__text_fade">Адрес:</p>
                                <p><?= $provider->address ?></p>
                            </li>
                            <li>
                                <p class="card__text_fade">Телефон:</p>
                                <a href="tel:+<?= $provider->phone ?>" class="link"><?= mobilephone($provider->phone) ?></a>
                            </li>
                            <li>
                                <p class="card__text_fade">E-mail:</p>
                                <a href="mailto:<?= $provider->email ?>" class="link"><?= $provider->email ?></a>
                            </li>
                            <li>
                                <p class="card__text_fade">Сайт:</p>
                                <a href="<?= $provider->site ?>" class="link"><?= $provider->site ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="product-card__info product-card__info2 card">
                        <ul class="product-card__contacts">
                            <li>
                                <p class="card__text_fade">Краткое наименование:</p>
                                <p><?= $provider->short_name ?></p>
                            </li>
                            <li>
                                <p class="card__text_fade">Полное наименование:</p>
                                <p><?= $provider->name ?></p>
                            </li>
                            <li>
                                <p class="card__text_fade">Юридический адрес:</p>
                                <p><?= $provider->legal_address ?></p>
                            </li>
                        </ul>
                        <ul class="product-card__contacts">
                            <li>
                                <p class="card__text_fade">ФИО руководителя:</p>
                                <p><?= $provider->head_name ?></p>
                            </li>
                            <li>
                                <p class="card__text_fade">Должность руководителя:</p>
                                <p><?= $provider->head_position ?></p>
                            </li>
                        </ul>
                        <ul class="product-card__contacts">
                            <li>
                                <p class="card__text_fade">Дата регистрации:</p>
                                <p><?= date("d.m.Y", $provider->legal_ts_register) ?></p>
                            </li>
                            <li>
                                <p class="card__text_fade">Тип организации:</p>
                                <p><?= $provider->legal_type ?></p>
                            </li>
                            <li>
                                <p class="card__text_fade">Статус организации:</p>
                                <p><?= $provider->legal_status ?></p>
                            </li>
                        </ul>
                        <ul class="product-card__contacts">
                            <li>
                                <p class="card__text_fade">ИНН:</p>
                                <p><?= $provider->legal_inn ?></p>
                            </li>
                            <li>
                                <p class="card__text_fade">ОГРН:</p>
                                <p><?= $provider->legal_ogrn ?></p>
                            </li>
                            <li>
                                <p class="card__text_fade">КПП:</p>
                                <p><?= $provider->legal_kpp ?></p>
                            </li>
                        </ul>
                        <ul class="product-card__contacts">
                            <li>
                                <p class="card__text_fade">Тип подразделения:</p>
                                <p><?= $provider->subdivision_type ?></p>
                            </li>
                            <li>
                                <p class="card__text_fade">Кол-во филиалов:</p>
                                <p><?= $provider->subdivision_branch ?></p>
                            </li>
                            <li>
                                <p class="card__text_fade">Основной код ОКВЭД:</p>
                                <p><?= $provider->legal_okved ?></p>
                            </li>
                            <li>
                                <p class="card__text_fade">Код ОКОПФ:</p>
                                <p><?= $provider->legal_okopf ?></p>
                            </li>
                            <li>
                                <p class="card__text_fade">ОПФ:</p>
                                <p><?= $provider->full_name ?></p>
                            </li>
                        </ul>
                        <a href="#" class="product-card__download download link" download>
                            <svg width="30" height="35">
                                <use xlink:href="/images/svg-sprite.svg#pdf"></use>
                            </svg>
                            <p>
                                <span class="card__title">Скачать реквизиты</span><br>
                                <span class="card__text_fade">3.24 мб</span>
                            </p>
                        </a>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="product-card__price card">
                        <a href="#" class="download link" download>
                            <svg width="30" height="35">
                                <use xlink:href="/images/svg-sprite.svg#pdf"></use>
                            </svg>
                            <p>
                                <span class="card__title">Картофель калиброванный</span><br>
                                <span class="card__text_fade">3.24 мб</span>
                            </p>
                        </a>
                    </div>
                    <div class="product-card__price card">
                        <a href="#" class="download link" download>
                            <svg width="30" height="35">
                                <use xlink:href="/images/svg-sprite.svg#pdf"></use>
                            </svg>
                            <p>
                                <span class="card__title">Капуста белокочанная</span><br>
                                <span class="card__text_fade">3.24 мб</span>
                            </p>
                        </a>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="catalog__card card">
                                <div class="card__img-wrap">
                                    <p class="card__date">Сегодня, 08:58</p>
                                    <img src="/images/photo1.jpg" alt="" class="card__img">
                                </div>
                                <div class="card__body">
                                    <a href="#" class="card__title link">Картофель «Ред Скарлет», калибр 5+</a>
                                    <p class="card__region">Ростов-на-Дону, Ростовская обл.</p>
                                    <p class="card__provider">ООО «Исток-1»</p>
                                    <div class="card__bottom">
                                        <p class="card__price">14 руб./кг</p>
                                        <p class="card__availability"><span>В наличии:</span><br><span>40т.</span></p>
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
                        <div class="col-lg-4 col-sm-6">
                            <div class="catalog__card card">
                                <div class="card__img-wrap">
                                    <p class="card__date">Сегодня, 08:58</p>
                                    <img src="/images/photo2.jpg" alt="" class="card__img">
                                </div>
                                <div class="card__body">
                                    <a href="#" class="card__title link">Картофель «Сорт2»</a>
                                    <p class="card__region">Ростов-на-Дону, Ростовская обл., Россия</p>
                                    <p class="card__provider">ООО «Исток-1»</p>
                                    <div class="card__bottom">
                                        <p class="card__price">14 руб./кг</p>
                                        <p class="card__availability"><span>Срок поставки:</span><br><span>от 10 дн.</span>
                                        </p>
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
                    </div>
                </div>
                <div class="tab-content">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="catalog__card card">
                                <div class="card__img-wrap">
                                    <p class="card__date">Сегодня, 08:58</p>
                                    <img src="/images/3service-photo.jpg" alt="" class="card__img">
                                </div>
                                <div class="card__body">
                                    <a href="#" class="card__title link">Хранение охлажденной и замороженной продукции</a>
                                    <p class="card__region">Ростов-на-Дону, Ростовская обл., Россия</p>
                                    <p class="card__provider">ООО «Исток-1»</p>
                                    <div class="card__bottom">
                                        <p class="card__price">от 500 руб.</p>
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
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="col-lg-3">
        <aside class="product-card-menu sidebar__menu card card-sticky-js">
            <ul>
                <li>
                    <svg width="24">
                        <use xlink:href="/images/svg-sprite.svg#mail-send"></use>
                    </svg>
                    <a href="#" class="card__title link">Отправить запрос</a>
                </li>
                <li>
                    <svg width="24">
                        <use xlink:href="/images/svg-sprite.svg#bookmark"></use>
                    </svg>
                    <a href="#" class="card__title link">Добавить в закладки</a>
                </li>
                <li>
                    <svg width="24">
                        <use xlink:href="/images/svg-sprite.svg#mail-check"></use>
                    </svg>
                    <a href="#" class="card__title link">Подписаться на поставщика</a>
                </li>
            </ul>
        </aside>
    </div>
</div>