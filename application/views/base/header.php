<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="<?php echo base_url(); ?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <h6 class="text-white mt-4">APP</h6>
                    </span>
                    <span class="logo-lg">
                        <h3 class="text-white mt-4"><?php echo strtoupper('TNPSC CAREER'); ?></h3>
                    </span>
                </a>

                <a href="<?php echo base_url(); ?>" class="logo logo-light">
                    <span class="logo-sm">
                        <h6 class="text-white mt-4">APP</h6>
                    </span>
                    <span class="logo-lg">
                        <h3 class="text-white mt-4"><?php echo strtoupper('TNPSC CAREER'); ?></h3>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>

            
        </div>

        <div class="d-flex">
            

          

           
            <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

            <!--<div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-bell-outline"></i>
                    <span class="badge badge-danger badge-pill">3</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="m-0 font-size-16"> Notifications (258) </h5>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="#" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="mdi mdi-cart-outline"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Your order is placed</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </div>
                            </div>
                        </a>
            
                        <a href="#" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title bg-warning rounded-circle font-size-16">
                                        <i class="mdi mdi-message-text-outline"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">New Message received</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">You have 87 unread messages</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title bg-info rounded-circle font-size-16">
                                        <i class="mdi mdi-glass-cocktail"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Your item is shipped</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">It is a long established fact that a reader will</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="mdi mdi-cart-outline"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Your order is placed</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title bg-danger rounded-circle font-size-16">
                                        <i class="mdi mdi-message-text-outline"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">New Message received</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">You have 87 unread messages</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top">
                        <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                            View all
                        </a>
                    </div>
                </div>
            </div>-->

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-settings-outline"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item" href="<?php echo base_url();?>"><i class="mdi mdi-account-circle font-size-17 align-middle mr-1"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="<?php echo base_url();?>logout"><i class="bx bx-power-off font-size-17 align-middle mr-1 text-danger"></i> Logout</a>
                </div>
            </div>

        </div>
    </div>
</header>