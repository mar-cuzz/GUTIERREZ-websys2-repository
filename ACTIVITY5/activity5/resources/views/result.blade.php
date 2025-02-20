<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACTIVITY 5</title>
</head>
<style>
    {{-- Nag declare lang ng styles para sa even and odd results --}}
    .greenbox {
        background-color: green;
        color: white;
        padding: 10px;
    }
    .bluebox {
        background-color: blue;
        color: white;
        padding: 10px;
    }
</style>
<body>
    <h3>Gutierrez, Ronald Marcus T. BSIT 3C</h3>


    {{-- dito na din nakaenclose yung logic kung even or odd ba yung ininput na number, dito na rin mapapalabas yung kulay --}}


    Value 1: 
    @if($value1 % 2 == 0)
        <span style="color: orange">{{$value1}}</span>
    @else
        <span style="color: blue">{{$value1}}</span>
    @endif <br> <br>
    
    Value 2: 
    @if($value2 % 2 == 0)
        <span style="color: orange">{{$value2}}</span>
    @else
        <span style="color: blue">{{$value2}}</span>
    @endif <br> <br>


    {{-- nakaenclose dito yung logic kung even or odd ba yung result, dito na rin mapapalabas yung kulay --}}


    Operator: {{$operation1}} <br> <br> <br>
                @if(isset($errormsg1))
                    <span style="color: red">{{$errormsg1}}</span>
                @elseif($result1 % 2 == 0)
                    <span style="color: green">Result (displayed in GREEN): <span class="greenbox">{{$result1}}</span></span>
                @else
                <span style="color: blue">Result (displayed in BLUE):<span class="bluebox">{{$result1}}</span></span>
                @endif
            <br> <br> <br>


    {{-- dito na din nakaenclose yung logic kung even or odd ba yung ininput na number, dito na rin mapapalabas yung kulay --}}


    Value 3: 
    @if($value3 % 2 == 0)
        <span style="color: orange">{{$value3}}</span>
    @else
        <span style="color: blue">{{$value3}}</span>
    @endif <br> <br>
    
    Value 4: 
    @if($value4 % 2 == 0)
        <span style="color: orange">{{$value4}}</span>
    @else
        <span style="color: blue">{{$value4}}</span>
    @endif <br> <br>


    {{-- nakaenclose dito yung logic kung even or odd ba yung result, dito na rin mapapalabas yung kulay --}}
    

    Operator: {{$operation2}} <br> <br> <br>
                @if(isset($errormsg2))
                    <span style="color: red">{{$errormsg2}}</span>
                @elseif($result2 % 2 == 0)
                    <span style="color: green">Result (displayed in GREEN): <span class="greenbox">{{$result2}}</span></span>
                @else
                <span style="color: blue">Result (displayed in BLUE):<span class="bluebox">{{$result2}}</span></span>
                @endif
            <br>
</body>
</html>