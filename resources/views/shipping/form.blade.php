<!DOCTYPE html>
<html>
<head>
    <title>Shipping Calculator</title>
</head>
<body>
    <h1>Enter Your Shipping Address</h1>
    <form action="{{ route('shipping.checkout') }}" method="POST">
        @csrf
        <input name="name" placeholder="Full Name" required><br>
        <input name="address1" placeholder="Address Line 1" required><br>
        <input name="city" placeholder="City" required><br>
        <input name="province_code" placeholder="Province Code (e.g. ON)" required><br>
        <input name="postal_code" placeholder="Postal Code" required><br>
        <input name="country_code" placeholder="Country Code (e.g. CA)" required><br>
        <input name="phone" placeholder="Phone Number" required><br>
        <input name="email" placeholder="Email" required><br>
        <button type="submit">Calculate & Pay</button>
    </form>
</body>
</html>
