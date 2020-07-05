<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable;

    protected $guarded = [];
    protected $slack_webhook_url = "https://hooks.slack.com/services/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";

    public function routeNotificationForSlack()
    {
        return $this->slack_webhook_url;
    }

    public function scopeByAuth($query)
    {
        return $query->where('user_id', auth()->id());
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
