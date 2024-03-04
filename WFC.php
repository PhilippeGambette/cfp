<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
   <HEAD>
      <TITLE>Word Frequency Chains</TITLE>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/united/bootstrap.min.css">
      <link rel="icon" href="WFC.ico" />
   </HEAD>

<SCRIPT TYPE="text/javascript" SRC="jquery-1.11.2.min.js"></script>

<!--SoO/ei5l blg-->
<SCRIPT TYPE="text/javascript">

function findKey(needle,haystack){
   return haystack.indexOf(needle);
}


 
$(document).ready(function(){

<?php
echo "";

function treat($t,$c1,$c2){
if(isset($_POST[$t])){
   $words1=$_POST[$t];

$w1='var '.$c1.' = ["';
$f1='var '.$c2.' = [';
$text = trim($words1);
$textAr = explode("\n", $text);
$textAr = str_replace("\r","",$textAr);
$i=0;
foreach ($textAr as $line) {    
    $line = preg_replace('#([^;]+);([0-9]+)#', '$1 $2', $line);
    $arc = explode(" ", $line);
    if($i==0){
    $w1.=$arc[0];
    $f1.=$arc[1];
    }else{
    $w1.='","'.$arc[0];
    $f1.=','.$arc[1];
    }
    $i++;
} 
echo $w1."\"];\n";
echo $f1."];\n";
}
}

treat("words1","w1","f1");
treat("words2","w2","f2");

?>   
   
   var min1 = f1[f1.length-1];
   var max1 = f1[0];
   
   var min2 = f2[f2.length-1];
   var max2 = f2[0];
   
   var y1=0;
   var py1 = [];
   var h1=0;
   var x1=400;
   var x2=600;

   for (var i=0;i<w1.length;i++){
      //var label=makeSVG('text',{id:"bo",title:"ol",value:'bla',fill:'black',x:"10",y:i+"",content:"la",text:"bl", "font-size":"12"});
      //var label=makeTheSVG('',{id:"bo",title:"ol",value:'bla',,content:"la",text:"bl", "font-size":"12"},"bla");
      y1=y1+10+h1;
      h1=Math.floor(9+15*(f1[i]-min1)/(max1-min1));
      $("#label").css("font-size",h1+"pt");
      $("#label").text(w1[i]);
      $("#panel").append('<text id="l1'+i+'" class="link" d="'+pathd+'" fill="black" x="'+(x1-5-parseInt($("#label").css("width")))+'" y="'+(h1+y1-1)+'" style="font-family:Calibri,sans-serif;font-size:'+h1+'pt;">'+w1[i]+'</text>');
      console.log("h"+(h1));
      py1.push(y1);
   }
   $("#label").text("");
   var y2=0;
   var py2 = [];
   var h2=0;
   for (var i=0;i<w2.length;i++){
      y2=y2+10+h2;
      h2=Math.floor(9+15*(f2[i]-min2)/(max2-min2));
      $("#panel").append('<text id="l2'+i+'" class="link" d="'+pathd+'" fill="black" x="'+(x2+5)+'" y="'+(h2+y2)+'" style="font-family:Calibri,sans-serif;font-size:'+h2+'pt;">'+w2[i]+'</text>');
      console.log("h"+(h2));
      py2.push(y2);
   }
   
   ystart=0;

   var h1=0;
   var h2=0;
   y2=0;
   
   for (var i=0;i<w1.length;i++){
      y1=py1[i];
      var indexInW2=findKey(w1[i],w2);
      if (indexInW2>-1){
      y2=py2[indexInW2];
      h1=Math.floor(9+15*(f1[i]-min1)/(max1-min1));
      h2=Math.floor(9+15*(f2[indexInW2]-min2)/(max2-min2));
      console.log("h"+(h1)+"h"+(h2));
      /*if w2.contains(w1[i]){
         $("panel").append("<div style=\"float:right;margin-right:500px\"></div>")
      } else {
         $("panel").append("<div style=\"float:left;margin-left:500px\"></div>")   
      }*/
   
      var pathd="M"+x1+","+y1+"C"+Math.floor((x1+x2)/2)+","+y1+" "+Math.floor((x1+x2)/2)+","+y2+" "+x2+","+y2+"C"+x2+","+Math.floor((y2+h2)/2)+" "+x2+","+Math.floor((y2+h2)/2)+" "+x2+","+(y2+h2)+"C"+Math.floor((x1+x2)/2)+","+(y2+h2)+" "+Math.floor((x1+x2)/2)+","+(y1+h1)+" "+x1+","+(y1+h1)+"C"+x1+","+Math.floor((y1+h1)/2)+" "+x1+","+Math.floor((y1+h1)/2)+" "+x1+","+y1;
      
      $("#panel").append('<path class="link" d="'+pathd+'", style="color:red;stroke-width: 1px;" opacity="0.5";></path>');
      
      //var path=makeSVG('path', {class: "link", d:'M30,10C65,10 65,50 100,50C100,65 100,65 100,80C65,80 65,20 30,20C30,15 30,15 30,10', style:'color:red;stroke-width: 1px;'});
      //var path=makeSVG('path', {class: "link", d:pathd, fill: 'black', style:'opacity:0.5;'});
      //document.getElementById('s').appendChild(path); 
      }
   }
   $("svg").css("height",Math.max(y1,y2)+10);
   $("#cont").html($("#cont").html());
   
   $(document).on("change","select",function() {
      updateValues();
   });
   
   $(document).on("change","input",function() {
      updateValues();
   });
    
});
    
</SCRIPT>

   <BODY style="font-family:Calibri,sans-serif">
   <h1>Word frequency chains</h1>

<span style="width:auto" id="label" style="font-family:Calibri,sans-serif;display:none;"></span>
<div id="cont">
<svg style="width:1000px;height:500px" id="panel">
</svg>
</div>
<!--
<path class="firstlink" d="M419.14285714285717,71.42047105822905C681.0714285714287,71.42047105822905 681.0714285714287,101.83666455099315 943,101.83666455099315" style="stroke-width: 83.9581212819503px;"><title>Thermal generation ? Losses
787 TWh</title></path>

x1=30
y1=10
h1=20

x2=100
y2=50
h2=30

<path class="link" d="Mx1,y1C(x1+x2)/2,y1 (x1+x2)/2,y2 x2,y2Cx2,(y2+h2)/2 x2,(y2+h2)/2 x2,y2+h2C(x1+x2)/2,y2+h2 (x1+x2)/2,y1+h1 x1,y1+h1Cx1,(y1+y2)/2 x1,(y1+y2)/2 x1,y1+h1" style="color:red;stroke-width: 1px;"><title>BimBoum</title></path>-->


<h2>&Agrave; propos</h2>

Outil conçu par <a href="https://sites.google.com/site/nadegelechevrel/">Nadège Lechevrel</a> et <a href="http://igm.univ-mlv.fr/~gambette/">Philippe Gambette</a>.

   </BODY>
</HTML>
