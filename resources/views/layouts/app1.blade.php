<!DOCTYPE html>
<html lang="fr">
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
   @include('layouts.partials.css')
    <title>Jobbox Dashboard - Job Portal HTML Template </title>
</head>
<body>
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center"><img src="{{asset('admin/imgs/template/loading.gif')}}" alt="jobBox"></div>
        </div>
    </div>
</div>
@include('layouts.partials.navbare')
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

                            <li> <a class="dashboard2 " href="index.html"><img src="{{asset('admin/imgs/page/dashboard/dashboard.svg')}}" alt="jobBox"><span class="name">Dashboard</span></a></li>
                            <li class="has-children"><a class="active" href="index.html"><img src="{{asset('admin/imgs/page/dashboard/recruiters.svg')}}" alt="jobBox">Maison</a>
                                <ul class="sub-menu float-end">
                                    <li><a href="{{route('immobiliers.index')}}">Immeuble</a></li>
                                    <li><a href="{{route('chambres.index')}}">Chambre</a></li>
                                </ul>
                            </li>
                            <li> <a class="dashboard2 " href="candidates.html"><img src="{{asset('admin/imgs/page/dashboard/candidates.svg')}}" alt="jobBox"><span class="name">Candidates</span></a>
                            </li>

                            </li>
                            <li> <a class="dashboard2" href="my-job-grid.html"><img src="{{asset('admin/imgs/page/dashboard/jobs.svg')}}" alt="jobBox"><span class="name">My Jobs</span></a>
                            </li>
                            <li> <a class="dashboard2" href="my-tasks-list.html"><img src="{{asset('admin/imgs/page/dashboard/tasks.svg')}}" alt="jobBox"><span class="name">Tasks List</span></a>
                            </li>
                            <li> <a class="dashboard2" href="profile.html"><img src="{{asset('admin/imgs/page/dashboard/profiles.svg')}}" alt="jobBox"><span class="name">My Profiles</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>
<main class="main">
 @include('layouts.partials.sidebare')
    <div class="box-content">
        <div class="box-heading">
            <div class="box-title">
                <h3 class="mb-35">@yield('titre')</h3>
            </div>
            <div class="box-breadcrumb">

                @yield('page')
            </div>
        </div>
        @yield('content')
        <footer class="footer mt-20">
            @include('layouts.partials.footer')
        </footer>
    </div>
</main>
@include('layouts.partials.js')
@yield('scripts')
</body>
</html>
