@component('mail::message')
# Dear {{ $name }}

Your registration was successful.

Click the button below and use
the email and password you used in registration to login

@component('mail::button', ['url' => route('dashboard')])
Login to Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
