@component('mail::message')
Reset Password

your Pin Code is <strong>{{$data->pin_code}}</strong>

{{--@component('mail::button', ['url' => "{{url(/new-password)}}"])--}}

{{--@endcomponent--}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
