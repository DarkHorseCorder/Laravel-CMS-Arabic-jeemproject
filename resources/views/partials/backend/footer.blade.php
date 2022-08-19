<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b> {{config('app.name') }} </b>
    </div>
    <strong> &copy;</strong> {{ trans('global.allRightsReserved') }}
</footer>
<form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
