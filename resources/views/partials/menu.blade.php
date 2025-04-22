<div id="menubar" class="menubar-inverse">
    <style>
        li.active .title {
            white-space: normal;
            word-wrap: break-word;
        }
    </style>

    <div class="menubar-fixed-panel">
        <div>
            <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="expanded">
            <a href="../../html/dashboards/dashboard.html">
                <span class="text-lg text-bold text-primary">Fuerza Aérea</span>
            </a>
        </div>
    </div>

    <div class="menubar-scroll-panel">
        <ul id="main-menu" class="gui-controls">
            @foreach ($menus as $menu)
                @if ($menu->menu_padre_id == null && empty($menu->submenus))
                    <li> <!-- La clase active se añadirá dinámicamente con JS -->
                        <a href="{{ route($menu->link) }}">
                            <div class="gui-icon"><i class="{{ $menu->icono }}"></i></div>
                            <span class="title">{{ $menu->titulo }}</span>
                        </a>
                    </li>
                @endif
                @if (!empty($menu->submenus))
                    <li class="gui-folder">
                        <a>
                            <div class="gui-icon"><i class="{{ $menu->icono }}"></i></div>
							<span class="title" style="text-overflow: ellipsis;" title="{{ $menu->titulo }}">{{ $menu->titulo }}</span>
							</a>
                        <ul>
                            @foreach ($menu->submenus as $submenu1)
                                @if ($submenu1->tipo_menu == 'I')
                                    <li><a href="{{ route($submenu1->link) }}">
                                        <span class="title">{{ $submenu1->titulo }}</span>
                                    </a></li>
                                @endif
                                @if ($submenu1->tipo_menu == 'M')
                                    <li class="gui-folder">
                                        <a href="javascript:void(0);">
                                            <span class="title">{{ $submenu1->titulo }}</span>
                                        </a>
                                        <ul>
                                            @foreach ($submenu1->submenus as $submenu2)
                                                @if ($submenu2->tipo_menu == 'I')
                                                    <li><a href="{{ route($submenu2->link) }}">
                                                        <span class="title">{{ $submenu2->titulo }}</span>
                                                    </a></li>
                                                @endif
                                                @if ($submenu2->tipo_menu == 'M')
                                                    <li class="gui-folder">
                                                        <a href="javascript:void(0);">
                                                            <span class="title">{{ $submenu2->titulo }}</span>
                                                        </a>
                                                        <ul>
                                                            @foreach ($submenu2->submenus as $submenu3)
                                                                @if ($submenu3->tipo_menu == 'I')
                                                                    <li><a href="{{ route($submenu3->link) }}">
                                                                        <span class="title">{{ $submenu3->titulo }}</span>
                                                                    </a></li>
                                                                @endif
                                                                @if ($submenu3->tipo_menu == 'M')
                                                                    <li class="gui-folder">
                                                                        <a href="javascript:void(0);">
                                                                            <span class="title">{{ $submenu3->titulo }}</span>
                                                                        </a>
                                                                        <ul>
                                                                            @foreach ($submenu3->submenus as $submenu4)
                                                                                @if ($submenu4->tipo_menu == 'I')
                                                                                    <li><a href="{{ route($submenu4->link) }}">
                                                                                        <span class="title">{{ $submenu4->titulo }}</span>
                                                                                    </a></li>
                                                                                @endif
                                                                            @endforeach
                                                                        </ul>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
