<div>
    <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->

    <body>
        <h1>Edit Student Record</h1>
        <form action="/update/{{$id}}" method="post">
            @csrf
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="stud_name" value="{{$editName[0]->name}}"></td>
                </tr>
                <tr>
                    <td col-span="2">
                        <input type="submit" value="Update Student">
                    </td>
                </tr>
            </table>
        </form>



    </body>
</div>