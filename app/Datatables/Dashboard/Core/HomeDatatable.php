<?php

namespace App\Datatables\Dashboard\Core;

use App\Models\HomeSection;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class HomeDatatable extends BaseDatatable
{
    public function __construct()
    {
        if (request()->route('id') == 'about'){
            $this->actionable = 'edit';
        }
    }

    public function query(): Builder
    {
        if (request()->route('id')){
            return HomeSection::query()->where('type', request()->route('id'));
        }else{
            return HomeSection::query();
        }
    }

    protected function getCustomColumns(): array
    {
        return [
            'title' => function ($model) {
                $title = $model->title;

                return $title;
            }
        ];
    }

    protected function getColumns(): array
    {
        return [
            Column::computed('title')->title(__('dash.title')),
        ];
    }
}
