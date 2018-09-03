<nav class="navbar navbar-default " role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand page-scroll btn-pay" id="btn-pay" href="#page-top">HMS PRO</a> -->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section 
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>-->
                    <?php if($account_status=='admin'){?>
                    <li class="btn_student_name_management" id="btn_student_name_management"><a class="page-scroll" >จัดการรายชื่อนักเรียน</a></li>
                    <li class="login_self_management" id="login_self_management"><a class="page-scroll" >จัดการการ Login SELF</a></li>
                    <?php } ?>
                    <!--<li>
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