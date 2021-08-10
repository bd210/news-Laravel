@component('mail::message')

<h1>Dear {{ $data['requests']['email'] }}, thanks  for commenting. </h1>

<p> Expiration time for verification : {{ date("F j, Y H:i", strtotime( $data['expired'] )) }}</p>

<p> URL : <a href="{{ route('confirmCommentView', ['id' => $data['id']]) }}?selector={{ $data['selector'] }}">Confirm</a> </p>
@endcomponent
