<!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Oman tourism guide</a>
                </div>
                
                
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" ><i class="fa fa-bell"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" ><i class="fa fa-user"></i> <?php echo $_SESSION['login-admin-name']; ?></a>
                    </li>
                    <li class="dropdown">
                        <a onclick="logout()" ><i class="fa fa-sign-out"></i></a>
                    </li>
                </ul>



                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class="active">
                            <a href="#"><i class="fa fa-fw fa-bar-chart-o"></i> place</a>
                        </li>
                        <li >
                            <a href="#"><i class="fa fa-fw fa-dashboard"></i> item</a>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#servicecollapse"><i class="fa fa-fw fa-arrows-v"></i> services <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="servicecollapse" class="collapse">
                                <li>
                                    <a href="#">services</a>
                                </li>
                                <li>
                                    <a href="#">service providers</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-table"></i> share area</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-edit"></i> destination's</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-desktop"></i> users feedback</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-desktop"></i> administration tools</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.navbar-collaps -->
            </nav>