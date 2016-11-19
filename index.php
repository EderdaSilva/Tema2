<?php include 'bd/listagemPostos.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title> Pontos de saúde publica de Hortolândia</title>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.0-rc.3/dist/leaflet.css" />
	<link rel="stylesheet" type="text/css" href="css/base.css">
</head>

<body>
	<header>
		<nav>
		  <ul>
		  <li><a href="#">Home</a></li>
		        <li><a href="formulario.html">Contato</a></li>
		  <li><a href="sobre.html">Sobre</a></li>
        </ul>
		</nav>
	    <h1>Bem vindo ao mapa saúde</h1>
   </header>

	<div id="mapid"></div>
	<script src="https://unpkg.com/leaflet@1.0.0-rc.3/dist/leaflet.js"></script>
	<script>

	/* gel locarização do mapa */
	var mymap = L.map('mapid').setView([-22.870,-47.208,], 13);

/*	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpandmbXliNDBjZWd2M2x6bDk3c2ZtOTkifQ._QA7i5Mpkd_m30IGElHziw', {
	maxZoom: 18,attribution: 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
	'Imagery © <a href="http://mapbox.com">Mapbox</a>',id: 'mapbox.streets'}).addTo(mymap);
	*/
	L.tileLayer('https://api.mapbox.com/styles/v1/ederdasilva/cit2zwz1200542xtmme5hacdz/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZWRlcmRhc2lsdmEiLCJhIjoiY2l0MnpvOWhlMHR2MjJwcGd6dWxjdHZvaSJ9.DqBnMNDaFaA7T3GnDcAIuQ', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: 'your.mapbox.project.id',
    accessToken: 'pk.eyJ1IjoiZWRlcmRhc2lsdmEiLCJhIjoiY2l0MnpvOWhlMHR2MjJwcGd6dWxjdHZvaSJ9.DqBnMNDaFaA7T3GnDcAIuQ'
	}).addTo(mymap);

	//marcado no mapa
        <?php
               foreach ($postos as $posto){

                   $latitude = $posto['latitude'];
                   $longitude = $posto['longitude'];
                   $nome = $posto['nome_posto'];
                   $rua = $posto['rua'];
                   $num = $posto['numero'];
                   $bairro = $posto['bairro'];
                   $fone = $posto['fone'];

	               echo "L.marker([$latitude, $longitude]).addTo(mymap)"
                       .".bindPopup('<b>$nome</b><br><b>Rua: $rua, $numero - $bairro</b><br><b>$fone</b>');";
                }
        ?>

