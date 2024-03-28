<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Contact\StoreContactRequest;
use App\Http\Requests\Admin\Contact\UpdateContactRequest;
use App\Models\Contact;
use App\Models\Translate;
//use App\Services\Admin\Contact\ContactService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TranslateController extends Controller
{
//    public ContactService $service;

//    public function __construct(ContactService $contactService)
//    {
//        $this->service = $contactService;
//    }

    public function index(Request $request): View
    {
        $translates = Translate::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->input('search');

                $query->where('ru', 'like', "%$search%")
                    ->orWhere('kz', 'like', "%$search%")
                    ->orWhere('en', 'like', "%$search%")
                    ->orWhere('id', 'like', "%$search%");
            })
            ->whereNotNull('type')
            ->paginate(40);

        return view('admin.translates.index', ['translates' => $translates]);
    }

    public function create(): View
    {
        return view('admin.translates.create');
    }

    public function store(StoreContactRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $this->service->create($request->validated());

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()
                ->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.translates.index')
            ->with('success', 'Контакт создана');
    }

    public function edit(Contact $contact): View
    {
        return view('admin.translates.edit', [
            'contact' => $contact,
        ]);
    }

    public function update(UpdateContactRequest $request, Contact $contact): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $this->service->update($contact, $request->validated());

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()
                ->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.translates.index')
            ->with('success', 'Успешно изменено');
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $this->service->delete($contact);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();

            return back()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.translates.index')
            ->with('success', 'Успешно удалена');
    }
}
