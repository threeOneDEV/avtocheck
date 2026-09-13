@extends('layouts.main')
@section('title', 'Технический осмотр легкового транспорта')
@section('content')

<!-- ===== HERO ===== -->
<section class="page-hero">
    <div class="container">
        <h2>Технический осмотр легковых автомобилей</h2>
        <p>Официальный пункт технического осмотра в Волгограде</p>
    </div>
</section>

<!-- ===== КОНТАКТНАЯ ИНФОРМАЦИЯ ===== -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <span class="icon">📌</span> Контактная информация
        </div>
        <div class="contact-grid">
            <div class="contact-item">
                <span class="label">ИП</span>
                <span class="value">Шкурин Константин Александрович</span>
            </div>
            <div class="contact-item">
                <span class="label">Email</span>
                <span class="value email">tovlgd@mail.ru</span>
            </div>
            <div class="contact-item">
                <span class="label">ИНН</span>
                <span class="value">344702597910</span>
            </div>
            <div class="contact-item">
                <span class="label">ОГРНИП</span>
                <span class="value">313344307800129</span>
            </div>
        </div>
    </div>
</section>

<!-- ===== АДРЕС И КАК ПРОЙТИ ===== -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <span class="icon">📍</span> Адрес и как пройти
        </div>
        <div class="address-block">
            <div class="addr-line">
                📬 400078, Волгоградская обл, Волгоград г, им В.И.Ленина пр-кт, дом № 69 а
            </div>
            <div class="addr-desc">
                <strong>Как нас найти:</strong> Здание бывшего Таксопарка на пл.&nbsp;Возрождения, справа от РАНХИГС (Волгоградской Академии Государственной Службы).<br />
                Въезжаем в ворота и объезжаем здание по правой стороне вокруг до вывески <strong>«Техосмотр»</strong>.
            </div>
        </div>
    </div>
</section>

<!-- ===== РЕЖИМ РАБОТЫ ===== -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <span class="icon">🕘</span> Режим работы
        </div>
        <div class="hours-grid">
            <div class="hours-card">
                <div class="day">📅 Будние дни</div>
                <div class="time">8:00 – 19:00</div>
                <div class="break">🔄 Перерыв 13:00 – 14:00</div>
            </div>
            <div class="hours-card">
                <div class="day">📅 Выходные дни</div>
                <div class="time">8:00 – 16:00</div>
                <div class="break">🔄 Перерыв 13:00 – 14:00</div>
            </div>
        </div>
        <div class="hours-holiday">
            <span class="label">🎉 Праздничные дни:</span>
            <span class="text">график работы пункта уточняйте по телефону <strong>+7 (8442) 55-46-53</strong></span>
        </div>
    </div>
</section>

<!-- ===== ДОКУМЕНТЫ ===== -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <span class="icon">📄</span> Документы для прохождения ТО
        </div>
        <ul class="doc-list">
            <li>
                <strong>Документ на транспортное средство</strong> — Паспорт транспортного средства (ПТС) или Свидетельство о регистрации Транспортного средства (СТС, Техпаспорт)
            </li>
            <li>
                <strong>Документ, удостоверяющий личность</strong> — паспорт гражданина РФ или иной документ, предусмотренный законодательством
            </li>
            <li>
                <strong>Доверенность</strong> (если Вы представляете интересы владельца ТС) — документ, подтверждающий соответствующие полномочия
            </li>
        </ul>
    </div>
</section>

<!-- ===== СТОИМОСТЬ ===== -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <span class="icon">💰</span> Стоимость услуг
        </div>
        <div class="price-grid">
            <div class="price-card">
                <div class="service">M1 легковой <span class="badge">первичный</span></div>
                <div class="cost">981 <small>₽</small></div>
            </div>
            <div class="price-card">
                <div class="service">M1 легковой <span class="badge">повторный</span></div>
                <div class="cost">980 <small>₽</small></div>
            </div>
            <div class="price-card">
                <div class="service">Регулировка света фар</div>
                <div class="cost">от 500 <small>₽</small></div>
            </div>
            <div class="price-card">
                <div class="service">Проверка состояния рабочих жидкостей</div>
                <div class="cost">819 <small>₽</small></div>
            </div>
        </div>
    </div>
</section>

<!-- ===== НОРМАТИВНЫЕ ДОКУМЕНТЫ (PDF) ===== -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <span class="icon">📎</span> Нормативные документы
        </div>
        <p class="section-sub">Нажмите на кнопку, чтобы открыть PDF-документ</p>
        <div class="pdf-grid">
            <a href="{{ asset('documents/federal_law_to.pdf') }}" class="pdf-btn" target="_blank">
                <span class="pdf-icon">📕</span>
                <span class="label">
                    Федеральный закон “О техническом осмотре…”
                    <span class="small">PDF, 2.4 МБ</span>
                </span>
            </a>
            <a href="{{ asset('documents/rules_to.pdf') }}" class="pdf-btn" target="_blank">
                <span class="pdf-icon">📘</span>
                <span class="label">
                    Правила проведения технического осмотра
                    <span class="small">PDF, 1.8 МБ</span>
                </span>
            </a>
            <a href="{{ asset('documents/dogovor_to.pdf') }}" class="pdf-btn" target="_blank">
                <span class="pdf-icon">📙</span>
                <span class="label">
                    Типовая форма договора на ТО
                    <span class="small">PDF, 0.9 МБ</span>
                </span>
            </a>
        </div>
    </div>
</section>

<!-- ===== АТТЕСТАТ АККРЕДИТАЦИИ ===== -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <span class="icon">🏅</span> Аттестат аккредитации оператора ТО
        </div>
        <p class="section-sub">Официальное подтверждение права на проведение технического осмотра</p>
        <div class="accreditation-photo">
            <!-- Сюда вы вставите свою фотографию. Атрибут src указывает на тестовое изображение -->
            <img
                src="https://xn--34-6kcaird2bbpvbdokghgjfc2d.xn--p1ai/gallery_gen/3f44b82801502897a2351a62fa3b85c5_826x575.61875.jpg"
                alt="Аттестат аккредитации оператора технического осмотра" />
            <div class="photo-caption">
                ⭐ Аттестат аккредитации в системе технического осмотра (действителен на текущий период)
            </div>
        </div>
    </div>
</section>

<!-- ===== КНОПКА ЗАПИСИ ===== -->
<section class="section" style="border-bottom: none; padding-bottom: 56px;">
    <div class="container">
        <div class="register-cta">
            <div class="text">
                <h3>📋 Запись на технический осмотр</h3>
                <p>Заполните форму — мы подберём удобное время и дату</p>
            </div>
            <a href="{{route('order.create')}}" class="btn-primary">Записаться сейчас →</a>
        </div>
    </div>
</section>
@endsection