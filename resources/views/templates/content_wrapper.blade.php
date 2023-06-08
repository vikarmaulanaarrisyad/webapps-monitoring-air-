  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @includeIf('templates.breadcrumb')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>
    <!-- /.content -->
  </div>
