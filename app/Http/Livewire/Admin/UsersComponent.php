<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\AdminController;

class UsersComponent extends Component
{
    public $name,$email,$password,$user_type;
    protected $rules = [
        'name' => 'required',
        'user_type'=>'required'
    ];

    public $myid;
    public function setData($id)
    {
        $data = User::findOrFail($id);
        $this->name=$data->name;
        $this->user_type=$data->user_type;
        $this->myid=$id;
    }

    public function updateData()
    {
        $this->validate();
        $data=[
            'name'=>$this->name,
            'user_type'=>$this->user_type
        ];
        $request = new Request($data);
        $obj = new AdminController();
        $res = $obj->update($request,$this->myid);
        $this->name ='';
        $this->user_type = '';
        $this->emit('done',$res['status'],$res['message']);
    }

    public function deleteData($id)
    {
        $obj = new AdminController();
        $res = $obj->destroy($id);
        $this->emit('done',$res['status'],$res['message']);
    }
    public function render()
    {
        $users = User::all();
        return view('livewire.admin.users-component')->with([
            'users'=>$users
        ]);
    }
}
