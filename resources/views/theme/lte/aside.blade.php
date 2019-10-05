<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><h3><b>Menú Principal</b></h3></li>
          @foreach ($menusComposer as $key => $item)
              @if ($item["menu_id"] != 0)
                  @break
              @endif
              @include("theme.$theme.menu-item", ["item" => $item])
          @endforeach
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>