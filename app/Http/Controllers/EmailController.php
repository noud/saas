<?php

namespace App\Http\Controllers;

use App\Models\SaaS\Organization;
use App\Models\SaaS\Person;
use App\Services\EmailService;

class EmailController extends Controller
{
    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function index()
    {
        $emailCount = count($this->emailService->allEmails());
        $email = $this->emailService->allEmailsAsBcc();

        dump($emailCount);
        dd($email);
    }
}
