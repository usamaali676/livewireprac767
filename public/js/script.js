var MyDiv0;
var MyDiv1;
var MyDiv2;
var MyDiv3;
var MyDiv4;
var MyDiv5;
var MyDiv6;
var MyDiv7;
// World CLOCK JAVASCRIPT
function GetClock(){
var d=new Date();
var nhourHAST=d.getUTCHours()-10,nminHAST=d.getUTCMinutes(),apHAST;
var nhourEDT=d.getUTCHours()-4,nminEDT=d.getUTCMinutes(),apEDT;
var nhourCDT=d.getUTCHours()-5,nminCDT=d.getUTCMinutes(),apCDT;
var nhourMDT=d.getUTCHours()-6,nminMDT=d.getUTCMinutes(),apMDT;
var nhourPDT=d.getUTCHours()-7,nminPDT=d.getUTCMinutes(),apPDT;
var nhourAKDT=d.getUTCHours()-8,nminAKDT=d.getUTCMinutes(),apAKDT;
var nhourHADT=d.getUTCHours()-9,nminHADT=d.getUTCMinutes(),apHADT;


if(nhourEDT==0){apEDT=" AM";nhourEDT=12;}
else if(nhourEDT<12){apEDT=" AM";}
else if(nhourEDT==12){apEDT=" PM";}
else if(nhourEDT>12){apEDT=" PM";nhourEDT-=12;}
if(nminEDT<=9) nminEDT="0"+nminEDT;

if(nhourCDT==0){apCDT=" AM";nhourCDT=12;}
else if(nhourCDT<12){apCDT=" AM";}
else if(nhourCDT==12){apCDT=" PM";}
else if(nhourCDT>12){apCDT=" PM";nhourCDT-=12;}
if(nminCDT<=9) nminCDT="0"+nminCDT;

if(nhourMDT==0){apMDT=" AM";nhourMDT=12;}
else if(nhourMDT<12){apMDT=" AM";}
else if(nhourMDT==12){apMDT=" PM";}
else if(nhourMDT>12){apMDT=" PM";nhourMDT-=12;}
if(nminMDT<=9) nminMDT="0"+nminMDT;

if(nhourPDT==0){apPDT=" AM";nhourPDT=12;}
else if(nhourPDT<12){apPDT=" AM";}
else if(nhourPDT==12){apPDT=" PM";}
else if(nhourPDT>12){apPDT=" PM";nhourPDT-=12;}
if(nminPDT<=9) nminPDT="0"+nminPDT;

if(nhourAKDT==0){apAKDT=" AM";nhourAKDT=12;}
else if(nhourAKDT<12){apAKDT=" AM";}
else if(nhourAKDT==12){apAKDT=" PM";}
else if(nhourAKDT>12){apAKDT=" PM";nhourAKDT-=12;}
if(nminAKDT<=9) nminAKDT="0"+nminAKDT;

if(nhourHADT==0){apHADT=" AM";nhourHADT=12;}
else if(nhourHADT<12){apHADT=" AM";}
else if(nhourHADT==12){apHADT=" PM";}
else if(nhourHADT>12){apHADT=" PM";nhourHADT-=12;}
if(nminHADT<=9) nminHADT="0"+nminHADT;

if(nhourHAST==0){apHAST=" AM";nhourHAST=12;}
else if(nhourHAST<12){apHAST=" AM";}
else if(nhourHAST==12){apHAST=" PM";}
else if(nhourHAST>12){apHAST=" PM";nhourHAST-=12;}
if(nminHAST<=9) nminHAST="0"+nminHAST;

//table time zones
document.getElementById('tablemdt').innerHTML+=""+nhourMDT+":"+nminMDT+apMDT+"</br>";
document.getElementById('tableakdt').innerHTML+=""+nhourAKDT+":"+nminAKDT+apAKDT+"";
document.getElementById('tablecdt').innerHTML+=""+nhourCDT+":"+nminCDT+apCDT+"";
document.getElementById('tableedt').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('tablehast').innerHTML+=""+nhourHAST+":"+nminHAST+apHAST+"";
document.getElementById('tablepdt').innerHTML+=""+nhourPDT+":"+nminPDT+apPDT+"";


//MyDiv0=document.getElementById('clockbox-states-0').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-5').innerHTML+=""+nhourMDT+":"+nminMDT+apMDT+"";
document.getElementById('clockbox-states-6').innerHTML+=""+nhourAKDT+":"+nminAKDT+apAKDT+"";
document.getElementById('clockbox-states-7').innerHTML+=""+nhourMDT+":"+nminMDT+apMDT+"";
document.getElementById('clockbox-states-8').innerHTML+=""+nhourPDT+":"+nminPDT+apPDT+"";
document.getElementById('clockbox-states-9').innerHTML+=""+nhourMDT+":"+nminMDT+apMDT+"";
document.getElementById('clockbox-states-10').innerHTML+=""+nhourCDT+":"+nminCDT+apCDT+"";
document.getElementById('clockbox-states-11').innerHTML+=""+nhourMDT+":"+nminMDT+apMDT+"";
document.getElementById('clockbox-states-12').innerHTML+=""+nhourCDT+":"+nminCDT+apCDT+"";
document.getElementById('clockbox-states-13').innerHTML+=""+nhourCDT+":"+nminCDT+apCDT+"";
document.getElementById('clockbox-states-14').innerHTML+=""+nhourCDT+":"+nminCDT+apCDT+"";
document.getElementById('clockbox-states-15').innerHTML+=""+nhourCDT+":"+nminCDT+apCDT+"";
document.getElementById('clockbox-states-16').innerHTML+=""+nhourCDT+":"+nminCDT+apCDT+"";
document.getElementById('clockbox-states-17').innerHTML+=""+nhourCDT+":"+nminCDT+apCDT+"";
document.getElementById('clockbox-states-18').innerHTML+=""+nhourPDT+":"+nminPDT+apPDT+"";
document.getElementById('clockbox-states-19').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-21').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-22').innerHTML+=""+nhourCDT+":"+nminCDT+apCDT+"";
document.getElementById('clockbox-states-23').innerHTML+=""+nhourCDT+":"+nminCDT+apCDT+"";
document.getElementById('clockbox-states-24').innerHTML+=""+nhourCDT+":"+nminCDT+apCDT+"";
document.getElementById('clockbox-states-25').innerHTML+=""+nhourCDT+":"+nminCDT+apCDT+"";
document.getElementById('clockbox-states-26').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-27').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-28').innerHTML+=""+nhourCDT+":"+nminCDT+apCDT+"";
document.getElementById('clockbox-states-29').innerHTML+=""+nhourCDT+":"+nminCDT+apCDT+"";
document.getElementById('clockbox-states-30').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-31').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-32').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-33').innerHTML+=""+nhourCDT+":"+nminCDT+apCDT+"";
document.getElementById('clockbox-states-34').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-35').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-36').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-37').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-38').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-39').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-40').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-41').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-42').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-43').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-44').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-45').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-46').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-47').innerHTML+=""+nhourHAST+":"+nminHAST+apHAST+"";
document.getElementById('clockbox-states-48').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-49').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-50').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
document.getElementById('clockbox-states-51').innerHTML+=""+nhourHAST+":"+nminHAST+apHAST+"";
document.getElementById('clockbox-states-52').innerHTML+=""+nhourHAST+":"+nminHAST+apHAST+"";
document.getElementById('clockbox-states-53').innerHTML+=""+nhourHAST+":"+nminHAST+apHAST+"";
document.getElementById('clockbox-states-54').innerHTML+=""+nhourPDT+":"+nminPDT+apPDT+"";
document.getElementById('clockbox-states-55').innerHTML+=""+nhourPDT+":"+nminPDT+apPDT+"";
MyDiv1=document.getElementById('clockbox-states-1').innerHTML+=""+nhourMDT+":"+nminMDT+apMDT+"";
MyDiv0=document.getElementById('clockbox-states-0').innerHTML+=""+nhourCDT+":"+nminCDT+apCDT+"";
MyDiv2=document.getElementById('clockbox-states-2').innerHTML+=""+nhourMDT+":"+nminMDT+apMDT+"";
MyDiv3=document.getElementById('clockbox-states-3').innerHTML+=""+nhourMDT+":"+nminMDT+apMDT+"";
MyDiv4=document.getElementById('clockbox-states-4').innerHTML+=""+nhourPDT+":"+nminPDT+apPDT+"";
MyDiv5=document.getElementById('clockbox-states-20').innerHTML+=""+nhourEDT+":"+nminEDT+apEDT+"";
}

