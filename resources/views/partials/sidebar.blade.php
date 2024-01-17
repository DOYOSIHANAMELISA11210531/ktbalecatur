<div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/template/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Akun</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">          
            <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="/admin/anggota" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Anggota KT
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/kategori" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/rencana" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Program Kerja
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/program" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Kegiatan Terlaksana
              </p>
            </a>
          </li>

          <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Account
              </p>
            </a>
          </li>

          <li class="nav-item">
          <a href="/logout" class="nav-link">
              <i class="nav-icon far bi bi-box-arrow-left"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

          {{-- <li class="nav-item">
            <a href="/carousel" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Carousol
              </p>
            </a>
          </li> --}}
          
        </ul>
      </nav>