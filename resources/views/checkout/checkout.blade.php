<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <h2>Shipping Address</h2>
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Address:</label>
        <input type="text" name="address1" required><br>
        <label>City:</label>
        <input type="text" name="city" required><br>
        <label>Province Code:</label>
        <input type="text" name="province_code" required><br>
        <label>Postal Code:</label>
        <input type="text" name="postal_code" required><br>
        <label>Country Code:</label>
        <input type="text" name="country_code" required><br>
        <label>Phone:</label>
        <input type="text" name="phone" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>

        <button type="submit">Proceed to Payment</button>
    </form>
</body>
</html>
