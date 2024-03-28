<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Contact\StoreContactRequest;
use App\Http\Requests\Admin\Contact\UpdateContactRequest;
use App\Models\Contact;
use App\Services\Admin\ContactService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public ContactService $service;

    public function __construct(ContactService $contactService)
    {
        $this->service = $contactService;
    }

    public function index()
    {
        $contact = Contact::query()
            ->withTranslations()
            ->first();

        if ($contact) return redirect()->route('admin.contacts.edit', ['contact' => $contact]);

        $contacts = Contact::query()
            ->withTranslations()
            ->get();

        return view('admin.contacts.index', ['contacts' => $contacts]);
    }

    public function create()
    {
        return view('admin.contacts.create');
    }

    public function store(StoreContactRequest $request): RedirectResponse
    {
        try {
            $data['contact'] = DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.contacts.edit', $data)
            ->with('success', trans('messages.success_created'));
    }

    public function edit(Contact $contact): View
    {
        return view('admin.contacts.edit', ['contact' => $contact->load('addressTranslate')]);
    }

    public function update(UpdateContactRequest $request, Contact $contact): RedirectResponse
    {
        try {
            DB::transaction(function () use ($request, $contact) {
               return $this->service->update($request->validated(), $contact);
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return back()->with('success', trans('messages.success_updated'));
    }
}
