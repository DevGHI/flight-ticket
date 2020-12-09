<?php

namespace App\Http\Livewire\Admin;

use App\Http\Controllers\admin\CityController;
use App\Models\City;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class CityComponent extends Component
{

    use WithPagination;

    public $name;

    protected $rules = [
        'name' => 'required',
    ];

    public function insertCity(){
        $this->validate();
        $data=[
            'name'=>$this->name
        ];
        $request=new Request($data);

        $obj=new CityController();
        $res=$obj->store($request);
        $this->name="";
        $this->emit('done',$res['status'],$res['message']);

    }

    public function updateCity(){
        $this->validate();
        $data=[
            'name'=>$this->name
        ];
        $request=new Request($data);
        $obj=new CityController();
        $res=$obj->update($request,$this->myid);
        $this->name="";
        $this->emit('done',$res['status'],$res['message']);

    }

    public function deleteCity($id){
        $obj=new CityController();
        $res=$obj->destroy($id);
        $this->emit('done',$res['status'],$res['message']);
    }


    public $myid;

    public function setData($id){
        $data=City::findOrFail($id);
        $this->name=$data->name;
        $this->myid=$id;
    }


    public function render()
    {
        $obj=new CityController();
        $result=$obj->index();
        return view('livewire.admin.city-component')->with([
            'data'=>$result['data']
        ]);
    }
}
