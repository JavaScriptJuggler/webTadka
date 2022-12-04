<?php

use Illuminate\Support\Facades\Auth;

function getUser()
{
    return Auth::user();
}
