<?php

use App\Models\Skill;

function isDeveloper()
{
    if (auth()->user()->role == 3)
        return true;
    return false;
}
function isAgency()
{
    if (auth()->user()->role == 5)
        return true;
    return false;
}

function isClient()
{
    if (auth()->user()->role == 6)
        return true;
    return false;
}
function isOnboarding()
{
    return  auth()->user()->onboarding;
}

function getSkills()
{
    return  Skill::get();
}
