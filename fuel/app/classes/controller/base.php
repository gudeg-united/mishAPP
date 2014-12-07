<?php

use Rhumsaa\Uuid\Uuid;
use Rhumsaa\Uuid\Exception\UnsatisfiedDependencyException;

class Controller_Base extends Controller_Template
{
    /**
     * User cookie key name
     * @var string
     */
    public $user_cookie = 'mishapp_uuid';

    /**
     * Current user uuid, this one is more like current user id
     * @var string
     */
    public $user_uuid;

    public function before()
    {
        // Assign current_user to the instance so controllers can use it
        $this->current_user = Auth::check()
            ? (Config::get('auth.driver', 'Simpleauth') == 'Ormauth' ? Model\Auth_User::find_by_username(Auth::get_screen_name()) : Model_User::find_by_username(Auth::get_screen_name()))
            : null;
        // Set a global variable so views can use it
        View::set_global('current_user', $this->current_user);

        parent::before();

        $this->setUserUuid();

        // Set a global variable so views can use it
        View::set_global('user_uuid', $this->user_uuid);
    }

    /**
     * Get current user uuid
     * @return string
     */
    public function getUserUuid()
    {
        if (empty($this->user_uuid))
            $this->user_uuid = $this->setUserUuid();

        return $this->user_uuid;
    }

    /**
     * Set user uuid
     */
    public function setUserUuid()
    {
        $current_uuid = Cookie::get($this->user_cookie);

        if (empty($current_uuid)) {
            try {
                // Generate a version 5 (name-based and hashed with SHA1) UUID object
                $uuid = Uuid::uuid5(Uuid::NAMESPACE_DNS, 'gudeg-united');
            } catch (UnsatisfiedDependencyException $e) {
                $uuid = null;
            }            

            Cookie::set($this->user_cookie, $uuid);
        }    

        // Set user uuid
        $this->user_uuid = Cookie::get($this->user_cookie);

        return $this->user_uuid;
    }
}
