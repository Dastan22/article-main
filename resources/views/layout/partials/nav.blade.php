<nav class="navbar navbar-expand-md navbar-light " style="background-color: #e3f2fd;">
    <div class="container">
        <div class="order-0">
            <a class="navbar-brand" href="/">Article</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse order-2 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="/">На главную</a>
                </li>
                <li class="nav-item {{ request()->is('articles*') ? 'active' : '' }}">
                    <a class="nav-link" href="/articles">Каталог статей</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
