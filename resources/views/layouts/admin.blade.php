<div id="wrapper">
    <nav class="navbar navbar-default top-navbar" role="navigation">
        <div >
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse" style="float:left"> <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        <ul class="nav navbar-top-links navbar-right" style="float:right;margin-right:35px">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"> <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{url('admin\user\revise')}}"><i class="fa fa-gear fa-fw"></i>修改密码</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{url('admin\quit')}}"><i class="fa fa-sign-out fa-fw"></i>退出</a>
                    </li>
                </ul>
            </li>
        </ul>





        </div>

    </nav>
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li> <a class="active-menu" href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li> <a href="ui-elements.html"><i class="fa fa-desktop"></i> UI Elements</a>
                </li>
                <li> <a href="chart.html"><i class="fa fa-bar-chart-o"></i> Charts</a>
                </li>
                <li> <a href="tab-panel.html"><i class="fa fa-qrcode"></i> Tabs & Panels</a>
                </li>
                <li> <a href="table.html"><i class="fa fa-table"></i> Responsive Tables</a>
                </li>
                <li> <a href="form.html"><i class="fa fa-edit"></i> Forms </a>
                </li>
                <li> <a href="#"><i class="fa fa-edit"></i> 文章管理<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li> <a href="{{url('admin/article')}}">文章列表</a>
                        </li>
                        <li> <a href="{{url('admin/article/create')}}">添加文章</a>
                        </li>
                    </ul>
                </li>                
                <li> <a href="#"><i class="fa fa-sitemap"></i> 分类管理<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li> <a href="{{url('admin/category')}}">分类列表</a>
                        </li>
                        <li> <a href="{{url('admin/category/create')}}">添加分类</a>
                        </li>
                    </ul>
                </li>
                <li> <a href="#"><i class="fa fa-fw fa-file"></i> 用户管理<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li> <a href="{{url('admin\user\revise')}}">修改密码</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>@yield('navigation')
    <footer>
        <p>Copyright &copy; 2016.Company name All rights reserved.More Templates</p>
    </footer>
    
    <script src="{{asset('resources/views/admin/style/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('resources/views/admin/style/js/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('resources/views/admin/style/js/custom-scripts.js')}}"></script>






    </body>

    </html>