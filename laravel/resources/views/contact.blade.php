@extends('main')
@section('content')

    <section class="page-title bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Tout commence ici !</span>
                        <h1 class="text-capitalize mb-4 text-lg">Contactez-nous</h1>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="/" class="text-white">Acceuil</a></li>
                            <li class="list-inline-item"><span class="text-white">/</span></li>
                            <li class="list-inline-item text-white-50">Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- contact form start -->
    <section class="contact-form-wrap section">
        <div class="container">
            <div class="row">
                <h4 style="color:rgb(68, 9, 9); text-decoration: underline;">Pour toutes demandes de cours ou de
                    souscription :</h4>
                <h6><p><i>Merci de nous adressé un message via le formulaire de contact en précisant votre nom,
                            votre numéro de téléphone.
                        </i></p></h6>

                <div class="col-lg-6 col-md-12 col-sm-12">

                    @if(Session::get('message_sent'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message_sent')}}
                        </div>
                    @endif

                    <form id="contact-form" class="contact__form" method="POST" action="#">
                        @csrf

                        <h3 class="text-md mb-4">Formulaire de contact</h3>
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" placeholder="Votre nom - prénom"
                                   required>
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" class="form-control" placeholder="Adresse email" required>
                        </div>
                        <div class="form-group">
                            <input name="phone" type="text" class="form-control" placeholder="Numéro de téléphone"
                                   required>
                        </div>
                        <div class="form-group-2 mb-4">
                            <textarea name="message" class="form-control" rows="4" placeholder="Votre message"
                                      required></textarea>
                        </div>
                        <button class="btn btn-main" name="submit" type="submit">Envoyer</button>
                    </form>
                </div>

                <div class="col-lg-5 col-sm-12">
                    <div class="contact-content pl-lg-5 mt-5 mt-lg-0">
                        <span class="text-muted">Pour toutes autres questions</span>
                        <h2 class="mb-5 mt-2">N'hesitez pas à nous contacter autre part</h2>

                        <ul class="address-block list-unstyled">
                            <li>
                                <i class="ti-direction mr-3"></i>7 Avenue des Primevères, 84140 Montfavet
                            </li>
                            <li>
                                <i class="ti-email mr-3"></i>Email: contact@lambdamaths.fr
                            </li>
                            <li>
                                <i class="ti-mobile mr-3"></i>Téléphone : 06.14.12.29.83
                            </li>
                        </ul>

                        <ul class="social-icons list-inline mt-5">
                            <li class="list-inline-item">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
@section('title')
    Contact
@stop
