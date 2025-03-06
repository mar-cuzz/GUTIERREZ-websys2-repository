<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details View Form</title>
</head>
<body>
    <h1>Order Details</h1>
    <form>
        <label>Transaction No:</label>
        <input type="text" value="{{ $trans_no }}" readonly><br><br>

        <label>Order No:</label>
        <input type="text" value="{{ $order_no }}" readonly><br><br>

        <label>Item ID:</label>
        <input type="text" value="{{ $item_id }}" readonly><br><br>

        <label>Name:</label>
        <input type="text" value="{{ $name }}" readonly><br><br>

        <label>Price:</label>
        <input type="text" value="{{ $price }}" readonly><br><br>

        <label>Quantity:</label>
        <input type="text" value="{{ $qty }}" readonly><br><br>
    </form>
</body>
</html>
