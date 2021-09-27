@component('mail::message')

# Hello {{ $contestant['lastname'] }},

Your submission has been well recieved. Kindly take note of this important dates 

- <strong>Sumbssions Deadline</strong> : {{ $contestant['closeDate'] }}
- <strong>Winners Annouced</strong> : {{ $contestant['awardDate'] }}

Please click the button below to view your subsubmssion. 
> *This link is valid for 72 hours!*

@component('vendor.mail.html.button', ['url' => $contestant['entryTempUrl'] ])
Preview Submission 
@endcomponent

*Terms &amp; Conditions apply.*

Thanks,<br>
{{ config('app.name') }}
@endcomponent
