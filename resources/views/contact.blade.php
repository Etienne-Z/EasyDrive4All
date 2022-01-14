@extends('layouts.app')

@section('content')
<h1 class="title text-center">Contact</h1>

<div id="container-contact-form" class="container contact-form-container">
    <h2 class="text-center mb-5">Neem contact met ons op</h2>
        <form id="contact-form-id" class="contact-form" method="POST">
            <div class="row">
                <div class="col-lg-6">

                        <div id="voornaamErrorMsg" class="alert"></div>
                        <input id="voornaam" type="text" name="voornaam" placeholder="Voornaam">

                        <input  id="tussenvoegsel" type="text" name="tussenvoegsel" placeholder="Tussenvoegsel">

                        <div id="achternaamErrorMsg" class="alert"></div>

                        <input id="achternaam" type="achternaam" name="achternaam" placeholder="achternaam">

                        <div id="emailErrorMsg" class="alert"></div>
                        <input id="email" type="email" name="email" placeholder="E-mail">

                </div>
                <div class="col-lg-6">
                    <div id="vraagErrorMsg" class="alert"></div>
                    <textarea id="vraag" name="vraag" cols="50" rows="10" placeholder="Vul hier uw vraag in..."></textarea>
                    <button>Versturen</button>
                </div>
            </div>
        </form>
</div>
<div class="container container-contact-gegevens mt-5 mb-5">
    <div class="row">
        <div class="col-md-6 map">
            <h2 class="mb-5">Wij zijn hier te vinden</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2427.6800774739654!2d6.103101815403892!3d52.52112857981438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c7df3ee6d199eb%3A0x95a482dd5f1f2009!2sHogenkampsweg%2C%208025%20BK%20Zwolle!5e0!3m2!1snl!2snl!4v1642074294771!5m2!1snl!2snl" width="80%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="col-md-6 contact-gegevens">
            <h2 class="mb-5">Contact gegevens</h2>
            <div class="mt-1 mb-1 contact-details">Van Dissselstraat 15</div>
            <div class="mt-1 mb-1 contact-details">6262PN</div>
            <div class="mt-1 mb-1 contact-details">Zwolle</div>
            <div class="mt-1 mb-1 contact-details"><a href="tel:0626-123456">0626-123456</a></div>
            <div class="mt-1 mb-1 contact-details"><a href="mailto:info@easydrive4all.nl">info@easydrive4all.nl</a></div>
        </div>
    </div>
</div>

@endsection
