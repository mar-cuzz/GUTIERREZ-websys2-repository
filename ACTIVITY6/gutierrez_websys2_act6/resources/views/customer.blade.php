<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer View Form</title>
</head>
<body>
    <h1>Customer Information</h1>
    <form>
        <label>Customer ID:</label>
        <input type="text" value="{{ $id }}" readonly><br><br>

        <label>Name:</label>
        <input type="text" value="{{ $name }}" readonly><br><br>

        <label>Address:</label>
        <input type="text" value="{{ $address }}" readonly><br><br>
    </form>
</body>
</html>
