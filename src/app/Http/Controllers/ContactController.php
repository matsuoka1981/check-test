<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'tel-1',
            'tel-2',
            'tel-3',
            'address',
            'building',
            'content',
            'detail'
        ]);
        $tell = $contact['tel-1'] . $contact['tel-2'] . $contact['tel-3'];
        $contact['tell'] = $tell;

        $validatedData = $request->validated();
        $request->session()->flashInput($validatedData);

        return view('confirm', compact('contact'));
    }
}
