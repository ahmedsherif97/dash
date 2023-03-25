<?php

namespace App\Http\Controllers\Dashboard\Homesection;

use App\Datatables\Dashboard\Core\HomeDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\HomeSection\HomeSectionRequest;
use App\Models\HomeSection;
use App\Support\Crud\WithCrud;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class HomeSectionController extends Controller
{
    use WithCrud;

    protected string $path = 'dashboard.homesection.homesections';

    protected string $model = HomeSection::class;

    protected string $datatable = HomeDatatable::class;

    protected function storeAction(array $validated)
    {
        $image = Arr::pull($validated, 'image');
        $validate = Arr::except($validated, 'image');
        $section = $this->queryBuilder()->create($validate);
        $image && uploadImage('image', $image, $section);
        return $this->successfulRequest(null, [$validated['type']]);
    }
    protected function updateAction(array $validated, Model $model)
    {
        $image = Arr::pull($validated, 'image');
        $validate = Arr::except($validated, 'image');
        $model->update($validate);
        $image && uploadImage('image', $image, $model);
        return $this->successfulRequest(null, [$validated['type']]);
    }
    protected function formData(?Model $model = null): array
    {
        return [
            'names' => ['feature' => __('dash.feature'), 'success_partners' => __('dash.success_partners'), 'footer' => __('dash.footer')],
        ];
    }
    protected function validationAction(): array
    {
        return app(HomeSectionRequest::class)->validated();
    }
}
