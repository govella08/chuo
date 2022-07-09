<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>M & E Portal</title>

  <link href="{{ asset('cms_assets/css/style.default.css') }}" rel="stylesheet">
  <link href="{{ asset('cms_assets/css/morris.css') }} " rel="stylesheet">
  <link href="{{ asset('cms_assets/css/select2.css') }} " rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('cms_assets/DataTables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}} ">
  <link rel="stylesheet" href="{{ asset('cms_assets/DataTables/Buttons-1.5.1/css/buttons.bootstrap4.min.css')}} ">
  <link rel="stylesheet" href="{{ asset('cms_assets/DataTables/Buttons-1.5.1/css/buttons.dataTables.min.css')}} ">
  <script src="{{ asset('cms_assets/js/jquery-1.11.1.min.js') }} "></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  @yield('css-content')
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
      </head>

      <body>

        <header>
          <div class="headerwrapper">
            <div class="header-left">
                    <a href="{{ url('/cms/dashboard')}}" class="Dashboard">
                      <span style="font-size:18px;color:white;"> M&E Portal</span>
                      </a>
                      <div class="pull-right">
                        <a href="#" class="menu-collapse">
                          <i class="fa fa-bars"></i>
                        </a>
                      </div>
                    </div><!-- header-left -->

                    <div class="header-right">

                      <div class="pull-right">
                        <div class="btn-group btn-group-option">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-caret-down"></i>
                          </button>
                          <ul class="dropdown-menu pull-right" role="menu">
                            <li><a href="{{ url('/cms/profile')}}"><i class="fa fa-user"></i> My Profile</a></li>


                          <!--   <li><a href="wsdindex.html#"><i class="glyphicon glyphicon-star"></i> Activity Log</a></li> -->

                           <!--  <li><a href="wsdindex.html#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li> -->
                            <li class="divider"></li>
                            <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                              <i class="fa fa-fw fa-power-off"></i> Logout</a>

                              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                              </form>
                            </li>

                          </ul>
                        </div><!-- btn-group -->

                      </div><!-- pull-right -->

                    </div><!-- header-right -->

                  </div><!-- headerwrapper -->
                </header>

                <section>
                  <div class="mainwrapper">
                    <div class="leftpanel">
                      <div class="media profile-left">

                        <div class="media-body">
                          <span style="font-size:20px;">{{ Auth::user()->region->region_name }}</span>
                          <h4 class="media-heading">{{ Auth::user()->name }}</h4>
                        </div>
                      </div><!-- media -->

                      <ul class="nav nav-pills nav-stacked">

                        <li class="parent <?php if(strpos($_SERVER['REQUEST_URI'],'/dashboard') || strpos($_SERVER['REQUEST_URI'],'/dashboard/graphs') || strpos($_SERVER['REQUEST_URI'],'/dashboard/reports')){  echo "active";  }?>"><a href="#"><i class="fa fa-home"></i> <span>Dashboard</span></a>
                          <ul class="children">
                            @permission('dashboard')
                            <li><a href="{{ url('/cms/dashboard')}}"> <span>Monthly Dashboard</span></a></li>
                            @endpermission
                            @permission('dashboard.reports.all')
                            <li><a href="{{ url('/cms/dashboard/reports')}}"> <span>Reports Summary</span></a></li>
                            @endpermission
                             @permission('dashboard.reports.graphs')
                            <li><a href="{{ url('/cms/dashboard/reports/graphs')}}"> <span>Graphical Reports</span></a></li>
                             @endpermission
                          </ul>
                        </li>

                        @if(Auth::user()->can(['regions.index','roles.index','users.index','watersales_targets.index','wastewater_targets.index'])) 
                        <li class="parent  <?php if(strpos($_SERVER['REQUEST_URI'],'regions') || strpos($_SERVER['REQUEST_URI'],'roles') || strpos($_SERVER['REQUEST_URI'],'edit_role') || strpos($_SERVER['REQUEST_URI'],'users') || strpos($_SERVER['REQUEST_URI'],'watersales_targets') || strpos($_SERVER['REQUEST_URI'],'wastewater_targets')){  echo "active";  }?>"><a href="#"><i class="fa fa-bars"></i> <span>Settings</span></a>
                          <ul class="children">
                           @permission('regions.index')
                           <li <?php if(strpos($_SERVER['REQUEST_URI'],'regions')){  echo 'class="active"';  }?>><a href="{{ url('/cms/regions')}}"><i class="fa fa-navicon"></i> <span>Regions Management</span></a></li>
                           @endpermission

                           @permission('roles.index')
                           <li <?php if(strpos($_SERVER['REQUEST_URI'],'roles')){  echo 'class="active"';  }?> ><a href="{{ url('/cms/roles')}}"><i class="fa fa-gears"></i> <span>Role Management</span></a></li>
                           @endpermission 

                           @permission('users.index')
                           <li <?php if(strpos($_SERVER['REQUEST_URI'],'users') || strpos($_SERVER['REQUEST_URI'],'edit_role')){  echo 'class="active"';  }?> ><a href="{{ url('/cms/users')}}"><i class="fa fa-group"></i> <span>Users Management</span></a></li>
                           @endpermission 

                           @permission('watersales_targets.index')
                           <li <?php if(strpos($_SERVER['REQUEST_URI'],'watersales_targets')){  echo 'class="active"';  }?> ><a href="{{ url('/cms/watersales_targets')}}"><i class="fa fa-thumb-tack"></i> <span>Watersales Targets</span></a></li>
                           @endpermission

                           @permission('wastewater_targets.index')
                           <li <?php if(strpos($_SERVER['REQUEST_URI'],'wastewater_targets')){  echo 'class="active"';  }?> ><a href="{{ url('/cms/wastewater_targets')}}"><i class="fa fa-cube"></i> <span>Waste Water Targets</span></a></li>
                           @endpermission
                         </ul>
                       </li>
                       @endif


                       @permission('water_sales.index')
                       <li <?php if(strpos($_SERVER['REQUEST_URI'],'water_sales')){  echo 'class="active"';  }?> ><a href="{{ url('/cms/water_sales')}}"><i class="fa fa-tint"></i> <span>Water Sales</span></a></li>
                       @endpermission

                       @permission('newconnections.index')
                       <li <?php if(strpos($_SERVER['REQUEST_URI'],'newconnections')){  echo 'class="active"';  }?> ><a href="{{ url('/cms/newconnections')}}"><i class="fa fa-sitemap"></i> <span>New Nonnections</span></a></li>
                       @endpermission

                       @permission('revenue_collections.index')
                       <li <?php if(strpos($_SERVER['REQUEST_URI'],'revenue_collections')){  echo 'class="active"';  }?> ><a href="{{ url('/cms/revenue_collections')}}"><i class="fa  fa-dollar"></i> <span>Revenue Collections</span></a></li>
                       @endpermission 

                       @permission('leakage_control.index')
                       <li <?php if(strpos($_SERVER['REQUEST_URI'],'leakage_control')){  echo 'class="active"';  }?> ><a href="{{ url('/cms/leakage_control')}}"><i class="fa fa-warning"></i> <span>Leakage Control</span></a></li>
                       @endpermission

                       @permission('meter_replacement.index')
                       <li <?php if(strpos($_SERVER['REQUEST_URI'],'meter_replacement')){  echo 'class="active"';  }?> ><a href="{{ url('/cms/meter_replacement')}}"><i class="fa fa-wrench"></i> <span>Meter Replacement</span></a></li>
                       @endpermission 

                       @permission('meter_readings.index')
                       <li <?php if(strpos($_SERVER['REQUEST_URI'],'meter_readings')){  echo 'class="active"';  }?> ><a href="{{ url('/cms/meter_readings')}}"><i class="fa fa-search"></i> <span>Meter Reading</span></a></li>
                       @endpermission

                       @permission('water_productions.index')
                       <li <?php if(strpos($_SERVER['REQUEST_URI'],'water_productions')){  echo 'class="active"';  }?> ><a href="{{ url('/cms/water_productions')}}"><i class="fa fa-map-marker"></i> <span>Water Productions</span></a></li>
                       @endpermission 

                       @permission('wastewater.index')
                       <li <?php if(strpos($_SERVER['REQUEST_URI'],'wastewater')){  echo 'class="active"';  }?> ><a href="{{ url('/cms/wastewater')}}"><i class="fa fa-drupal"></i></i> <span>Waste Water</span></a></li>
                       @endpermission

                       @permission('customer_care.index')
                       <li <?php if(strpos($_SERVER['REQUEST_URI'],'customer_care')){  echo 'class="active"';  }?> ><a href="{{ url('/cms/customer_care')}}"><i class="fa fa-phone-square"></i></i> <span>Customer Service</span></a></li>
                       @endpermission 

                       

                       <li <?php if(strpos($_SERVER['REQUEST_URI'],'profile')){  echo 'class="active"';  }?> ><a href="{{ url('/cms/profile')}}"><i class="fa fa-user"></i></i> <span>User Profile</span></a></li>

                       <li>
                        <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                          <i class="fa fa-fw fa-power-off"></i> Logout</a>

                          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                          </form>
                        </li>

                        </ul>

                      </div><!-- leftpanel -->

                      <div class="mainpanel">


                        <div class="contentpanel">

                          @yield('content')

                        </div><!-- contentpanel -->

                      </div><!-- mainpanel -->
                    </div>
                  </section>



                  <script src="{{ asset('cms_assets/js/jquery-migrate-1.2.1.min.js') }} "></script>
                  <script src="{{ asset('cms_assets/js/bootstrap.min.js') }} "></script>
                  <script src="{{ asset('cms_assets/js/modernizr.min.js') }} "></script>
                  <script src="{{ asset('cms_assets/js/pace.min.js') }} "></script>
                  <script src="{{ asset('cms_assets/js/jquery.cookies.js') }} "></script>

                  <script src="{{ asset('cms_assets/js/flot/jquery.flot.min.js') }} "></script>
                  <script src="{{ asset('cms_assets/js/flot/jquery.flot.resize.min.js') }} "></script>
                  <script src="{{ asset('cms_assets/js/flot/jquery.flot.spline.min.js') }} "></script>
                  <script src="{{ asset('cms_assets/js/jquery.sparkline.min.js') }} "></script>
                  <script src="{{ asset('cms_assets/js/bootstrap-wizard.min.js') }} "></script>
                  <script src="{{ asset('cms_assets/js/select2.min.js') }} "></script>
                  <script src="{{ asset('cms_assets/js/jquery.matchHeight-min.js') }} "></script>
                  <script src="{{ asset('cms_assets/js/custom.js') }} "></script>



                  <script src="{{ asset('cms_assets/DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js') }} "></script>
                  <script src="{{ asset('cms_assets/DataTables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }} "></script>
                  <script src="{{ asset('cms_assets/DataTables/Buttons-1.5.1/js/dataTables.buttons.min.js') }} "></script>
                  <script src="{{ asset('cms_assets/DataTables/Buttons-1.5.1/js/buttons.bootstrap4.min.js') }} "></script>
                  <script src="{{ asset('cms_assets/DataTables/JSZip-2.5.0/jszip.min.js') }} "></script>
                  <script src="{{ asset('cms_assets/DataTables/pdfmake-0.1.32/pdfmake.min.js') }} "></script>
                  <script src="{{ asset('cms_assets/DataTables/pdfmake-0.1.32/vfs_fonts.js') }} "></script>
                  <script src="{{ asset('cms_assets/DataTables/Buttons-1.5.1/js/buttons.html5.min.js') }} "></script>
                  <script src="{{ asset('cms_assets/DataTables/Buttons-1.5.1/js/buttons.print.min.js') }} "></script>
                  <script src="{{ asset('cms_assets/DataTables/Buttons-1.5.1/js/buttons.colVis.min.js') }} "></script>
                  @yield('js-content')

                </body>
                </html>
