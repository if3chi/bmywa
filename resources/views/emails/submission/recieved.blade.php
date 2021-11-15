@component('mail::message')

# {{ $contestant['salute'] }} {{ $contestant['lastname'] }},

Thank you for your interest in the {{ $contestant['entryType'] }} competition.

This is to confirm that we have received your entry submission and is now in the
process of shortlisting. 

Kindly take note of this important dates:

- <strong>Sumbssions Deadline</strong> : {{ $contestant['closeDate'] }}
- <strong>Winners Annouced</strong> : {{ $contestant['shortlistDate'] }}

Please click the button below to preview your submssion. 
> *This link is valid for 72 hours!*

@component('vendor.mail.html.button', ['url' => $contestant['entryTempUrl'] ])
Preview Submission 
@endcomponent

Wishing you all the best.

Kind regards,<br>
<strong>{{ config('app.name') }}</strong>

<font size="2">*Terms &amp; Conditions apply.*</font>
@endcomponent
