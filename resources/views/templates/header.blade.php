  <nav class="main-header navbar navbar-expand navbar-dark-light navbar-light">
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
      </ul>

      <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown mr-3">
              <a class="nav-link" data-toggle="dropdown" href="#">
                  {{ Auth()->user()->name }}
              </a>
              <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                  <a href="javascript:void(0)" class="dropdown-item"
                      onclick="document.querySelector('#form-logout').submit()">
                      Keluar
                  </a>
                  <form action="{{ route('logout') }}" method="post" id="form-logout">
                      @csrf
                  </form>
              </div>
          </li>
      </ul>
  </nav>
