<html>
    <head><meta name="viewport" content="width=device-width, initial-scale=1"><title>Power Shop</title></head>
    <link rel="stylesheet" href="home.css?ts=<?=time()?>&quot" />
    <script src="homee.js" defer></script>
    <meta charset = "utf-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@500&family=Roboto+Slab&display=swap" rel="stylesheet">

    <body>
        <nav>
           
        <form id = 'home' action = 'home.php' >
               <input id = 'home_in' type="submit" value = "Home"/>
            </form>
            <form id = 'acquist_button' action = 'accesso_acquisti.php' >
               <input id = 'acq_but' type="submit" value = "Acquisti"/>
            </form>
            <form id = 'carrel_button' action = 'accesso_carrello.php' >
               <input id = 'car_but' type="submit" value = "Carrello"/>
               <label id = 'n_carr' for="car_but">6</label>
            </form>
            <form class = 'hidden' id = 'esci' action = 'logout.php' >
               <input id = 'esci_in' type="submit" value = "Esci"/>
            </form>
        </nav>
    <header>
        <h1>
         POWER SHOP
        </h1>
        <div class="overlay"></div>
    </header>
   
    <span class = "hidden2" id = "ciao">Ciao Davide</span>
    <article>
        
        <section class="hidden2" id='preferiti'><h1>PREFERITI</h1>
            <div id="pPreferiti" ></div>
        </section>
        <p id = 'cerca'><strong>Cerca</strong></p>
        <input  type="text" id="ricerca">
        <div id="titolo"><h1>PRODOTTI IN EVIDENZA</h1></div>
        <div id="contpubb">
        <section>
        <div id=grid>


        
    </div>
</section>
<section id="pubblicita"><h1>Pubblicità</h1>
    <div id="pub">
    <div id="film"><div class="logo"><img src="imdb.jpg"></div><h1>Presto al cinema</h1></div>
    <div id="musica"><div class="logo"><img src="spoty.jpg"></div><h1>Ascolta su Spotify</h1></div>
</div>
</section>
</div>
    </article>
    
    <footer>
       <div class="flex-footer">
           <div class="titoli"><p>INFORMAZIONI</p> </div>
           <a href="https://www.youtube.com/">Condizioni generali di vendita</a>
           <a href="https://www.youtube.com/">Pagamenti</a>

       </div>

       <div class="flex-footer">
        <div class="titoli"><p>AZIENDA</p> </div>
        <a href="https://www.youtube.com/">Chi siamo</a>
        <a href="https://www.youtube.com/">Negozi</a>

    </div>

    <div class="flex-footer">
        <div class="titoli"><p>PRODOTTI</p></div>
        <a href="https://www.youtube.com/">Nuovi prodotti</a>
        <a href="https://www.youtube.com/">Più venduti</a>

    </div>
    <div id="Ingegnere"><p>Davide Pantò 046001687</p></div>
    </footer>


</body>
</html>