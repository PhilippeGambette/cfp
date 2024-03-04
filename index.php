<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
      <TITLE>Word Frequency Chains</TITLE>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/united/bootstrap.min.css">
      <link rel="icon" href="WFC.ico" />
</head>

<body style="font-family:Calibri,Arial,sans-serif">
<div style="margin:20px;">
<a href="index_fr.php"><img src="LangFrench.jpg" alt="En français..." title="En français..." style="float:right;margin-left:10px;"></a>
<h1>Word Frequency Chains: comparing 2 lists of most frequent words</h1>

Please insert below the lists of most frequent words of two texts you want to visualize. On each line, write the word first and then its number of occurrences.
You can build such lists using the <a href="http://www.treecloud.org">Treecloud.org</a> website.

<form action="WFC.php" method="post">
<br/>
<div style="float:left;width:auto;margin:20px;padding:20px;background-color:#AAEEAA">
Name of the first list:<br/>
<input type="text" name="title1" value="Years 2004-2007"></input><br/><br/>
Most frequent words of the 1st text:<br/>
<textarea name="words1" col=10 rows=10>
species;3499
biodiversity;1044
populations;1027
genetic;901
environmental;868
important;857
plant;838
population;798
change;789
effects;743
natural;731
diversity;726
climate;695
management;680
processes;647
soil;643
water;614
marine;611
analysis;589
ecosystem;587
ecological;580
ecosystems;578
understanding;567
areas;557
development;544
model;542
plants;526
models;523
environment;500
distribution;493
system;487
molecular;479
conditions;479
evolution;474
role;474
</textarea><br/>
</div>
<div style="float:left;width:auto;margin:20px;padding:20px;background-color:#EEAAAA">
Name of the second list:<br/>
<input type="text" name="title2" value="Years 2008-2011"><br/><br/>>
Most frequent words of the 2nd text:<br/>
<textarea name="words2" col=10 rows=10>
species;4025
change;1485
climate;1412
environmental;1337
biodiversity;1258
genetic;1177
populations;1151
ecosystem;1136
management;1108
soil;1103
important;1084
plant;1067
diversity;1063
effects;984
population;919
water;917
natural;913
understanding;913
ecological;896
ecosystems;865
carbon;830
marine;805
potential;767
environment;763
models;755
model;749
plants;733
processes;713
global;709
conservation;705
development;686
conditions;685
range;684
communities;681
large;662
</textarea><br/>
</div>
<br>
<input type="submit" value="Submit">
<br/>
<INPUT type="checkbox" name="frequencies" value="Display frequencies" checked>Display frequencies
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
<br/>
<br/>

<h2>About</h2>
<p>
   WFC - Word Frequency Chains, a visual tool to compare the frequency of words in two texts<br/>
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