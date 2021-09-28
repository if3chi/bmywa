<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'BMYWA')
<img src="{{ asset('images/logo.jpg') }}" class="logo" alt="BMYWA Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
