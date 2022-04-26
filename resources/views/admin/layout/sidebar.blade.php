<aside class="left-sidebar" data-sidebarbg="skin5">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('chart') }}"
                        aria-expanded="false"><i class="mdi mdi-chart-bar"></i>
                        <span class="hide-menu">{{ trans('message.dashboardAdmin') }}</span>
                    </a>
                </li>
                @can('view-users')
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('user.index') }}"
                        aria-expanded="false"><i class="mdi mdi-account-box"></i>
                        <span class="hide-menu">{{ trans('message.userAdmin') }}</span>
                    </a>
                </li>
                @endcan
                @can('view-categories')
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('category.index') }}"
                        aria-expanded="false"><i class=" mdi mdi-format-list-bulleted"></i>
                        <span class="hide-menu">{{ trans('message.categoryAdmin') }}</span>
                    </a>
                </li>
                @endcan
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('product.index') }}"
                        aria-expanded="false"><i class="mdi mdi-menu font-24"></i>
                        <span class="hide-menu">{{ trans('message.productAdmin') }}</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('order.index') }}"
                        aria-expanded="false"><i class="mdi mdi-shopping"></i>
                        <span class="hide-menu"> {{ trans('message.orderAdmin') }}</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('suggest-admin.index') }}"
                        aria-expanded="false"><i class="mdi mdi-food"></i>
                        <span class="hide-menu"> {{ trans('message.suggestAdmin') }}</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
