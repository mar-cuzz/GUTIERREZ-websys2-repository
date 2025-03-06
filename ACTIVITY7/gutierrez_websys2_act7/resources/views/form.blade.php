<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activity 7</title>
</head>

<body>
    <h1>Personal Information</h1>
    <div>
        @if(session('success'))
            <p style="color:green">{{session('success')}}</p>
        @endif
        {{-- @if($errors->any())
        @foreach ($errors->all() as $e)
        <p style="color:red">{{$e}}</p>
        @endforeach
        @endif --}}
        <form action="{{route('InfoForm')}}" method="post">
            @csrf
            <table class="form-group">
                <tr>

                    <td><label for="fnaFirstnameme">First Name</label></td>
                    <td>
                        <input type="text" name="Firstname" id="Firstname" value="{{old('Firstname')}}">
                        @error('Firstname')
                            <span class="text-sm" style="color:red">{{ $message }}</span>
                        @enderror    
                    </td>
                </tr>
                <tr>
                    <td><label for="Lastname">Last Name</label></td>
                    <td>
                        <input type="text" name="Lastname" id="Lastname" value="{{old('Lastname')}}">
                        @error('Lastname')
                            <span class="text-sm" style="color:red">{{ $message }}</span>
                        @enderror    
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="gender-label">Sex</label>
                    </td>
                    <td colspan="2">
                        <label>
                            <input type="radio" name="gender" value="male"> Male
                        </label>
                        <label>
                            <input type="radio" name="gender" value="female"> Female
                        </label>
                    </td>
                </tr>
                <tr>
                    <td><label for="Mobile">Mobile Phone</label></td>
                    <td>
                        <input type="text" name="Mobile" id="Mobile" value="{{old('Mobile')}}">
                        @error('Mobile')
                            <span class="text-sm" style="color:red">{{ $message }}</span>
                        @enderror    
                    </td>
                </tr>
                <tr>
                    <td><label for="TelephoneNo">Tel. No.</label></td>
                    <td>
                        <input type="text" name="TelephoneNo" id="TelephoneNo" class="form-control"
                            value="{{old('TelephoneNo')}}">
                        @error('TelephoneNo')
                            <span class="text-sm" style="color:red">{{ $message }}</span>
                        @enderror    
                    </td>
                </tr>
                <tr>
                    <td><label for="Birthdate">Birth Date</label></td>
                    <td>
                        <input type="date" name="Birthdate" id="Birthdate" style="width:200px;"
                            value="{{old('Birthdate')}}">
                        @error('Birthdate')
                            <span class="text-sm" style="color:red">{{ $message }}</span>
                        @enderror    
                    </td>
                </tr>
                <tr>
                    <td><label for="Address">Address</label></td>
                    <td>
                        <input type="text" name="Address" id="Address" style="width:600px;" value="{{old('Address')}}">
                        @error('Address')
                            <span class="text-sm" style="color:red">{{ $message }}</span>
                        @enderror    
                    </td>
                </tr>
                <tr>
                    <td><label for="Email">Email</label></td>
                    <td>
                        <input type="text" name="Email" id="Email" value="{{old('Email')}}">
                        @error('Email')
                            <span class="text-sm" style="color:red">{{ $message }}</span>
                        @enderror    
                    </td>
                </tr>
                <tr>
                    <td><label for="Website">Website</label></td>
                    <td>
                        <input type="text" name="Website" id="Website" style="width:400px;" value="{{old('Website')}}">
                        @error('Website')
                            <span class="text-sm" style="color:red">{{ $message }}</span>
                        @enderror    
                    </td>

                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;">
                        <input type="submit" name="" id="">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>