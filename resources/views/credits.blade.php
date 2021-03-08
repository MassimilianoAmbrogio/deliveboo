@extends('layouts.app')
@section('content')

<main class="credits">
    <div class="container">
        <h1 class="text-center admin-title mt-5">Chi c'è dietro il Team #2?</h1>
        <div class="catchphrase">
            E' stata un'esperienza formativa a 360°, un percorso lungo e appagante, verso un futuro ora più luminoso. Grazie a <strong>Paolo</strong>, <strong>Lorenzo</strong> e <strong>Fabio</strong> per i 6 mesi più intensi degli ultimi anni di ognuno di noi. Grazie a <strong>Chiara</strong> e <strong>Luca</strong> per il supporto e la guida durante l'esame finale. Grazie a <strong>Margherita</strong> e <strong>Marta</strong> per la spalla indispensabile, che saranno nei prossimi mesi. E non ultimi, <strong>tutti i ragazzi della Classe 19</strong> con cui abbiamo affrontato il viaggio e a cui facciamo il nostro più grande in bocca al lupo! Grazie <strong>Boolean Careers</strong>! 
            <span>Con stima e affetto, il Team#2</span>
        </div>
            <div class="who-cards d-flex">
                {{-- Cards MAICHOL --}}
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <div class="user">
                                <img src="img/mike_avi.png"/>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h3 class="name">Maichol Sibiriu</h3>
                                    <p class="profession">Wannabe Full Stack Developer</p>
                                    <p class="text-center">"Scusate ragazzi, stavo facendo la cacca.."</p>
                                </div>
                                <div class="footer">
                                    <i class="fa fa-mail-forward">msibiriu@gmail.com</i> 
                                </div>
                            </div>
                        </div> <!-- end front panel -->
                        <div class="back">
                            <div class="header">
                                <h5 class="motto">"#MOTTO"</h5>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h4 class="text-center">Competenze(?)</h4>
                                    <p class="text-center">HTML5, CSS3, ES6, JQuery, Vue.js, Laravel...</p>
    
                                    <div class="stats-container">
                                        <div class="stats">
                                            <h4>1235</h4>
                                            <p>
                                                Ore di lavoro notturno
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- end back panel -->
                    </div> 
                </div>
                {{-- End Cards --}}
                {{-- Cards MARCO --}}
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <div class="user">
                                <img src="img/marco_avi.png"/>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h3 class="name">Marco Giulietti</h3>
                                    <p class="profession">Wannabe Full Stack Developer</p>
                                    <p class="text-center">"Ragazzi, nottata infernale, non ho dormito per niente.."</p>
                                </div>
                                <div class="footer">
                                    <i class="fa fa-mail-forward">giulietti.marco27@gmail.com</i> 
                                </div>
                            </div>
                        </div> <!-- end front panel -->
                        <div class="back">
                            <div class="header">
                                <h5 class="motto">#MOTTOMARCO</h5>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h4 class="text-center">Competenze(?)</h4>
                                    <p class="text-center">HTML5, CSS3, ES6, JQuery, Vue.js, Laravel...</p>
    
                                    <div class="stats-container">
                                        <div class="stats">
                                            <h4>35</h4>
                                            <p>
                                                Interruzioni giornaliere per placare Argo
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- end back panel -->
                    </div> 
                </div>
                {{-- End Cards --}}
                {{-- Cards FABIO--}}
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <div class="user">
                                <img src="img/fabio_avi.png"/>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h3 class="name">Fabio Mezzina</h3>
                                    <p class="profession">Wannabe Full Stack Developer</p>
                                    <p class="text-center">"Ragazzi, mi faccio un caffè e arrivo..."</p>
                                </div>
                                <div class="footer">
                                    <i class="fa fa-mail-forward">fabio.mezzina.09@gmail.com</i> 
                                </div>
                            </div>
                        </div> <!-- end front panel -->
                        <div class="back">
                            <div class="header">
                                <h5 class="motto">"#MOTTO FABIO"</h5>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h4 class="text-center">Competenze(?)</h4>
                                    <p class="text-center">HTML5, CSS3, ES6, JQuery, Vue.js, Laravel...</p>
    
                                    <div class="stats-container">
                                        <div class="stats">
                                            <h4>2535</h4>
                                            <p>
                                                Caffè ingeriti
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- end back panel -->
                    </div>
                </div>
                {{-- End Cards --}}
                {{-- Cards OSAMA--}}
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <div class="user">
                                <img src="img/osama_avi.png"/>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h3 class="name">Osama Paiola</h3>
                                    <p class="profession">Wannabe Full Stack Developer</p>
                                    <p class="text-center">"Ho i muratori in casa, è un casino, non vi sento.. Mi sentite?"</p>
                                </div>
                                <div class="footer">
                                    <i class="fa fa-mail-forward">opaiola@hotmail.it</i> 
                                </div>
                            </div>
                        </div> <!-- end front panel -->
                        <div class="back">
                            <div class="header">
                                <h5 class="motto">"#MOTTO OSAMA"</h5>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h4 class="text-center">Competenze(?)</h4>
                                    <p class="text-center">HTML5, CSS3, ES6, JQuery, Vue.js, Laravel...</p>
    
                                    <div class="stats-container">
                                        <div class="stats">
                                            <h4>495</h4>
                                            <p>
                                                Prove di colore
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- end back panel -->
                    </div> 
                </div>
                {{-- End Cards --}}
                {{-- Cards MASSI--}}
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <div class="user">
                                <img src="img/massi_avi.png"/>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h3 class="name">Massimiliano Ambrogio</h3>
                                    <p class="profession">Wannabe Full Stack Developer</p>
                                    <p class="text-center">"Io ragazzi ho già fatto, che faccio, pusho?"</p>
                                </div>
                                <div class="footer">
                                    <i class="fa fa-mail-forward">maxi.ambrogio@gmail.com</i> 
                                </div>
                            </div>
                        </div> <!-- end front panel -->
                        <div class="back">
                            <div class="header">
                                <h5 class="motto">"#MOTTOMASSI"</h5>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h4 class="text-center">Competenze(?)</h4>
                                    <p class="text-center">HTML5, CSS3, ES6, JQuery, Vue.js, Laravel...</p>
    
                                    <div class="stats-container">
                                        <div class="stats">
                                            <h4>1914</h4>
                                            <p>
                                                Righe di codice corretto!
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end back panel -->
                    </div>
                </div>
                {{-- End Cards --}}
            </div>
            <div class="clear"></div>
        </div>
</main>
@endsection