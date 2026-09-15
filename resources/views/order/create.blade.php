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
        <div class="form-message" style="display:none; margin-top: 20px; text-align: center;"></div>
    </div>
</div>

<script>
    $('.register-card form').on('submit', function(e) {
        e.preventDefault();

        const $form = $(this);
        const $message = $form.siblings('.form-message');

        $.ajax({
            url: "{{ route('order.store') }}",
            method: 'POST',
            data: $form.serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json'
            },
            success: function(data) {
                $form[0].reset();
                $message
                    .text(data.message || 'Заявка отправлена')
                    .css('color', 'green')
                    .show();
            },
            error: function(xhr) {
                const message = xhr.responseJSON?.message || 'Ошибка отправки';
                $message
                    .text(message)
                    .css('color', 'red')
                    .show();
            }
        });
    });
</script>

@endsection