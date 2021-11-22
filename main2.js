
let map = L.map('map', {
    layers: MQ.tileLayer(),
    center: [54.37178209250083, 18.61266361280408],
    zoom: 12
});

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



function getDirections(){

        map = L.map('map', {
        layers: MQ.tileLayer(),
        center: [54.37178209250083, 18.61266361280408],
        zoom: 12
    });

    let dir = MQ.routing.directions();

    dir.route({
        locations:[
            $("#startPoint").val(),
            $("#endPoint").val()
        ]
    });

    CustomRouteLayer = MQ.Routing.RouteLayer.extend({

        createStartMarker : (location) =>{
        
        var customIcon

            customIcon = L.icon({
                    iconUrl: 'img/blue.png',
                    iconSize:     [20, 29],
                    iconAnchor:   [10, 29],
                    popupAnchor:  [0, -29]
            });
                  
            markerL = L.marker(location.latLng, {icon :customIcon}).addTo(map);
            return markerL;
        },

        createEndMarker : (location) =>{
           
        var customIcon;
            customIcon = L.icon({
                
                    iconUrl: 'img/green.png',
                    iconSize:     [20, 29],
                    iconAnchor:   [10, 29],
                    popupAnchor:  [0, -29]
                
            });
       
            markerL = L.marker(location.latLng, {icon :customIcon}).addTo(map);
            return markerL;
        }
    });

    map.addLayer(new CustomRouteLayer({
        directions: dir,
        fitBounds: true
    }))
}

function getATMs(){
    
    map = L.map('map', {
        layers: MQ.tileLayer(),
        center: [54.37178209250083, 18.61266361280408],
        zoom: 10
    });

    console.log($("#city").val(),$("#radius").val());

    try {
        $("#foundbanks p").children().remove();
    } catch (error) {
        console.log('no childs');
    }

    $("#inputForm").submit();
    $.ajax({
        
        dataType: "json",

        url: "https://api.foursquare.com/v2/venues/explore?client_id=XQQ4MS3NIONKAHG3DII0QVPMI2BICGJYMRBCQDAXD5TFAD2O&client_secret=M3DBZH1CPQCJI1WIVXP3BV20WFNZGLCMED2GM5D1GQSNCVU1&v=20180323&limit=50&near="+$("#city").val()+"&query=bank&radius="+($("#radius").val())*1000,
        data: {},
        success: function( response ) {
            
            $.each(response.response.groups[0].items, function($key, $value){
                
                console.log($value.venue.name);
            
                let imgSrc = imgSRC($value.venue.name);

                var markerIcon = new LeafIcon({iconUrl: imgSrc});

                $("#foundbanks p").append(""+"<button class='foundbank w3-button w3-round w3-card4' data-lon="+$value.venue.location.lng+" data-lat="+$value.venue.location.lat+">"+"<img style='width:40px; height:20px' src='"+imgSrc+"'</img>"+" "+$value.venue.name+"</button>");
                marker =L.marker([$value.venue.location.lat,$value.venue.location.lng],{icon: markerIcon}).addTo(map);
                marker.bindPopup("<b>"+$value.venue.name+"</b><br>"+$value.venue.location.address).openPopup();
            });
            console.log(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {

            console.log("błąd");
            console.log(jqXHR);
        }
    });
}

$(function(){
    $('#search1').click(function(){

        if($("#city").val()!=""){
            map.remove();
            getATMs();
            document.getElementById("city").value="";
            document.getElementById("radius").value="";
        }else
        window.alert("Podaj miasto w którym chcesz wyszukać banki");
    });

$("#foundbanks").on('click',".foundbank",function(){
      let banklon = $(this).data("lon");
      let banklat = $(this).data("lat");

    map.setView([banklat,banklon],18);
    
  });
});

$(function(){
    $('#search2').click(function(){
        
            if($("#startPoint").val()!="" && $("#startPoint").val()!=""){
                map.remove();
                getDirections();
                document.getElementById("startPoint").value="";
                document.getElementById("endPoint").value="";
            }else
         
            window.alert("Wprowadź poprawne dane");

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


