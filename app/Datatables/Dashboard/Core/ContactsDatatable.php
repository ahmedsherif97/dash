<?php

namespace App\Datatables\Dashboard\Core;

use App\Models\ContactUs;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class ContactsDatatable extends BaseDatatable
{
    protected ?string $actionable = 'show';

    public function query(): Builder
    {
        return ContactUs::query();
    }

    protected function getCustomColumns(): array
    {
        return [
            'name'       => function ($model) {
                $title = $model->first_name.' '. $model->first_name;

                return $title;
            },
            'email' => function ($model) {
                $title = $model->email;

                return $title;
            },
            'phone' => function ($model) {
                $title = $model->phone;

                return $title;
            },

        ];
    }

    protected function getColumns(): array
    {
        return [

            Column::computed('name')->title(__('dash.name')),
            Column::computed('email')->title(__('dash.email')),
            Column::computed('phone')->title(__('dash.phone')),

        ];
    }
}
