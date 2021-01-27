<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <span class="brand-text font-weight-light">SysAdmin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <!--<div class="image">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>-->
            <div class="info">
                <a href="#" class="d-block">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>

                <a class="btn btn-danger btn-sm" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    Sair
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item menu-open">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="fas fa-tachometer-alt nav-icon"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="fas fa-arrow-circle-down nav-icon"></i>
                        <p>
                            Entrada
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('empresas.create')}}?tipo=fornecedor" class="nav-link">
                                <i class="fas fa-file nav-icon"></i>
                                <p>Novo Fornecedor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('empresas.index')}}?tipo=fornecedor" class="nav-link">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>Lista de Fornecedores</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="fas fa-arrow-alt-circle-up nav-icon"></i>
                        <p>
                            Saida
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('empresas.create')}}?tipo=cliente" class="nav-link">
                                <i class="fas fa-file nav-icon"></i>
                                <p>Novo Cliente</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('empresas.index')}}?tipo=cliente" class="nav-link">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>Lista de Clientes</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="fas fa-money-check-alt nav-icon"></i>
                        <p>
                            Financeiro
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{route('movimentos-financeiros.create')}} class="nav-link">
                                <i class="fas fa-dollar-sign nav-icon"></i>
                                <p>Novo Lançamento</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('movimentos-financeiros.index')}}" class="nav-link">
                                <i class="fas fa-chart-pie nav-icon"></i>
                                <p>Relatório Financeiro</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="fas fa-box nav-icon"></i>
                        <p>
                            Cadastros
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('produtos.index')}}" class="nav-link">
                                <i class="fas fa-boxes nav-icon"></i>
                                <p>Produtos</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Usuários</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
