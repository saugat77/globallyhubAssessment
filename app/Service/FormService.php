<?php

namespace App\Service;

use App\Models\FormModel;

class FormService
{
    public function store($validated)
    {
        $data = FormModel::create($validated);
        return $data?->makeHidden(['created_at', 'updated_at']);
    }

    public function getAll()
    {
        $data = FormModel::all();
        return $data?->makeHidden(['created_at', 'updated_at']);
    }
}
