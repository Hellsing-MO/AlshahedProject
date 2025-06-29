<!DOCTYPE html>
<html>
<head>
    <title>Shipping Results</title>
</head>
<body>
    <h2>Cart Total: ${{ number_format($cartTotal, 2) }}</h2>
    <h2>Shipping Cost: ${{ number_format($shippingCost, 2) }}</h2>

    @if($finalShippingCost == 0)
        <p><strong>You qualify for free shipping!</strong></p>
    @endif

    <h2>Total: ${{ number_format($finalTotal, 2) }}</h2>

    <a href="{{ route('checkout.form') }}">Proceed to Checkout</a>
</body>
</html>
