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
        parent::before();

        $current_uuid = Cookie::get($this->user_cookie);

        $uuid = null;

        try {
            // Generate a version 5 (name-based and hashed with SHA1) UUID object
            $uuid = Uuid::uuid5(Uuid::NAMESPACE_DNS, 'gudeg-united');
        } catch (UnsatisfiedDependencyException $e) {}

        if (empty($current_uuid) && !empty($uuid))
            Cookie::set($this->user_cookie, $uuid);

        // Set user uuid
        $this->user_uuid = Cookie::get($this->user_cookie);

        // Set a global variable so views can use it
        View::set_global('user_uuid', $this->user_uuid);
    }

}
