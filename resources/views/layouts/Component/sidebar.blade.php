<nav class="side-nav">
    <ul>
        @if(Auth::check())
        <?php
        // $mperm = App\Models\perm;
        $user = Auth::user();
        $perm = App\Models\perm::where('role_id', $user->role_id)->where('name', "role")->first();
        $permuser = App\Models\perm::where('role_id', $user->role_id)->where('name', "user")->first();
        $permdept = App\Models\perm::where('role_id', $user->role_id)->where('name', "dept")->first();
        $permdesig = App\Models\perm::where('role_id', $user->role_id)->where('name', "desig")->first();
        $permveh = App\Models\perm::where('role_id', $user->role_id)->where('name', "vehicle")->first();
        $permleave = App\Models\perm::where('role_id', $user->role_id)->where('name', "leave")->first();
        $permsheet = App\Models\perm::where('role_id', $user->role_id)->where('name', "sales")->first();
        $permfinance = App\Models\perm::where('role_id', $user->role_id)->where('name', "finance")->first();
        $permclients = App\Models\perm::where('role_id', $user->role_id)->where('name', "clients")->first();
        $permservice = App\Models\perm::where('role_id', $user->role_id)->where('name', "service")->first();
        $permtask = App\Models\perm::where('role_id', $user->role_id)->where('name', "task")->first();

        ?>
        @endif



        <li >
            <a href="{{route('home')}}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="user-check"></i> </div>
                <div class="side-menu__title">
                    Administrator
                </div>
            </a>
        </li>
        @if ($perm->view == 1 || $perm->create == 1)
        <li>
            <a href="javascript:;" class="side-menu">
                &nbsp; &nbsp;&nbsp; &nbsp;
                <div class="side-menu__icon"> <i data-lucide="trello"></i> </div>
                <div class="side-menu__title">
                    Roles
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                @if ($perm->view == 1)
                <li>
                    <a href="{{route('role.index')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="list"></i> </div>
                        <div class="side-menu__title">View Roles </div>
                    </a>
                </li>
                @endif
                @if ($perm->create == 1)
                <li>
                    <a href="{{route('role.create')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                        <div class="side-menu__title"> Add Role </div>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif
        @if ($permuser->view == 1 ||  $permuser->create == 1)
        <li>
            <a href="javascript:;" class="side-menu">
                &nbsp; &nbsp;&nbsp; &nbsp;
                <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                <div class="side-menu__title">
                    Users
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                @if ($permuser->view == 1)
                <li>
                    <a href="{{route('user.index')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="list"></i> </div>
                        <div class="side-menu__title"> View User </div>
                    </a>
                </li>
                @endif
                @if ($permuser->create == 1)
                <li>
                    <a href="{{route('user.create')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                        <div class="side-menu__title"> Add User </div>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif
        @if ($permfinance->view == 1 || $permfinance->create == 1)
        <li>
            <a href="javascript:;" class="side-menu">
                &nbsp; &nbsp;&nbsp; &nbsp;
                <div class="side-menu__icon"> <i data-lucide="briefcase"></i> </div>
                <div class="side-menu__title">
                    Fainance
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{route('security.index')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="shield"></i> </div>
                        <div class="side-menu__title">Securities  </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('fine.index')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="file-minus"></i> </div>
                        <div class="side-menu__title"> Fines </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('advance.index')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="plus-square"></i> </div>
                        <div class="side-menu__title"> Advance </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('salary.index')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="dollar-sign"></i> </div>
                        <div class="side-menu__title"> Salary </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('holiday.index')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="pie-chart"></i> </div>
                        <div class="side-menu__title"> Holiday Cycle </div>
                    </a>
                </li>
            </ul>
        </li>
        @endif
        @if ($permdept->view == 1 )
        <li>
            <a href="javascript:;" class="side-menu">
                &nbsp; &nbsp;&nbsp; &nbsp;
                <div class="side-menu__icon"> <i data-lucide="layers"></i> </div>
                <div class="side-menu__title">
                    Department
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                @if ($permdept->view == 1)
                <li>
                    <a href="{{route('dept.index')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="list"></i> </div>
                        <div class="side-menu__title"> View Department </div>
                    </a>
                </li>
                @endif
                @if ($permdept->create == 1)
                <li>
                    <a href="{{route('dept.create')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                        <div class="side-menu__title"> Add Department </div>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif
        @if ($permdesig->view == 1 )
        <li>
            <a href="javascript:;" class="side-menu">
                &nbsp; &nbsp;&nbsp; &nbsp;
                <div class="side-menu__icon"> <i data-lucide="pocket"></i> </div>
                <div class="side-menu__title">
                    Designation
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                @if ($permdesig->view == 1)
                <li>
                    <a href="{{route('desig.index')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="list"></i> </div>
                        <div class="side-menu__title"> View Designation </div>
                    </a>
                </li>
                @endif
                @if ($permdesig->create == 1)
                <li>
                    <a href="{{route('desig.create')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                        <div class="side-menu__title"> Add Designation </div>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif
        @if ($permveh->view == 1 )
        <li>
            <a href="javascript:;" class="side-menu">
                &nbsp; &nbsp;&nbsp; &nbsp;
                <div class="side-menu__icon"> <i data-lucide="key"></i> </div>
                <div class="side-menu__title">
                    Vehicle
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                @if ($permveh->view == 1)
                <li>
                    <a href="{{route('vehicle.index')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="list"></i> </div>
                        <div class="side-menu__title"> View Vehicles </div>
                    </a>
                </li>
                @endif
                @if ($permveh->create == 1)
                <li>
                    <a href="{{route('vehicle.create')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                        <div class="side-menu__title"> Add Vehicle </div>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif
        {{-- @if ($permleave->view == 1 ) --}}
        {{-- <li>
            <a href="javascript:;" class="side-menu">
                &nbsp; &nbsp;&nbsp; &nbsp;
                <div class="side-menu__icon"> <i data-lucide="twitch"></i> </div>
                <div class="side-menu__title">
                    Leaves
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a> --}}
            {{-- <ul class="">
                @if ($permleave->view == 1)
                <li>
                    <a href="{{route('leave.index')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="list"></i> </div>
                        <div class="side-menu__title"> View Leaves </div>
                    </a>
                </li>
                @endif
                @if ($permleave->create == 1)
                <li>
                    <a href="{{route('leave.create')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                        <div class="side-menu__title">Request Leave </div>
                    </a>
                </li>
                @endif
            </ul> --}}
        {{-- </li> --}}
        {{-- @endif --}}

        {{-- <li >
            <a  class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="layers"></i> </div>
                <div class="side-menu__title">
                    CRM
                </div>
            </a>
        </li>
        @if ($permsheet->view == 1 )
        <li >
            <a href="{{route('sales')}}" class="side-menu">
                &nbsp; &nbsp;&nbsp; &nbsp;
                <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                <div class="side-menu__title">
                    Sales Sheet
                </div>
            </a>
        </li>
        @endif
        @if ($permclients->view == 1 )
        <li >
            <a href="{{route('clients.index')}}" class="side-menu">
                &nbsp; &nbsp;&nbsp; &nbsp;
                <div class="side-menu__icon"> <i data-lucide="sliders"></i> </div>
                <div class="side-menu__title">
                    Projects
                </div>
            </a>
        </li>
        @endif
        @if ($permservice->view == 1 )
        <li >
            <a href="{{route('service.index')}}" class="side-menu">
                &nbsp; &nbsp;&nbsp; &nbsp;
                <div class="side-menu__icon"> <i data-lucide="Grid"></i> </div>
                <div class="side-menu__title">
                    Services
                </div>
            </a>
        </li>
        @endif
        @if ($permtask->view == 1 )
        <li >
            <a href="/public/task-board" class="side-menu">
                &nbsp; &nbsp;&nbsp; &nbsp;
                <div class="side-menu__icon"> <i data-lucide="Grid"></i> </div>
                <div class="side-menu__title">
                    Task Board
                </div>
            </a>
        </li>
        @endif --}}


    </ul>

</nav>
