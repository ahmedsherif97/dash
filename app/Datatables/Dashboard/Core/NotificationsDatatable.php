<?php

namespace App\Datatables\Dashboard\Core;

use App\Models\ContactUs;
use App\Models\Notification;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class NotificationsDatatable extends BaseDatatable
{
    protected ?string $actionable = 'show';

    public function query(): Builder
    {
        return Notification::query()->where('user_id', auth('dashboard')->id());
    }

    protected function getCustomColumns(): array
    {
        return [
            'title'       => function ($model) {
                $title = $model->title;

                return $title;
            },
        ];
    }

    protected function getColumns(): array
    {
        return [

            Column::computed('title')->title(__('dash.title')),

        ];
    }
}
