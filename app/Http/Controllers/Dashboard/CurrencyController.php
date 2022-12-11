<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CurrencyStoreRequest;
use App\Http\Requests\CurrencyUpdateRequest;
use App\Models\Currency;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $currencies = Currency::all();
        return view('currencies.index', compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('currencies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CurrencyStoreRequest $request
     * @return RedirectResponse
     */
    public function store(CurrencyStoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $currency = Currency::query()->create($validated);
        return redirect()->route('currencies.show', $currency->id);
    }

    /**
     * Display the specified resource.
     *
     * @param Currency $currency
     * @return Application|Factory|View
     */
    public function show(Currency $currency): View|Factory|Application
    {
        return view('currencies.show', [
            'currency' => $currency->load('currencyValues'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Currency $currency
     * @return Factory|View|Application
     */
    public function edit(Currency $currency): Factory|View|Application
    {
        return view('currencies.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CurrencyUpdateRequest $request
     * @param Currency $currency
     * @return RedirectResponse
     */
    public function update(CurrencyUpdateRequest $request, Currency $currency): RedirectResponse
    {
        $validated = $request->validated();
        $currency->update($validated);
        return redirect()->route('currencies.show', $currency->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Currency $currency
     * @return RedirectResponse
     */
    public function destroy(Currency $currency): RedirectResponse
    {
        $currency->delete();
        return redirect()->route('currencies.index');
    }
}
