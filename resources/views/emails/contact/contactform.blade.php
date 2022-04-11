@component('mail::message')
# Thank you for the message
<strong>Message</strong><br>
 {{$data['message']}}<br><br>

<strong>Name</strong> <br>
{{$data['name']}}<br><br>

<strong>Email</strong><br>
 {{$data['email']}}<br><br>

<strong>Phone no:</strong><br>
 {{$data['phone']}}<br><br>

<strong>Subject</strong><br>
 {{$data['subject']}}<br><br>

@endcomponent
