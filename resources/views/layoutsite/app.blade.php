<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <link rel="manifest" href="manifest.json" crossorigin>
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin1/imgs/template/favicon.svg')}}">
    <link href="{{asset('admin1/css/style.css')}}" rel="stylesheet">

    <title>Jobbox Dashboard - Job Portal HTML Template </title>
</head>
<body>
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center"><img src="{{asset('admin1/imgs/template/loading.gif')}}" alt="jobBox"></div>
        </div>
    </div>
</div>

<div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
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
                        <ul class="main-menu">
                            <li> <a class="dashboard2 active" href="index.html"><img src="admin/imgs/page/dashboard/dashboard.svg" alt="jobBox"><span class="name">Dashboard</span></a>
                            </li>
                            <li> <a class="dashboard2" href="candidates.html"><img src="{{asset('admin1/imgs/page/dashboard/candidates.svg')}}" alt="jobBox"><span class="name">Candidates</span></a>
                            </li>
                            <li> <a class="dashboard2" href="recruiters.html"><img src="{{asset('admin1/imgs/page/dashboard/recruiters.svg')}}" alt="jobBox"><span class="name">Recruiters</span></a>
                            </li>
                            <li> <a class="dashboard2" href="my-job-grid.html"><img src="{{asset('admin1/imgs/page/dashboard/jobs.svg')}}" alt="jobBox"><span class="name">My Jobs</span></a>
                            </li>
                            <li> <a class="dashboard2" href="my-tasks-list.html"><img src="{{asset('admin1/imgs/page/dashboard/tasks.svg')}}" alt="jobBox"><span class="name">Tasks List</span></a>
                            </li>
                            <li> <a class="dashboard2" href="profile.html"><img src="{{asset('admin1/imgs/page/dashboard/profiles.svg')}}" alt="jobBox"><span class="name">My Profiles</span></a>
                            </li>
                            <li> <a class="dashboard2" href="my-resume.html"><img src="{{asset('admin1/imgs/page/dashboard/cv-manage.svg')}}" alt="jobBox"><span class="name">CV Manage</span></a>
                            </li>
                            <li> <a class="dashboard2" href="settings.html"><img src="{{asset('admin1/imgs/page/dashboard/settings.svg')}}" alt="jobBox"><span class="name">Setting</span></a>
                            </li>
                            <li> <a class="dashboard2" href="authentication.html"><img src="{{asset('admin1/imgs/page/dashboard/authentication.svg')}}" alt="jobBox"><span class="name">Authentication</span></a>
                            </li>
                            <li> <a class="dashboard2" href="login.html"><img src="{{asset('admin1/imgs/page/dashboard/logout.svg')}}" alt="jobBox"><span class="name">Logout</span></a>
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
                    <div class="mb-15 mt-15"> <a class="btn btn-default icon-edit hover-up" href="post-job.html">Post Job</a></div>
                </div>
                <div class="site-copyright">Copyright 2022 &copy; JobBox. <br>Designed by AliThemes.</div>
            </div>
        </div>
    </div>
