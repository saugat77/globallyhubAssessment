<?php

namespace App\Http\Controllers;

use App\Models\EducationBackgroundModel;
use App\Models\FormModel;
use Countries\Countries;
use App\Service\FormService;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public $formService;
    public function __construct()
    {
        $this->formService = new FormService();
    }
    public function store()
    {
        $validated = request()->validate([
            'name' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric|unique:form_models,phone',
            'email' => 'required|unique:form_models,email',
            'nationality' => 'required',
            'date_of_birth' => 'required',
            'education_background' => 'required',
            'contact_mode' => 'required',
        ]);
        $this->formService->store($validated);
        return response()->json(['message' => 'Data Saved Successfully']);
    }
    public function getCountries()
    {
        $countries = new Countries();
        $results   = $countries->getAllCountries();
        return response(['result' => $results]);
    }
    public function getEducation()
    {
        $eductions = EducationBackgroundModel::all();
        return response(['result' => $eductions]);
    }
    public function getFormData(){
       $formDatas =  $this->formService->getAll();
        return response(['result' => $formDatas]);

    }
    public function generate()
    {
        // Generate your CSV content here
        $csvContent = FormModel::all();

        // Set appropriate headers for CSV download
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="data.csv"',
        ];

        // Return CSV content as response
        return Response::make($csvContent, 200, $headers);
    }
}
