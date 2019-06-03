<?php

class EmailUser{
    protected $emails;

    public function __construct($emails){
        $this->emails = $emails;
    }

    public function FilterBy($acctype){
        return  array_filter($this->emails,function($email) use($acctype){
            return $this->Filter($email,$acctype);
        });
    }

    public function Filter($email,$acctype){
        return $email==$acctype;
    }
}



$emails = [
    'zinthu@121.com',
    'maythu@121.com',
    'mayzin@121.com',
    'zinthu@121.com',
];

$sendmail = new EmailUser($emails);
$sendedmail = $sendmail->FilterBy('zinthu@121.com');
var_dump($sendedmail);





