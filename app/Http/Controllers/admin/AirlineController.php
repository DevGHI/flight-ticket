<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\AirlineResource;
use App\Models\Airline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;


class AirlineController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        $result=Airline::paginate(10);
       $data=AirlineResource::collection($result);
        return [
            'status'=>"success",
            'message'=>"Successful",
            'data'=>$data,
            'paginate'=>$result
        ];
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
//    public function store(Request $request)
//    {
//        $data=Airline::create($request->all());
//        return [
//            'status'=>"success",
//            'message'=>"Successfully Created",
//            'data'=>$data
//        ];
//    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return array
     */
    public function show($id)
    {
        $data=Airline::findOrFail($id);
        return [
            'status'=>"success",
            'message'=>"Successful",
            'data'=>$data
        ];
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return string[]
     */
   public function update(Request $request, $id)
   {
       $data=Airline::findOrFail($id)->update($request->all());
       return [
           'status'=>"success",
           'message'=>"Successfully Updated",
           'data'=>''
       ];
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return string[]
     */
    public function destroy($id)
    {
        try {
            $data=Airline::findOrFail($id);
            if(Storage::exists('public/'.$data->logo)){
                Storage::delete('public/'.$data->logo);
                $data->delete();
            }else{
                dd('File does not exists.');
            }
            return [
                'status'=>"success",
                'message'=>"Successfully Deleted",
                'data'=>''
            ];
        }catch (Throwable $e){
            return [
                'status'=>"error",
                'message'=>"Something was wrong!",
                'data'=>''
            ];
        }

    }
}
