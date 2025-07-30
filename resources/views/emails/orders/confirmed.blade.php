<x-mail::message>
# Thank you for your order!

Hi {{ $order->customer_name }},

We've received your order #{{ $order->id }} and are getting it ready for shipment. Here is a summary of your purchase:

<x-mail::table>
| Product       | Quantity      | Price         |
| :------------ |:-------------:|:-------------:|
@foreach ($order->products as $item)
| {{ $item['description'] }} | {{ $item['quantity'] }} | ${{ number_format($item['value'], 2) }} |
@endforeach
| &nbsp; | **Total** | **${{ number_format($order->total, 2) }}** |
</x-mail::table>

## Shipping Address
{{ $order->shipping_address['address1'] }}<br>
{{ $order->shipping_address['city'] }}, {{ $order->shipping_address['province'] }} {{ $order->shipping_address['postal_code'] }}<br>
{{ $order->shipping_address['country'] }}

@if ($order->tracking_info && !empty($order->tracking_info['tracking_url']))
## Shipment Details
Your order has been shipped! You can track its progress using the button below.

<x-mail::button :url="$order->tracking_info['tracking_url']">
Track Your Order
</x-mail::button>
@else
We will notify you again with tracking information once your order has shipped.
@endif

Thanks for shopping with us!

Regards,<br>
{{ config('app.name') }}
</x-mail::message>
