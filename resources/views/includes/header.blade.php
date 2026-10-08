<header class="header" id="header">
    <div class="container">
        <button type="button" class="header-toggle" aria-label="Меню" aria-expanded="false">
            <svg class="icon-burger" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <line x1="4" y1="7" x2="20" y2="7"/>
                <line x1="4" y1="12" x2="20" y2="12"/>
                <line x1="4" y1="17" x2="20" y2="17"/>
            </svg>
            <svg class="icon-close" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <line x1="6" y1="6" x2="18" y2="18"/>
                <line x1="18" y1="6" x2="6" y2="18"/>
            </svg>
        </button>

        <div class="header-brand">
            <div class="logo-icon">🔧</div>
            <div>
                <h1>AvtoCheckVlg<span style="font-weight:400;opacity:0.7;">.ru</span></h1>
                <span class="sub">Технический осмотр легкового транспорта</span>
            </div>
        </div>

        <div class="header-actions" id="header-actions">
            <div class="header-phones">
                <a href="tel:+78442502112" class="phone-link">📞 +7 (8442) 50-21-12</a>
                <a href="tel:+79275102112" class="phone-link">📞 +7 (927) 510-21-12</a>
            </div>
            <a href="{{route('main.index')}}" class="phone-link">🏠 Главная</a>
            <a href="{{route('order.create')}}" class="btn-primary">📋 Записаться на ТО</a>
        </div>
    </div>
</header>