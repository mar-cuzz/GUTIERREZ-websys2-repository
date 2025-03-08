<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>
</head>

<body>
    <a href="/insert">Add new</a>
    <h1>Read Student</h1>
    <table border=1>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        @foreach ($data as $d)
            <tr>
                <td>{{$d->id}}</td>
                <td>{{$d->name}}</td>
                <td><a href="/delete/{{$d->id}}">Delete</a> <a href="/edit/{{$d->id}}">Edit</a></td>
            </tr>

        @endforeach

    </table>
</body>

</html>