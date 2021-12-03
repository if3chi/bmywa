@component('mail::message')
# {{ $details['salute'] }}, Good day.

This is to notify you that a new Entry has been submitted by {{ $details['name'] }} from {{ $details['country'] }}.

To quickly preview the submission, click the button below

@component('mail::button', ['url' => $details['url']])
Preview Submission
@endcomponent

> *"This link is valid for 72 hours!"<br>However you can login anytime to view details of the submission.*

To share or view full details of this submission, kindly
@component('mail::button', ['url' => $details['login']])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }} Submissions.
@endcomponent
