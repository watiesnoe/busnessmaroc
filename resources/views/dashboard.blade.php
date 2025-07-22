@extends('layoutsite.site')
@section('content')

    <section class="section-box">
        <div class="banner-hero hero-2">
            <div class="banner-inner">
                <div class="block-banner">
                    <h1 class="text-42 color-white wow animate__animated animate__fadeInUp"><span class="color-green">Trouvez</span><br class="d-none d-lg-block">une maison a louer un click</h1>
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
                            <input class="form-input input-keysearch mr-10" type="text" placeholder="Your keyword... ">
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
                <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Search and connect with the right candidates faster.</p>
                <div class="list-tabs mt-40">
                    <ul class="nav nav-tabs" role="tablist">
                        <li><a class="active" id="nav-tab-job-1" href="#tab-job-1" data-bs-toggle="tab" role="tab" aria-controls="tab-job-1" aria-selected="true"><img src="assets/imgs/page/homepage1/management.svg" alt="jobBox"> Management</a></li>
                        <li><a id="nav-tab-job-2" href="#tab-job-2" data-bs-toggle="tab" role="tab" aria-controls="tab-job-2" aria-selected="false"><img src="assets/imgs/page/homepage1/marketing.svg" alt="jobBox"> Marketing &amp; Sale</a></li>
                        <li><a id="nav-tab-job-3" href="#tab-job-3" data-bs-toggle="tab" role="tab" aria-controls="tab-job-3" aria-selected="false"><img src="assets/imgs/page/homepage1/finance.svg" alt="jobBox"> Finance</a></li>
                        <li><a id="nav-tab-job-4" href="#tab-job-4" data-bs-toggle="tab" role="tab" aria-controls="tab-job-4" aria-selected="false"><img src="assets/imgs/page/homepage1/human.svg" alt="jobBox"> Human Resource</a></li>
                        <li><a id="nav-tab-job-5" href="#tab-job-5" data-bs-toggle="tab" role="tab" aria-controls="tab-job-5" aria-selected="false"><img src="assets/imgs/page/homepage1/retail.svg" alt="jobBox"> Retail &amp; Products</a></li>
                        <li><a id="nav-tab-job-6" href="#tab-job-6" data-bs-toggle="tab" role="tab" aria-controls="tab-job-6" aria-selected="false"><img src="assets/imgs/page/homepage1/content.svg" alt="jobBox"> Content Writer</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-50">
                <div class="tab-content" id="myTabContent-1">
                    <div class="tab-pane fade show active" id="tab-job-1" role="tabpanel" aria-labelledby="tab-job-1">
                        <div class="row">
                            @foreach($immobiliers as $immobilier)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 grid-bd-16 hover-up">
                                        @if(strtolower($immobilier->category->nom) !== 'chambre')
                                            <div class="card-grid-2-image">
                                                <span class="lbl-hot bg-green">
                                                    <span>{{ $immobilier->category->nom }}</span>
                                                </span>
                                                <div class="image-box">
                                                    <a href="{{ route('immobilier.detail', $immobilier->id) }}">
                                                        <figure>
                                                            <img src="{{ asset('storage/' . $immobilier->photos[0]->url) }}" height="300" alt="jobBox">
                                                        </figure>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="card-block-info">
                                                <h5>
                                                    <a href="{{ route('immobilier.detail', $immobilier->id) }}">{{ $immobilier->titre }}</a>
                                                </h5>
                                                <div class="mt-5">
                                                    <span class="card-location mr-15">{{ $immobilier->ville . '/' . $immobilier->quartier }}</span>
                                                    <span class="card-time">3 mins ago</span>
                                                </div>
                                                <div class="card-2-bottom mt-20">
                                                    <div class="row">
                                                        <div class="col-xl-7 col-md-7 mb-2">
                                                            <a class="btn btn-tags-sm mr-5" href="{{ route('immobilier.detail', $immobilier->id) }}">Figma</a>
                                                            <a class="btn btn-tags-sm mr-5" href="{{ route('immobilier.detail', $immobilier->id) }}">Adobe XD</a>
                                                        </div>

                                                        @if($immobilier->chambres->isNotEmpty())
                                                            <div class="col-xl-5 col-md-5 text-lg-end">
                                                                <span class="card-text-price">{{ $immobilier->prix }}</span>
                                                                <span class="text-muted">/Mois</span>
                                                            </div>
                                                        @else
                                                            Aucune chambre
                                                        @endif
                                                    </div>
                                                </div>
                                                <p class="font-sm color-text-paragraph mt-20">{{ $immobilier->description }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

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

                </div>
            </div>
        </div>
    </section>
    <section class="section-box overflow-visible mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="text-center">
                        <h1 class="color-brand-2"><span class="count">25</span><span> K+</span></h1>
                        <h5>Completed Cases</h5>
                        <p class="font-sm color-text-paragraph mt-10">We always provide people a <br class="d-none d-lg-block">complete solution upon focused of<br class="d-none d-lg-block"> any business</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="text-center">
                        <h1 class="color-brand-2"><span class="count">17</span><span> +</span></h1>
                        <h5>Our Office</h5>
                        <p class="font-sm color-text-paragraph mt-10">We always provide people a <br class="d-none d-lg-block">complete solution upon focused of <br class="d-none d-lg-block">any business</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="text-center">
                        <h1 class="color-brand-2"><span class="count">86</span><span> +</span></h1>
                        <h5>Skilled People</h5>
                        <p class="font-sm color-text-paragraph mt-10">We always provide people a <br class="d-none d-lg-block">complete solution upon focused of <br class="d-none d-lg-block">any business</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="text-center">
                        <h1 class="color-brand-2"><span class="count">28</span><span> +</span></h1>
                        <h5>CHappy Clients</h5>
                        <p class="font-sm color-text-paragraph mt-10">We always provide people a <br class="d-none d-lg-block">complete solution upon focused of <br class="d-none d-lg-block">any business</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-box mt-50 mb-50">
        <div class="container">
            <div class="text-start">
                <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">News and Blog</h2>
                <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Get the latest news, updates and tips</p>
            </div>
        </div>
        <div class="container">
            <div class="mt-50">
                <div class="box-swiper style-nav-top">
                    <div class="swiper-container swiper-group-3 swiper">
                        <div class="swiper-wrapper pb-70 pt-5">
                            <div class="swiper-slide">
                                <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                                    <div class="text-center card-grid-3-image"><a href="#">
                                            <figure><img alt="jobBox" src="assets/imgs/page/homepage1/img-news1.png"></figure></a></div>
                                    <div class="card-block-info">
                                        <div class="tags mb-15"><a class="btn btn-tag" href="blog-grid.html">News</a></div>
                                        <h5><a href="blog-details.html">21 Job Interview Tips: How To Make a Great Impression</a></h5>
                                        <p class="mt-10 color-text-paragraph font-sm">Our mission is to create the world&amp;rsquo;s most sustainable healthcare company by creating high-quality healthcare products in iconic, sustainable packaging.</p>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-6 col-6">
                                                    <div class="d-flex"><img class="img-rounded" src="assets/imgs/page/homepage1/user1.png" alt="jobBox">
                                                        <div class="info-right-img"><span class="font-sm font-bold color-brand-1 op-70">Sarah Harding</span><br><span class="font-xs color-text-paragraph-2">06 September</span></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 text-end col-6 pt-15"><span class="color-text-paragraph-2 font-xs">8 mins to read</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                                    <div class="text-center card-grid-3-image"><a href="#">
                                            <figure><img alt="jobBox" src="assets/imgs/page/homepage1/img-news2.png"></figure></a></div>
                                    <div class="card-block-info">
                                        <div class="tags mb-15"><a class="btn btn-tag" href="blog-grid.html">Events</a></div>
                                        <h5><a href="blog-details.html">39 Strengths and Weaknesses To Discuss in a Job Interview</a></h5>
                                        <p class="mt-10 color-text-paragraph font-sm">Our mission is to create the world&amp;rsquo;s most sustainable healthcare company by creating high-quality healthcare products in iconic, sustainable packaging.</p>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-6 col-6">
                                                    <div class="d-flex"><img class="img-rounded" src="assets/imgs/page/homepage1/user2.png" alt="jobBox">
                                                        <div class="info-right-img"><span class="font-sm font-bold color-brand-1 op-70">Steven Jobs</span><br><span class="font-xs color-text-paragraph-2">06 September</span></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 text-end col-6 pt-15"><span class="color-text-paragraph-2 font-xs">6 mins to read</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                                    <div class="text-center card-grid-3-image"><a href="#">
                                            <figure><img alt="jobBox" src="assets/imgs/page/homepage1/img-news3.png"></figure></a></div>
                                    <div class="card-block-info">
                                        <div class="tags mb-15"><a class="btn btn-tag" href="blog-grid.html">News</a></div>
                                        <h5><a href="blog-details.html">Interview Question: Why Dont You Have a Degree?</a></h5>
                                        <p class="mt-10 color-text-paragraph font-sm">Learn how to respond if an interviewer asks you why you dont have a degree, and read example answers that can help you craft</p>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-6 col-6">
                                                    <div class="d-flex"><img class="img-rounded" src="assets/imgs/page/homepage1/user3.png" alt="jobBox">
                                                        <div class="info-right-img"><span class="font-sm font-bold color-brand-1 op-70">Wiliam Kend</span><br><span class="font-xs color-text-paragraph-2">06 September</span></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 text-end col-6 pt-15"><span class="color-text-paragraph-2 font-xs">9 mins to read</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div class="text-center"><a class="btn btn-brand-1 btn-icon-load mt--30 hover-up" href="blog-grid.html">Load More Posts</a></div>
            </div>
        </div>
    </section>
    <section class="section-box mt-50 mb-20">
        <div class="container">
            <div class="box-newsletter">
                <div class="row">
                    <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img src="assets/imgs/template/newsletter-left.png" alt="joxBox"></div>
                    <div class="col-lg-12 col-xl-6 col-12">
                        <h2 class="text-md-newsletter text-center">New Things Will Always<br> Update Regularly</h2>
                        <div class="box-form-newsletter mt-40">
                            <form class="form-newsletter">
                                <input class="input-newsletter" type="text" value="" placeholder="Enter your email here">
                                <button class="btn btn-default font-heading icon-send-letter">Subscribe</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img src="assets/imgs/template/newsletter-right.png" alt="joxBox"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
