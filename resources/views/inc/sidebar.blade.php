@section('sidebar')

<div class="user-sidebar">
<div class="inventory-title">
    <h3>Inventory List</h3>
</div>
    <div class="current-user-container">
        <hr>
            <div class="user-profile {{Request::is('profile') ? 'activebtn' : ''}}">
                <div class="current-user-img"><img src="/storage/cover_images/noimage.jpg" alt=""></div>
                <div class="current-user-name" id="btn-profile" ><span> {{$current_user->name}}</span> <i id="myprofile" class="{{Request::is('profile') ? 'arrow-rotated' : ''}} fas fa-caret-down"></i></div>
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

            

            <li><a class="" href="/media">
                    <div class="f-box">
                        <div class="fl-item-icon"><i class="fas fa-photo-video fa-2x"></i></div> 
                        <div class="fl-item-text"><span>Media</span></div>
                    </div>
            </a></li>

            <li><div class="toggle-btn-menu {{Request::is('device*', 'stock*','category*','brand*') ? 'activebtn' : ''}}">
                    <div class="f-box">
                        <div class="fl-item-icon"><i class="fas fa-laptop-medical fa-2x"></i></div> 
                        <div class="fl-item-text"><span>Inventory List</span><i id="inv-tog-icon" class="{{Request::is('device', 'stock*','category*','brand*') ? 'arrow-rotated' : ''}} fas fa-caret-down"></i></div>
                    </div>
                </div>
                <div class="inventory-menu-settings {{Request::is('device*','stock*','category*','brand*') ? 'active' : ''}}" >
                    <ul>
                        <li>
                            <a class="{{Request::is('device*') ? 'invactivebtn' : ''}}" href="/device">
                                <div class="f-box">
                                    <div class="fl-item-icon"><i class="fab fa-apple fa-lg"></i></div>
                                    <div class="fl-item-text"><span>Devices</span></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="{{Request::is('stock*') ? 'invactivebtn' : ''}}" href="/stock">
                                <div class="f-box">
                                    <div class="fl-item-icon"><i class="fas fa-box-open"></i></div>
                                    <div class="fl-item-text"><span>Stocks</span></div>
                                </div>
                            </a>
                        </li>
                @if (auth()->check())
                @if (auth()->user()->hasRole('Admin'))
                        <li>
                            <a class="{{Request::is('category*') ? 'invactivebtn' : ''}}" href="/category">
                                <div class="f-box">
                                    <div class="fl-item-icon"><i class="fab fa-buffer"></i></div>
                                    <div class="fl-item-text"><span>Categories</span></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="{{Request::is('brand*') ? 'invactivebtn' : ''}}" href="/brand">
                                <div class="f-box">
                                    <div class="fl-item-icon"><i class="fas fa-certificate"></i></div>
                                    <div class="fl-item-text"><span>Brands</span></div>
                                </div>
                            </a>
                        </li>
                        @else
                    
                    @endif
                @endif
                    </ul>
                </div>
            </li>

            <li><div class="toggle-btn-menu-emp {{Request::is('employee', 'ipaddress','company','department','designation') ? 'activebtn' : ''}}">
                    <div class="f-box">
                        <div class="fl-item-icon"><i class="fas fa-users fa-2x"></i></div> 
                        <div class="fl-item-text"><span>Employees</span><i id="emp-tog-icon" class="{{Request::is('employee', 'ipaddress') ? 'arrow-rotated' : ''}} fas fa-caret-down"></i></div>
                    </div>
                </div>
                <div class="employee-menu-settings {{Request::is('employee','ipaddress','company','designation','department') ? 'active' : ''}}" >
                    <ul>
                        <li>
                            <a class="{{Request::is('employee') ? 'empactivebtn' : ''}}" href="/employee">
                                <div class="f-box">
                                    <div class="fl-item-icon"><i class="fas fa-id-card"></i></div> 
                                    <div class="fl-item-text"><span>Employee List</span></div>
                                </div>
                            </a>
                        </li>

            @if (auth()->check())
                @if (auth()->user()->hasRole('Admin'))
                        <li>
                            <a class="{{Request::is('ipaddress') ? 'empactivebtn' : ''}}" href="/ipaddress">
                                <div class="f-box">
                                    <div class="fl-item-icon"><i class="fas fa-globe-asia"></i></div> 
                                    <div class="fl-item-text"><span>IP</span></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="{{Request::is('company') ? 'empactivebtn' : ''}}" href="/company">
                                <div class="f-box">
                                    <div class="fl-item-icon"><i class="fas fa-building"></i></div> 
                                    <div class="fl-item-text"><span>Company</span></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="{{Request::is('department') ? 'empactivebtn' : ''}}" href="/department">
                                <div class="f-box">
                                    <div class="fl-item-icon"><i class="fas fa-briefcase"></i></div> 
                                    <div class="fl-item-text"><span>Departments</span></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="{{Request::is('designation') ? 'empactivebtn' : ''}}" href="/designation">
                                <div class="f-box">
                                    <div class="fl-item-icon"><i class="fas fa-user-tie"></i></div> 
                                    <div class="fl-item-text"><span>Designation</span></div>
                                </div>
                            </a>
                        </li>
                        @else
                    
                    @endif
                @endif
                    </ul>
                </div>
            </li>
            <li><div class="toggle-btn-menu-soft {{Request::is('software*') ? 'activebtn' : ''}}">
                    <div class="f-box">
                        <div class="fl-item-icon"><i class="fas fa-file-invoice fa-2x"></i></div> 
                        <div class="fl-item-text"><span>IT Softwares</span><i id="soft-tog-icon" class="{{Request::is('software') ? 'arrow-rotated' : ''}} fas fa-caret-down"></i></div>
                    </div>
                </div>
                <div class="software-menu-settings {{Request::is('software*') ? 'active' : ''}}" >
                    <ul>
                        <li>
                            <a class="{{Request::is('software-user') ? 'softactivebtn' : ''}}" href="/software-user">
                                <div class="f-box">
                                    <div class="fl-item-icon"><i class="fas fa-user-plus"></i></div>
                                    <div class="fl-item-text"><span>Software Users</span></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="{{Request::is('software') ? 'softactivebtn' : ''}}" href="/software">
                                <div class="f-box">
                                    <div class="fl-item-icon"><i class="fas fa-laptop-code"></i></div>
                                    <div class="fl-item-text"><span>Software Lists</span></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
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