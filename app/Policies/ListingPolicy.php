<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Listing;

class ListingPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Listing $listing)
    {
       return $user->id === $listing->user_id ;
    }
}
