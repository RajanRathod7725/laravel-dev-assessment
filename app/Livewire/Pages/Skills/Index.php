<?php

namespace App\Livewire\Pages\Skills;

use App\Models\Skill;
use Livewire\Component;

class Index extends Component
{

    public $form = [
        'name'=>''
    ];
    public $skills = [];
    public $edit_id = '';

    public function render()
    {
        $this->skills = Skill::latest()->get()->toArray();
        return view('livewire.pages.skills.index');
    }

    public function save(){
        $this->validateForm();

        $addData = [
            'name'=>$this->form['name']
        ];
        Skill::create($addData);
        $this->form['name'] = '';

        $this->render();
    }

    public function editSkill($id){
        $skill = Skill::where('id',$id)->first();
        if(isset($skill)){
            $this->edit_id = $id;
            $this->form['name'] = $skill->name;
        }
    }

    public function update(){
        $this->validateForm();

        $updateData = [
            'name'=>$this->form['name']
        ];
        Skill::where('id',$this->edit_id)->update($updateData);
        $this->form['name'] = '';
        $this->edit_id = '';

        $this->render();
    }

    public function deleteSkill($id){
        Skill::where('id',$id)->delete();
        $this->render();
    }

    public function validateForm(){
        $rule = [
            'form.name'=>'required|max:150'
        ];
        $this->validate($rule,[
            'form.name.required'=>'Name is required field',
            'form.name.max'=>'Name should be 150 or less characters'
        ]);
    }
}
