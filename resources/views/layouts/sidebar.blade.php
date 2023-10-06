  <div id="left-sidebar" class="sidebar">
      <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-arrow-left"></i></button>
      <div class="sidebar-scroll">
          <div class="user-account">
              <img src="{{ asset('dist/assets/images/user.png') }}" class="rounded-circle user-photo"
                  alt="User Profile Picture">
              <div class="dropdown">
                  <span>Welcome,</span>
                  <a href="javascript:void(0);" class="dropdown-toggle user-name"
                      data-toggle="dropdown"><strong>Admin</strong></a>
                  <ul class="dropdown-menu dropdown-menu-right account">
                      <li><a href="page-profile2.html"><i class="fa fa-user"></i>My Profile</a></li>
                      <li><a href="javascript:void(0);"><i class="fa fa-cog"></i>Settings</a></li>
                      <li class="divider"></li>
                      <li><a href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                  class="fa fa-power-off"></i>Logout</a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>

                      </li>
                  </ul>
              </div>
              <hr>
              <ul class="row list-unstyled">
                  <li class="col-4">
                      <small>Karyawan</small>
                      <h6>561</h6>
                  </li>
                  <li class="col-4">
                      <small>Cabang</small>
                      <h6>920</h6>
                  </li>
                  <li class="col-4">
                      <small>Sales</small>
                      <h6>$23B</h6>
                  </li>
              </ul>
          </div>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs d-flex justify-content-around">
              <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu">Menu</a></li>
              <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat"><i class="fa fa-bell"></i></a>
              </li>
              {{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting"><i
                          class="icon-settings"></i></a></li> --}}
              <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#question"><i class="fa fa-file"></i></a>
              </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content padding-0">
              <div class="tab-pane active" id="menu">
                  <nav id="left-sidebar-nav" class="sidebar-nav">
                      <ul id="main-menu" class="metismenu li_animation_delay">
                          <li class=" {{ request()->is('admin') ? 'active' : '' }}  ">
                              <a href=""><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                          </li>
                          <li class=" {{ request()->is('admin/category*') ? 'active' : '' }}">
                              <a href="{{ route('category.index') }}"><i
                                      class="fa fa-folder"></i><span>category</span></a>
                          </li>
                          <li class=" {{ request()->is('admin/product*') ? 'active' : '' }}">
                              <a href="{{ route('product.index') }}"><i class="fa fa-folder"></i><span>Produk</span></a>
                          </li>
                          <li class=" {{ request()->is('admin/user*') ? 'active' : '' }}">
                              <a href="{{ route('user.index') }}"><i class="fa fa-user"></i><span>User</span></a>
                          </li>
                          <li>
                              <a href="#Tables"><i class="fa fa-money"></i><span>Transaksi</span></a>
                          </li>

                      </ul>
                  </nav>
              </div>
              <div class="tab-pane" id="Chat">

              </div>
              <div class="tab-pane" id="setting">
                  <h6>Choose Skin</h6>
                  <ul class="choose-skin list-unstyled">
                      <li data-theme="purple">
                          <div class="purple"></div>
                      </li>
                      <li data-theme="blue">
                          <div class="blue"></div>
                      </li>
                      <li data-theme="cyan" class="active">
                          <div class="cyan"></div>
                      </li>
                      <li data-theme="green">
                          <div class="green"></div>
                      </li>
                      <li data-theme="orange">
                          <div class="orange"></div>
                      </li>
                      <li data-theme="blush">
                          <div class="blush"></div>
                      </li>
                      <li data-theme="red">
                          <div class="red"></div>
                      </li>
                  </ul>

                  <ul class="list-unstyled font_setting mt-3">
                      <li>
                          <label class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" name="font" value="font-nunito"
                                  checked="">
                              <span class="custom-control-label">Nunito Google Font</span>
                          </label>
                      </li>
                      <li>
                          <label class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" name="font" value="font-ubuntu">
                              <span class="custom-control-label">Ubuntu Font</span>
                          </label>
                      </li>
                      <li>
                          <label class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" name="font"
                                  value="font-raleway">
                              <span class="custom-control-label">Raleway Google Font</span>
                          </label>
                      </li>
                      <li>
                          <label class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" name="font"
                                  value="font-IBMplex">
                              <span class="custom-control-label">IBM Plex Google Font</span>
                          </label>
                      </li>
                  </ul>

                  <ul class="list-unstyled mt-3">
                      <li class="d-flex align-items-center mb-2">
                          <label class="toggle-switch theme-switch">
                              <input type="checkbox">
                              <span class="toggle-switch-slider"></span>
                          </label>
                          <span class="ml-3">Enable Dark Mode!</span>
                      </li>
                      <li class="d-flex align-items-center mb-2">
                          <label class="toggle-switch theme-rtl">
                              <input type="checkbox">
                              <span class="toggle-switch-slider"></span>
                          </label>
                          <span class="ml-3">Enable RTL Mode!</span>
                      </li>
                      <li class="d-flex align-items-center mb-2">
                          <label class="toggle-switch theme-high-contrast">
                              <input type="checkbox">
                              <span class="toggle-switch-slider"></span>
                          </label>
                          <span class="ml-3">Enable High Contrast Mode!</span>
                      </li>
                  </ul>
              </div>
              <div class="tab-pane" id="question">
                  <nav id="left-sidebar-nav" class="sidebar-nav">
                      <ul id="main-menu" class="metismenu li_animation_delay">
                          <li>
                              <a href="#Pages" class="has-arrow"><i class="fa fa-file"></i><span>Report</span></a>
                              <ul>
                                  <li><a href="page-blank.html">Report Pemasukan</a> </li>
                                  <li><a href="page-profile.html">Report Pengeluaran</a> </li>
                                  <li><a href="page-profile.html">Report Produksi</a> </li>
                                  <li><a href="page-profile.html">Report Pasok Bahan</a> </li>
                                  <li><a href="page-profile.html">Report Pengiriman</a> </li>
                              </ul>
                          </li>
                      </ul>
                  </nav>

              </div>
          </div>
      </div>
  </div>
