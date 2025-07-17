@extends('layoutsite.site')
@section('content')
    <section class="section-box">
        <div class="banner-hero hero-2">
            <div class="banner-inner">
                <div class="block-banner">
                    <h1 class="text-42 color-white wow animate__animated animate__fadeInUp"><span
                            class="color-green">Trouvez</span><br class="d-none d-lg-block">une maison a louer un click</h1>
                    <div class="form-find mt-40 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
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
                                <option value="BS">Bahamas</option>
                                <option value="BH">Bahrain</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BB">Barbados</option>
                                <option value="BY">Belarus</option>
                                <option value="PW">Belau</option>
                                <option value="BE">Belgium</option>
                                <option value="BZ">Belize</option>
                                <option value="BJ">Benin</option>
                                <option value="BM">Bermuda</option>
                                <option value="BT">Bhutan</option>
                                <option value="BO">Bolivia</option>
                                <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                <option value="BA">Bosnia and Herzegovina</option>
                                <option value="BW">Botswana</option>
                                <option value="BV">Bouvet Island</option>
                                <option value="BR">Brazil</option>
                                <option value="IO">British Indian Ocean Territory</option>
                                <option value="VG">British Virgin Islands</option>
                                <option value="BN">Brunei</option>
                                <option value="BG">Bulgaria</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BI">Burundi</option>
                                <option value="KH">Cambodia</option>
                                <option value="CM">Cameroon</option>
                                <option value="CA">Canada</option>
                                <option value="CV">Cape Verde</option>
                                <option value="KY">Cayman Islands</option>
                                <option value="CF">Central African Republic</option>
                                <option value="TD">Chad</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CX">Christmas Island</option>
                                <option value="CC">Cocos (Keeling) Islands</option>
                                <option value="CO">Colombia</option>
                                <option value="KM">Comoros</option>
                                <option value="CG">Congo (Brazzaville)</option>
                                <option value="CD">Congo (Kinshasa)</option>
                                <option value="CK">Cook Islands</option>
                                <option value="CR">Costa Rica</option>
                                <option value="HR">Croatia</option>
                                <option value="CU">Cuba</option>
                                <option value="CW">Cura&Ccedil;ao</option>
                                <option value="CY">Cyprus</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="DK">Denmark</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DM">Dominica</option>
                                <option value="DO">Dominican Republic</option>
                                <option value="EC">Ecuador</option>
                                <option value="EG">Egypt</option>
                                <option value="SV">El Salvador</option>
                                <option value="GQ">Equatorial Guinea</option>
                                <option value="ER">Eritrea</option>
                                <option value="EE">Estonia</option>
                                <option value="ET">Ethiopia</option>
                                <option value="FK">Falkland Islands</option>
                                <option value="FO">Faroe Islands</option>
                                <option value="FJ">Fiji</option>
                                <option value="FI">Finland</option>
                                <option value="FR">France</option>
                                <option value="GF">French Guiana</option>
                                <option value="PF">French Polynesia</option>
                                <option value="TF">French Southern Territories</option>
                                <option value="GA">Gabon</option>
                                <option value="GM">Gambia</option>
                                <option value="GE">Georgia</option>
                                <option value="DE">Germany</option>
                                <option value="GH">Ghana</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GR">Greece</option>
                                <option value="GL">Greenland</option>
                                <option value="GD">Grenada</option>
                                <option value="GP">Guadeloupe</option>
                                <option value="GT">Guatemala</option>
                                <option value="GG">Guernsey</option>
                                <option value="GN">Guinea</option>
                                <option value="GW">Guinea-Bissau</option>
                                <option value="GY">Guyana</option>
                                <option value="HT">Haiti</option>
                                <option value="HM">Heard Island and McDonald Islands</option>
                                <option value="HN">Honduras</option>
                                <option value="HK">Hong Kong</option>
                                <option value="HU">Hungary</option>
                                <option value="IS">Iceland</option>
                                <option value="IN">India</option>
                                <option value="ID">Indonesia</option>
                                <option value="IR">Iran</option>
                                <option value="IQ">Iraq</option>
                                <option value="IM">Isle of Man</option>
                                <option value="IL">Israel</option>
                                <option value="IT">Italy</option>
                                <option value="CI">Ivory Coast</option>
                                <option value="JM">Jamaica</option>
                                <option value="JP">Japan</option>
                                <option value="JE">Jersey</option>
                                <option value="JO">Jordan</option>
                                <option value="KZ">Kazakhstan</option>
                                <option value="KE">Kenya</option>
                                <option value="KI">Kiribati</option>
                                <option value="KW">Kuwait</option>
                                <option value="KG">Kyrgyzstan</option>
                                <option value="LA">Laos</option>
                                <option value="LV">Latvia</option>
                                <option value="LB">Lebanon</option>
                                <option value="LS">Lesotho</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libya</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LT">Lithuania</option>
                                <option value="LU">Luxembourg</option>
                                <option value="MO">Macao S.A.R., China</option>
                                <option value="MK">Macedonia</option>
                                <option value="MG">Madagascar</option>
                                <option value="MW">Malawi</option>
                                <option value="MY">Malaysia</option>
                                <option value="MV">Maldives</option>
                                <option value="ML">Mali</option>
                                <option value="MT">Malta</option>
                                <option value="MH">Marshall Islands</option>
                                <option value="MQ">Martinique</option>
                                <option value="MR">Mauritania</option>
                                <option value="MU">Mauritius</option>
                                <option value="YT">Mayotte</option>
                                <option value="MX">Mexico</option>
                                <option value="FM">Micronesia</option>
                                <option value="MD">Moldova</option>
                                <option value="MC">Monaco</option>
                                <option value="MN">Mongolia</option>
                                <option value="ME">Montenegro</option>
                                <option value="MS">Montserrat</option>
                                <option value="MA">Morocco</option>
                                <option value="MZ">Mozambique</option>
                                <option value="MM">Myanmar</option>
                                <option value="NA">Namibia</option>
                                <option value="NR">Nauru</option>
                                <option value="NP">Nepal</option>
                                <option value="NL">Netherlands</option>
                                <option value="AN">Netherlands Antilles</option>
                                <option value="NC">New Caledonia</option>
                                <option value="NZ">New Zealand</option>
                                <option value="NI">Nicaragua</option>
                                <option value="NE">Niger</option>
                                <option value="NG">Nigeria</option>
                                <option value="NU">Niue</option>
                                <option value="NF">Norfolk Island</option>
                                <option value="KP">North Korea</option>
                                <option value="NO">Norway</option>
                                <option value="OM">Oman</option>
                                <option value="PK">Pakistan</option>
                                <option value="PS">Palestinian Territory</option>
                                <option value="PA">Panama</option>
                                <option value="PG">Papua New Guinea</option>
                                <option value="PY">Paraguay</option>
                                <option value="PE">Peru</option>
                                <option value="PH">Philippines</option>
                                <option value="PN">Pitcairn</option>
                                <option value="PL">Poland</option>
                                <option value="PT">Portugal</option>
                                <option value="QA">Qatar</option>
                                <option value="IE">Republic of Ireland</option>
                                <option value="RE">Reunion</option>
                                <option value="RO">Romania</option>
                                <option value="RU">Russia</option>
                                <option value="RW">Rwanda</option>
                                <option value="ST">S&atilde;o Tom&eacute; and Pr&iacute;ncipe</option>
                                <option value="BL">Saint Barth&eacute;lemy</option>
                                <option value="SH">Saint Helena</option>
                                <option value="KN">Saint Kitts and Nevis</option>
                                <option value="LC">Saint Lucia</option>
                                <option value="SX">Saint Martin (Dutch part)</option>
                                <option value="MF">Saint Martin (French part)</option>
                                <option value="PM">Saint Pierre and Miquelon</option>
                                <option value="VC">Saint Vincent and the Grenadines</option>
                                <option value="SM">San Marino</option>
                                <option value="SA">Saudi Arabia</option>
                                <option value="SN">Senegal</option>
                                <option value="RS">Serbia</option>
                                <option value="SC">Seychelles</option>
                                <option value="SL">Sierra Leone</option>
                                <option value="SG">Singapore</option>
                                <option value="SK">Slovakia</option>
                                <option value="SI">Slovenia</option>
                                <option value="SB">Solomon Islands</option>
                                <option value="SO">Somalia</option>
                                <option value="ZA">South Africa</option>
                                <option value="GS">South Georgia/Sandwich Islands</option>
                                <option value="KR">South Korea</option>
                                <option value="SS">South Sudan</option>
                                <option value="ES">Spain</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="SD">Sudan</option>
                                <option value="SR">Suriname</option>
                                <option value="SJ">Svalbard and Jan Mayen</option>
                                <option value="SZ">Swaziland</option>
                                <option value="SE">Sweden</option>
                                <option value="CH">Switzerland</option>
                                <option value="SY">Syria</option>
                                <option value="TW">Taiwan</option>
                                <option value="TJ">Tajikistan</option>
                                <option value="TZ">Tanzania</option>
                                <option value="TH">Thailand</option>
                                <option value="TL">Timor-Leste</option>
                                <option value="TG">Togo</option>
                                <option value="TK">Tokelau</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad and Tobago</option>
                                <option value="TN">Tunisia</option>
                                <option value="TR">Turkey</option>
                                <option value="TM">Turkmenistan</option>
                                <option value="TC">Turks and Caicos Islands</option>
                                <option value="TV">Tuvalu</option>
                                <option value="UG">Uganda</option>
                                <option value="UA">Ukraine</option>
                                <option value="AE">United Arab Emirates</option>
                                <option value="GB">United Kingdom (UK)</option>
                                <option value="US">USA (US)</option>
                                <option value="UY">Uruguay</option>
                                <option value="UZ">Uzbekistan</option>
                                <option value="VU">Vanuatu</option>
                                <option value="VA">Vatican</option>
                                <option value="VE">Venezuela</option>
                                <option value="VN">Vietnam</option>
                                <option value="WF">Wallis and Futuna</option>
                                <option value="EH">Western Sahara</option>
                                <option value="WS">Western Samoa</option>
                                <option value="YE">Yemen</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabwe</option>
                            </select>
                            <input class="form-input input-keysearch mr-10" type="text"
                                placeholder="Your keyword... ">
                            <button class="btn btn-default btn-find font-sm">Search</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="section-box mt-50">
        <div class="section-box wow animate__animated animate__fadeIn">
            <div class="container">
                <div class="text-start">
                    <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp text-center" >Nos top annonces à la une</h2>
                    <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Search and connect with the right candidates faster.</p>
                </div>
                <div class="box-swiper mt-50">
                    <div class="swiper-container swiper-group-6 mh-none swiper">
                        <div class="swiper-wrapper pb-70 pt-5">
                            @foreach($annoncesVedette as $annonce)
                                <div class="swiper-slide hover-up">
                                    <div class="card-grid-5 card-category hover-up" style="background-image: url('{{ asset('storage/' . ($annonce->photos->first()->url ?? 'default.jpg')) }}')">
                                        <a href="{{ route('immobiliers.show', $annonce->id) }}">
                                            <div class="box-cover-img">
                                                <div class="content-bottom">
                                                    <h6 class="color-white mb-5">{{ $annonce->titre }}</h6>
                                                    <p class="color-white font-xs">
                                                        <span>{{ number_format($annonce->prix, 0, ',', ' ') }} MAD</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                           
        
                        </div>
                    </div>
                    <div class="swiper-button-next swiper-button-next-1"></div>
                    <div class="swiper-button-prev swiper-button-prev-1"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-box mt-30">
        <div class="container">
            <div class="text-start">
                <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Jobs of the day</h2>
                <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Search and connect with
                    the right candidates faster.</p>
                {{-- <div class="list-tabs mt-40">
                    <ul class="nav nav-tabs" role="tablist">
                        <li><a class="active" id="nav-tab-job-1" href="#tab-job-1" data-bs-toggle="tab" role="tab" aria-controls="tab-job-1" aria-selected="true"><img src="assets/imgs/page/homepage1/management.svg" alt="jobBox"> Management</a></li>
                        <li><a id="nav-tab-job-2" href="#tab-job-2" data-bs-toggle="tab" role="tab" aria-controls="tab-job-2" aria-selected="false"><img src="assets/imgs/page/homepage1/marketing.svg" alt="jobBox"> Marketing &amp; Sale</a></li>
                        <li><a id="nav-tab-job-3" href="#tab-job-3" data-bs-toggle="tab" role="tab" aria-controls="tab-job-3" aria-selected="false"><img src="assets/imgs/page/homepage1/finance.svg" alt="jobBox"> Finance</a></li>
                        <li><a id="nav-tab-job-4" href="#tab-job-4" data-bs-toggle="tab" role="tab" aria-controls="tab-job-4" aria-selected="false"><img src="assets/imgs/page/homepage1/human.svg" alt="jobBox"> Human Resource</a></li>
                        <li><a id="nav-tab-job-5" href="#tab-job-5" data-bs-toggle="tab" role="tab" aria-controls="tab-job-5" aria-selected="false"><img src="assets/imgs/page/homepage1/retail.svg" alt="jobBox"> Retail &amp; Products</a></li>
                        <li><a id="nav-tab-job-6" href="#tab-job-6" data-bs-toggle="tab" role="tab" aria-controls="tab-job-6" aria-selected="false"><img src="assets/imgs/page/homepage1/content.svg" alt="jobBox"> Content Writer</a></li>
                    </ul>
                </div> --}}
            </div>
            <div class="mt-50">
                <div class="tab-content" id="myTabContent-1">
                    <div class="tab-pane fade show active" id="tab-job-1" role="tabpanel" aria-labelledby="tab-job-1">
                        <div class="row">
