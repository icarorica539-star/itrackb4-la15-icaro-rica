<?php

namespace App\Policies;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SubjectPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Subject $subject): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function update(User $user, Subject $subject): bool
    {
         return $user->role === 'admin';
    }

    public function delete(User $user, Subject $subject): bool
    {
         return $user->role === 'admin';
    }

    public function restore(User $user, Subject $subject): bool
    {
        return false;
    }

    public function forceDelete(User $user, Subject $subject): bool
    {
        return false;
    }
}
