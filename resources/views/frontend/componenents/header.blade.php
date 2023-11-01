<!--Header top area-->
<div class="header-top-area d-sm-none d-md-none d-lg-block style-two">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="header-top-left-items">
                    <div class="header-top-left-single-item">
                        <a href="#">
                            <div class="header-top-left-icon">
                                <span>
                                    <i class="far fa-envelope"></i>
                                    ministryofhealth@govlib.com
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="header-top-left-single-item">
                        <a href="#">
                            <div class="header-top-left-icon">
                                <span>
                                    <i class="fas fa-street-view"></i>
                                    1st Street.
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="header-top-right-items text-right">
                    <div class="header-top-right-icon-area">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-phone"></i>
                                    <span>+231886011550</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================================================-->
<!-- Start itsoft Main Menu Area -->
<!--==================================================-->
<div id="sticky-header" class="itsoft_nav_manu d-md-none d-lg-block d-sm-none d-none">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="logo"> 
                    <a href="">
                        <!-- <img src="assets/images/logo.png" alt="logo">
                        <img src="assets/images/footer/logo2.png" alt="logo"> -->
                        NHMARS
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <nav class="itsoft_menu">
                    <ul class="nav_scroll">
                        <li>
                            <a href="{{URL::TO('/')}}">Home</a>
                            
                        </li>
                        <li>
                            <a href="#">Healthcare Centers</a>
                            
                        </li>
                        
                        <li>
                            <a href="{{route('frontend.patient.index')}}">Patient's Report</a>
                            
                        </li>
                        
                        
                    </ul>
                    <div class="nav-btn  d-sm-none d-md-none d-lg-inline-block">
                        <a href="{{route('contact.index')}}">Contact us</a>
                    </div>			
                </nav>

            </div>
        </div>
    </div>
</div>

<!-- ITsoft Mobile Menu Area -->
    <div class="mobile-menu-area d-sm-block d-md-block d-lg-none ">
        <div class="mobile-menu">
            <nav class="itsoft_menu">
                <ul class="nav_scroll">
                    <li>
                        <a href="#">Home</a>
                    
                    </li>
                    <li>
                        <a href="#">Healthcare Center</a>
                    
                    </li>
                    <li>
                        <a href="{{route('frontend.patient.index')}}">Patient Report</a>
                    
                    </li>
                    
                    
                    
                    <li><a href="{{route('contact.index')}}">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
<!--==================================================-->