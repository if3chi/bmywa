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

We wish you all the best and kindly follow us on social media to get regular updates.

- Instagram: [@bmywa](https://www.instagram.com/bmywa)
- Twitter: [@bmywa](https://www.twitter.com/bmywa)
- Facebook- [@bmyoungwriters](https://www.facebook.com/bmyoungwriters)

Kind regards,<br>
<strong>{{ config('app.name') }}</strong>

<font size="2">*Terms &amp; Conditions apply.*</font>
@endcomponent
