@component('mail::message')
# Hello There!

A temporary account has been created for you on [bmywa.com](https://www.bmywa.com/),
kindly click the link below to complete your registration.

@component('mail::button', ['url' => $msgData['url']])
Complete Your Profile
@endcomponent

Kind Regards,<br>

{{ $msgData['sign'][0] }}<br>
{{ $msgData['sign'][1] }}<br>
{{ config('app.name') }}
@endcomponent
