@component('mail::message')

# Hello {{ $contestant['lastname'] }},

Your submission has been well recieved. Kindly take note of this important dates 

- <strong>Sumbssions Deadline</strong> : 31/12/2021
- <strong>Winners Annouced</strong> : 1/04/2022

Please click the button below to view your subsubmssion. 
> *This link is valid for 72 hours!*

@component('vendor.mail.html.button', ['url' => $contestant['entryTempUrl'] ])
Preview Submission 
@endcomponent

*Terms &amp; Conditions apply.*

Thanks,<br>
{{ config('app.name') }}
@endcomponent
