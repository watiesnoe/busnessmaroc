@extends('layoutsite.site')
@section('content')
    <section class="section-box-2">
        <div class="container">
            <div class="banner-hero banner-single banner-single-bg">
                <div class="block-banner text-center">
                    <h3 class="wow animate__animated animate__fadeInUp"><span class="color-brand-2">22 Jobs</span> Available
                        Now</h3>
                    <div class="font-sm color-text-paragraph-2 mt-10 wow animate__animated animate__fadeInUp"
                        data-wow-delay=".1s">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero repellendus magni,
                        <br class="d-none d-xl-block">atque delectus molestias quis?</div>
                    <div class="form-find text-start mt-40 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <form>
                            <div class="box-industry">
                                <select class="form-input mr-10 select-active input-industry">
                                    <option value="0">Industry</option>
                                    <option value="1">Software</option>
                                    <option value="2">Finance</option>
                                    <option value="3">Recruting</option>
                                    <option value="4">Management</option>
                                    <option value="5">Advertising</option>
                                    <option value="6">Development</option>
                                </select>
                            </div>
                            <select class="form-input mr-10 select-active">
                                <option value="">Location</option>
                                <option value="AX">Aland Islands</option>
                                <option value="AF">Afghanistan</option>
                                <option value="AL">Albania</option>
                                <option value="DZ">Algeria</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                                <option value="AQ">Antarctica</option>
                                <option value="AG">Antigua and Barbuda</option>
                                <option value="AR">Argentina</option>
                                <option value="AM">Armenia</option>
                                <option value="AW">Aruba</option>
                                <option value="AU">Australia</option>
                                <option value="AT">Austria</option>
                                <option value="AZ">Azerbaijan</option>



                            </select>
                            <input class="form-input input-keysearch mr-10" type="text" placeholder="Your keyword... ">
                            <button class="btn btn-default btn-find font-sm">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
                <!-- Offres d'emploi -->
                <div class="row align-items-start">
                    <!-- Sidebar -->
                    <div class="col-lg-4 col-md-12 mb-4 order-1 order-lg-0">
                        <div class="card shadow rounded p-3 h-100">
                            <h5 class="bg-primary text-white text-center py-2 rounded">Secteurs d'activité</h5>
                            <div class="mt-3">
                                <ul class="list-unstyled">
                                    <li><label class="form-check"><input class="form-check-input me-2" type="checkbox">
                                            Technologie</label></li>
                                    <li><label class="form-check"><input class="form-check-input me-2" type="checkbox">
                                            Finance</label></li>
                                    <li><label class="form-check"><input class="form-check-input me-2" type="checkbox">
                                            Éducation</label></li>
                                    <li><label class="form-check"><input class="form-check-input me-2" type="checkbox">
                                            Santé</label></li>
                                    <li><label class="form-check"><input class="form-check-input me-2" type="checkbox">
                                            Tourisme</label></li>
                                    <li><label class="form-check"><input class="form-check-input me-2" type="checkbox">
                                            Commerce</label></li>
                                    <li><label class="form-check"><input class="form-check-input me-2" type="checkbox">
                                            Industrie</label></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Colonne principale -->
                    <div class="col-lg-8 col-md-12 mb-4 order-0 order-lg-1 ">
                        <div class="content-page">
                            <!-- Offres d'emploi -->
                            <div class="row g-4">
                                <!-- Carte 1 -->
                                <div class="col-12">
                                    <div class="card-grid-2 hover-up p-3 rounded shadow-sm">
                                        <div class="d-flex align-items-center mb-3">
                                            <img src="assets/imgs/brands/brand-2.png" class="me-3" alt="jobBox"
                                                style="width: 60px;">
                                            <div>
                                                <a class="fw-bold">Adobe Illustrator</a>
                                                <div class="text-muted small">New York, US</div>
                                            </div>
                                        </div>
                                        <h6><a href="{{ route('details_offre') }}">Recherche de stagiaire en
                                                developement
                                                web</a></h6>
                                        <div class="d-flex justify-content-between small text-muted mb-2">
                                            <span>Part time</span>
                                            <span>5 minutes ago</span>
                                        </div>
                                        <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit...</p>
                                        <div class="mb-3">
                                            <a class="btn btn-outline-secondary btn-sm rounded-pill me-2"
                                                href="#">React</a>
                                            <a class="btn btn-outline-secondary btn-sm rounded-pill"
                                                href="#">NodeJS</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Carte 2 -->
                                <div class="col-12">
                                    <div class="card-grid-2 hover-up p-3 rounded shadow-sm">
                                        <div class="d-flex align-items-center mb-3">
                                            <img src="assets/imgs/brands/brand-3.png" class="me-3" alt="jobBox"
                                                style="width: 60px;">
                                            <div>
                                                <a class="fw-bold">Bing Search</a>
                                                <div class="text-muted small">New York, US</div>
                                            </div>
                                        </div>
                                        <h6><a href="{{ route('details_offre') }}">Commercial(e) - Bamako</a></h6>
                                        <div class="d-flex justify-content-between small text-muted mb-2">
                                            <span>Full time</span>
                                            <span>6 minutes ago</span>
                                        </div>
                                        <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit...</p>
                                        <div class="mb-3">
                                            <a class="btn btn-outline-secondary btn-sm rounded-pill me-2"
                                                href="#">Python</a>
                                            <a class="btn btn-outline-secondary btn-sm rounded-pill me-2"
                                                href="#">AWS</a>
                                            <a class="btn btn-outline-secondary btn-sm rounded-pill"
                                                href="#">Photoshop</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Pagination -->
                            <div class="d-flex justify-content-center mt-4">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="section-box mt-50 mb-20">
        <div class="container">
            <div class="box-newsletter wow animate__animated animate__fadeInUp">
                <div class="row">
                    <div class="col-lg-12 col-xl-6 col-12 mx-auto text-center">
                        <h2 class="text-md-newsletter">Recevez les nouveautés en avant-première</h2>
                        <form class="form-newsletter mt-30">
                            <input class="input-newsletter" type="email" placeholder="Entrez votre adresse e-mail">
                            <button class="btn btn-default icon-send-letter">S'abonner</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
