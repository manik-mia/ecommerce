<div class="col-md-3">
    <div class="card" style="padding: 30px;">
        <div class="card-body">
            <ul>
                <li>
                    <a href="{{route('user.dashboard')}}" class="profile-image">
                        <img class="card-img-top img-fluid" src="{{asset($userAvater->image)}}" alt="Image">
                    </a>
                </li>
                <li><a href="{{route('user.dashboard')}}" class="btn btn-primary btn-block"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li><a href="{{route('user.order.all')}}" class="btn btn-primary btn-block"><i class="fa fa-pencil"></i>My Orders</a></li>
                <li><a href="{{route('user.order.canceled')}}" class="btn btn-primary btn-block"><i class="fa fa-pencil"></i>Cancel Orders</a></li>
                <li><a href="{{route('user.order.returned')}}" class="btn btn-primary btn-block"><i class="fa fa-pencil"></i>Return Orders</a></li>
                <li><a href="{{route('user.order.tracking')}}" class="btn btn-primary btn-block"><i class="fa fa-pencil"></i>Track Order</a></li>
                <li><a href="{{route('user.profile')}}" class="btn btn-primary btn-block"><i class="fa fa-info-circle"></i>Profile Info</a></li>
                <li><a href="{{route('user.profile.edit')}}" class="btn btn-primary btn-block"><i class="fa fa-edit"></i>Profile Edit</a></li>
                <li><a href="{{route('user.image.edit')}}" class="btn btn-primary btn-block"><i class="fa fa-pencil"></i>Avater Edit</a></li>
                <li><a href="{{route('user.password.edit')}}" class="btn btn-primary btn-block"><i class="fa fa-pencil"></i>Change Password</a></li>
                <li>
                    <a class="btn btn-block btn-danger logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon ion-power"></i> Sign Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>