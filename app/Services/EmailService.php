<?php

namespace App\Services;

use App\Models\SaaS\Organization;
use App\Models\SaaS\Person;

class EmailService
{
    public function allEmailsAsBcc(): string
    {
        $email = $this->allEmails();

        foreach($email as $val){
            $bccList[] = '<' . $val . '>';
        };  
        $bccList = implode(',', $bccList);

        return $bccList;
    }
  
    public function allEmails(): array
    {
        $organizations = Organization::select('email')->whereNotNull('email')->get();

        $persons = Person::select('email')->whereNotNull('email')->get();

        $all = $organizations->union($persons);

        foreach($all as $key){
            $email[] = $key['email'];
        }

        return $email;
    }
}
