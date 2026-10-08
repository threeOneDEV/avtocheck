@extends('layouts.main')
@section('title', 'Запись на технический осмотр')
@section('content')

<!-- ===== HERO ===== -->
<section class="page-hero">
    <div class="container">
        <h2>📋 Запись на техосмотр</h2>
    </div>
</section>

<!-- ===== FORM ===== -->
<div class="register-wrapper">
    <div class="register-card">
        <h2>Форма регистрации</h2>
        <p class="subtitle">Заполните все поля, и мы свяжемся с вами для подтверждения записи</p>
        <form action="#" method="POST">
            <!-- Имя -->
            <div class="form-group">
                <label for="name">Имя <span class="required">*</span></label>
                <input type="text" id="name" name="name" placeholder="Например: Иван Петров" required />
            </div>

            <!-- Номер телефона -->
            <div class="form-group">
                <label for="phone">Номер телефона <span class="required">*</span></label>
                <input type="tel" id="phone" name="phone" placeholder="+7 (900) 123-45-67" required />
            </div>

            <!-- Автомобиль (марка, модель) -->
            <div class="form-group">
                <label for="car">Автомобиль (марка, модель) <span class="required">*</span></label>
                <input type="text" id="car" name="car" placeholder="Например: Toyota Camry, 2021" required />
            </div>

            <!-- Желаемые дата и время -->
            <div class="form-group">
                <label for="datetime">Желаемые дата и время <span class="required">*</span></label>
                <input type="datetime-local" id="datetime" name="datetime" required />
            </div>

            <!-- Кнопки -->
            <div class="form-actions">
                <button type="submit" class="btn-primary">📨 Отправить заявку</button>
                <a href="{{route('main.index')}}" class="btn-secondary-outline">← Вернуться на главную</a>
            </div>
        </form>
        <div class="popup" id="popup" role="status" aria-live="polite">
            <span class="popup-icon"></span>
            <span class="popup-text"></span>
        </div>
    </div>
</div>

<script>
    function showPopup(text, type) {
        var $popup = $('#popup');
        $popup
            .removeClass('is-success is-error')
            .addClass(type === 'success' ? 'is-success' : 'is-error')
            .addClass('is-visible')
            .find('.popup-icon').text(type === 'success' ? '✓' : '!')
            .end()
            .find('.popup-text').text(text);

        clearTimeout($popup.data('timer'));
        $popup.data('timer', setTimeout(function () {
            $popup.removeClass('is-visible');
        }, 3500));
    }

    $('.register-card form').on('submit', function (e) {
        e.preventDefault();

        const $form = $(this);

        $.ajax({
            url: "{{ route('order.store') }}",
            method: 'POST',
            data: $form.serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json'
            },
            success: function (data) {
                $form[0].reset();
                showPopup(data.message || 'Заявка отправлена', 'success');
            },
            error: function (xhr) {
                const message = xhr.responseJSON?.message || 'Ошибка отправки';
                showPopup(message, 'error');
            }
        });
    });
</script>

@endsection