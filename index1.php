
<?php


class SocialAccount
{

    protected $accounts;
    
    public function __construct($accounts){
        $this->accounts = $accounts;

    }

    public function filterBy($accountType){
        // $filtered = [];

        return  array_filter($this->accounts,function($account) use ($accountType){
            // return $this->isOfType($account,$accountType);
            return $account->isOfType($accountType);
        });
        // foreach($this->accounts as $account){
            
        //     if($this->isOfType($account,$accountType)){

        //          $filtered[] = $account;

        //     }
        // }
        
        // return $filtered;
    }

    

}


class Account{
    protected $type;

    private function __construct($type){
        $this->type = $type;
    }


    public function isOfType($accountType){
        return $this->type() == $accountType && $this->isActive();
    }

    
    public static function open($type){
        return new static($type);
   }

    public function isActive(){
        //hard code , you can filtered
        return true;
    }


    public function type(){
        return $this->type;
    }
    
}


$accounts = [
    Account::open('facebook'),
    Account::open('google'),
    Account::open('facebook'),
    Account::open('google')
];

$accounts = new SocialAccount($accounts);
$socials = $accounts->filterBy('facebook');
var_dump($socials);