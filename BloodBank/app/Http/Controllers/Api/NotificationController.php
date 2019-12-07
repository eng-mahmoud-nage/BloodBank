<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Http\Request;
use Mockery\Matcher\Not;
use function Sodium\compare;

class NotificationController extends Controller
{
    public function notification_setting(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'blood_types_id' => 'required',
            'governorates_id' => 'required'
        ]);
        if ($validator->fails()){
            return ResponseJson(0, $validator->errors()->first());
        }
            $request->user()->blood_types()->sync($request->input('blood_types_id'));
            $request->user()->governrates()->sync($request->input('governorates_id'));
    }

    public function notification(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'id' => 'required|exists:donation_requests',
        ]);
        if ($validator->fails()){
            return ResponseJson(0, $validator->errors()->first());
        }
        $data = Notification::where('donation_request_id', $request->id)->get();
        return ResponseJson(1,'success', $data);
    }

    public function notifications(Request $request)
    {
        $data = $request->user()->notifications;
        return ResponseJson(1,'success', $data);
    }

    public function unread_notification(Request $request)
    {
        $unread = $request->user()->notifications()->where('is_read', '=', 0)->get();
        return ResponseJson(1,'success', ['unread' => $unread->toArray(), 'count' => $unread->count()]);
    }

    public function set_read(Request $request){
        $data = auth()->user()->notifications()
            ->where('clientable_id', $request->id)->update(['is_read' => 1]);
        return ResponseJson(1, 'Post was been read', $data);
    }
}
