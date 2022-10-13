<div class="dashboard_sidebar">
    <div class="menu_items">
        <a href="{{url('User/dashboard')}}" class="menu_item {{request()->is('User/dashboard') ? 'active':''}}">Dashboard</a>
        <a href="{{url('User/profile')}}" class="menu_item {{request()->is('User/profile') ? 'active':''}}">My Profile</a>
        <a href="{{url('User/my_booking')}}" class="menu_item {{request()->is('User/my_booking') ? 'active':''}}">My Bookings</a>
    </div>
</div>