</div>
<main class="main">
    <div class="nav"><a class="btn btn-expanded"></a>
        <nav class="nav-main-menu">
            <ul class="main-menu">
                <li> <a class="dashboard2 active" href="index.html"><img src="{{asset('admin1/imgs/page/dashboard/dashboard.svg')}}" alt="jobBox"><span class="name">Dashboard</span></a>
                </li>
                <li> <a class="dashboard2" href="candidates.html"><img src="{{asset('admin1/imgs/page/dashboard/candidates.svg')}}" alt="jobBox"><span class="name">Candidates</span></a>
                </li>
                <li> <a class="dashboard2" href="recruiters.html"><img src="{{asset('admin1/imgs/page/dashboard/recruiters.svg')}}" alt="jobBox"><span class="name">Recruiters</span></a>
                </li>
                <li> <a class="dashboard2" href="my-job-grid.html"><img src="{{asset('admin1/imgs/page/dashboard/jobs.svg')}}" alt="jobBox"><span class="name">My Jobs</span></a>
                </li>
                <li> <a class="dashboard2" href="my-tasks-list.html"><img src="{{asset('admin1/imgs/page/dashboard/tasks.svg')}}" alt="jobBox"><span class="name">Tasks List</span></a>
                </li>
                <li> <a class="dashboard2" href="profile.html"><img src="{{asset('admin1/imgs/page/dashboard/profiles.svg')}}" alt="jobBox"><span class="name">My Profiles</span></a>
                </li>
                <li> <a class="dashboard2" href="my-resume.html"><img src="{{asset('admin1/imgs/page/dashboard/cv-manage.svg')}}" alt="jobBox"><span class="name">CV Manage</span></a>
                </li>
                <li> <a class="dashboard2" href="settings.html"><img src="{{asset('admin1/imgs/page/dashboard/settings.svg')}}" alt="jobBox"><span class="name">Setting</span></a>
                </li>
                <li> <a class="dashboard2" href="authentication.html"><img src="{{asset('admin1/imgs/page/dashboard/authentication.svg')}}" alt="jobBox"><span class="name">Authentication</span></a>
                </li>
                <li> <a class="dashboard2" href="login.html"><img src="{{asset('admin1/imgs/page/dashboard/logout.svg')}}" alt="jobBox"><span class="name">Logout</span></a>
                </li>
            </ul>
        </nav>
        <div class="border-bottom mb-20 mt-20"></div>
        <div class="box-profile-completed text-center mb-30">
            <div id="circle-staticstic-demo"></div>
            <h6 class="mb-10">Profile Completed</h6>
            <p class="font-xs color-text-mutted">Please add detailed information to your profile. This will help you develop your career more quickly.</p>
        </div>
        <div class="sidebar-border-bg mt-50"><span class="text-grey">WE ARE</span><span class="text-hiring">HIRING</span>
            <p class="font-xxs color-text-paragraph mt-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae architecto</p>
            <div class="mt-15"><a class="btn btn-paragraph-2" href="#">Know More</a></div>
        </div>
    </div>
    <div class="box-content">
        <div class="box-heading">
            <div class="box-title">
                <h3 class="mb-35">Dashboard</h3>
            </div>
            <div class="box-breadcrumb">
                <div class="breadcrumbs">
                    <ul>
                        <li> <a class="icon-home" href="index.html">Admin</a></li>
                        <li><span>Dashboard</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-8 col-xl-7 col-lg-7">
                <div class="section-box">
                    <div class="row">
                        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-4 col-sm-6">
                            <div class="card-style-1 hover-up">
                                <div class="card-image"> <img src="{{asset('admin1/imgs/page/dashboard/computer.svg')}}" alt="jobBox"></div>
                                <div class="card-info">
                                    <div class="card-title">
                                        <h3>1568<span class="font-sm status up">25<span>%</span></span>
                                        </h3>
                                    </div>
                                    <p class="color-text-paragraph-2">Interview Schedules</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-4 col-sm-6">
                            <div class="card-style-1 hover-up">
                                <div class="card-image"> <img src="{{asset('admin1/imgs/page/dashboard/bank.svg')}}" alt="jobBox"></div>
                                <div class="card-info">
                                    <div class="card-title">
                                        <h3>284<span class="font-sm status up">5<span>%</span></span>
                                        </h3>
                                    </div>
                                    <p class="color-text-paragraph-2">Applied Jobs</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-4 col-sm-6">
                            <div class="card-style-1 hover-up">
                                <div class="card-image"> <img src="{{asset('admin1/imgs/page/dashboard/lamp.svg')}}" alt="jobBox"></div>
                                <div class="card-info">
                                    <div class="card-title">
                                        <h3>136<span class="font-sm status up">12<span>%</span></span>
                                        </h3>
                                    </div>
                                    <p class="color-text-paragraph-2">Task Bids Won</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-4 col-sm-6">
                            <div class="card-style-1 hover-up">
                                <div class="card-image"> <img src="{{asset('admin1/imgs/page/dashboard/headphone.svg')}}" alt="jobBox"></div>
                                <div class="card-info">
                                    <div class="card-title">
                                        <h3>985<span class="font-sm status up">5<span>%</span></span>
                                        </h3>
                                    </div>
                                    <p class="color-text-paragraph-2">Application Sent</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-4 col-sm-6">
                            <div class="card-style-1 hover-up">
                                <div class="card-image"> <img src="{{asset('admin1/imgs/page/dashboard/look.svg')}}" alt="jobBox"></div>
                                <div class="card-info">
                                    <div class="card-title">
                                        <h3>165<span class="font-sm status up">15<span>%</span></span>
                                        </h3>
                                    </div>
                                    <p class="color-text-paragraph-2">Profile Viewed</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-4 col-sm-6">
                            <div class="card-style-1 hover-up">
                                <div class="card-image"> <img src="{{asset('admin1/imgs/page/dashboard/open-file.svg')}}" alt="jobBox"></div>
                                <div class="card-info">
                                    <div class="card-title">
                                        <h3>2356<span class="font-sm status down">- 2%</span>
                                        </h3>
                                    </div>
                                    <p class="color-text-paragraph-2">New Messages</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-4 col-sm-6">
                            <div class="card-style-1 hover-up">
                                <div class="card-image"> <img src="{{asset('admin1/imgs/page/dashboard/doc.svg')}}" alt="jobBox"></div>
                                <div class="card-info">
                                    <div class="card-title">
                                        <h3>254<span class="font-sm status up">2<span>%</span></span>
                                        </h3>
                                    </div>
                                    <p class="color-text-paragraph-2">Articles Added</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-4 col-sm-6">
                            <div class="card-style-1 hover-up">
                                <div class="card-image"> <img src="{{asset('admin1/imgs/page/dashboard/man.svg')}}" alt="jobBox"></div>
                                <div class="card-info">
                                    <div class="card-title">
                                        <h3>548<span class="font-sm status up">48<span>%</span></span>
                                        </h3>
                                    </div>
                                    <p class="color-text-paragraph-2">CV Added</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-box">
                    <div class="container">
                        <div class="panel-white">
                            <div class="panel-head">
                                <h5>Vacancy Stats</h5><a class="menudrop" id="dropdownMenu2" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"></a>
                                <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end" aria-labelledby="dropdownMenu2">
                                    <li><a class="dropdown-item active" href="#">Add new</a></li>
                                    <li><a class="dropdown-item" href="#">Settings</a></li>
                                    <li><a class="dropdown-item" href="#">Actions</a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div id="chartdiv"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-box">
                    <div class="container">
                        <div class="panel-white">
                            <div class="panel-head">
                                <h5>Latest Jobs</h5><a class="menudrop" id="dropdownMenu3" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"></a>
                                <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end" aria-labelledby="dropdownMenu3">
                                    <li><a class="dropdown-item active" href="#">Add new</a></li>
                                    <li><a class="dropdown-item" href="#">Settings</a></li>
                                    <li><a class="dropdown-item" href="#">Actions</a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="card-style-2 hover-up">
                                    <div class="card-head">
                                        <div class="card-image"> <img src="{{asset('admin1/imgs/page/dashboard/img1.png')}}" alt="jobBox"></div>
                                        <div class="card-title">
                                            <h6>Senior Full Stack Engineer, Creator Success</h6><span class="job-type">Full time</span><span class="time-post">3mins ago</span><span class="location">New York, US</span>
                                        </div>
                                    </div>
                                    <div class="card-tags"> <a class="btn btn-tag">Figma</a><a class="btn btn-tag">Adobe XD</a>
                                    </div>
                                    <div class="card-price"><strong>$300</strong><span class="hour">/Hour</span></div>
                                </div>
                                <div class="card-style-2 hover-up">
                                    <div class="card-head">
                                        <div class="card-image"> <img src="{{asset('admin1/imgs/page/dashboard/img2.png')}}" alt="jobBox"></div>
                                        <div class="card-title">
                                            <h6>Senior Full Stack Engineer, Creator Success</h6><span class="job-type">Full time</span><span class="time-post">3mins ago</span><span class="location">Chicago, US</span>
                                        </div>
                                    </div>
                                    <div class="card-tags"> <a class="btn btn-tag">Figma</a><a class="btn btn-tag">Adobe XD</a><a class="btn btn-tag">PSD</a>
                                    </div>
                                    <div class="card-price"><strong>$650</strong><span class="hour">/Hour</span></div>
                                </div>
                                <div class="card-style-2 hover-up">
                                    <div class="card-head">
                                        <div class="card-image"> <img src="{{asset('admin1/imgs/page/dashboard/img3.png')}}" alt="jobBox"></div>
                                        <div class="card-title">
                                            <h6>Lead Product/UX/UI Designer Role</h6><span class="job-type">Full time</span><span class="time-post">3mins ago</span><span class="location">Paris, France</span>
                                        </div>
                                    </div>
                                    <div class="card-tags"> <a class="btn btn-tag">Figma</a><a class="btn btn-tag">Adobe XD</a><a class="btn btn-tag">PSD</a>
                                    </div>
                                    <div class="card-price"><strong>$1200</strong><span class="hour">/Hour</span></div>
                                </div>
                                <div class="card-style-2 hover-up">
                                    <div class="card-head">
                                        <div class="card-image"> <img src="{{asset('admin1/imgs/page/dashboard/img4.png')}}" alt="jobBox"></div>
                                        <div class="card-title">
                                            <h6>Marketing Graphic Designer</h6><span class="job-type">Full time</span><span class="time-post">3mins ago</span><span class="location">Tokyto, Japan</span>
                                        </div>
                                    </div>
                                    <div class="card-tags"> <a class="btn btn-tag">Figma</a><a class="btn btn-tag">Adobe XD</a><a class="btn btn-tag">PSD</a>
                                    </div>
                                    <div class="card-price"><strong>$580</strong><span class="hour">/Hour</span></div>
                                </div>
                                <div class="card-style-2 hover-up">
                                    <div class="card-head">
                                        <div class="card-image"> <img src="{{asset('admin1/imgs/page/dashboard/img5.png')}}" alt="jobBox"></div>
                                        <div class="card-title">
                                            <h6>Director, Product Design - Creator</h6><span class="job-type">Full time</span><span class="time-post">3mins ago</span><span class="location">Ha Noi, Vietnam</span>
                                        </div>
                                    </div>
                                    <div class="card-tags"> <a class="btn btn-tag">Figma</a><a class="btn btn-tag">Adobe XD</a><a class="btn btn-tag">PSD</a>
                                    </div>
                                    <div class="card-price"><strong>$1500</strong><span class="hour">/Hour</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-5 col-lg-5">
                <div class="section-box">
                    <div class="container">
                        <div class="panel-white">
                            <div class="panel-head">
                                <h5>Top Candidates</h5><a class="menudrop" id="dropdownMenu4" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"></a>
                                <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end" aria-labelledby="dropdownMenu4">
                                    <li><a class="dropdown-item active" href="#">Add new</a></li>
                                    <li><a class="dropdown-item" href="#">Settings</a></li>
                                    <li><a class="dropdown-item" href="#">Actions</a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="card-style-3 hover-up">
                                    <div class="card-image online"><img src="{{asset('admin1/imgs/page/dashboard/avata1.png')}}" alt="jobBox"></div>
                                    <div class="card-title">
                                        <h6>Robert Fox</h6><span class="job-position">UI/UX Designer</span>
                                    </div>
                                    <div class="card-location"> <span class="location">Chicago, US</span></div>
                                    <div class="card-rating"><img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <span class="font-xs color-text-mutted">
                           (65)</span></div>
                                </div>
                                <div class="card-style-3 hover-up">
                                    <div class="card-image online"><img src="{{asset('admin1/imgs/page/dashboard/avata2.png')}}" alt="jobBox"></div>
                                    <div class="card-title">
                                        <h6>Cody Fisher</h6><span class="job-position">Network Engineer</span>
                                    </div>
                                    <div class="card-location"> <span class="location">New York, US</span></div>
                                    <div class="card-rating"><img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <span class="font-xs color-text-mutted">
                           (65)</span></div>
                                </div>
                                <div class="card-style-3 hover-up">
                                    <div class="card-image online"><img src="{{asset('admin1/imgs/page/dashboard/avata3.png')}}" alt="jobBox"></div>
                                    <div class="card-title">
                                        <h6>Jane Cooper</h6><span class="job-position">Content Manager</span>
                                    </div>
                                    <div class="card-location"> <span class="location">Chicago, US</span></div>
                                    <div class="card-rating"><img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <span class="font-xs color-text-mutted">
                           (65)</span></div>
                                </div>
                                <div class="card-style-3 hover-up">
                                    <div class="card-image online"><img src="{{asset('admin1/imgs/page/dashboard/avata4.png')}}" alt="jobBox"></div>
                                    <div class="card-title">
                                        <h6>Jerome Bell</h6><span class="job-position">Frontend Developer</span>
                                    </div>
                                    <div class="card-location"> <span class="location">Chicago, US</span></div>
                                    <div class="card-rating"><img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <span class="font-xs color-text-mutted">
                           (65)</span></div>
                                </div>
                                <div class="card-style-3 hover-up">
                                    <div class="card-image online"><img src="{{asset('admin1/imgs/page/dashboard/avata5.png')}}" alt="jobBox"></div>
                                    <div class="card-title">
                                        <h6>Floyd Miles</h6><span class="job-position">NodeJS Dev</span>
                                    </div>
                                    <div class="card-location"> <span class="location">Chicago, US</span></div>
                                    <div class="card-rating"><img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <span class="font-xs color-text-mutted">
                           (65)</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-box">
                    <div class="container">
                        <div class="panel-white">
                            <div class="panel-head">
                                <h5>Top Recruiters</h5><a class="menudrop" id="dropdownMenu5" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"></a>
                                <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end" aria-labelledby="dropdownMenu5">
                                    <li><a class="dropdown-item active" href="#">Add new</a></li>
                                    <li><a class="dropdown-item" href="#">Settings</a></li>
                                    <li><a class="dropdown-item" href="#">Actions</a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 pr-5 pl-5">
                                        <div class="card-style-4 hover-up">
                                            <div class="d-flex">
                                                <div class="card-image"><img src="{{asset('admin1/imgs/page/dashboard/avata1.png')}}" alt="jobBox"></div>
                                                <div class="card-title">
                                                    <h6>Robert Fox</h6><img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star-none.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star-none.svg')}}" alt="jobBox"> <span class="font-xs color-text-mutted">
                                 (65)</span>
                                                </div>
                                            </div>
                                            <div class="card-location d-flex"><span class="location">Red, CA</span><span class="jobs-number">25 Open Jobs</span></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 pr-5 pl-5">
                                        <div class="card-style-4 hover-up">
                                            <div class="d-flex">
                                                <div class="card-image"><img src="{{asset('admin1/imgs/page/dashboard/avata2.png')}}" alt="jobBox"></div>
                                                <div class="card-title">
                                                    <h6>Cody Fisher</h6><img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star-none.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star-none.svg')}}" alt="jobBox"> <span class="font-xs color-text-mutted">
                                 (65)</span>
                                                </div>
                                            </div>
                                            <div class="card-location d-flex"><span class="location">Chicago, US</span><span class="jobs-number">25 Open Jobs</span></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 pr-5 pl-5">
                                        <div class="card-style-4 hover-up">
                                            <div class="d-flex">
                                                <div class="card-image"><img src="{{asset('admin1/imgs/page/dashboard/avata3.png')}}" alt="jobBox"></div>
                                                <div class="card-title">
                                                    <h6>Jane Cooper</h6><img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star-none.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star-none.svg')}}" alt="jobBox"> <span class="font-xs color-text-mutted">
                                 (65)</span>
                                                </div>
                                            </div>
                                            <div class="card-location d-flex"><span class="location">Austin, TX</span><span class="jobs-number">25 Open Jobs</span></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 pr-5 pl-5">
                                        <div class="card-style-4 hover-up">
                                            <div class="d-flex">
                                                <div class="card-image"><img src="{{asset('admin1/imgs/page/dashboard/avata4.png')}}" alt="jobBox"></div>
                                                <div class="card-title">
                                                    <h6>Jerome Bell</h6><img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star-none.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star-none.svg')}}" alt="jobBox"> <span class="font-xs color-text-mutted">
                                 (65)</span>
                                                </div>
                                            </div>
                                            <div class="card-location d-flex"><span class="location">Remote</span><span class="jobs-number">25 Open Jobs</span></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 pr-5 pl-5">
                                        <div class="card-style-4 hover-up">
                                            <div class="d-flex">
                                                <div class="card-image"><img src="{{asset('admin1/imgs/page/dashboard/avata5.png')}}" alt="jobBox"></div>
                                                <div class="card-title">
                                                    <h6>Floyd Miles</h6><img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star-none.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star-none.svg')}}" alt="jobBox"> <span class="font-xs color-text-mutted">
                                 (65)</span>
                                                </div>
                                            </div>
                                            <div class="card-location d-flex"><span class="location">Boston, US</span><span class="jobs-number">25 Open Jobs</span></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 pr-5 pl-5">
                                        <div class="card-style-4 hover-up">
                                            <div class="d-flex">
                                                <div class="card-image"><img src="{{asset('admin1/imgs/page/dashboard/avata1.png')}}" alt="jobBox"></div>
                                                <div class="card-title">
                                                    <h6>Devon Lane</h6><img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star-none.svg')}}" alt="jobBox"> <img src="{{asset('admin1/imgs/page/dashboard/star-none.svg')}}" alt="jobBox"> <span class="font-xs color-text-mutted">
                                 (65)</span>
                                                </div>
                                            </div>
                                            <div class="card-location d-flex"><span class="location">Chicago, US</span><span class="jobs-number">25 Open Jobs</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-box">
                    <div class="container">
                        <div class="panel-white">
                            <div class="panel-head">
                                <h5>Queries by search</h5><a class="menudrop" id="dropdownMenu6" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"></a>
                                <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end" aria-labelledby="dropdownMenu6">
                                    <li><a class="dropdown-item active" href="#">Add new</a></li>
                                    <li><a class="dropdown-item" href="#">Settings</a></li>
                                    <li><a class="dropdown-item" href="#">Actions</a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="card-style-5 hover-up">
                                    <div class="card-title">
                                        <h6 class="font-sm">Developer</h6>
                                    </div>
                                    <div class="card-progress">
                                        <div class="number font-sm">2635</div>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 100%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-style-5 hover-up">
                                    <div class="card-title">
                                        <h6 class="font-sm">UI/Ux Designer</h6>
                                    </div>
                                    <div class="card-progress">
                                        <div class="number font-sm">1658</div>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 90%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-style-5 hover-up">
                                    <div class="card-title">
                                        <h6 class="font-sm">Marketing</h6>
                                    </div>
                                    <div class="card-progress">
                                        <div class="number font-sm">1452</div>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 80%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-style-5 hover-up">
                                    <div class="card-title">
                                        <h6 class="font-sm">Content manager</h6>
                                    </div>
                                    <div class="card-progress">
                                        <div class="number font-sm">1325</div>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 70%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-style-5 hover-up">
                                    <div class="card-title">
                                        <h6 class="font-sm">Ruby on rain</h6>
                                    </div>
                                    <div class="card-progress">
                                        <div class="number font-sm">985</div>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 60%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-style-5 hover-up">
                                    <div class="card-title">
                                        <h6 class="font-sm">Human hunter</h6>
                                    </div>
                                    <div class="card-progress">
                                        <div class="number font-sm">920</div>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 50%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-style-5 hover-up">
                                    <div class="card-title">
                                        <h6 class="font-sm">Finance</h6>
                                    </div>
                                    <div class="card-progress">
                                        <div class="number font-sm">853</div>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-10">
            <div class="section-box">
                <div class="container">
                    <div class="panel-white pt-30 pb-30 pl-15 pr-15">
                        <div class="box-swiper">
                            <div class="swiper-container swiper-group-10">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"> <img src="{{asset('admin1/imgs/page/dashboard/microsoft.svg')}}" alt="jobBox"></div>
                                    <div class="swiper-slide"> <img src="{{asset('admin1/imgs/page/dashboard/sony.svg')}}" alt="jobBox"></div>
                                    <div class="swiper-slide"> <img src="{{asset('admin1/imgs/page/dashboard/acer.svg')}}" alt="jobBox"></div>
                                    <div class="swiper-slide"> <img src="{{asset('admin1/imgs/page/dashboard/nokia.svg')}}" alt="jobBox"></div>
                                    <div class="swiper-slide"> <img src="{{asset('admin1/imgs/page/dashboard/asus.svg')}}" alt="jobBox"></div>
                                    <div class="swiper-slide"> <img src="{{asset('admin1/imgs/page/dashboard/casio.svg')}}" alt="jobBox"></div>
                                    <div class="swiper-slide"> <img src="{{asset('admin1/imgs/page/dashboard/dell.svg')}}" alt="jobBox"></div>
                                    <div class="swiper-slide"> <img src="{{asset('admin1/imgs/page/dashboard/panasonic.svg')}}" alt="jobBox"></div>
                                    <div class="swiper-slide"> <img src="{{asset('admin1/imgs/page/dashboard/vaio.svg')}}" alt="jobBox"></div>
                                    <div class="swiper-slide"> <img src="{{asset('admin1/imgs/page/dashboard/sony.svg')}}" alt="jobBox"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer mt-20">
            <div class="container">
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 mb-25 text-center text-md-start">
                            <p class="font-sm color-text-paragraph-2">© 2022 - <a class="color-brand-2" href="https://themeforest.net/item/jobbox-job-portal-html-bootstrap-5-template/39217891" target="_blank">JobBox </a>Dashboard <span> Made by  </span><a class="color-brand-2" href="http://alithemes.com" target="_blank"> AliThemes</a></p>
                        </div>
                        <div class="col-md-6 col-sm-12 text-center text-md-end mb-25">
                            <ul class="menu-footer">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Policy</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</main>
<script src="{{asset('admin1/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('admin1/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('admin1/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
<script src="{{asset('admin1/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin1/js/plugins/waypoints.js')}}"></script>
<script src="{{asset('admin1/js/plugins/magnific-popup.js')}}"></script>
<script src="{{asset('admin1/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('admin1/js/plugins/select2.min.js')}}"></script>
<script src="{{asset('admin1/js/plugins/swiper-bundle.min.js')}}"></script>
<script src="{{asset('admin1/js/plugins/jquery.circliful.js')}}"></script>
<script src="{{asset('admin1/js/plugins/charts/index.js')}}"></script>
<script src="{{asset('admin1/js/plugins/charts/xy.js')}}"></script>
<script src="{{asset('admin1/js/plugins/charts/Animated.js')}}"></script>
<script src="{{asset('admin1/js/plugins/armcharts5-script.js')}}"></script>
<script src="{{asset('admin1/js/main.js?v=4.1')}}"></script>
</body>
</html>
