//const { dir } = require("console");

var map = L.map('map').setView([54.37178209250083, 18.61266361280408],12);
L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=7c18IqUL9nRzzQcQ8tCX',{
    attribution:'<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
}).addTo(map);
let marker = L.marker([54.37178209250083, 18.61266361280408]).addTo(map);
marker.bindPopup("<b> PG </b><br>ETI").openPopup();

var LeafIcon = L.Icon.extend({
    options: {
        shadowUrl: 'img/shadow.jpg',
        iconSize:     [40, 40],
        shadowSize:   [40, 35],
        iconAnchor:   [22, 94],
        shadowAnchor: [17, 85],
        popupAnchor:  [-3, -76]
    }
});

function getATMs(){
    $.ajax({
        dataType: "json",
        url: "https://api.foursquare.com/v2/venues/explore?client_id=XQQ4MS3NIONKAHG3DII0QVPMI2BICGJYMRBCQDAXD5TFAD2O&client_secret=M3DBZH1CPQCJI1WIVXP3BV20WFNZGLCMED2GM5D1GQSNCVU1&v=20180323&limit=50&near="+$("#city").val()+"&query=bank&radius="+($("#radius").val())*1000,
        data: {},
        success: function( response ) {
            
            $.each(response.response.groups[0].items, function($key, $value){
            
            let imgSrc = imgSRC($value.venue.name);

            var markerIcon = new LeafIcon({iconUrl: imgSrc});

                $("#foundbanks p").append(""+"<button class='foundbank w3-button w3-round w3-card4' data-lon="+$value.venue.location.lng+" data-lat="+$value.venue.location.lat+">"+"<img style='width:40px; height:20px' src='"+imgSrc+"'</img>"+" "+$value.venue.name+"</button>");
                marker =L.marker([$value.venue.location.lat,$value.venue.location.lng],{icon: markerIcon}).addTo(map);
                marker.bindPopup("<b>"+$value.venue.name+"</b><br>"+$value.venue.location.address).openPopup();
            });
            console.log(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Code for handling errors
            console.log("błąd");
            console.log(jqXHR);
        }
    });
}

$(function(){
  $('#search1').click(function(){
    //marker.clearLayers();
  getATMs();  
  });
  $("#foundbanks").on('click',".foundbank",function(){
      let banklon = $(this).data("lon");
      let banklat = $(this).data("lat");

    //  alert("bank in : "+banklon+","+banklat);
    map.setView([banklat,banklon],18);
    
  });
});

function imgSRC(nameOfBank){

    let imgSrc;

    switch (nameOfBank){

        case "Alior Bank" : imgSrc="img/Alior.jpg"
            break;

        case "SGB-Bank" : imgSrc="img/sgb.jpg"  
            break;

        case "SGB Bank Spółdzielczy filia Na Skarpie" : imgSrc="img/sgb.jpg"  
            break;
        
        case "SGB Bank Spółdzielczy Filia w Turznie" : imgSrc="img/sgb.jpg"  
            break;

        case "Bank Spółdzielczy" : imgSrc="img/sgb.jpg"  
            break;
        
        case "Bank Pekao SA": imgSrc="img/PEKAO_SA.png"
            break;
        
        case "Bank Pekao": imgSrc="img/PEKAO_SA.png"
            break;      
        
        case "Bank Pekao S.A.": imgSrc="img/PEKAO_SA.png"
            break; 

        case "Raiffeisen Bank" : imgSrc="img/raiffeisen.png"  
            break;
        
        case "Raiffeisen Bank Polska S.A" : imgSrc="img/raiffeisen.png"  
            break;

        case "mBank Oddział Korporacyjny Poznań" : imgSrc="img/mbank.png"
            break;
            
        case "mBank" : imgSrc="img/mbank.png"
            break;

        case "Bank Millennium" : imgSrc="img/millennium.png"  
            break;

        case "Millenium Bank" : imgSrc="img/millennium.png"  
            break;

        case "Bank Millennium HQ" : imgSrc="img/millennium.png"  
            break;

        case "Idea Bank" : imgSrc="img/ideabank.png"  
            break;

        case "PKO Bank Polski Oddzial 1" : imgSrc="img/pko.png"  
            break;

        case "PKO Bank Polski oddział 2" : imgSrc="img/pko.png"  
            break;
        
        case "PKO Bank Polski" : imgSrc="img/pko.png"  
            break;

        case "PKO Bank Polski (Centrala)" : imgSrc="img/pko.png"  
            break;

        case "City Bank" : imgSrc="img/citybank.jpg"  
            break;

        case "Bank Ochrony Środowiska" : imgSrc="img/bos.jpg"  
            break;
        
        case "Bank Ochrony Srodowiska (BOS)" : imgSrc="img/bos.jpg"  
            break;
        
        case "Deutsche Bank" : imgSrc="img/deutscheBank.png"  
            break;
        
        case "Millennium Bank" : imgSrc="img/millennium.png"  
            break;

        case "ING Bank Śląski" : imgSrc="img/ingBank.png"  
            break;
        
        case "Bre Bank" : imgSrc="img/breBank.jpg"  
            break;
        
        case "Santander Consumer Bank HQ" : imgSrc="img/santander.png"  
            break;
        
        case "Santander Bank" : imgSrc="img/santander.png"  
            break;
        
        case "Noble Bank" : imgSrc="img/nobile.png"  
            break;
        
        case "Getin Noble Bank HQ" : imgSrc="img/nobile.png"  
            break;
        
        case "Narodowy Bank Polski" : imgSrc="img/nbp.jpg"  
            break;
        
        case "Stocznia Północna - Bank BPH S.A." : imgSrc="img/bankBPH.png"  
            break;
        
        case "Bank BGŻ" : imgSrc="img/bgz.png"  
            break;

        case "Bank BGZ" : imgSrc="img/bgz.png"  
            break;

        case "Volkswagen Bank Polska S.A." : imgSrc="img/vw.jpg"  
            break;
        
        case "Centrum Medicover - Kredyt Bank" : imgSrc="img/medicover.png"  
            break;
        
        default: imgSrc="img/bank.jpg"
    } return imgSrc;
}


