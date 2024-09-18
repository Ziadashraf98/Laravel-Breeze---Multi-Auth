@component('mail::message')
Hi : {{$user->name}}

{{-- Your Verification Code : <span style="color: blue">{{$user->verification_code}}</span> --}}

<span style="color: black">Thanks for signing up!</span>

{{-- @component('mail::button', ['url' => ''])
Click Your Post
@endcomponent --}}

@endcomponent