@php
    
    use App\Http\Controllers\admin\SidebarController;
@endphp
<aside id="left-panel" class="left-panel bg">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-title">Post</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle hover" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Post</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li> <i class=" menu-icon fa fa-thumb-tack  "></i><a href="{{route('admin.categories.store')}}">category</a></li>
                        <li><i class="menu-icon fa fa-thumb-tack"></i><a href="{{route('admin.pending.post')}}">pending<b class="label i1 pull-right">{{ SidebarController::pendingposts() }}</b></a></li>
                        <li><i class="menu-icon fa fa-thumb-tack"></i><a href="{{route('admin.posts.index') }}">Active <b class="label i1 pull-right">{{ SidebarController::activepost()}}</b></a></li>
                        <li><i class="menu-icon fa fa-thumb-tack"></i><a href="{{route('admin.show.trash')}}">Trash<b class="label i3 pull-right">{{SidebarController::trashpost()}}</b></a></li>
                    </ul>
                </li>
                <li class="menu-title"> Bounty</li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle hover" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-usd"></i>Bounty</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-rupee"></i><a href="{{route('admin.bounties.index')}}">category</a></li>
                        <li><i class="menu-icon fa fa-rupee"></i><a href="{{route('admin.active.bounty')}}">active<b class="label i1 pull-right">{{SidebarController::activebounty() }}</b></a></li>
                        <li><i class="menu-icon fa fa-rupee"></i><a href="{{route('admin.pending.bounty')}}">pending<b class="label i3 pull-right">{{SidebarController::pendingbounty()}}</b></a></li>
                         <li><i class="menu-icon fa fa-rupee"></i><a href="{{route('admin.closed.bounty')}}">Closed<b class="label i3 pull-right">{{SidebarController::closedbounty()}}</b></a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('admin.gallery-category.index')}}"> <i class="menu-icon  fas fa-image"></i> Gallery</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<style>
.label {

    border-radius: 3px;
    line-height: 20px;
    padding: 0 5px;
    color: #ffffff;
}

.i1 {

    background: #d74f2a;
}

.i3 {
    background: #03a945;
}

.bg {
    background-color: black;
}

</style>
