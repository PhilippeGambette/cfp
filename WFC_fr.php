<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
   <HEAD>
      <TITLE>Word Frequency Chains</TITLE>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/united/bootstrap.min.css">
      <link rel="icon" href="WFC.ico" />
   </HEAD>

<SCRIPT TYPE="text/javascript" SRC="jquery-1.11.2.min.js"></script>

<script type="text/javascript">
/*
    ******************** WFC - Word Frequency Chains ********************
    -> a Javascript code to compare the frequency of words in two texts
    Copyright (C) 2015 - Philippe Gambette, Nad�ge Lechevrel

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/

function normalizeSize(x,min,max){
   return Math.round(9+15*(Math.log(x)-Math.log(min))/(Math.log(max)-Math.log(min)));
}

function toggleTransparency(evt){
   if(evt.target.getAttribute("opacity")>0.7){
      evt.target.setAttribute("opacity","0.3");
   } else {
      evt.target.setAttribute("opacity","0.8");   
   }
}

function toggleUnderline(evt){
   if(evt.target.getAttribute("font-style")=="italic"){
      evt.target.setAttribute("font-style","normal");
   } else {
      evt.target.setAttribute("font-style","italic");
   }
}


$(document).ready(function(){

<?php

//Initialize the two lists of frequent words:
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
       $f1.=$arc[1];
       $w1.=$arc[0];
    }else{
       $f1.=','.$arc[1];
       $w1.='","'.$arc[0];
    }
    $i++;
} 
echo $w1."\"];\n";
echo $f1."];\n";
}
}

treat("words1","w1","f1");
treat("words2","w2","f2");

//Initialize the titles:
if(isset($_POST["title1"])){
   echo "var title1=\"".$_POST["title1"]."\";";
} else {
   echo "var title1=\"Liste 1\";";
}

if(isset($_POST["title2"])){
   echo "var title2=\"".$_POST["title2"]."\";";
} else {
   echo "var title2=\"Liste 2\";";
}

if(isset($_POST["frequencies"])){
   echo "var freqDisplay=true;";
} else {
   echo "var freqDisplay=false;";
}

?>   
   
   //Minimum and maximum number of occurrences in the 1st list (expected to be sorted in decreasing order)
   var min1 = f1[f1.length-1];
   var max1 = f1[0];
   
   //Minimum and maximum number of occurrences in the 2nd list (expected to be sorted in decreasing order)
   var min2 = f2[f2.length-1];
   var max2 = f2[0];
   
   //Initialization of other variables
   var y1=30;
   var y2=30;
   var py1=[];
   var py2=[];
   var h1=0;
   var h2=0;
   
   //Horizontal position of the left endpoint of the links
   var x1=400;

   //Horizontal position of the right endpoint of the links
   var x2=600;
   
   //Add the titles
   $("#label").css("font-size","24pt");
   $("#label").text(title1);
   $("#panel").append('<text id="title1"'+
   ' class="link" fill="black" '+
   'x="'+(x1-5-parseInt($("#label").css("width")))+'" '+
   'y="30" style="font-family:Calibri,sans-serif;text-decoration:underline;font-weight:bold;'+
   'font-size:24pt;">'+title1+"</text>\n");
   $("#panel").append('<text id="title2"'+
   ' class="link" fill="black" '+
   'x="'+(x2+5)+'" '+
   'y="30" style="font-family:Calibri,sans-serif;text-decoration:underline;font-weight:bold;'+
   'font-size:24pt;">'+title2+"</text>\n");
   
   //Display the labels of the 1st list
   for (var i=0;i<w1.length;i++){
      y1=y1+10+h1;
      h1=normalizeSize(f1[i],min1,max1);
      $("#label").css("font-size",h1+"pt");
      if(freqDisplay){
         $("#label").text("("+f1[i]+") "+w1[i]);      
      } else {
         $("#label").text(w1[i]);
      }
      $("#panel").append('<text onclick="toggleUnderline(evt)" id="l1'+i+'"'+
      ' class="link" fill="black" '+
      'x="'+(x1-5-parseInt($("#label").css("width")))+'" '+
      'y="'+(h1+y1-1)+'" style="font-family:Calibri,sans-serif;'+
      'font-size:'+h1+'pt;">'+$("#label").text()+"</text>\n");
      //console.log("h"+(h1));
      py1.push(y1);
   }
   $("#label").text("");
   
   //Display the labels of the 2nd list
   for (var i=0;i<w2.length;i++){
      y2=y2+10+h2;
      h2=normalizeSize(f2[i],min2,max2);
      if(freqDisplay){
         var label=w2[i]+" ("+f2[i]+")";
      } else {
         var label=w2[i]
      }
      $("#panel").append('<text onclick="toggleUnderline(evt)" id="l2'+i+'" class="link" fill="black" x="'+(x2+5)+
      '" y="'+(h2+y2-1)+'" style="font-family:Calibri,sans-serif;font-size:'+h2+'pt;">'+
      label+"</text>\n");
      //console.log("h"+(h2));
      py2.push(y2);
   }
   
   // Compute the smallest and highest differences of position in 1st and 2nd list
   var minHeight=0;
   var maxHeight=0;
   for (var i=0;i<w1.length;i++){
      var indexInW2=w2.indexOf(w1[i]);
      if (i-indexInW2<minHeight){
         minHeight=i-indexInW2;
      }
      if (i-indexInW2>maxHeight){
         maxHeight=i-indexInW2;
      }
   }
      
   // Display the links
   for (var i=0;i<w1.length;i++){
      y1=py1[i];
      var indexInW2=w2.indexOf(w1[i]);
      if (indexInW2>-1){
         y2=py2[indexInW2];
         h1=normalizeSize(f1[i],min1,max1);
         h2=normalizeSize(f2[indexInW2],min2,max2);
         //console.log("h"+(h1)+"h"+(h2));
         var pathd="M"+x1+","+y1+
         "C"+Math.floor((x1+x2)/2)+","+y1+" "+Math.floor((x1+x2)/2)+","+y2+" "+x2+","+y2+
         "C"+x2+","+Math.floor((y2+h2)/2)+" "+x2+","+Math.floor((y2+h2)/2)+" "+x2+","+(y2+h2)+
         "C"+Math.floor((x1+x2)/2)+","+(y2+h2)+" "+Math.floor((x1+x2)/2)+","+(y1+h1)+" "+x1+","+(y1+h1)+
         "C"+x1+","+Math.floor((y1+h1)/2)+" "+x1+","+Math.floor((y1+h1)/2)+" "+x1+","+y1;
         
         // Color the links
         var green=125;
         var red=125;
         if (i-indexInW2>0){
            green=50+Math.floor(205*(i-indexInW2)/(maxHeight))
            red=0;
         }else{
            if (i-indexInW2==0){
               red=50;
               green=50;
            }else{
               red=50+Math.floor(205*(i-indexInW2)/(minHeight))
               green=0
            }
         }
         $("#panel").append('<path onclick="toggleTransparency(evt)" class="link" d="'+pathd+'" fill="rgb('+red+',0,'+green+')" style="stroke-width:1px" opacity="0.3">'+"</path>\n"); 
      }
   }
   $("svg").css("height",Math.max(y1,y2)+70);
   $("svg").css("width",x1+x2);
   $("#cont").html($("#cont").html());
});
</script>

<body style="font-family:Calibri,sans-serif;margin:20px;">

<a href="index.php"><img src="LangEnglish.jpg" alt="In English..." title="In English..." style="float:right;margin-left:10px;"></a>
<h1>Word Frequency Chains</h1>
<p>
   La visualisation ci-dessous montre les 2 listes de mots fournies.
   Les <b>tailles des mots</b> d�pendent de leur nombre d'occurrence dans les 2 listes fournies.
   Si le m�me mot appara�t du c�t� gauche et du c�t� droit, un <b>lien</b> est dessin� entre les deux occurrences :
   le lien est <b>bleu</b> si le mot est mieux class� dans la seconde liste, <b>rouge</b> s'il est mieux class� dans la premi�re, <b>gris</b> s'il a le m�me classement dans les deux listes.
</p>
<p>
   Cette visualisation aide � d�tecter les "<i><b>word frequency chains</b></i>", c'est-�-dire des <b>ensembles de mots qui sont class�s dans un ordre invers� dans la premi�re et la seconde liste</b>. Pour trouver de tels ensembles, il faut trouver <b>un lien bleu qui intersecte un lien rouge</b>, et identifier les autres liens qui les intersectent, dont les extr�mit�s grauche et droite sont apparaissent selon un ordre invers�.
</p>

<span style="width: auto; font-size: 9pt;" id="label"></span>
<div id="cont">
<svg style="width: 1000px; height: 697px;" id="panel">
</svg>
</div>

<h2>&Agrave; propos</h2>
<p>
   WFC - Word Frequency Chains, un outil visuel pour comparer les fr�quences de mots dans deux textes<br/>
   Copyright &copy; 2015 - <a href="https://sites.google.com/site/nadegelechevrel/">Nad�ge Lechevrel</a>
   &amp; <a href="http://igm.univ-mlv.fr/~gambette/">Philippe Gambette</a>.
</p>
<p>
   This program is free software: you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation, either version 3 of the License, or
   (at your option) any later version.
</p>
<p>
   This program is distributed in the hope that it will be useful,
   but without any warranty; without even the implied warranty of
   merchantability or fitness for a particular purpose.  See the
   <a href="http://www.gnu.org/licenses/">GNU General Public License</a> for more details.
</p>

<!--blgSoO/ei5lt-->
</body></html>