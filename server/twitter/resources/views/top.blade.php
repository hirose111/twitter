@extends('layouts.app')
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <title>Twitter TOP</title>
</head>
<body>

    
    @section('top')
        <section class="section_wrapper">
            <div class="twitter_top_wrapper">
                <div class="twitter_top_box">
                    <span class="twitter_image"><a href="/">
                    <img class="twitter_logo" src="{{ asset('image/twitter_logo.svg') }}" alt="" ></a></span>
                    <ul class="twitter_top_menu">
                        <li class="twitter_top_menu-inner"><a href="/"><img class="twitter_top_menu-image" src="{{ asset('image/outline_home_black_24dp.png') }}" alt="">ホーム</a></li>
                        <li class="twitter_top_menu-inner"><a href=""><img class="twitter_top_menu-image" src="{{ asset('image/outline_info_black_24dp.png') }}" alt="">お知らせ</a></li>
                        <li class="twitter_top_menu-inner"><a href=""><img class="twitter_top_menu-image" src="{{ asset('image/outline_email_black_24dp.png') }}" alt="">メッセージ</a></li>
                        <li class="twitter_top_menu-inner"><a href="/edit-page"><img class="twitter_top_menu-image twitter-profile_image" src="{{asset('/storage/images/'.$user->product_image)}}" alt="">プロフィール</a></li>
                        <li class="twitter_top_menu-inner"><a href="/users"><img class="twitter_top_menu-image" src="{{ asset('image/users.png') }}" alt="">他のユーザー</a></li>
                    </ul>
                    <!-- <div class="tweet_button-first">
                        <button class="button_inner-first">Tweet</button>
                    </div> -->
                </div>
                <div class="twitter_top_partition">
                    <div class="twitter_top_inwrapper">
                        <div class="twitter_top_title">
                            <p>ホーム</p>
                        </div>
                        <div class="twitter_top_input-field">
                            <div class="twitter_top_input-field-top">
                                <div class="tweet_profile">
                                    <img class="twitter-profile_image2" src="{{asset('/storage/images/'.$user->product_image)}}" alt="">
                                </div>
                                <form method="POST" action="/create" class="tweet_area">
                                @csrf
                                <div class="tweet_area">
                                    <textarea class="tweet_text" id="tweet" name="tweet" placeholder="hello"></textarea>
                                </div>
                                <div class="follow">
                                    <div class="following">
                                        <a href="/users-follow" name="follow_number" class="follow_number">{{ $follow_count }}</a>
                                        <label for="follow_number" class="follow_label">フォロー中</label>
                                    </div>
                                    <div class="followering">
                                        <a href="/users-follower" name="follower_number" class="follower_number">{{ $follower_count }}</a>
                                        <label for="follower_number" class="follower_label">フォロワー</label>
                                    </div>
                                </div>
                                <div class="tweet_button-first">
                                    <button class="button_inner-first" type="submit">投稿</button>
                                </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                    <div class="space">.</div>
                    <div class="twitter_top_inbox">
                        @foreach($following_tweets  as $twitter)
                        <form method="POST" action="/delete/{{$twitter->id}}">
                            <div class="top_inbox_inner">
                                <img class="twitter-profile_image2" src="{{asset('/storage/images/'.$twitter->user->product_image)}}"alt="">
                                <p class="twitter_username" >{{$twitter->user->name}}</p>
                                <p class="mention" >{{$twitter->user->mention}}</p>
                                <p class="tweet_date" >{{$twitter->created_at}}</p>
                                    <div class="tweet_area tweet_area_under">
                                        @csrf
                                        <div class="tweet_text"  placeholder="hello" id="tweet2" readonly >{{$twitter->tweet}}</div>
                                        <!--投稿のidが自身の場合のみdeleteボタン表示-->
                                        @if($twitter->user->id === $user_id)
                                        <div class="delete_button">
                                            <button class="delete_button_inner"  type="submit">削除</button>
                                        </div>
                                        @endif
                                    </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endsection
    </div>
</body>
</html>