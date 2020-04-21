<?php

namespace App\Http\Controllers;

use App\Models\SaaS\Organization;
use App\Models\SaaS\Person;
use App\Services\EmailService;
use Illuminate\Support\Facades\Storage;

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

    public function harvest(String $maildirname)
    {
        $fileName = 'harvest/' . $maildirname;
        $fileContent = Storage::disk('local')->get($fileName . '.txt');
        $arrayContent = explode("\n", $fileContent);
        $content = '';
        foreach ($arrayContent as $key => $contentLine) {
            $arrayContentParts = explode('<', $contentLine);
            unset($arrayContent[$key]);
            $email = $arrayContentParts[count($arrayContentParts) - 1];
            $email = '>' === substr($email,-1) ? substr($email,0,-1) : $email;
            $name = (1 < count($arrayContentParts)) ? $arrayContentParts[0] : $email . ' ';
            $name = substr(str_replace('"', '', $name),0,-1);
            $content .= implode(',', [
                'name' => $name,
                'f1' => null,
                'f2' => null,
                'f3' => null,
                'f4' => null,
                'email' => $email
            ]) . "\n";
        }
        Storage::disk('local')->put($fileName . '.csv', $content);
        dd($content);
    }
}
