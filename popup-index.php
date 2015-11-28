<!DOCTYPE HTML SYSTEM>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/jquery-2.1.1.js"></script>
        <script type="text/javascript" src="popup-script.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="leaflet\leaflet.js"></script>
        <script type="text/javascript"  src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
        <link rel="stylesheet" type="text/css" href="popup-style.css">
        <link rel="stylesheet" type="text/css" href="leaflet\leaflet.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css">
        <link rel="stylesheet" type="text/css" href="font-awesome-4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
    <body>
        <div id="overlay">
            
        </div>
        <div id="map"></div>
        <div class="fab" id="cursor">
            <section class='cntt-wrapper'>
                <div id="fab-hdr">
                    <h3>-#intitule du logement#-</h3>
                </div>
                <div class="cntt">
                    <p><div class="parapop">Nom du locataire : <div id="popnom">#</div><br /></div>
                        <div class="parapop">Prenom du locataire : <div id="poppre">#</div><br /></div>
                        <div class="parapop">Telephone du locataire : <div id="poptel">#</div><br /></div>
                        <div class="parapop">Adresse du bien : <div id="popadr">#</div><br /></div>
                    </p>
                </div>
                <div class="btn-wrapper" id="interact">
                    <div class="popbtntchat">
                        <button class="mdl-button mdl-js-button mdl-button--raised 
                            mdl-js-ripple-effect mdl-button--accent mdl-color--orange">Contacter <i class="fa fa-comment"></i>
                        </button>
                    </div>
                    <div class="popbtnclose">
                        <button class="mdl-button mdl-js-button mdl-button--raised
                            mdl-js-ripple-effect mdl-button--accent mdl-color--deep-orange" id="cancel">Retour <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </body>
    <footer>
        
        <!--***************-->
        <!--     PHP       -->
        <!--***************-->
        <?php	
        try
        {
            $bdd = new PDO('mysql:dbname=mujdum;charset=utf8;host=localhost', 'root', 'root');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
            
        $reponse = $bdd->query("SELECT nom FROM Infos"); 
        echo "<div id=lastName hidden>";
        while ($donnees = $reponse-> fetch())
        {
            echo $donnees['nom']."/";
        }
        echo "</div>";
        $reponse -> closeCursor();
                
        $reponse = $bdd->query("SELECT prenom FROM Infos"); 
        echo "<div id=prenom hidden>";
        while ($donnees = $reponse-> fetch())
        {
            echo $donnees['prenom']."/";
        }
        echo "</div>";
        $reponse -> closeCursor();
                
        $reponse = $bdd->query("SELECT adresse FROM Infos"); 
        echo "<div id=adress hidden>";
        while ($donnees = $reponse-> fetch())
        {
            echo $donnees['adresse']."/";
        }
        echo "</div>";
        $reponse -> closeCursor();
                
        $reponse = $bdd->query("SELECT tel FROM Infos"); 
        echo "<div id=tel hidden>";
        while ($donnees = $reponse-> fetch())
        {
            echo $donnees['tel']."/";
        }
        echo "</div>";
        $reponse -> closeCursor();
                
        $reponse = $bdd->query("SELECT prix FROM Infos"); 
        echo "<div id=price hidden>";
        while ($donnees = $reponse-> fetch())
        {
            echo $donnees['prix']."/";
        }
        echo "</div>";
        $reponse -> closeCursor();
                
        $reponse = $bdd->query("SELECT latitude FROM Infos"); 
        echo "<div id=lat hidden>";
        while ($donnees = $reponse-> fetch())
        {
            echo $donnees['latitude']."/";
        }
        echo "</div>";
        $reponse -> closeCursor();
                
        $reponse = $bdd->query("SELECT longitude FROM Infos"); 
        echo "<div id=lon hidden>";
        while ($donnees = $reponse-> fetch())
        {
            echo $donnees['longitude']."/";
        }
        echo "</div>";
        $reponse -> closeCursor();      
        ?>
        <!--***************-->
        <!--     /PHP      -->
        <!--***************-->
        
        <!--***************-->
        <!--   MAPscript   -->
        <!--***************-->
        <script>
        
        var map = L.map('map').setView([48.856614, 2.352222], 13);
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}',
                {attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors,<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>,Imagery © <a href="http://mapbox.com">Mapbox</a>',maxZoom: 18,
        id: 'leoyd.o8ek0g3a',
        accessToken: 'pk.eyJ1IjoibGVveWQiLCJhIjoiY2loZGYzeXU2MGJtaXRwbHo4cmw4a2I1cCJ9.lG_sgHkl6CAIvkkrr2HW8w'
    }).addTo(map);
        //L.marker([48.86,2.34]).addTo(map).on('click', onClick);
     
            var longi= document.getElementById('lon').innerHTML.split('/');
            var lat= document.getElementById('lat').innerHTML.split('/');
            var adress = document.getElementById('adress').innerHTML.split('/');
            var tel = document.getElementById('tel').innerHTML.split('/');
            var prenom = document.getElementById('prenom').innerHTML.split('/');
            var lastName = document.getElementById('lastName').innerHTML.split('/');
            var prix = document.getElementById('price').innerHTML.split('/');
            var loop=0;
            var marker = Array;
            while (longi[loop])
            {
                marker[loop] = L.marker([lat[loop],longi[loop]]).addTo(map).on('click', onClick);
                var str = "<b style='color:black;'>"+adress[loop]+"</b><p style='color:black;'>"+prenom[loop]+" "+lastName[loop]+"<br>"+prix[loop]+" euros</p>";
                marker[loop].bindPopup(str);
                marker[loop].on('mouseover', function(e){
                    this.openPopup();
                });
                marker[loop].on('mouseout', function(e){
                    this.closePopup();
                });
                loop = loop + 1;
            }
           
            function onClick(e) 
            {
                document.getElementById('poptel').innerHTML = tel[loop];
                document.getElementById('popadr').innerHTML = adress[loop];
                document.getElementById('popnom').innerHTML = lastName[loop];
                document.getElementById('poppre').innerHTML = prenom[loop];
                document.getElementById('interact').click();
            }
            
    </script>
        <!--***************-->
        <!--  /MAPscript   -->
        <!--***************-->
        
        
    </footer>
</html>
