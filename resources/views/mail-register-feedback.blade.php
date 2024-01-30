@component('mail::message')
Selamat Datang,

{{ $data['title'] }}
<br>
<br>
{{ $data['content'] }}

@component('mail::button', ['url' => $data['url']])
Tambah Feedback
@endcomponent

Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent
