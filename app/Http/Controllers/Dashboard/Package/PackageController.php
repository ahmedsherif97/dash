<?php

namespace App\Http\Controllers\Dashboard\Package;

use App\Datatables\Dashboard\Package\PackagesDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Package\PackageRequest;
use App\Models\Package;
use App\Support\Crud\WithCrud;
use Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    use WithCrud;
    protected string $path = 'dashboard.package.packages';

    protected string $model = Package::class;

    protected string $datatable = PackagesDatatable::class;

    protected function storeAction(array $validated)
    {
        $image = Arr::pull($validated, 'image');
        $validate = Arr::except($validated, 'image');
        $package = $this->queryBuilder()->create($validate);
        $image && uploadImage('image', $image, $package);
    }
    protected function updateAction(array $validated, Model $model)
    {
        $image = Arr::pull($validated, 'image');
        $validate = Arr::except($validated, 'image');
        $model->update($validate);
        $image && uploadImage('image', $image, $model);
    }

    protected function formData(?Model $model = null): array
    {
        return [

        ];
    }

    protected function validationAction(): array
    {
        return app(PackageRequest::class)->validated();
    }
}
