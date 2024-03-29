@extends('layouts.friends.main')

@section('friends')
    <div id="friends__list">
        @foreach($users as $user)
            <div class="friend__list__item">
                <div class="friend_icon">
                    <a class="friend_link" href="/profile/{{ $user->link }}"><img src="{{ $user->avatar }}" alt=""></a>
                </div>

                <div class="friend_content">
                    <a class="friend_link" href="/profile/{{ $user->link }}"><h4 class="friend_name">{{ $user->surname.' '.$user->name }}</h4></a>
                    <a class="friend_write_msg" href="/msg/write{{ $user->id }}">Написать сообщение</a>
                </div>

                <a class="accept_request" href="/friend/request/accept" onclick="acceptFriendRequest(event)" data-uid="{{ $user->id }}">&#10003;</a>
            </div>
        @endforeach
    </div>
@endsection