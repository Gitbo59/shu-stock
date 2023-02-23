<!-- /.navbar-top-links -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="">
                <a href="/"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
            </li>
            <?php 
            if($_SESSION['admin'] == 1){
            ?>
                <li class="">
                    <a href="/employees"><i class="fa fa-black-tie fa-fw"></i>Employees</a>
                </li>
                <li class="">
                    <a href="/users"><i class="fa fa-user-plus fa-fw"></i>Users</a>
                </li>             
            <?php 
            }
            ?>
            <?php 
            if($_SESSION['admin'] || $_SESSION['staff'] == 1){
            ?>
                <li class="">
                <a href="/customers"><i class="fa fa-users fa-fw"></i>Customers</a>
                </li>
                <li class="">
                <a href="/transactions"><i class="fa fa-credit-card fa-fw"></i>Transactions</a>
                </li>
                <li class="">
                <a href="/items_sold"><i class="fa fa-shopping-cart fa-fw"></i>Items sold</a>
                </li>
                <li class="">
                <a href="/canteens"><i class="fa fa-cutlery fa-fw"></i>Canteen Admin</a>
                </li>
            <?php 
            }
            ?>
            <li class="">
                <a href="/canteenview"><i class="fa fa-cutlery fa-fw"></i>Canteens  <i class="fa fa-angle-down fa-lg" aria-hidden="true"></i></a>
                
                
                    <ul class="dropdown-canteen">
                        <a href="#cantor">Cantor</a>
                        <li class="divider"></li>
                        <a href="#services">Charles Street</a>
                        <li class="divider"></li>
                        <a href="#atrium">Atrium</a>
                        <li class="divider"></li>
                        <a href="#owen">Owen Building</a>
                        <li class="divider"></li>
                        <a href="#aspect">Aspect Court</a>
                        <li class="divider"></li>
                        <a href="#adsetts">Adsetts</a>
                    </ul>
                
            </li>
            
                
            <li class="">
                <a href="/products"><i class="fa fa-shopping-bag fa-fw"></i>Products</a>
            </li>
            
            <li class="">
                <a href="/stocks"><i class="fa fa-archive fa-fw"></i>Stock</a>
            </li>
            
        </ul>
    </div>
</div>

