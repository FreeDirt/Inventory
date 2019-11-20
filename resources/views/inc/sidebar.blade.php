@section('sidebar')

<div class="user-sidebar">
<div class="inventory-title">
    <h3>Inventory List</h3>
</div>
    <div class="current-user-container">
        <hr>
            <div class="user-profile {{Request::is('profile') ? 'activebtn' : ''}}">
                <div class="current-user-img"><img src="https://secure.gravatar.com/avatar/8dc83045e49cce170613fb08551e9df0?s=96&d=mm&r=g" alt="Ryan Mendoza Profile"></div>
                <div class="current-user-name" id="btn-profile" ><span> {{$current_user->name}} mendoza </span> <i id="myprofile" class="{{Request::is('profile') ? 'arrow-rotated' : ''}} fas fa-caret-down"></i></div>
            </div>
            <div class="user-profile-settings {{Request::is('profile') ? 'active' : ''}}" >
                <ul>
                    <li>
                        <a class="{{Request::is('profile') ? 'proactivebtn' : ''}}" href="/profile">
                            <div class="f-box">
                                <div class="fl-item-icon"><i class="fas fa-user"></i></div> 
                                <div class="fl-item-text"><span>My Profile</span></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="{{Request::is('#') ? 'proactivebtn' : ''}}" href="">
                            <div class="f-box">
                                <div class="fl-item-icon"><i class="fas fa-user-edit"></i></div> 
                                <div class="fl-item-text"><span>Edit Profile</span></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="{{Request::is('#') ? 'proactivebtn' : ''}}" href="">
                            <div class="f-box">
                                <div class="fl-item-icon"><i class="fas fa-cog"></i></div> 
                                <div class="fl-item-text"><span>Settings</span></div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        <hr>
    </div>
    
    <div id="usidebar">
        <ul>
            <li>
                <a class="{{Request::is('/') ? 'activebtn' : ''}}" href="/"> 
                    <div class="f-box">
                        <div class="fl-item-icon"><i class="fas fa-tachometer-alt fa-2x"></i></div> 
                        <div class="fl-item-text"><span>Dashboard</span></div>
                    </div>
                </a>
            </li>

            @if (auth()->check())
                @if (auth()->user()->hasRole('Admin'))
                <li><a class="{{Request::is('admin') ? 'activebtn' : ''}}" href="/admin">
                    <div class="f-box">
                        <div class="fl-item-icon"><i class="fas fa-users-cog fa-2x"></i></div> 
                        <div class="fl-item-text"><span>Admin Panel</span></div>
                    </div>
                </a></li>
                @else
                    
                @endif
            @endif

            

            <li><a class="" href="/profile">
                    <div class="f-box">
                        <div class="fl-item-icon"><i class="fas fa-photo-video fa-2x"></i></div> 
                        <div class="fl-item-text"><span>Media</span></div>
                    </div>
            </a></li>

            <li><div class="toggle-btn-menu {{Request::is('device', 'stock') ? 'activebtn' : ''}}">
                    <div class="f-box">
                        <div class="fl-item-icon"><i class="fas fa-th-list fa-2x"></i></div> 
                        <div class="fl-item-text"><span>Inventory List</span><i id="inv-tog-icon" class="{{Request::is('device', 'stock') ? 'arrow-rotated' : ''}} fas fa-caret-down"></i></div>
                    </div>
                </div>
                <div class="inventory-menu-settings {{Request::is('device','stock') ? 'active' : ''}}" >
                    <ul>
                        <li>
                            <a class="{{Request::is('device') ? 'invactivebtn' : ''}}" href="/device">
                                <div class="f-box">
                                    <div class="fl-item-icon"><i class="fas fa-user"></i></div> 
                                    <div class="fl-item-text"><span>Devices</span></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="{{Request::is('stock') ? 'invactivebtn' : ''}}" href="/stock">
                                <div class="f-box">
                                    <div class="fl-item-icon"><i class="fas fa-user-edit"></i></div> 
                                    <div class="fl-item-text"><span>Stocks</span></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li><a class="{{Request::is('tblist') ? 'activebtn' : ''}}" href="/tblist">
                    <div class="f-box">
                        <div class="fl-item-icon"><i class="fas fa-users fa-2x"></i></div> 
                        <div class="fl-item-text"><span>Employees</span><i class="fas fa-caret-down"></i></div>
                    </div>
                </a>
                <ul class="{{Request::is('tblist') ? 'showbtn' : 'hidebtn'}}">
                    <li><a href="">Users Details</a></li>
                    <li><a href="">Users Details</a></li>
                    <li><a href="">Services</a></li>
                </ul>
            </li>
            <li><a class="{{Request::is('contact') ? 'activebtn' : ''}}" href="/contact">
                    <div class="f-box">
                        <div class="fl-item-icon"><i class="fas fa-address-book fa-2x"></i></div> 
                        <div class="fl-item-text"><span>Contact</span></div>
                    </div>
                </a></li>
            <li><a class="{{Request::is('messages') ? 'activebtn' : ''}}" href="/messages">
                    <div class="f-box">
                        <div class="fl-item-icon"><i class="fas fa-comment-alt fa-2x"></i></div> 
                        <div class="fl-item-text"><span>Messages</span></div>
                    </div>
            </a></li>
        </ul>
    </div>
    
    @show
</div>