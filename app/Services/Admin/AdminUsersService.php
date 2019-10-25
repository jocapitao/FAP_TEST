<?php

namespace App\Services\Admin;

use App\Models\Media\Media;
use App\Models\User\UserAddresses;
use App\Models\User\UserMedia;
use App\Models\User\UserProfile;
use App\User;

class AdminUsersService
{
    public function __construct()
    {
        $this->users          = new User();
        $this->user_media     = new UserMedia();
        $this->user_addresses = new UserAddresses();
        $this->user_profile   = new UserProfile();
        $this->media          = new Media();
    }

    public function get_users()
    {
        $get = collect($this->users->get_users());
        if ($get->isEmpty()) {
            return ['status' => false];
        }

        return ['status' => true, 'content' => ['users' => $get]];
    }

    public function get_user($user_id)
    {

        $get_user = collect($this->users->get_user($user_id));
        if ($get_user->isEmpty()) {
            $get_user = null;
        }

        $get_user_profile = collect($this->users->get_user_info($user_id));
        if ($get_user_profile->isEmpty()) {
            $get_user_profile = null;
        }

        $get_user_media = collect($this->get_user_media($user_id));
        if ($get_user_media->isEmpty()) {
            $get_user_media = null;
        }

        $get_user_addresses = collect($this->get_user_addresses($user_id));
        if ($get_user_addresses->isEmpty()) {
            $get_user_addresses = null;
        }

        return [
            'status' => true,
            'content' => [
                'user' => $get_user, 'media' => $get_user_media,
                'addresses' => $get_user_addresses, 'profile' => $get_user_profile
            ]
        ];
    }

    public function get_user_media($user_id)
    {
        $get = $this->user_media->get_media($user_id);
        if ($get === null) {
            return $get;
        }

        $media = [];
        foreach ($get as $key => $media_) {
            $media[] = $this->media->get_media_path(75);
        }

        return $media;
    }

    public function get_user_addresses($user_id)
    {
        return $this->user_addresses->get_by_user($user_id);

    }

    public function get_user_profile($user_id)
    {
        return $this->user_profile->get_profile($user_id);
    }
}