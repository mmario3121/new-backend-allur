<aside class="main-sidebar sidebar-primary elevation-1">

    <a href="/" class="brand-link text-center" style="font-size: 1.1rem">
        <img src="{{ asset('adminlte-assets/dist/img/desktop-logo.png') }}" alt="{{ config('app.name') }}"
             style="max-height: 45px; margin: 0 auto">
        {{--        <span class="brand-text text-uppercase">{{ config('app.name') }}</span>--}}
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>Главная</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.applications.index') }}" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>
                            Заявки
                        </p>
                    </a>
                </li>
                @role('admin|developer|')
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>Пользователи</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.roles.index') }}" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>Роли</p>
                    </a>
                </li>
                @endrole
                <li class="nav-item">
                    <a href="{{ route('admin.cities.index') }}" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>Города</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.types.index') }}" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>Типы Машин</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.brands.index') }}" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>Бренды</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.dealers.index') }}" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>Дилеры</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.dealerAddresses.index') }}" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>Адреса</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.dealerSeos.index') }}" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>SEO</p>
                    </a>
                </li>
                @role('developer')
                <li class="nav-item">
                    <a href="{{ route('admin.settings.index') }}" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>Настройки</p>
                    </a>
                </li>
                @endrole
                <li class="nav-item">
                    <a href="{{ route('admin.mainPages.edit', ['mainPage' => 1]) }}" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>Главная</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.mainPageBanners.index') }}" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>Баннеры</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.komeks.index') }}" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>Komek/Litro</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.aboutCompanies.edit', ['aboutCompany' => 1]) }}" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>О компании</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.companySliders.index') }}" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>О компании Слайдер</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.carreers.edit', ['carreer' => 1]) }}" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>Производство</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.socials.index') }}" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>Соц Ответственность</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>
                            Карьера
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.sliders.index') }}" class="nav-link">
                                <i class="far fa-fw fa-circle text-cyan"></i>
                                <p>Слайдер Карьеры</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.careras.edit', ['carera' => 1]) }}" class="nav-link">
                                <i class="far fa-fw fa-circle text-cyan"></i>
                                <p>Карьера</p>
                            </a>
                        </li>
                    </ul>
                    </li>
                    

                <li class="nav-item">
                    <a href="{{ route('admin.articles.index') }}" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>
                            Новости
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.financePages.edit', ['financePage' => 1]) }}" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>Страница Finance</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>
                            Allur Finance
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.finance-users.index') }}" class="nav-link">
                                <i class="far fa-fw fa-circle text-cyan"></i>
                                <p>Пользователи</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.finance-cities.index') }}" class="nav-link">
                                <i class="far fa-fw fa-circle text-cyan"></i>
                                <p>Города</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.finance-applications.index') }}" class="nav-link">
                                <i class="far fa-fw fa-circle text-cyan"></i>
                                <p>Заявки</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.shopItems.index') }}" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>Магазин</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.promos.index') }}" class="nav-link">
                        <i class="far fa-fw fa-circle text-cyan"></i>
                        <p>Промо</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
