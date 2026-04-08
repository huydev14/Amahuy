<?php

namespace App\Observers;

use App\Models\User;
use App\Services\AuditLogService;
use Illuminate\Support\Arr;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        AuditLogService::log(
            "Tạo mới nhân sự: $user->name (ID: $user->id)",
            $user,
            'user_profile'
        );
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        $newData = $user->getChanges();

        $oldData = Arr::only($user->getOriginal(), array_keys($newData));

        $properties = [
            'old' => $oldData,
            'new' => $newData,
        ];

        AuditLogService::log(
            "Cập nhật hồ sơ nhân sự: $user->name (ID: $user->id)",
            $user,
            'user_profile',
            $user,
            $properties
        );
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        AuditLogService::log(
            "Xóa nhân sự: $user->name (ID: $user->id)",
            $user,
            'user_profile'
        );
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        AuditLogService::log(
            "Khôi phục nhân sự: $user->name (ID: $user->id)",
            $user,
            'user_profile'
        );
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
