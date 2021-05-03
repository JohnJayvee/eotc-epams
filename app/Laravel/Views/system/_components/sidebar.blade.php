<nav class="sidebar sidebar-offcanvas p-0" id="sidebar" style="background-color: #31353D;color: #ffff;">
  <h6 class="pl-3 pt-4">Menu</h6>
  <ul class="nav">
    
    <li class="p-3 nav-item {{ in_array(Route::currentRouteName(), array('system.dashboard')) ? 'active' : ''}}">
      <a class="nav-link" href="{{route('system.dashboard')}}">
        <i class="fa fa-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    @if(in_array($auth->type,['super_user','front_liner','engineer','fire_department']))
      @if(in_array($auth->type,['super_user','front_liner']))
        <li class="p-3 nav-item {{ in_array(Route::currentRouteName(), array('system.processor.list','system.processor.show' )) ? 'active' : ''}}">
          <a class="nav-link" href="{{route('system.processor.list')}}">
            <i class="fa fa-user-circle menu-icon"></i>
            <span class="menu-title">Processors</span>
          </a>
        </li>
      @endif
    {{-- <li class="p-3 nav-item {{ in_array(Route::currentRouteName(), array('system.transaction.show','system.transaction.declined','system.transaction.pending','system.transaction.approved','system.transaction.resent')) ? 'active' : ''}}">
      <a class="nav-link" data-toggle="collapse" href="#my_report" aria-expanded="false" aria-controls="my_report">
        <i class="fa fa-file menu-icon"></i>
        <span class="menu-title">Transactions</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="my_report">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('system.transaction.pending')}}">Pending
          </a></li>
        </ul>
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('system.transaction.inspection')}}">For Inspection
          </a></li>
        </ul>
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('system.transaction.approved')}}">Approved
          </a></li>
        </ul>
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('system.transaction.declined')}}">Declined
          </a></li>
        </ul>
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('system.transaction.resent')}}">Resent
          </a></li>
        </ul>
      </div>
    </li> --}}
    <li class="p-3 nav-item {{ in_array(Route::currentRouteName(), array('system.business_transaction.show','system.business_transaction.declined','system.business_transaction.pending','system.business_transaction.approved','system.business_transaction.validated')) ? 'active' : ''}}">
      <a class="nav-link" data-toggle="collapse" href="#business_transaction" aria-expanded="false" aria-controls="business_transaction">
        <i class="fa fa-file menu-icon"></i>
        <span class="menu-title">Business Transactions</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="business_transaction">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('system.business_transaction.pending')}}">Pending
            <!-- @if($counter['pending'] > 0)
              <span class="badge badge-sm badge-primary">{{$counter['pending']}}</span>
            @endif -->
          </a></li>
        </ul>
        @if(in_array($auth->type,['super_user','front_liner']))
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('system.business_transaction.validated')}}">Validated
            <!-- @if($counter['pending'] > 0)
              <span class="badge badge-sm badge-primary">{{$counter['pending']}}</span>
            @endif -->
          </a></li>
        </ul>
        @endif
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('system.business_transaction.approved')}}">Approved
            <!-- @if($counter['approved'] > 0)
              <span class="badge badge-sm badge-primary">{{$counter['approved']}}</span>
            @endif -->
          </a></li>
        </ul>
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('system.business_transaction.declined')}}">Declined
            <!-- @if($counter['declined'] > 0)
              <span class="badge badge-sm badge-primary">{{$counter['declined']}}</span>
            @endif -->
          </a></li>
        </ul>
      </div>
    </li>
    @if(in_array($auth->type,['super_user','front_liner']))
      @if(in_array($auth->type,['super_user','front_liner']))
        <!-- <li class="p-3 nav-item {{ in_array(Route::currentRouteName(), array('system.application.index','system.application.create','system.application.edit')) ? 'active' : ''}}">
          <a class="nav-link" href="{{route('system.application.index')}}">
            <i class="fa fa-bookmark menu-icon"></i>
            <span class="menu-title">Applications</span>
          </a>
        </li> -->
        <li class="p-3 nav-item {{ in_array(Route::currentRouteName(), array('system.department.index','system.department.create','system.department.edit')) ? 'active' : ''}}">
          <a class="nav-link" href="{{route('system.department.index')}}">
            <i class="fa fa-globe menu-icon"></i>
            <span class="menu-title">Peza Unit</span>
          </a>
        </li>
        <li class="p-3 nav-item {{ in_array(Route::currentRouteName(), array('system.company.pending','system.company.index','system.company.upload')) ? 'active' : ''}}">
          <a class="nav-link" data-toggle="collapse" href="#company" aria-expanded="false" aria-controls="company">
            <i class="fa fa-file menu-icon"></i>
            <span class="menu-title">Company</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="company">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('system.company.index')}}">List
              </a></li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('system.company.pending')}}">Pending
              </a></li>
            </ul>
          </div>
        </li>
        {{-- <li class="p-3 nav-item {{ in_array(Route::currentRouteName(), array('system.company.index','system.company.upload')) ? 'active' : ''}}">
          <a class="nav-link" href="{{route('system.company.index')}}">
            <i class="fa fa-globe menu-icon"></i>
            <span class="menu-title">Company</span>
          </a>
        </li> --}}
        <li class="p-3 nav-item {{ in_array(Route::currentRouteName(), array('system.zone_location.index','system.zone_location.create','system.zone_location.edit')) ? 'active' : ''}}">
          <a class="nav-link" href="{{route('system.zone_location.index')}}">
            <i class="fa fa-compass menu-icon"></i>
            <span class="menu-title">Zone Location</span>
          </a>
        </li>
        <li class="p-3 nav-item {{ in_array(Route::currentRouteName(), array('system.account_code.index','system.account_code.create','system.account_code.edit')) ? 'active' : ''}}">
          <a class="nav-link" href="{{route('system.account_code.index')}}">
            <i class="fa fa-globe menu-icon"></i>
            <span class="menu-title">Account Codes</span>
          </a>
        </li>
        <li class="p-3 nav-item {{ in_array(Route::currentRouteName(), array('system.application_requirements.index','system.application_requirements.create','system.application_requirements.edit')) ? 'active' : ''}}">
          <a class="nav-link" data-toggle="collapse" href="#application_requirements" aria-expanded="false" aria-controls="application_requirements">
            <i class="fa fa-file menu-icon"></i>
            <span class="menu-title">Application Requirements</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="application_requirements">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('system.application_requirements.index')}}">Requirements List
                <!-- @if($counter['pending'] > 0)
                  <span class="badge badge-sm badge-primary">{{$counter['pending']}}</span>
                @endif -->
              </a></li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('system.application_requirements.permit')}}">Assign to Permits
                <!-- @if($counter['approved'] > 0)
                  <span class="badge badge-sm badge-primary">{{$counter['approved']}}</span>
                @endif -->
              </a></li>
            </ul>
          </div>
        </li>
      @endif
        <!-- <li class="p-3 nav-item {{ in_array(Route::currentRouteName(), array('system.regional_office.index','system.regional_office.create','system.regional_office.edit')) ? 'active' : ''}}">
          <a class="nav-link" href="{{route('system.regional_office.index')}}">
            <i class="fa fa-compass menu-icon"></i>
            <span class="menu-title">Regional Offices</span>
          </a>
        </li> -->
      @if(in_array($auth->type,['super_user','front_liner']))
        <li class="p-3 nav-item {{ in_array(Route::currentRouteName(), array('system.report.index')) ? 'active' : ''}}">
          <a class="nav-link" href="{{route('system.report.index')}}">
            <i class="fa fa-chart-line menu-icon"></i>
            <span class="menu-title">Reporting</span>
          </a>
        </li>
        <li class="p-3 nav-item {{ in_array(Route::currentRouteName(), array('system.processor.index','system.processor.create','system.processor.edit','system.processor.reset')) ? 'active' : ''}}">
          <a class="nav-link" href="{{route('system.processor.index')}}">
            <i class="fa fa-user-plus menu-icon"></i>
            <span class="menu-title">Accounts</span>
          </a>
        </li>
        <li class="p-3 nav-item {{ in_array(Route::currentRouteName(), array('system.customer.index')) ? 'active' : ''}}">
          <a class="nav-link" href="{{route('system.customer.index')}}">
            <i class="fa fa-user-plus menu-icon"></i>
            <span class="menu-title">Customer Accounts</span>
          </a>
        </li>
      @endif
    @endif
  @endif
  </ul>

</nav>