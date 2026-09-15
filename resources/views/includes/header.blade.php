<header class="header">
    <div class="container">
        <a href="{{route('main.index')}}" class="header-brand">
            <div class="logo-icon">🔧</div>
            <div class="brand-text">
                <h1>AvtoCheckVlg<span>.ru</span></h1>
                <span class="sub">Технический осмотр легкового транспорта</span>
            </div>
        </a>

        <nav class="header-contacts">
            <a href="tel:+78442502112" class="contact-btn">
                <span class="contact-icon">📞</span>
                <span class="contact-text">
                    <span class="contact-number">+7 (8442) 50-21-12</span>
                </span>
            </a>
            <a href="tel:+79275102112" class="contact-btn">
                <span class="contact-icon">📱</span>
                <span class="contact-text">
                    <span class="contact-number">+7 (927) 510-21-12</span>
                </span>
            </a>
        </nav>

        <div class="header-actions">
            <a href="{{route('main.index')}}" class="header-btn header-btn-home">🏠 Главная</a>
            <a href="{{route('order.create')}}" class="header-btn header-btn-cta">📋 Записаться на ТО</a>
        </div>
    </div>
</header>