<<<<<<< HEAD
                            @foreach($immobiliers as $immobilier)

                                 <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 grid-bd-16 hover-up">
                                        @if(strtolower($immobilier->category->nom)!=='chambre')
                                            <div class="card-grid-2-image"><span class="lbl-hot bg-green">
                                                <span>{{$immobilier->category->nom}}</span></span>
                                                <div class="image-box">
                                                    <figure><img src="{{asset('storage/'.$immobilier->photos[0]->url)}}" height="300" alt="jobBox"></figure>
                                                </div>
                                            </div>
                                            <div class="card-block-info">
                                                <h5><a href="job-details.html">{{ $immobilier->titre }}</a></h5>
                                                <div class="mt-5"><span class="card-location mr-15">{{ $immobilier->ville.'/'. $immobilier->quartier }}</span><span class="card-time">3 mins ago</span></div>
                                                <div class="card-2-bottom mt-20">
                                                    <div class="row">
                                                        <div class="col-xl-7 col-md-7 mb-2"><a class="btn btn-tags-sm mr-5" href="jobs-grid.html">Figma</a><a class="btn btn-tags-sm mr-5" href="jobs-grid.html">Adobe XD</a>
                                                        </div>
                                                        @if($immobilier->chambres->isNotEmpty())

                                                             <div class="col-xl-5 col-md-5 text-lg-end"><span class="card-text-price">{{ $immobilier->prix}}</span><span class="text-muted">/Mois</span></div>
                                                        @else
                                                            Aucune chambre
                                                        @endif

                                                    </div>
                                                </div>
                                                <p class="font-sm color-text-paragraph mt-20">{{ $immobilier->description }}</p>
                                            </div>
                                        @endif
