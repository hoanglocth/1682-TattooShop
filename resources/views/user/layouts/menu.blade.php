 <div id="sidebar-collapse" class="sidebar">
    <div class="profile-sidebar">
        
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">{{ Auth::user()->lastname ." ".Auth::user()->firstname}}</div>
            <div class="profile-usertitle-status"><i class="fa fa-circle"></i>Online</div>
        </div>

        <div class="clear"></div>
        @if(session('avaclass'))
        <div class="alert alert-{{session('avaclass')}}" style="margin-top: 10px">
            <li>{{session('message')}}</li>
        </div>
        @endif
    </div>
    <div>
        <div class="block-title">
            <strong><span>Account</span></strong>
        </div>
        <div class="block-content">
            <ul>
                <li class="{{Request::is('account') ? 'current' : ''}}"><a href="{{ route('account.index') }}">Info Account</a></li>
                <li class="{{Request::is('account/edit') ? 'current' : ''}}"><a href="{{ route('account.edit') }}" >Edit Account</a></li>
            </ul>
        </div>
    </div>
    <div>
        <div class="block-title">
            <strong><span>Order Management</span></strong>
        </div>
        <div class="block-content">
            <ul>
                <li class="{{Request::is('account/order/wait') ? 'current' : ''}}"><a href="{{ route('order.wait') }}">Wait for confirmation</a></li>
                <li class="{{Request::is('account/order/confirmed') ? 'current' : ''}}"><a href="{{ route('order.confirmed') }}">Confirmed</a></li>
                <li class="{{Request::is('account/order/history') ? 'current' : ''}}"><a href="">History</a></li>
            </ul>
        </div>
    </div>
</div>