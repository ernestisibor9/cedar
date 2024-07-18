@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="pdflogo.jpeg" class="logo" alt="Cedar Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
