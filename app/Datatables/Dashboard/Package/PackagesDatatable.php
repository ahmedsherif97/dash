<?php

namespace App\Datatables\Dashboard\Package;

use App\Models\Package;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class PackagesDatatable extends BaseDatatable
{
//    protected ?string $actionable = 'edit';

    public function query(): Builder
    {
        return Package::query();
    }

    protected function getCustomColumns(): array
    {
        return [
            'title' => function ($model) {
                $title = $model->title;
                return $title;
            },
            'image' => function ($model) {
                $image = $model->getImageAttribute();
                return '<img src='.$image.' width="80" alt="#">';
            },
            'price' => function ($model) {
                $price = $model->price;
                return $price;
            }
        ];
    }

    protected function getColumns(): array
    {
        return [
            Column::computed('title')->title(__('dash.title')),
            Column::computed('image')->title(__('dash.image')),
            Column::computed('price')->title(__('dash.price')),
        ];
    }
}
