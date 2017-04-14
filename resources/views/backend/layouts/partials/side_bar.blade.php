<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">{!! trans('labels.manager') !!}</li>
      <!-- Optionally, you can add icons to the links -->
      <li class=""><a href="#"><i class="fa fa-user"></i><span>{!! trans('labels.account') !!}</span></a></li>
      <li><a href="{{ route('admin.user.index') }}"><i class="fa fa-group"></i> <span>{!! trans('labels.user') !!}</span></a></li>
      <li><a href="#"><i class="fa fa-sitemap"></i> <span>{!! trans('labels.category') !!}</span></a></li>
      <li><a href="#"><i class="fa fa-picture-o"></i> <span>{!! trans('labels.new') !!}</span></a></li>
      <li><a href="#"><i class="fa fa-edit"></i> <span>{!! trans('labels.part') !!}</span></a></li>
      <li><a href="#"><i class="fa fa-mortar-board"></i> <span>{!! trans('labels.exam') !!}</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>