window.onload=function(){
GetClock();
//setInterval(GetClock,1000);
}//has dependency on jquery and d3
$(document).ready(function() {

  function loadMap() {
    var $tooltip = $("#tooltip"),
      $map = $("#usa-map"), //svg jquery
      svg = document.querySelector("#usa-map"),
      $container = $('.map-container');


        var paths = d3.select(svg).selectAll('path');
        var pathAndTime = d3.select(svg).selectAll('g');
        //on resize and initial (need to account for css)

        //I just wrote my own json here to match up to
        //classes on the svg, feel free to edit/make your own
        var classMaps = {
          "st0-BiggerGroup BiggerGroup": {
            name: "Texas",
            key: "st0-BiggerGroup BiggerGroup",
            list: ["Total Centers: 121", "Total Viewers: 3 Mil", "<a class='map-link' href='/plans-pricing#st55'>View More</a>"],
          },
          "st54-BiggerGroup BiggerGroup": {
            enable: true,
            name: "Northern California",
            key: "st54-BiggerGroup BiggerGroup",
            list: ["Total Centers: 62", "Total Viewers: 2 Mil", "<a class='map-link' href='/plans-pricing#st54'>View More</a>"],
          },
          "st55-BiggerGroup BiggerGroup": {
            name: "Southern California",
            key: "st55-BiggerGroup BiggerGroup",
            list: ["Total Centers: 121", "Total Viewers: 3 Mil", "<a class='map-link' href='/plans-pricing#st55'>View More</a>"],
          },
          "st20-BiggerGroup BiggerGroup": {
            name: "Florida",
            key: "st20-BiggerGroup",
            list: ["Total Centers: 3", "Total Viewers: 250K",MyDiv0, "<a class='map-link' target='_blank' href='https://en.wikipedia.org/wiki/Florida'>View More</a>"],
          },
          "st27-BiggerGroup BiggerGroup": {
            name: "New York",
            key: "st27-BiggerGroup BiggerGroup",
            list: ["Total Centers: 63", "Total Viewers: 2.5 Mil", "<a class='map-link' href='/plans-pricing#st27'>View More</a>"],
          },
          "st45-BiggerGroup BiggerGroup": {

            name: "New Jersey",
            key: "st45-BiggerGroup BiggerGroup",
            list: ["Total Centers: 63", "Total Viewers: 2.5 Mil", "<a class='map-link' href='/plans-pricing#st45'>View More</a>"],
          },
          "st48-BiggerGroup BiggerGroup edttime": {
            name: "Delaware",
            key: "st48-BiggerGroup BiggerGroup",
            list: ["Total Centers: 65", "Total Viewers: 1.5 Mil", "<a class='map-link' href='https://en.wikipedia.org/wiki/delaware'>View More</a>"],
          },
          "st41-BiggerGroup BiggerGroup": {
            name: "Maryland",
            key: "st41-BiggerGroup BiggerGroup",
            list: ["Total Centers: 65", "Total Viewers: 1.5 Mil", "<a class='map-link' href='/plans-pricing#st41'>View More</a>"],
          }
        };

        //get all the paths of the svg, for each
        paths.each(function(d, i) {

          var classSelected = d3.select(this).attr('class');
          var stateSelected = classMaps[classSelected];

          //check to see if the svg object is a state from our json
          //var isState = (typeof stateSelected == "object") ? true : false;
          var isState =true;
          //if state is in our json list, then
          if (isState) {

            //fill in color-- can put whatever you want
            //d3.select(this).style('fill', 'rgba(183, 0, 0, 0.18)');

            //add a glowing orb to map with js
           // var $d = $("<div></div>");
           // $d.addClass('glowing-orb').addClass(stateSelected.name.toLowerCase().replace(/\s/g, ''));
           // $container.append($d);

          }

          //if we hover over any location on the map, then get path and if state, fill color red
          //jquery hover, two handlers for one on mouseenter and one for mouseleave
          $(this).hover(function() {
            var path = $(this)[0];

            if (isState) d3.select(this).style('fill', 'rgba(55, 55, 55, 0.70)');


          }, function() {
            var path = $(this)[0];
            if (isState) d3.select(path).style('fill', '');
          }).css('cursor', 'pointer');

       /*   //on click of svg, create the tooltip
          d3.select(this).on('click', function() {
            $tooltip.hide();
            var mouse = d3.mouse(this);  //get location of mouse

            var classSelected = d3.select(this).attr('class');
            if (classSelected) {
              toolTip(classSelected, mouse);
            }

          }); */
        }); //end paths for each

        ////dave edit : on hover time font size up
        pathAndTime.each(function(d, i) {

          var classSelected = d3.select(this).attr('class');
          var stateSelected = classMaps[classSelected];

          //check to see if the svg object is a state from our json
          var isState = true;

          //if state is in our json list, then
          if (isState) {

            //fill in color-- can put whatever you want
            d3.select(this).style('fill', 'black');

            //add a glowing orb to map with js
           // var $d = $("<div></div>");
           // $d.addClass('glowing-orb').addClass(stateSelected.name.toLowerCase().replace(/\s/g, ''));
           // $container.append($d);

          }

          //if we hover over any location on the map, then get path and if state, fill color red
          //jquery hover, two handlers for one on mouseenter and one for mouseleave
          $(this).hover(function() {
            var path = $(this)[0];

            /* if (isState) d3.select(this).style('fill', 'rgba(183, 0, 0, 0.58)'); */
            if (isState) {
              d3.select(this).style('font-size', '25px');
              /* d3.selectAll(".stateABB").style('font-size', '0px'); */
           }
          }, function() {
            var path = $(this)[0];
            if (isState) {d3.select(this).style('font-size', '');
             /* d3.selectAll(".stateABB").style('font-size', ''); */
          }
             /* if (isState) d3.select(path).style('fill', 'rgba(183, 0, 0, 0.18)'); */
          }).css('cursor', 'pointer');

            /* on click of svg, create the tooltip */
          d3.select(this).on('click', function() {
            $tooltip.hide();
            var mouse = d3.mouse(this);  //get location of mouse

            var classSelected = d3.select(this).attr('class');
            if (classSelected) {
              toolTip(classSelected, mouse);
            }

          });
        });








        //handles tooltip creation
        function toolTip(classSel, mouse) {
          var x = mouse[0];
          x = ((x / 881) * 100); //881 was the original height of the map

          var y = (mouse[1] + 100) / 1140 * 100;  //original width of the map

          //again if the class matches up to our json list, then we want to do something
          var stateSelected = classMaps[classSel];
          var isState = (typeof stateSelected == "object") ? true : false;

          var $h3 = $("#tooltip h3"),
            $ul = $("#tooltip ul");

          //show tooltip if not mobile -- can be improved if desired
          if (isState && window.innerWidth > 480) {
            $ul.html("");

             //append each item in our stateSelected array as a list item
            for (var i = 0; i < stateSelected.list.length; i++) {
              $ul.append("<li>" + stateSelected.list[i] + "</li>");
            }

            $h3.html(stateSelected.name);

            $tooltip.css({
              'top': y + "%",
              'left': x + "%"
            }).show();
          }
        }//end tooltip func

        function resetMapHeight(){
           var $mapH = $map.height();
           $container.height($mapH);
        }

        //handle responsive view on browser resize
        $(window).resize(function() {
          if (window.innerWidth < 480) {
            $tooltip.hide();
          }
          //resize map responsively
          resetMapHeight();
        });

        //on load of svg, reset Map Height
        resetMapHeight();




  }//end loadMap();

  loadMap();
});

//Dave if span - X button is clicked EVENT
$(".close-button").click(function(){
  $("#tooltip").hide();
//do something
});

/*//change size on hover
$(function() {
  $('.st20').hover(function() {
    $('#clockbox').css('font-size', '30px');
  }, function() {
    // on mouseout, reset the background colour
    $('#clockbox').css('font-size', '');
  });
}); */
