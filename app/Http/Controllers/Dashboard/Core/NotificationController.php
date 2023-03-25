<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Datatables\Dashboard\Core\NotificationsDatatable;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Support\Crud\WithCrud;

class NotificationController extends Controller
{
    use WithCrud;

    protected string $path = 'dashboard.core.notifications';

    protected string $model = Notification::class;

    protected string $datatable = NotificationsDatatable::class;
    public function __construct() {
        $this->middleware('permission:view_notifications', ['only' => ['show']]);
        $this->middleware('permission:view_notifications', ['only' => ['index']]);    }
    public function show($id)
    {
        $notify = Notification::findOrFail($id);
        $notify->is_seen = 1;
        $notify->save();
        return view($this->path.'.show', ['notify' => $notify]);
    }
}
