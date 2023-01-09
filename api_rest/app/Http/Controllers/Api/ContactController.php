<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contact;
    public function __construct(Contact $contact)
    {
      $this->contact = $contact;
    }

    public function index()
    {
        return $this->contact->paginate();
    }

    public function create(Request $request)
    {
        return $this->contact->create($request->all());
    }
}
