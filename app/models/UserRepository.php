<?php



/**
 * Class UserRepository
 *
 * This service abstracts some interactions that occurs between Confide and
 * the Database.
 */
class UserRepository
{
    /**
     * Signup a new account with the given parameters
     *
     * @param  array $input Array containing 'username', 'email' and 'password'.
     *
     * @return  User User object that may or may not be saved successfully. Check the id to make sure.
     */
    public function signup($input)
    {
        $user = new User;

        $user->username = array_get($input, 'username');
        $user->email    = array_get($input, 'email');
        $user->password = array_get($input, 'password');
        $user->first_name = array_get($input, 'first_name');
        $user->middle_name = array_get($input, 'middle_name');

        // The password confirmation will be removed from model
        // before saving. This field will be used in Ardent's
        // auto validation.
        $user->password_confirmation = array_get($input, 'password_confirmation');

        // Generate a random confirmation code
        $user->confirmation_code     = md5(uniqid(mt_rand(), true));

        //$user->confirmed = 1;

        // Save if valid. Password field will be hashed before save
        //save is a internal method which calls ConfideUser save method, and inside that the validations are made

        $this->save($user);
        //var_dump( $user->first_name);die;
        
        return $user;
    }


    public function update($input)
    {
 
        $rules = array(
            'username'    => 'required',
            'email'       => 'required|email',
            'first_name'  => 'required',
            'middle_name' => 'required',
            'current_password' => 'required_with:new_password|current_password_check',
            'new_password' => 'required_with:current_password|different:current_password|min:8',
            'new_password_confirmation' => 'required_with:new_password|same:new_password'
        );

        $messages = array(
            'current_password.current_password_check'=>'The current password field doesn\'t match your current password',
            'new_password_confirmation.required_with'=>'The new password field doesn\'t match its confirmation'
        );

        $validator = Validator::make($input,$rules,$messages);
        
        if ($validator->fails()) {
            return Redirect::to('/')->withErrors($validator);

        } else {
            
           
            $user         = User::find(Confide::user()->id);
            $user->username = array_get($input, 'username');
            $user->email    = array_get($input, 'email');
            $user->first_name = array_get($input, 'first_name');
            $user->middle_name = array_get($input, 'middle_name');

            
            if(trim(array_get($input, 'new_password')) != "")
                $user->password =  App::make('hash')->make(array_get($input, 'new_password'));
            

            echo "<pre>";
            var_dump($user); 
            //die;

            $user->save_with_eloquent();

            // redirect
            Session::flash('message', 'You info has been saved!');
            return Redirect::to('/');
        }
    
        return $user;
    }


    /**
     * Attempts to login with the given credentials.
     *
     * @param  array $input Array containing the credentials (email/username and password)
     *
     * @return  boolean Success?
     */
    public function login($input)
    {
        if (! isset($input['password'])) {
            $input['password'] = null;
        }

        return Confide::logAttempt($input, Config::get('confide::signup_confirm'));
    }

    /**
     * Checks if the credentials has been throttled by too
     * much failed login attempts
     *
     * @param  array $credentials Array containing the credentials (email/username and password)
     *
     * @return  boolean Is throttled
     */
    public function isThrottled($input)
    {
        return Confide::isThrottled($input);
    }

    /**
     * Checks if the given credentials correponds to a user that exists but
     * is not confirmed
     *
     * @param  array $credentials Array containing the credentials (email/username and password)
     *
     * @return  boolean Exists and is not confirmed?
     */
    public function existsButNotConfirmed($input)
    {
        $user = Confide::getUserByEmailOrUsername($input);

        if ($user) {
            $correctPassword = Hash::check(
                isset($input['password']) ? $input['password'] : false,
                $user->password
            );

            return (! $user->confirmed && $correctPassword);
        }
    }

    /**
     * Resets a password of a user. The $input['token'] will tell which user.
     *
     * @param  array $input Array containing 'token', 'password' and 'password_confirmation' keys.
     *
     * @return  boolean Success
     */
    public function resetPassword($input)
    {
        $result = false;
        $user   = Confide::userByResetPasswordToken($input['token']);

        if ($user) {
            $user->password              = $input['password'];
            $user->password_confirmation = $input['password_confirmation'];
            $result = $this->save($user);
        }

        // If result is positive, destroy token
        if ($result) {
            Confide::destroyForgotPasswordToken($input['token']);
        }

        return $result;
    }

    /**
     * Simply saves the given instance
     *
     * @param  User $instance
     *
     * @return  boolean Success
     */
    public function save(User $instance)
    {

        return $instance->save();
    }
}
