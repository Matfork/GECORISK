<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;

class User extends Eloquent implements ConfideUserInterface
{
    use ConfideUser;

    public function getFirst_Name(){
		return $this->first_Name;
	}


    public function getMiddle_Name(){
		return $this->middle_name;
	}
	
	public function save_with_eloquent(){
		parent::save();
	}
}