=======
                            @foreach ($immobiliers as $immobilier)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 grid-bd-16 hover-up">
                                        <div class="card-grid-2-image"><span
                                                class="lbl-hot bg-green"><span>Freelancer</span></span>
                                            <div class="image-box">
                                                <figure><img
                                                        src="{{ asset('storage/' . $immobilier->images[0]->typeimage) }}"
                                                        alt="jobBox"></figure>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h5><a href="job-details.html">React Native Web aminata</a></h5>
                                            <div class="mt-5"><span class="card-location mr-15">New York, US</span><span
                                                    class="card-time">3 mins ago</span></div>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-xl-7 col-md-7 mb-2"><a class="btn btn-tags-sm mr-5"
                                                            href="jobs-grid.html">Figma</a><a class="btn btn-tags-sm mr-5"
                                                            href="jobs-grid.html">Adobe XD</a>
                                                    </div>
                                                    <div class="col-xl-5 col-md-5 text-lg-end"><span
                                                            class="card-text-price">$90 - $120</span><span
                                                            class="text-muted">/Hour</span></div>
                                                </div>
                                            </div>
                                            <p class="font-sm color-text-paragraph mt-20">Lorem ipsum dolor sit amet,
                                                consectetur adipisicing elit. Recusandae architecto eveniet, dolor quo
                                                repellendus pariatur</p>
                                        </div>
