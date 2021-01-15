<?php

namespace App\Http\Livewire\Admin;

use App\Models\Airline;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Http\Resources\AirlineResource;
use App\Http\Controllers\admin\AirlineController;

class AirlineComponent extends Component
{

      use WithPagination;
       use WithFileUploads;

    public $name;
    public $photo;


    protected $rules = [
        'name' => 'required',
        'photo' => 'image|max:1024', // 1MB Max
    ];

    public function insertData(){
        $this->validate();
         $filename=uniqid().'.'.$this->photo->extension();
         $this->photo->storeAs('/public/upload/airline', $filename);
        Airline::create([
            'name'=>$this->name,
            'logo'=>'upload/airline/'.$filename
        ]);
        $this->name="";
        $this->emit('done','success','Created Succesfully');

    }

    public function updateAirline(){
        $this->validate();
        $data=[
            'name'=>$this->name,
            'photo'=>$this->photo
        ];
        $request=new Request($data);
        $obj=new AirlineController();
        $res=$obj->update($request,$this->myid);
        $this->name="";
        $this->emit('done',$res['status'],$res['message']);

    }

    public function deleteData($id){
        $obj=new AirlineController();
        $res=$obj->destroy($id);
        $this->emit('done',$res['status'],$res['message']);
    }

    public $myid;

    public function setData($id){
        $data=Airline::findOrFail($id);
        $this->name=$data->name;
        $this->myid=$id;
    }


    public function render()
    {
        $result=Airline::orderBy('id','desc')->paginate(10);
       // $data=AirlineResource::collection($result);
        // dd($result[0]['logo']);
        return view('livewire.admin.airline-component')->with([
            'data'=>$result,
            'paginate'=>$result,
        ]);
    }

}
