<div>
    <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->

    <body>
        <h1>Create Student Form</h1>
        <form action="/create" method="post">
            @csrf
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="stud_name"></td>
                </tr>
                <tr>
                    <td col-span="2">
                        <input type="submit" value="Add Student">
                    </td>
                <tr>
                    <td col-span="2">
                        <a href="/read">View students</a>
                    </td>
                </tr>
                </tr>
            </table>
        </form>



    </body>
</div>