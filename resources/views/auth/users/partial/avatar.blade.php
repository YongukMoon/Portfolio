@php
    $size=isset($size) ? $size : 48;
@endphp

@if (isset($user) and $user)
    <a href={{ gravatar_profile_url($user->email) }}>
        <img src="{{ gravatar_url($user->email, $size) }}" alt="{{ $user->name }}">
    </a>
@else
    <a href={{ gravatar_profile_url('example@example.com') }}>
        <img src="{{ gravatar_url('example@example.com', $size) }}" alt="Unknown user">
    </a>
@endif