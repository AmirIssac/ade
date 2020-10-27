<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Dotenv\Validator;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class EmployeeAPIController extends Controller
{

    protected function getValidator(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required|unique:employees',
        ];

        return FacadesValidator::make($request->all(), $rules);
    }

    public function getRecords(){
        $records = Employee::all();
        if(count($records) == 0){              // error handling
            return response()->json( "No Records to get", 404);
          }
         return response()->json($records , 200);
    }

    public function getRecordByID($id){
        $record = Employee::find($id);
        if(is_null($record)){              // error handling
            return response()->json( "No Record to get", 404);
          }
        return response()->json($record , 200);
    }

    public function getRecordByFirstName($name){
        $record = Employee::where('first_name' , $name)->get();
        if(is_null($record)){              // error handling
            return response()->json( "No Record to get", 404);
          }
        return response()->json($record , 200);
    }

    public function getRecordByPhone($phone){
        $record = Employee::where('phone' , $phone)->first();
        if(is_null($record)){              // error handling
            return response()->json( "No Record to get", 404);
          }
        return response()->json($record , 200);
    }

    public function inputRecord(Request $request){
            $validator = $this->getValidator($request);
            if ($validator->fails()) {
                return response()->json($validator->errors()->all() , 400);
            }
        $record = Employee::create($request->all());
        return response()->json($record , 201);
    }

    public function updateRecord(Request $request , $id){
        $record = Employee::find($id);
        $record->update($request->all());
        return response()->json($record , 200);
    }

    public function deleteRecord($id){
      $record = Employee::find($id);
      if(is_null($record)){              // error handling
        return response()->json( "No Content to Delete", 404);
      }
      $record->delete();
      return response()->json(null , 204);
    }
}
