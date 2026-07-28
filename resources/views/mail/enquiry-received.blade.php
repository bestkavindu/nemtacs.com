<x-mail::message>
# New website enquiry

**Name:** {{ $enquiry->name }}
@if ($enquiry->company)
**Company:** {{ $enquiry->company }}
@endif
**Email:** {{ $enquiry->email }}
@if ($enquiry->phone)
**Phone:** {{ $enquiry->phone }}
@endif
@if ($enquiry->subject)
**Subject:** {{ $enquiry->subject }}
@endif

**Message**

{{ $enquiry->message }}

<x-mail::subcopy>
Received {{ $enquiry->created_at?->format('d M Y, H:i') }} from {{ $enquiry->ip_address ?? 'unknown IP' }}. Reply directly to this email to reach the sender.
</x-mail::subcopy>
</x-mail::message>
