<?php

namespace App\CustomeClasses;
use App\Models\Backend\ActivityLog;

class OwnClasses
{
    public static function ActivityLoger($status,$group,$activity_type,$message,$user_id=null){
        $activityLog = new ActivityLog;
        $activityLog->status = $status;
        $activityLog->group = $group;
        $activityLog->activity_type = $activity_type;
        $activityLog->message = $message;
        $activityLog->user_id = $user_id;
        $activityLog->save();
    }

}