>>>>>>> 1473e24 (mis a jours du partie front-end)
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
<<<<<<< HEAD

    <section class="section-box mt-50">
        <div class="container">
            <div class="text-start">
                <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Location par Chambre</h2>
                <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Find your favourite jobs and get the benefits of yourself</p>
            </div>
            <div class="container">
                <div class="row mt-50">
                    @foreach($immobiliers as $immobi)
                        @if(strtolower($immobi->category->nom)==='chambre')
                            <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
                                <div class="card-image-top hover-up"><a href="jobs-grid.html">
                                        <div class="image" style="background-image: url('{{ asset('storage/' . ($immobi->photos->first()->url ?? 'default.jpg')) }}')"><span class="lbl-hot">Hot</span></div></a>
                                    <div class="informations"><a href="jobs-grid.html">
                                            <h5>Paris, France</h5></a>
                                        <div class="row">
                                            <div class="col-lg-6 col-6"><span class="text-14 color-text-paragraph-2">5 Vacancy</span></div>
                                            <div class="col-lg-6 col-6 text-end"><span class="color-text-paragraph-2 text-14">120 companies</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    
=======
    <!-- Autres services -->
    <section class="section-box mt-50">
        <div class="container">
            <h2 class="section-title text-center mb-50 wow animate__animated animate__fadeInUp">Autres services disponibles
            </h2>
            <div class="row text-center">
                <div class="col-md-4 wow animate__animated animate__zoomIn" data-wow-delay=".1s">
                    <div class="card shadow-lg p-4 rounded-4 border-0 h-100">
                        <img src="https://source.unsplash.com/400x250/?furniture" class="img-fluid rounded-3 mb-3"
                            alt="Meubles">
                        <h5>Meubles à louer</h5>
                        <p class="text-muted">Louez des meubles de qualité pour votre chambre ou appartement.</p>
                        <a href="#" class="btn btn-sm btn-outline-primary mt-2">Voir plus</a>
                    </div>
                </div>
                <div class="col-md-4 wow animate__animated animate__zoomIn" data-wow-delay=".2s">
                    <div class="card shadow-lg p-4 rounded-4 border-0 h-100">
                        <img src="https://source.unsplash.com/400x250/?job,internship" class="img-fluid rounded-3 mb-3"
                            alt="Stage et emploi">
                        <h5>Stages & Emplois</h5>
                        <p class="text-muted">Consultez les dernières offres de stages et d'emplois pour étudiants.</p>
                        <a href="#" class="btn btn-sm btn-outline-success mt-2">Voir offres</a>
                    </div>
                </div>
                <div class="col-md-4 wow animate__animated animate__zoomIn" data-wow-delay=".3s">
                    <div class="card shadow-lg p-4 rounded-4 border-0 h-100">
                        <img src="https://source.unsplash.com/400x250/?concert,tickets" class="img-fluid rounded-3 mb-3"
                            alt="Concerts et tickets">
                        <h5>Tickets & Évènements</h5>
                        <p class="text-muted">Achetez vos tickets de concert et restez informé des événements à venir.</p>
                        <a href="#" class="btn btn-sm btn-outline-danger mt-2">Acheter billet</a>
                    </div>
>>>>>>> 1473e24 (mis a jours du partie front-end)
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
