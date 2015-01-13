<?php namespace Validations;
 
 use Illuminate\Validation\Validator as IlluminateValidator;
 use Illuminate\Support\Facades\App as App;
 use Illuminate\Support\Facades\Auth as Auth;
 use \Libraries\MimeReader as MimeReader;

class GeneralValidator extends IlluminateValidator {

    public function validateCurrentPasswordCheck($attribute, $value, $parameters)
    {
		//Is the old password correct?
	    $result = App::make('hash')->check( $value, Auth::user()->password);
        return $result;
    }


    public function validateFormats($attribute, $value, $parameters)
    {
    	$allowed = array('application/msword', 'application/vnd.ms-excel','application/pdf','image/jpeg',
						 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 
						 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
						 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

    	$mime = new MimeReader($value->getRealPath());
		$result =  in_array($mime->get_type(), $allowed);
  
		if(!$result){
			$result = in_array($value->getClientMimeType(), $allowed);
		}
      
		return $result;
    }

}