<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div id="full-width" class="container-fluid">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll home" id="home" href="#page-top">HMS REPORT</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section 
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>-->
                    <?php if($account_status=='admin'){?>
                    <!-- <li class="btn-pay" id="btn-pay">
                        <a class="page-scroll" >ใบเสร็จรับเงิน</a>
                    </li>
                    <li class="btn-pay-setting" id="btn-pay-setting">
                        <a class="page-scroll" >ตั้งค่า %</a>
                    </li> -->
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