@php
  $main = [
    'penguna'   => [
      'title'    => 'Penguna',
      'name'     => 'company',
      'url'     => '/company',
      'icon'     => 'box',
      'role'     => []
      ]
    ,
    'subscribe'   => [
      'title'    => 'Langganan',
      'name'     => 'bo/employ',
      'icon'     => 'briefcase',
      'role'     => [],
      'children' => [
        [
          'title' => 'Daftar Pengguna',
          'url' => '/bo/employ/divisions',
        ],
        [
          'title' => 'Langganan',
          'url' => '/bo/employ/locations',
        ],
      ]
    ],
    'Sistem'   => [
      'title'    => 'Sistem',
      'name'     => 'setting',
      'icon'     => 'settings',
      'role'     => [],
      'children' => [
        [
          'title' => 'Admin',
          'url' => '/setting/users',
        ],
        // [
        //   'title' => 'Mobile App',
        //   'url' => '/bo/products-trashed',
        // ],
        [
          'title' => 'Pengaturan',
          'url' => '/bo/setting/subscribtion',
        ]
      ]
    ],
  ];

@endphp

<div class="page-sidebar">
  <ul class="list-unstyled accordion-menu">
    <li class="sidebar-title">
      Main
    </li>

    <li class="{{ request()->is('dashboard') ? 'active-page' : '' }}">
      <a href="/dashboard"><i data-feather="home"></i>Dashboard</a>
    </li>

    @foreach ($main as $main_menu)
      @if(empty($main_menu["children"]))
        @if (!empty($main_menu["is_comingsoon"]))
          <li class="d-flex align-items-center justify-content-between">
            <a href="{{ $main_menu["url"] }}"><i data-feather="{{ $main_menu["icon"] }}"></i>{{ $main_menu["title"] }}</a>
            <div style="max-height: 25px;" class="badge badge-pill bg-success">Cooming Soon</div>
          </li>
        @else
          <li class="{{ request()->is($main_menu['name'].'*') ? 'active-page' : '' }}">
            <a href="{{ $main_menu["url"] }}"><i data-feather="{{ $main_menu["icon"] }}"></i>{{ $main_menu["title"] }}</a>
          </li>
        @endif
      @else
        <li class="{{ request()->is($main_menu['name'].'*') ? 'active-page' : '' }}">
          <a href="" class="{{ request()->is($main_menu['name'].'*') ? 'active' : '' }}"><i data-feather="{{ $main_menu["icon"] }}"></i>{{ $main_menu["title"] }}<i class="fas fa-chevron-right dropdown-icon"></i></a>
          <ul>
            @foreach ($main_menu["children"] as $main_child)
              <li><a class="
                  @if (
                    request()->is(substr($main_child["url"], 1)) ||
                    request()->is(substr($main_child["url"], 1) . '/*')
                  )
                    active text-primary
                  @endif
                " 
                @if(request()->is(substr($main_child["url"], 1)) || request()->is(substr($main_child["url"], 1) . '/*'))
                  style="background-color: #F3F6F9; border-radius: 10px;"
                @endif
                href="{{ $main_child["url"] }}"><i class="far fa-circle"></i>{{ $main_child["title"] }}</a></li>
            @endforeach
          </ul>
        </li>
      @endif
    @endforeach

    {{-- <li class="sidebar-title">
      Master
    </li>
    @foreach ($master as $master_menu)
      @if(empty($master_menu["children"]))
        <li class="{{ request()->is($master_menu['name'].'*') ? 'active-page' : '' }}">
          <a href="{{ $master_menu["url"] }}"><i data-feather="{{ $master_menu["icon"] }}"></i>{{ $master_menu["title"] }}</a>
        </li>
      @else
        <li>
          <a href=""><i data-feather="{{ $master_menu["icon"] }}"></i>{{ $master_menu["title"] }}<i class="fas fa-chevron-right dropdown-icon"></i></a>
          <ul class="{{ request()->is($master_menu['name'].'*') ? 'active-page' : '' }}">
            @foreach ($master_menu["children"] as $master_child)
              <li><a href="{{ $master_child["url"] }}"><i class="far fa-circle"></i>{{ $master_child["title"] }}</a></li>
            @endforeach
          </ul>
        </li>
      @endif
    @endforeach

    <li class="sidebar-title">
      Config
    </li>
    @foreach ($config as $config_menu)
      @if(empty($config_menu["children"]))
        <li class="{{ request()->is($config_menu['name'].'*') ? 'active-page' : '' }}">
          <a href="{{ $config_menu["url"] }}"><i data-feather="{{ $config_menu["icon"] }}"></i>{{ $config_menu["title"] }}</a>
        </li>
      @else
        <li>
          <a href=""><i data-feather="{{ $config_menu["icon"] }}"></i>{{ $config_menu["title"] }}<i class="fas fa-chevron-right dropdown-icon"></i></a>
          <ul class="{{ request()->is($config_menu['name'].'*') ? 'active-page' : '' }}">
            @foreach ($config_menu["children"] as $child_config)
              <li><a href="{{ $child_config["url"] }}"><i class="far fa-circle"></i>{{ $child_config["title"] }}</a></li>
            @endforeach
          </ul>
        </li>
      @endif
    @endforeach --}}

  </ul>
</div>
