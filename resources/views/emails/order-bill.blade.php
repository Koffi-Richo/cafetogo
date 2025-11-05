@component('mail::layout')

@slot('header')
@component('mail::header', ['url' => route('shop_restaurant', ['hash' => $settings->hash])])
{{ $settings->name }}
@endcomponent
@endslot

## {{ __('email.sendOrderBill.dear') }} {{ $order->customer->name }},

{{ __('email.sendOrderBill.thankYouForDining') }} **{{ $settings->name }}**! {{ __('email.sendOrderBill.excitedToServe')}}

## {{ __('email.sendOrderBill.orderSummary') }}

**{{ __('email.sendOrderBill.order') }}**: #{{ $order->order_number }}

@component('mail::table')
| {{ __('modules.menu.itemName') }}           | {{ __('modules.order.qty') }}      | {{ __('modules.order.price') }}     |
|:-------------- |:-------------:| ---------:|
@foreach ($items as $item)
| {{ $item->menuItem->item_name }} | {{ $item->quantity }} | {{ $settings->currency->currency_symbol }}{{ number_format($item->price * $item->quantity, 2) }} |
@endforeach
| **{{ __('modules.order.subTotal') }}**   |               | **{{ $settings->currency->currency_symbol }}{{ $subtotal }}** |
@foreach ($taxesWithAmount as $tax)
| **{{ $tax['name'] }} ({{ $tax['rate'] }}%)** |     | **{{ $settings->currency->currency_symbol }}{{ number_format($tax['amount'], 2) }}** |
@endforeach
| **{{ __('modules.order.total') }}**      |               | **{{ $settings->currency->currency_symbol }}{{ $totalPrice }}** |
@endcomponent

**{{ __('app.date') }}**: {{ $order->date_time->translatedFormat('F j, Y, g:i a') }}

{{ __('email.sendOrderBill.satisfactionMessage') }}

@lang('app.regards'),<br>
{{ $settings->name }}

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
    © {{ date('Y') }} {{ $settings->name }}. All rights reserved.
@endcomponent
@endslot
@endcomponent
