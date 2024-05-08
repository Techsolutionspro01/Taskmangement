<div class="main-menu">
    <!-- Brand Logo -->
    <div class="logo-box">
        <!-- Brand Logo Light -->
        <a href="/" class="logo-light">
            <img src="{{ asset('assets/theme/images/logo-light.png')}}" alt="logo" class="logo-lg" height="28">
            <img src="{{ asset('assets/theme/images/logo-sm.png')}}" alt="small logo" class="logo-sm" height="28">
        </a>

        <!-- Brand Logo Dark -->
        <a href="/" class="logo-dark">
            <img src="{{ asset('assets/theme/images/logo-dark.png')}}" alt="dark logo" class="logo-lg" height="28">
            <img src="{{ asset('assets/theme/images/logo-sm.png')}}" alt="small logo" class="logo-sm" height="28">
        </a>
    </div>

    <!--- Menu -->
    <div data-simplebar>
        <ul class="app-menu">

            <li class="menu-title">Menu</li>

            <li class="menu-item">
                <a href="/" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-home-smile"></i></span>
                    <span class="menu-text"> Dashboards </span>
                    {{-- <span class="badge bg-primary rounded ms-auto">01</span> --}}
                </a>
            </li>

            <li class="menu-title">Custom</li>

            <li class="menu-item">
                <a href="apps-calendar.html" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-calendar"></i></span>
                    <span class="menu-text"> Calendar </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('assign-task')}}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-file"></i></span>
                    <span class="menu-text"> Assign Task </span>
                </a>
            </li>

            <li class="menu-title">Components</li>

            <li class="menu-item">
                <a href="#menuComponentsui" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-cookie"></i></span>
                    <span class="menu-text"> UI Elements </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuComponentsui">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="ui-alerts.html" class="menu-link">
                                <span class="menu-text">Alerts</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-buttons.html" class="menu-link">
                                <span class="menu-text">Buttons</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-cards.html" class="menu-link">
                                <span class="menu-text">Cards</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-carousel.html" class="menu-link">
                                <span class="menu-text">Carousel</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-dropdowns.html" class="menu-link">
                                <span class="menu-text">Dropdowns</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-video.html" class="menu-link">
                                <span class="menu-text">Embed Video</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-general.html" class="menu-link">
                                <span class="menu-text">General UI</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-grid.html" class="menu-link">
                                <span class="menu-text">Grid</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-images.html" class="menu-link">
                                <span class="menu-text">Images</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-list-group.html" class="menu-link">
                                <span class="menu-text">List Group</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-modals.html" class="menu-link">
                                <span class="menu-text">Modals</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-offcanvas.html" class="menu-link">
                                <span class="menu-text">Offcanvas</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-placeholders.html" class="menu-link">
                                <span class="menu-text">Placeholders</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-progress.html" class="menu-link">
                                <span class="menu-text">Progress</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-spinners.html" class="menu-link">
                                <span class="menu-text">Spinners</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-tabs-accordions.html" class="menu-link">
                                <span class="menu-text">Tabs & Accordions</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-tooltips-popovers.html" class="menu-link">
                                <span class="menu-text">Tooltips & Popovers</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-typography.html" class="menu-link">
                                <span class="menu-text">Typography</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#menuMultilevel" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-share-alt"></i></span>
                    <span class="menu-text"> Multi Level </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuMultilevel">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="#menuMultilevel2" data-bs-toggle="collapse"
                                class="menu-link waves-effect waves-light">
                                <span class="menu-text"> Second Level </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="menuMultilevel2">
                                <ul class="sub-menu">
                                    <li class="menu-item">
                                        <a href="javascript: void(0);" class="menu-link">
                                            <span class="menu-text">Item 1</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="javascript: void(0);" class="menu-link">
                                            <span class="menu-text">Item 2</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="menu-item">
                            <a href="#menuMultilevel3" data-bs-toggle="collapse"
                                class="menu-link waves-effect waves-light">
                                <span class="menu-text">Third Level</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="menuMultilevel3">
                                <ul class="sub-menu">
                                    <li class="menu-item">
                                        <a href="javascript: void(0);" class="menu-link">
                                            <span class="menu-text">Item 1</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#menuMultilevel4" data-bs-toggle="collapse"
                                            class="menu-link waves-effect waves-light">
                                            <span class="menu-text">Item 2</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="menuMultilevel4">
                                            <ul class="sub-menu">
                                                <li class="menu-item">
                                                    <a href="javascript: void(0);" class="menu-link">
                                                        <span class="menu-text">Item 1</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="javascript: void(0);" class="menu-link">
                                                        <span class="menu-text">Item 2</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>