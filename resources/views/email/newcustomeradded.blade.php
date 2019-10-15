@component('mail::message')
# New Customer Added

New Customer: <strong>{{ $customer->name }}</strong> has been added.

@component('mail::button', ['url' => route('customers.show', compact('customer'))])
View Customer
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
