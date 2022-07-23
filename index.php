<!DOCTYPE html>
<head>
<link href ="style.css" rel = "stylesheet" type = "text/css">
<title>Lido RIVAMARE</title>
<body>

<div class = "flex-container">
      <div id="head">
      <h1>Lido RIVAMARE</h1>
    </div>
    
   

 <div class="main_section">

    
    
     <div id = "prenotazioni"><!--prenotazioni-->
        
        
        

       
      
            <h2>Prenotazioni Posti</h2>
       <p>Clica il posto da prenotare. I posti in rosso sono gia prenotati</p>
        
  
            <?php
                $ombrellone = array();
                for($i=1;$i<26;$i++){
                    $ombrellone["$i"] = "ombellone$i";
                }
                  ?>
                <div id="table">            
                    <table>
                    
                    <tr> 
                    <?php
                        for($i=1;$i<6;$i++){
                            echo"<td id='ombrellone$i' style='border:solid;' onclick=book(this)> <a style='color:yellow'href='#a'/a>Posto$i</td>";
                        }
                    ?>
                    </tr>
					 <tr>
                    <?php
                        for($i=6;$i<11;$i++){
                            echo"<td id='ombrellone$i' style='border:solid;' onclick=book(this)> <a style='color:yellow'href='#a'/a>Posto$i</td>";
                        }
                    ?>
                    </tr> 
					<tr>
                    <?php
                        for($i=11;$i<16;$i++){
                            echo"<td id='ombrellone$i' style='border:solid;' onclick=book(this)> <a style='color:yellow' href='#a'/a>Posto$i</td>";
                        }
                    ?>
                    </tr>
					<tr>
                    <?php
                        for($i=16;$i<21;$i++){
                            echo"<td id='ombrellone$i' style='border:solid;' onclick=book(this)> <a style='color:yellow' href='#a'/a>Posto$i</td>";
                        }
                    ?>
                    </tr>
				<tr>
                    <?php
                        for($i=21;$i<26;$i++){
                            echo"<td id='ombrellone$i' style='border:solid;' onclick=book(this)> <a style='color:yellow' href='#a'/a>Posto$i</td>";
                        }
                    ?>
                    </tr>
                    </table></div>
					
                   <script>
                function book(obj){
                    var posto = obj.id;
                    if(document.getElementById(posto).style.background = "red")alert(posto+" prenotato");  
					if(document.getElementById(posto).style.background = "red")document.getElementById(posto).onclick = function(){ 
					alert("Mi dispiace l'"+posto+" è gia prenotato, scegliene un altro"); };
				}
      
 
					
                   </script>
                    
        
        </div><!--prenotazioni-->
        
        
		
	
		 
		 <div><!--comunicazioni-->
		<h3>NEWS</h3>	
		<p id="tabellone"></p><br>
		<h3>CONDIZIONI DEL MARE	</h3>			
		<p id="sicurezza">SICUREZZA</p> 
		<p id="vento">VENTO</p>
		 
		 
		 
		 
		  <script>
		  
		 (function   a(){
		 
		 
		 
		var xmlhttp = new XMLHttpRequest(); 
	
			xmlhttp.open("GET", "info.json?_=" + new Date().getTime());
			xmlhttp.onreadystatechange = function() {
			var myObj = JSON.parse(this.responseText);
             document.getElementById("tabellone").innerHTML = myObj.info;
              if(myObj.sicurezza<=1) document.getElementById("sicurezza").innerHTML="<img src='img/verde.png' width='150pX'  height='140px'>";
             if(myObj.sicurezza==2) document.getElementById("sicurezza").innerHTML="<img src='img/giallo.png' width='150pX' height='140px'>";
             if(myObj.sicurezza>=3) document.getElementById("sicurezza").innerHTML="<img src='img/rosso.png' width='150pX' height='140px'>";
		
				document.getElementById('vento').innerHTML = "<img src='img/vento.png' width='180pX' height='180px'>".repeat(myObj.vento);
					 
								}

			xmlhttp.send(); 
			setTimeout(a,500);
		 })();
		
		</script>
		
		</div><!--comunicazioni-->
	 </div><!--main_section-->
		
		
		
		

    <div class="section"><!--gioco--> 

