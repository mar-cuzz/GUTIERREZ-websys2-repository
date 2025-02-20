<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{operation1}/{value1}/{value2}/{operation2}/{value3}/{value4}', function ($operation1, $value1, $value2, $operation2, $value3, $value4){ //kinukuha yung values after every forward slash tapos pinapasa ito sa variable
    //nagdeclare ako ng variables na ipapasa sa result.blade.php
    
    $result1 = 0; 
    $result2 = 0;
    $errormsg1 = '';
    $errormsg2 = '';

    //calculation ng bawat operation for operation1
    if($operation1 === "add"){
        $result1 =$value1+$value2;
    }
    elseif($operation1 === "subtract"){
        $result1 =$value1-$value2;
    }
    elseif($operation1 === "multiply"){
        $result1 =$value1*$value2;
    }
    elseif($operation1 === "divide" && $value2 != 0){
        if($value2 == 0){
            $errormsg1 = "Error: cannot divide by 0";
        }
        else{
            $result1 =$value1/$value2;
        }
    }

    //calculation ng bawat operation for operation2
    if($operation2 === "add"){
        $result2 =$value3+$value4;
    }
    elseif($operation2 === "subtract"){
        $result2 =$value3-$value4;
    }
    elseif($operation2 === "multiply"){
        $result2 =$value3*$value4;
    }
    elseif($operation2 === "divide"){
        if($value4 == 0){
            $errormsg2 = "Error: cannot divide by 0";
        }
        else{
            $result2 =$value3/$value4;
    }
    }
    
    //dito na mag rereturn ng view file which is yung result.blade.php
    return view('result', compact('value1', 'value2', 'operation1', 'value3', 'value4', 'operation2', 'result1', 'result2', 'errormsg1', 'errormsg2'));
})
?>