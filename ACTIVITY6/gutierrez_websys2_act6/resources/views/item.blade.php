<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item View Form</title>
</head>
<body>
    <h1>Item Information</h1>
    <form>
        <label>Item No:</label>
        <input type="text" value="{{ $item_no }}" readonly><br><br>

        <label>Name:</label>
        <input type="text" value="{{ $name }}" readonly><br><br>

        <label>Price:</label>
        <input type="text" value="{{ $price }}" readonly><br><br>
    </form>
</body>
</html>
