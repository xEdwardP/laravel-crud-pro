<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\ContactFormRequest;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function __invoke(ContactFormRequest $request)
    {
        logger('Mensaje de contacto recibido:', $request->validated());
        return redirect('/contact')->with('success', '¡Tu mensaje ha sido enviado con éxito!');
    }
}