<script>
var array = ['hai perso','hai perso','hai perso','hai perso','hai perso','hai perso','hai perso','hai perso',
'hai perso','hai perso','hai perso','hai perso','hai vinto','hai vinto','hai vinto','hai vinto'];
var values = [];
var tiles_flipped = 0;
Array.prototype.tile_shuffle = function(){
    var i = this.length, j, temp;
    while(--i > 0){
        j = Math.floor(Math.random() * (i+1));
        temp = this[j];
        this[j] = this[i];
        this[i] = temp;
    }
}
function newBoard(){
 tiles_flipped = 0;
 var output = '';
    array.tile_shuffle();
 for(var i = 0; i < 16; i++){
  output += '<div id="'+i+'"  onclick="flip(this,\''+array[i]+'\')"></div>';
 }
 document.getElementById('board').innerHTML = output;
}
function flip(tile,val){
 if(tile.innerHTML == "" && values.length < 1){
  tile.style.background = '#ebff96';
  tile.innerHTML = val;
  if(val!="hai perso") {tile.innerHTML="<img class='center' src='img/cocktail.png'>" ; alert("hai vinto"); vincita();}
  else {for(var i = 0; i < 16; i++){if(array[i]!="hai perso")document.getElementById(i).innerHTML="<img class='center' src='img/cocktail.png'>"; }}
    if(values.length == 0){
   values.push(val);
  } }}
  
 function vincita(){
	document.getElementById("form").style.display = "block";

	N_Caratteri = 10;
	Stringa = "";
	for (I=0;I<N_Caratteri;I++){
		do{
			N = Math.floor(Math.random()*74)+48;
		}while(!(((N >= 48) && (N <= 57)) || ((N >= 65) && (N <= 90)) || ((N >= 97) && (N <= 122))));
		
		Stringa = Stringa+String.fromCharCode(N);
	}
	document.getElementById('codice').value  = Stringa;
}
     
  
  
</script>

<div id="board"></div>
<script>newBoard();</script>


	
	 <div>
	 <h2>PROVA A VINCERE</h2>
	 <h2>SCEGLI UNA CASELLA, SE TROVI IL COCKTAIL HAI VINTO</h2>
	 <h4>In caso di vincita dovrai i tuoi dati</h4>
				 <form id="form" action="vincita.php">
			  Nome:<br>
			  <input type="text" name="nome"required><br>
			  Cognome:<br>
			  <input type="text" name="cognome" required><br>
			   Email:<br>
			  <input type="email" name="email" required><br>
			  Codice:<br>
			  <input id="codice" name="codice"readonly><br><br>
			<input type="submit" value ="CONFERMA"  >
			</form> 
				 </div> </div><!--gioco-->
				 <h4 id="possibilita"> Le possibilietà di vincere sono del 25%!</h4>
		</div>	<!--section-->





		<div class="bottom"><!--intestazione-->
            <div id ="intestazione">
                
               <h3 id="info">Informazioni</h3>
                    <div >
                        <ul>
						<li>Indirizzo:<a href="https://www.google.it/maps/place/95024+Santa+Tecla+CT/@37.6414434,15.1731066,15z/data=!3m1!4b1!4m5!3m4!1s0x1313f85d05fa956b:0x5ef7dfc39a718b32!8m2!3d37.6414443!4d15.1818614">Via Roma,30 Acireale(CT)</a></li>
                            <br>
						<li>Telefono:<a href="tel:095.87986796">095.87986796</a></li>
                            <br>
                            <li>Email:<a href="mailto:rivamare@email.it"> rivamare@email.it</a></li>
                        </ul>
                    </div>
            </div>
			<div id="mappa">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12637.32027854951!2d15.173106628008984!3d37.64144342654068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1313f85d05fa956b%3A0x5ef7dfc39a718b32!2s95024+Santa+Tecla+CT!5e0!3m2!1sit!2sit!4v1531292836659"style="border:0"></iframe>
			</div>
              </div><!--intestazione-->
           
        
      







<button id="ads" onclick="ads()">Ads</button><!--pubblicità-->
<div id="DIV">
<img src="img/vodafone.png"  width="350" height="280">
<img src="img/amazon.png"  width="350" height="280">
</div>
<script>
function ads() {
    var x = document.getElementById('DIV');
    if (x.style.visibility === 'hidden') {
        x.style.visibility = 'visible';
    } else {
        x.style.visibility = 'hidden';
    }
}
</script><!--pubblicità-->





</body>
</head>


























