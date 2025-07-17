     <div id="preloader-active">
      <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
          <div class="text-center"><img src="{{ asset('asset/imgs/template/loading.gif') }}" alt="jobBox"></div>
        </div>
      </div>
    </div>
{{--    <div class="modal fade" id="ModalApplyJobForm" tabindex="-1" aria-hidden="true">--}}
{{--      <div class="modal-dialog modal-lg">--}}
{{--        <div class="modal-content apply-job-form">--}}
{{--          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--          <div class="modal-body pl-30 pr-30 pt-50">--}}
{{--            <div class="text-center">--}}
{{--              <p class="font-sm text-brand-2">Job Application </p>--}}
{{--              <h2 class="mt-10 mb-5 text-brand-1 text-capitalize">Start your career today</h2>--}}
{{--              <p class="font-sm text-muted mb-30">Please fill in your information and send it to the employer.                   </p>--}}
{{--            </div>--}}
{{--            <form class="login-register text-start mt-20 pb-30" action="#">--}}
{{--              <div class="form-group">--}}
{{--                <label class="form-label" for="input-1">Full Name *</label>--}}
{{--                <input class="form-control" id="input-1" type="text" required="" name="fullname" placeholder="Steven Job">--}}
{{--              </div>--}}
{{--              <div class="form-group">--}}
{{--                <label class="form-label" for="input-2">Email *</label>--}}
{{--                <input class="form-control" id="input-2" type="email" required="" name="emailaddress" placeholder="stevenjob@gmail.com">--}}
{{--              </div>--}}
{{--              <div class="form-group">--}}
{{--                <label class="form-label" for="number">Contact Number *</label>--}}
{{--                <input class="form-control" id="number" type="text" required="" name="phone" placeholder="(+01) 234 567 89">--}}
{{--              </div>--}}
{{--              <div class="form-group">--}}
{{--                <label class="form-label" for="des">Description</label>--}}
{{--                <input class="form-control" id="des" type="text" required="" name="Description" placeholder="Your description...">--}}
{{--              </div>--}}
{{--              <div class="form-group">--}}
{{--                <label class="form-label" for="file">Upload Resume</label>--}}
{{--                <input class="form-control" id="file" name="resume" type="file">--}}
{{--              </div>--}}
{{--              <div class="login_footer form-group d-flex justify-content-between">--}}
{{--                <label class="cb-container">--}}
{{--                  <input type="checkbox"><span class="text-small">Agree our terms and policy</span><span class="checkmark"></span>--}}
{{--                </label><a class="text-muted" href="page-contact.html">Lean more</a>--}}
{{--              </div>--}}
{{--              <div class="form-group">--}}
{{--                <button class="btn btn-default hover-up w-100" type="submit" name="login">Apply Job</button>--}}
{{--              </div>--}}
{{--              <div class="text-muted text-center">Do you need support? <a href="page-contact.html">Contact Us</a></div>--}}
{{--            </form>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
    <header class="header sticky-bar">
      <div class="container">
        <div class="main-header">
          <div class="header-left">
            <div class="header-logo"><a class="d-flex" href="index.html"><img alt="jobBox" src="assets/imgs/template/jobhub-logo.svg"></a></div>
          </div>
          <div class="header-nav">
<<<<<<< HEAD
            <nav class="nav-main-menu"> 
                <ul class="main-menu"> 
                    <!-- Accueil -->
                    <li class="active {{ request()->routeIs('home.index') ? 'active' : '' }}">
                        <a href="{{ url('/') }}">Accueil</a>
                    </li>

                    <!-- Location (nom de route = location) -->
                    <li class="{{ request()->routeIs('location') ? 'active' : '' }}">
                        <a href="{{ route('location') }}">Location</a>
                    </li>

                    <!-- Offre (page statique .html dans public/) -->
                    <li class="active {{ request()->is('companies-grid.html') ? 'active' : '' }}">
                        <a href="{{ url('companies-grid.html') }}">Offre</a>
                    </li>

                    <!-- Actualités (page statique .html dans public/) -->
                    <li class="{{ request()->is('jobs-grid.html') ? 'active' : '' }}">
                        <a href="{{ url('jobs-grid.html') }}">Actualités</a>
                    </li>
                </ul>
=======
            <nav class="nav-main-menu">
                <ul class="main-menu">
                <li class=""><a class="active" href="index.html">Accueil</a>
                </li>
                 <li class=""><a href="companies-grid.html">Location</a>
                </li>
                <li class=""><a href="{{ route('offres') }}">Offre d'emploi & stage</a>

                </li>
                <li class=""><a href="candidates-grid.html">Evenements & concerts</a>
                
                </li>
                <li class=""><a href="blog-grid.html">Actualite</a>
               
                </li>
               
              </ul>
>>>>>>> 1473e24 (mis a jours du partie front-end)
            </nav>

            <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
          </div>
          <div class="header-right">
            <div class="block-signin"><a class="text-link-bd-btom hover-up" href="page-register.html">Register</a><a class="btn btn-default btn-shadow ml-40 hover-up" href="{{route('home.index')}}">Sign in</a></div>
          </div>
        </div>
      </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
      <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
          <div class="perfect-scroll">
            <div class="mobile-search mobile-header-border mb-30">
              <form action="#">
                <input type="text" placeholder="Search…"><i class="fi-rr-search"></i>
              </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
              <!-- mobile menu start-->
              <nav>
                <ul class="mobile-menu font-heading">
                <li class=""><a class="active" href="index.html">Accueil</a>
                </li>
                 <li class=""><a href="companies-grid.html">Location</a>
                </li>
                <li class=""><a href="jobs-grid.html">Offre d'emploi & stage</a>
                </li>
                <li class=""><a href="candidates-grid.html">Evenements & concerts</a>
                
                </li>
                <li class=""><a href="blog-grid.html">Actualite</a>
               
                </li>

                </ul>
              </nav>
            </div>
            <div class="mobile-account">
              <h6 class="mb-10">Your Account</h6>
              <ul class="mobile-menu font-heading">
                <li><a href="#">Profile</a></li>
                <li><a href="#">Work Preferences</a></li>
                <li><a href="#">Account Settings</a></li>
                <li><a href="#">Go Pro</a></li>
                <li><a href="page-signin.html">Sign Out</a></li>
              </ul>
            </div>
            <div class="site-copyright">Copyright 2022 &copy; JobBox. <br>Designed by AliThemes.</div>
          </div>
        </div>
      </div>
    </div>
    <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
      <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
          <div class="perfect-scroll">
            <div class="mobile-search mobile-header-border mb-30">
              <form action="#">
                <input type="text" placeholder="Search…"><i class="fi-rr-search"></i>
              </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
              <!-- mobile menu start-->
              <nav>
                <ul class="mobile-menu font-heading">
                <li class=""><a class="active" href="index.html">Accueil</a>
                </li>
                 <li class=""><a href="companies-grid.html">Location</a>
                </li>
                <li class=""><a href="jobs-grid.html">Offre d'emploi & stage</a>
                </li>
                <li class=""><a href="candidates-grid.html">Evenements & concerts</a>
                
                </li>
                <li class=""><a href="blog-grid.html">Actualite</a>
               
                </li>
                </ul>
              </nav>
            </div>
            <div class="mobile-account">
              <h6 class="mb-10">Your Account</h6>
              <ul class="mobile-menu font-heading">
                <li><a href="#">Profile</a></li>
                <li><a href="#">Work Preferences</a></li>
                <li><a href="#">Account Settings</a></li>
                <li><a href="#">Go Pro</a></li>
                <li><a href="page-signin.html">Sign Out</a></li>
              </ul>
            </div>
            <div class="site-copyright">Copyright 2022 &copy; JobBox. <br>Designed by AliThemes.</div>
          </div>
        </div>
      </div>
    </div>
