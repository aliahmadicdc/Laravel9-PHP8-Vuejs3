<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Tzsk\Sms\Channels\SmsChannel;

class BaseNotification extends Notification
{
    public function via($notifiable): array
    {
        $array = [];

        try {
            if ($notifiable && isset($notifiable['id'])) {
                if ($notifiable->hasOption('email_notification')) array_push($array, 'mail');
                if ($notifiable->hasOption('message_notification')) array_push($array, 'database');
                if ($notifiable->hasOption('sms_notification')) array_push($array, SmsChannel::class);
            }
        } catch (\Exception $exception) {

        }

        return $array;
    }
}
