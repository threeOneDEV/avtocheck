<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        return view('admin.service.index', [
            'services' => Service::orderBy('id')->get(),
        ]);
    }

    public function edit(Service $service): View
    {
        return view('admin.service.edit', [
            'service' => $service,
        ]);
    }

    public function update(Request $request, Service $service): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'type'  => ['nullable', 'in:' . Service::TYPE_PRIMARY . ',' . Service::TYPE_REPEAT],
        ]);

        $service->update($data);

        return redirect()
            ->route('admin.service.edit', $service)
            ->with('status', 'Услуга сохранена');
    }
}