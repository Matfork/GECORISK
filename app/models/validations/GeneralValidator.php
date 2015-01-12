<?php namespace Validations;
 
 use Illuminate\Validation\Validator as IlluminateValidator;
 use Illuminate\Support\Facades\App as App;
 use Illuminate\Support\Facades\Auth as Auth;

class GeneralValidator extends IlluminateValidator {

    public function validateCurrentPasswordCheck($attribute, $value, $parameters)
    {
		//Is the old password correct?
	    $result = App::make('hash')->check( $value, Auth::user()->password);
        return $result;
    }

}