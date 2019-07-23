<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'tbl_mast_app_user';
	public $primaryKey = 'USER_ID';
	protected $guarded = array('USER_ID');
	protected $fillable = array('user_name','password');
	protected $hidden = array('password');
	public function getAuthPassword() 
	{
		return $this->password;
	 }
	  public function getRememberToken()
        {
            return $this->remember_token;
        }
	public function setRememberToken($value)
        {
            $this->remember_token = $value;
        }
        
        public function getRememberTokenName()
        {
            return 'remember_token';
        }

}
