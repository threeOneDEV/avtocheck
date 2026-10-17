@extends('admin.layouts.main')

@section('title', 'Услуги — Админ-панель')

@section('content')
    <h1 class="admin-title">Услуги</h1>

    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Тип</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->title }}</td>
                    <td>{{ number_format((float) $service->price, 2, '.', ' ') }} ₽</td>
                    <td>
                        @if($service->type)
                            <span class="admin-badge">{{ \App\Models\Service::TYPES[$service->type] ?? $service->type }}</span>
                        @else
                            —
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.service.edit', $service) }}" class="admin-link">Редактировать</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="admin-empty">Услуг пока нет</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection