<?php

namespace App\Services;

use App\Events\AuditLogEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AuditLogService
{
    public static function log($description, $model = null, $logName = 'audit', ?Model $causer = null, $properties = []) {

        $causer = $causer ?? Auth::user();

        $extra_properties = $properties ?? [];
        $default_properties = [
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'url'        => request()->fullUrl(),
            'method'     => request()->method(),
            'is_ajax'    => request()->ajax(),
            'session_id' => session()->getId(),
        ];

        $final_properties = array_merge($default_properties, $extra_properties);

        AuditLogEvent::dispatch($description, $model,  $logName, $final_properties, $causer);
    }
}
