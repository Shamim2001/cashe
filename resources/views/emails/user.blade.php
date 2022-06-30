@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => route('password.reset', $token).'?email='.$email])
Reset Link
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
