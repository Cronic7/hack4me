@component('mail::message')
<h1> A new message from user</h1><br>

<strong>name:</strong>{{$data['name']}}<br>
<strong>Email:</strong>{{$data['email']}}<br>
<strong>Message</strong><br>
{{$data['message']}}
@endcomponent
