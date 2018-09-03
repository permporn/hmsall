<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <div class="collapse navbar-collapse">           
                <a class="navbar-brand page-scroll" href="#page-top">HMS BOOK STORE 
    <? //echo "**".$account_status;?></a>
                <!-- menu -->
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#" class="dropdown-toggle book_request_list" data-toggle="dropdown">หน้าแรก <!--<b class="caret">--></b></a>
                        <!--<ul class="dropdown-menu multi-level">
                            <li><a href="#"  class="add_request_book"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> สั่งซื้อหนังสือ</a></li>
                        </ul>-->
                    </li>
                    <?php if($account_status != "admin"){?>
                    <li>
                        <a href="#" class="dropdown-toggle book_store" data-toggle="dropdown">STORE <!--<b class="caret"></b>--></a>
                    </li>
                    <? }?>
                    <?php if($account_status == "admin"){?>
                    <li>
                        <a href="#" class="dropdown-toggle book_store_list" data-toggle="dropdown">คลังหนังสือ <!--<b class="caret"></b>--></a>
                        <!--<ul class="dropdown-menu multi-level">
                            <li><a href="#"><span class="glyphicon glyphicon-list book_store_list" aria-hidden="true"></span> รายการหนังสือ</a></li>
                            <li class="divider"></li>
                            <li><a href="#" class="add_book"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มหนังสือ</a></li>
                        </ul>-->
                    </li>
                    <? }?>
                </ul>
            </div>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                     <!--<li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>-->
                        
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>