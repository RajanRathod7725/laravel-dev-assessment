<?php

namespace App\Livewire\Pages\Jobs;

use App\Models\JobPosting;
use App\Models\Skill;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use WithFileUploads;

    public $form = [
        'title'=>'',
        'description'=>'',
        'experience'=>'',
        'salary'=>'',
        'location'=>'',
        'extra_info'=>'',
        'skills'=>'',
        'company_name'=>'',
        'company_logo'=>'',
    ];
    public $skills = [];

    public function render()
    {
        $this->skills = Skill::latest()->get();
        return view('livewire.pages.jobs.create');
    }

    public function save(){
        $this->validateForm();
        $company_logo = $this->uploadFile('company_logo', $this->form['company_logo']);

        $addData = [
            'title'=>$this->form['title'],
            'description'=>$this->form['description'],
            'experience'=>$this->form['experience'],
            'salary'=>$this->form['salary'],
            'location'=>$this->form['location'],
            'extra_info'=>$this->form['extra_info'],
            'skills'=>implode(',',$this->form['skills']),
            'company_name'=>$this->form['company_name'],
            'company_logo'=>$company_logo,
        ];
        JobPosting::create($addData);

        $this->redirect(route('admin.jobs.index'));
    }

    public function validateForm(){
        $rule = [
            'form.title'=>'required|max:150',
            'form.description'=>'required',
            'form.experience'=>'required|max:150',
            'form.salary'=>'required|max:150',
            'form.location'=>'required|max:150',
            'form.extra_info'=>'required|max:150',
            'form.skills'=>'required|max:150',
            'form.company_name'=>'required|max:150',
            'form.company_logo'=>'required|file|mimes:png,webp,jpg|max:1024',
        ];
        $this->validate($rule,[
            'form.name.required'=>'Title is required field',
            'form.name.max'=>'Title should be 150 or less characters',
            'form.description.required'=>'Description is required field',
            'form.description.max'=>'Description should be 150 or less characters',
            'form.experience.required'=>'Experience is required field',
            'form.experience.max'=>'Experience should be 150 or less characters',
            'form.salary.required'=>'Salary is required field',
            'form.salary.max'=>'Salary should be 150 or less characters',
            'form.location.required'=>'Location is required field',
            'form.location.max'=>'Location should be 150 or less characters',
            'form.extra_info.required'=>'Extra Info is required field',
            'form.extra_info.max'=>'Extra Info should be 150 or less characters',
            'form.skills.required'=>'Skills is required field',
            'form.skills.max'=>'Skills should be 150 or less characters',
            'form.company_name.required'=>'Company Name is required field',
            'form.company_name.max'=>'Company Name should be 150 or less characters',
            'form.company_logo.required'=>'Company Logo is required field',
            'form.company_logo.file'=>'Company Logo should be a image file',
            'form.company_logo.mimes'=>'Please select only png, webp and jpg files',
            'form.company_logo.max'=>'Please select file of size 1MB or less',
        ]);
    }

    private function uploadFile($folder,$file){
        $new_file_name = uniqid().time().'.'.$file->getClientOriginalExtension();
        Storage::disk($folder)->putFileAs('/',$file,$new_file_name,'public');
        return $new_file_name;
    }
}
