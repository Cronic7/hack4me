@extends('layouts.front.home')

@section('header')
<header class="header custome-header head" style="background-image: url); background-color: #000000;">
</header>
@endsection

@section('content')
 
  <div class="wrapper">
     
  	   <h1>Top 10 Business Leader bord</h1>
        <div class="lboard_section">

            <div class="lboard_tabs">
                <div class="tabs">
                    <ul>
                        <li data-li="today">Today</li>
                        <li class="active" data-li="month">Month</li>
                        <li data-li="year">Year</li>
                    </ul>
                </div>
            </div>
            <div class="lboard_wrap">
                <div class="lboard_item today" style="display: none;">
                    @foreach($daily_group as $group)
                    <div class="lboard_mem">
                        <div class="img">
                            @if($group['user']->userbusiness['image'])
                            <img src="{{ asset('profile/business/img/'.$group['user']->userbusiness['image']) }}" alt="picture_1" class="rounded-circle">
                            @else
                            <img src="{{ asset('leaderboard/default.png') }}" class="rounded-circle">
                            @endif
                        </div>
                        <div class="name_bar">
                            <p><span>{{$loop->iteration}}</span>{{$group['user']->name}}
                             
                            </p>
                            <div class="bar_wrap">
                            
                                <div class="inner_bar" style="width:{{ ($group['count']/$totalcount)*100 }}%"></div>
                            </div>
                        </div>
                        <div class="points">
                            {{$group['count']}} Bounty Post
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="lboard_item month" style="display: block;">
                   @foreach($monthly_group as $group)
                    <div class="lboard_mem">
                        <div class="img">
                            @if($group['user']->userbusiness['image'])
                            <img src="{{ asset('profile/business/img/'.$group['user']->userbusiness['image']) }}" alt="picture_1" class="rounded-circle">
                            @else
                            <img src="{{ asset('leaderboard/default.png') }}" class="rounded-circle">
                            @endif
                        </div>
                        <div class="name_bar">
                            <p><span>{{$loop->iteration}}</span>{{$group['user']->name}}
                             
                            </p>
                            <div class="bar_wrap">
                            
                                <div class="inner_bar" style="width:{{ ($group['count']/$totalcount)*100 }}%"></div>
                            </div>
                        </div>
                        <div class="points">
                            {{$group['count']}} Bounty Post
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="lboard_item year" style="display: none;">

                    @foreach($yearly_group as $group)
                    <div class="lboard_mem">
                        <div class="img">
                            @if($group['user']->userbusiness['image'])
                            <img src="{{ asset('profile/business/img/'.$group['user']->userbusiness['image']) }}" alt="picture_1" class="rounded-circle">
                            @else
                            <img src="{{ asset('leaderboard/default.png') }}" class="rounded-circle">
                            @endif
                        </div>
                        <div class="name_bar">
                            <p><span>{{$loop->iteration}}</span>{{$group['user']->name}}
                             
                            </p>
                            <div class="bar_wrap">
                            
                                <div class="inner_bar" style="width:{{ ($group['count']/$totalcount)*100 }}%"></div>
                            </div>
                        </div>
                        <div class="points">
                            {{$group['count']}} Bounty Post
                        </div>
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>


@endsection
@section('css')

<style type="text/css">
	body {
    background: #9ecae0;
}
</style>
@endsection

@section('script')

@endsection