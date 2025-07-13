<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Request;
use App\Models\LoginLog;
use Jenssegers\Agent\Agent;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $agent = new Agent();
        $agent->setUserAgent(Request::userAgent());
        $device = $agent->device();
        if (!$device || $device === 'WebKit') {
            $device = $agent->isMobile() ? 'Mobile' : ($agent->isTablet() ? 'Tablet' : 'Desktop');
        }

        LoginLog::create([
            'user_id' => $event->user->id,
            'ip_address' => Request::ip(),
            'user_agent' => $device . ' ' . $agent->platform() . ' ' . $agent->browser(),
        ]);
    }
}
