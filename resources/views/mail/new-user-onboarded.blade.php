@component('mail::message')
# Hello,

<strong>{{ $user['name'] }}</strong> has created an account as a/an <strong>{{ $user['roles'] }}</strong>.

@component('mail::button', ['url' => route('dashboard')])
Login to Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }} Amebo!
@endcomponent
