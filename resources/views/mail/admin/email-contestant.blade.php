@component('mail::message')
# Dear {{ $msgData['lastname'] }}.

{!! html_entity_decode($msgData['message']) !!}

<br>
{{ config('app.name') }}
@endcomponent
