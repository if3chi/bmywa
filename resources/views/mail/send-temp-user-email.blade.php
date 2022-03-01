@component('mail::message')
# Hello There!

A temporary account has been created for you on [bmywa.com](https://www.bmywa.com/),
kindly click the link below to complete your registration.

@component('mail::button', ['url' => $url])
Complete Your Profile
@endcomponent

Thanks,<br>

IT Support,<br>
{{ config('app.name') }}
@endcomponent
