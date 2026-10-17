@extends('admin.layouts.main')

@section('title', 'Редактирование услуги — Админ-панель')

@section('content')
    <h1 class="admin-title">Редактирование услуги #{{ $service->id }}</h1>

    <form method="POST" action="{{ route('admin.service.update', $service) }}" class="admin-form">
        @csrf
        @method('PUT')

        <div class="admin-field">
            <label for="title">Название</label>
            <input type="text" id="title" name="title" value="{{ old('title', $service->title) }}" required>
            @error('title') <div class="admin-error">{{ $message }}</div> @enderror
        </div>

        <div class="admin-field">
            <label for="price">Цена, ₽</label>
            <input type="number" step="0.01" min="0" id="price" name="price" value="{{ old('price', $service->price) }}" required>
            @error('price') <div class="admin-error">{{ $message }}</div> @enderror
        </div>

        <div class="admin-field">
            <label for="type">Тип</label>
            <select id="type" name="type">
                <option value="">— не указан —</option>
                @foreach(\App\Models\Service::TYPES as $value => $label)
                    <option value="{{ $value }}" @selected(old('type', $service->type) === $value)>{{ $label }}</option>
                @endforeach
            </select>
            @error('type') <div class="admin-error">{{ $message }}</div> @enderror
        </div>

        <div class="admin-form__actions">
            <button type="submit" class="admin-btn admin-btn--primary">Сохранить</button>
            <a href="{{ route('admin.service.index') }}" class="admin-btn">Отмена</a>
        </div>
    </form>
@endsection