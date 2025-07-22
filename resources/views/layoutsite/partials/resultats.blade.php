@if($immobiliers->count())
    @foreach($immobiliers as $immobilier)
                    <div class="col-xl-12 col-12">
                        <div class="card-grid-2 hover-up"><span class="flash"></span>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="card-grid-2-image-left">
                                        <div class="image-box">
                                            @if($immobilier->photos->isNotEmpty())
                                                <img src="{{asset('storage/'.$immobilier->photos[0]->url)}}" width="100" height="100" alt="{{ $immobilier->titre }}">
                                            @else
                                                <img src="{{ asset('images/default.jpg') }}" alt="Aucune image">
                                            @endif
                                        </div>
                                        <div class="right-info">
                                            <a class="name-job" href="#">
                                                {{ $immobilier->category->nom ?? 'Catégorie inconnue' }}
                                            </a>
                                            <span class="location-small">{{ $immobilier->ville ?? 'Localisation inconnue' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                    <div class="pl-15 mb-15 mt-30">
                                        @foreach($immobilier->chambres as $chambre)
                                            <a class="btn btn-grey-small mr-5" href="#">
                                                {{ ucfirst($chambre->type) }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card-block-info">
                                <h4>
                                    <a href="#">
                                        {{ $immobilier->titre ?? 'Sans titre' }}
                                    </a>
                                </h4>
                                <div class="mt-5">
                                    <span class="card-briefcase">{{ $immobilier->statut ?? 'Statut inconnu' }}</span>
                                    <span class="card-time">
                                        <span>{{ $immobilier->created_at->diffForHumans() }}</span>
                                    </span>
                                </div>
                                <p class="font-sm color-text-paragraph mt-10">
                                    {{ Str::limit($immobilier->description, 100) }}
                                </p>
                                <div class="card-2-bottom mt-20">
                                    <div class="row">
                                        <div class="col-lg-7 col-7">
                                            <span class="card-text-price">
                                                {{ number_format($immobilier->prix, 0, ',', ' ') }} F CFA
                                            </span>
                                            <span class="text-muted">/mois</span>
                                        </div>
                                        <div class="col-lg-5 col-5 text-end">
                                            <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm">
                                                <a href="" class="text-white">Contacter</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
     @endforeach
@else
    <p>Aucun bien trouvé.</p>
@endif
