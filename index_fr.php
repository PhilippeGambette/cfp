<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
      <TITLE>Word Frequency Chains</TITLE>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/united/bootstrap.min.css">
      <link rel="icon" href="WFC.ico" />
</head>

<body style="font-family:Calibri,Arial,sans-serif">
<div style="margin:20px;">
<a href="index.php"><img src="LangEnglish.jpg" alt="In English..." title="In English..." style="float:right;margin-left:10px;"></a>
<h1>Word Frequency Chains : comparaison de deux listes de mots les plus fréquents</h1>

Merci d'entrer dans les cadres ci-dessous les listes de mots les plus fréquents de deux textes, avec sur chaque ligne un mot et son nombre d'occurrences.
Vous pouvez construire de telles listes en utilisant le site <a href="http://www.treecloud.org">Treecloud.org</a>

<form action="WFC_fr.php" method="post">
<br/>
<div style="float:left;width:auto;margin:20px;padding:20px;background-color:#AAEEAA">
Nom de la première liste :<br/>
<input type="text" name="title1" value="Femmes &amp; hommes de lettres"></input><br/><br/>
Mots les plus fréquents du texte 1 :<br/>
<textarea name="words1" col=10 rows=10>
nature;370
science;288
vie;248
homme;226
philosophie;217
monde;207
espèces;197
phénomènes;171
principe;164
êtres;160
temps;151
esprit;150
lois;148
école;144
ordre;143
matière;140
espèce;134
animaux;132
théorie;130
caractères;127
loi;127
unité;120
finalité;120
formes;118
histoire;113
mouvement;112
seulement;111
pensée;108
méthode;108
grand;106
expliquer;105
agassiz;100
doctrine;100
force;96
forme;96
création;96
action;95
</textarea><br/>
</div>
<div style="float:left;width:auto;margin:20px;padding:20px;background-color:#EEAAAA">
Nom de la seconde liste :<br/>
<input type="text" name="title2" value="Scientifiques"><br/><br/>
Mots les plus fréquents du texte 2 :<br/>
<textarea name="words2" col=10 rows=10>
phénomènes;324
corps;268
vie;244
animaux;222
cœur;196
science;163
nature;161
homme;144
animal;143
espèces;137
propriétés;137
plantes;134
sciences;131
sang;128
organes;122
végétaux;120
cerveau;112
êtres;109
physiologie;108
glacier;104
curare;100
conditions;100
eau;97
élémens;96
influence;95
seulement;95
effet;95
temps;94
lamarck;93
fonctions;92
chimiques;89
mort;87
action;85
organisme;85
vitales;85
organique;84
milieu;83
</textarea><br/>
</div>
<br>
<input type="submit" value="Envoyer">
<br/>
<INPUT type="checkbox" name="frequencies" value="Display frequencies" checked>Afficher les fréquences
</form>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>


<h2>&Agrave; propos</h2>
<p>
   WFC - Word Frequency Chains, un outil visuel pour comparer les fréquences de mots dans deux textes<br/>
   Copyright &copy; 2015 - <a href="https://sites.google.com/site/nadegelechevrel/">Nadège Lechevrel</a>
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

</div>
</body></html>