/*

	var real = L.marker([-22.8582707,-47.2212522]).addTo(mymap);
	var amandaII = L.marker([-22.9018496,-47.2423207]).addTo(mymap);
	var adelaide = L.marker([-22.9076027,-47.1782194]).addTo(mymap);
	var sebatiao = L.marker([-22.8923627,-47.2241591]).addTo(mymap);
	var cristina = L.marker([-22.8673355,-47.197901]).addTo(mymap);
	var ongaro = L.marker([-22.8411836,-47.2185136]).addTo(mymap);
	var clara = L.marker([-22.8835422,-47.2061097]).addTo(mymap);
	var rosolem = L.marker([-22.8980673,-47.1778054]).addTo(mymap);
	var bento = L.marker([-22.9051513,-47.2130763]).addTo(mymap);
	var branca = L.marker([-22.8795536,-47.2596792]).addTo(mymap);
	var horto = L.marker([-22.8470906,-47.2101615]).addTo(mymap);
	var jorge = L.marker([-22.8586106,-47.2026327]).addTo(mymap);
	//var santiago = L.marker([-22.8322378,-47.1451202]).addTo(mymap);
	var angulo = L.marker([-22.8820193,-47.1739717]).addTo(mymap);
	var esmeralda = L.marker([-22.9097535,-47.1921659]).addTo(mymap);
	var amanda = L.marker([-22.8924168,-47.2346236]).addTo(mymap);


	//adicionar um popup

	real.bindPopup("<b> UBS E PA VILA REAL </b><br> AV. São Francisco de Assis, 200 - Jd. Nova Hortolândia").openPopup();
	amandaII.bindPopup("<b> UBS JARDIM AMANDAII) </b><br> AV.Brasil, 1100 - Jd. amanda II").openPopup();
	adelaide.bindPopup("<b> UNIDADE DE SAÚDE DA FAMILIA Jd ADELAIDE </b><br> Rua: Andrea da Silva, S/n - Jd. Adelaide").openPopup();
	sebatiao.bindPopup("<b> UNIDADE DE SAÚDE DA FAMILIA Jd. SÃO SEBASTIÃO </b><br> Rua: da Orquideas, 105 - Jd. São sebatiao").openPopup();
	cristina.bindPopup("<b> UNIDADE DE SAÚDE DA FAMILIA VILA REAL CARMEN CRISTINA </b><br> Rua: Juraci Cardeli Lomas - Jd. Sta Luzia").openPopup();
	ongaro.bindPopup("<b> UNIDADE DE SAÚDE ORESTES ONGARO </b><br> Rua: Domingos Batista de Souza, 605 - Pq Orestes Ongaro").openPopup();
	clara.bindPopup("<b> UBS SANTA CLARA </b><br> Rua: Pedro Pereira dos Santos, 179 - Jd. Mirante de Sumaré ").openPopup();
	rosolem.bindPopup("<b> CENTRO DE SAÚDE JARDIM ROSOLEM </b><br> Rua: Osmar Antonio Meira - Jd. Rosolem").openPopup();
	bento.bindPopup("<b> UNIDADE DE SAÚDE DA FAMILIA JD. SÃO BENTO </b><br> Rua: Tom Jobim - Jd. São Bento").openPopup();
	branca.bindPopup("<b> UNIDADE DE SAÚDE DA FAMILIA TAQUARA BRANCA </b><br> Rua Reinalda Aparecida Machado - Jd. Novo Horizonte").openPopup();
	horto.bindPopup("<b> UNIDADE DE SAÚDE DA FAMILIA PARQUE DO HORTO </b><br> Rua: Azalia - Pq. do Horto").openPopup();
	jorge.bindPopup("<b> UNIDADE DE SAÚDE DA FAMILIA JD. SÃO JORGE </b><br> Rua: Acre - Jd. São Jorge").openPopup();
	//santiago.bindPopup("<b> UNIDADE DE SAÚDE DA FAMILIA JD. SANTIAGO </b><br> Rua: Projetada - Jd. Santiago ").openPopup();
	angulo.bindPopup("<b> UBS NOVO ANGULO </b><br> Rua: Edezio de Vieira Moras - Jd. Novo Angulo").openPopup();
	esmeralda.bindPopup("<b> UNIDADE DE SAÚDE DA FAMILIA SANTA ESMERALDA </b><br> Rua: Turquesa, 171 - Jd. Sta. Esmeralda").openPopup();
	amanda.bindPopup("<b> UNIDADE DE SAÚDE DA FAMILIA JD AMANDA </b><br> Rua: almada Negreiros, 1299 - Jd. Amanda").openPopup();


	//clicar para aparecer popup pode conter HTML
	//var popup = L.popup().setLatLng([-22.8867653,-47.2047999]).setContent("I am a standalone popup.").openOn(mymap);

	//var popup = L.popup();//

	//function onMapClick(e) {
    //	popup.setLatLng(e.latlng).setContent("You clicked the map at " + e.latlng.toString()).openOn(mymap);
    //}

	//mymap.on('click', onMapClick);


*/
	</script>

	<script src="https://unpkg.com/leaflet@1.0.0-rc.3/dist/leaflet.js"></script>
	<footer>
  	<small>Este site esta bobre a licença  <a href="http://choosealicense.com/licenses/apache-2.0/"> Apache 2.0</a></small>
	</footer>

</body>
</html>