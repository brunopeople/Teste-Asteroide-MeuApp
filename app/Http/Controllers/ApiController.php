<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAllStudent()
    {
    	$student = Student::get()->toJson(JSON_PRETTY_PRINT);
    	return response($response, 200);
    }

    public function createStudent(Request $request)
    {
    	$student = new Student;
    	$student->name = $request->name;
    	$student->surname = $request->surname;
    	$student->image = $request->image;
    	$student->phone = $request->phone;
    	$student->adress = $request->adress;
    	$student->email = $request->email;
    	$student->save();

    	return response()->json([
    		"message" => "Cadastro do estudente criado com sucesso!!"
    	], 201);
    }

    public function getStudent($id)
    {
    	if(Student::where('id',$id)->exists()){
    		$student = Student::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
    		return response($student, 200);
    	} else {

    		return response()->json([
    			"message" => "Registro do Estudante não encontrado!!"
    		], 404);
    		
    	}
    }

    public function updateStudent(Request $request, $id)
    {
    	if(Student::where('id',$id)->exists())
    	{
    		$student = Student::find($id);
    		$student->name = is_null($request->name) ? $student->name : $request->name;
    		$student->surname = is_null($request->surname) ? $student->surname : $request->surname;
    		$student->image = is_null($request->image) ? $student->image : $request->image;
    		$student->email = is_null($request->email) ? $student->email : $request->email;
    		$student->adress = is_null($request->adress) ? $student->adress : $request->adress;
    		$student->data = is_null($request->data) ? $student->data : $request->data;
    		$student->save();

    		return response()->json([
    			"message" => "registro atualizado com sucesso!"
    		], 200);
    	} else {
    		return response()->json([
    			"message" => "Estudante não encontrado"
    		], 404);
    	}
    }

    public function deleteStudent($id)
    {
    	if(Student::where('id',$id)->exists()){
    		$student = Student::find($id);
    		$student->delete();

    		return response()->json([
    			"message" => "Registro deletado com sucesso!!"
    		], 202);
    	} else {
    		return response()->json([
    			"message" => "Estudante Não encontrado"
    		], 404);
    	}
    }
}
