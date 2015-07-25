--TEST--
PEAR Bug #12310
--FILE--
<?php

require dirname(__FILE__) . '/../PDF.php';

class MyPDF extends File_PDF
{
    function header()
    {
        $this->setFont('Arial', 'B', 15);
        $w = $this->getStringWidth($this->_info['title']) + 6;
        $this->setX((210 - $w) / 2);
        $this->setDrawColor('rgb', 0/255, 80/255, 180/255);
        $this->setFillColor('rgb', 230/255, 230/255, 0/255);
        $this->setTextColor('rgb', 220/255, 50/255, 50/255);
        $this->setLineWidth(1);
        $this->cell($w, 9, $this->_info['title'], 1, 1, 'C', 1);
        $this->newLine(10);
    }

    function footer()
    {
        $this->setY(-15);
        $this->setFont('Arial', 'I', 8);
        $this->setTextColor('gray', 128/255);
        $this->cell(0, 10, 'Page ' . $this->getPageNo(), 0, 0, 'C');
    }

    function chapterTitle($num, $label)
    {
        $this->setFont('Arial', '', 12);
        $this->setFillColor('rgb', 200/255, 220/255, 255/255);
        $this->cell(0, 6, "Chapter $num : $label", 0, 1, 'L', 1);
        $this->newLine(4);
    }

    function chapterBody($file)
    {
        $text = file_get_contents(dirname(__FILE__) . '/' . $file);
        $this->setFont('Times', '', 12);
        $this->multiCell(0, 5, $text);
        $this->newLine();
        $this->setFont('', 'I');
        $this->cell(0, 5, '(end of extract)');
    }

    function printChapter($num, $title, $file)
    {
        $this->addPage();
        $this->chapterTitle($num, $title);
        $this->chapterBody($file);
    }

}

$pdf = MyPDF::factory(array('orientation' => 'P',
                            'unit' => 'mm',
                            'format' => 'A4'),
                      'MyPDF');
$pdf->setCompression(false);
$pdf->setInfo('title', '20000 Leagues Under the Seas');
$pdf->setInfo('author', 'Jules Verne');
$pdf->printChapter(1, 'A RUNAWAY REEF', '20k_c1.txt');
$pdf->printChapter(2, 'THE PROS AND CONS', '20k_c2.txt');
echo $pdf->getOutput();

?>
--EXPECTF--
%PDF-1.3
3 0 obj
<</Type /Page
/Parent 1 0 R
/Resources 2 0 R
/Contents 4 0 R>>
endobj
4 0 obj
<</Length 6962>>
stream
2 J
0.57 w
BT /F1 15.00 Tf ET
0.000 0.314 0.706 RG
0.902 0.902 0.000 rg
2.83 w
179.09 813.54 237.10 -25.51 re B q 0.863 0.196 0.196 rg BT 187.59 796.28 Td (20000 Leagues Under the Seas) Tj ET Q
0.57 w
BT /F2 12.00 Tf ET
0 g
0 G
0.784 0.863 1.000 rg
28.35 759.68 538.58 -17.01 re f q 0 g BT 31.19 747.58 Td (Chapter 1 : A RUNAWAY REEF) Tj ET Q
BT /F3 12.00 Tf ET
0.002 Tw
q 0 g BT 31.19 720.65 Td (The year 1866 was marked by a bizarre development, an unexplained and downright inexplicable phenomenon) Tj ET Q
1.585 Tw
q 0 g BT 31.19 706.48 Td (that surely no one has forgotten. Without getting into those rumors that upset civilians in the seaports and) Tj ET Q
1.022 Tw
q 0 g BT 31.19 692.30 Td (deranged the public mind even far inland, it must be said that professional seamen were especially alarmed.) Tj ET Q
2.336 Tw
q 0 g BT 31.19 678.13 Td (Traders, shipowners, captains of vessels, skippers, and master mariners from Europe and America, naval) Tj ET Q
0.314 Tw
q 0 g BT 31.19 663.96 Td (officers from every country, and at their heels the various national governments on these two continents, were) Tj ET Q
0 Tw
q 0 g BT 31.19 649.78 Td (all extremely disturbed by the business.) Tj ET Q
3.660 Tw
q 0 g BT 31.19 635.61 Td (In essence, over a period of time several ships had encountered "an enormous thing" at sea, a long) Tj ET Q
2.306 Tw
q 0 g BT 31.19 621.44 Td (spindle-shaped object, sometimes giving off a phosphorescent glow, infinitely bigger and faster than any) Tj ET Q
0 Tw
q 0 g BT 31.19 607.26 Td (whale.) Tj ET Q
0.589 Tw
q 0 g BT 31.19 593.09 Td (The relevant data on this apparition, as recorded in various logbooks, agreed pretty closely as to the structure) Tj ET Q
0.125 Tw
q 0 g BT 31.19 578.92 Td (of the object or creature in question, its unprecedented speed of movement, its startling locomotive power, and) Tj ET Q
1.556 Tw
q 0 g BT 31.19 564.74 Td (the unique vitality with which it seemed to be gifted.  If it was a cetacean, it exceeded in bulk any whale) Tj ET Q
1.192 Tw
q 0 g BT 31.19 550.57 Td (previously classified by science.  No naturalist, neither Cuvier nor Lac�p�de, neither Professor Dumeril nor) Tj ET Q
1.159 Tw
q 0 g BT 31.19 536.40 Td (Professor de Quatrefages, would have accepted the existence of such a monster sight unseen -- specifically,) Tj ET Q
0 Tw
q 0 g BT 31.19 522.22 Td (unseen by their own scientific eyes.) Tj ET Q
1.520 Tw
q 0 g BT 31.19 508.05 Td (Striking an average of observations taken at different times -- rejecting those timid estimates that gave the) Tj ET Q
2.544 Tw
q 0 g BT 31.19 493.88 Td (object a length of 200 feet, and ignoring those exaggerated views that saw it as a mile wide and three) Tj ET Q
1.356 Tw
q 0 g BT 31.19 479.70 Td (long--you could still assert that this phenomenal creature greatly exceeded the dimensions of anything then) Tj ET Q
0 Tw
q 0 g BT 31.19 465.53 Td (known to ichthyologists, if it existed at all.) Tj ET Q
0.232 Tw
q 0 g BT 31.19 451.36 Td (Now then, it did exist, this was an undeniable fact; and since the human mind dotes on objects of wonder, you) Tj ET Q
0.292 Tw
q 0 g BT 31.19 437.18 Td (can understand the worldwide excitement caused by this unearthly apparition. As for relegating it to the realm) Tj ET Q
0 Tw
q 0 g BT 31.19 423.01 Td (of fiction, that charge had to be dropped.) Tj ET Q
3.687 Tw
q 0 g BT 31.19 408.84 Td (In essence, on July 20, 1866, the steamer Governor Higginson, from the Calcutta & Burnach Steam) Tj ET Q
0.332 Tw
q 0 g BT 31.19 394.66 Td (Navigation Co., encountered this moving mass five miles off the eastern shores of Australia. Captain Baker at) Tj ET Q
0.413 Tw
q 0 g BT 31.19 380.49 Td (first thought he was in the presence of an unknown reef; he was even about to fix its exact position when two) Tj ET Q
0.593 Tw
q 0 g BT 31.19 366.32 Td (waterspouts shot out of this inexplicable object and sprang hissing into the air some 150 feet.  So, unless this) Tj ET Q
0.177 Tw
q 0 g BT 31.19 352.14 Td (reef was subject to the intermittent eruptions of a geyser, the Governor Higginson had fair and honest dealings) Tj ET Q
0.662 Tw
q 0 g BT 31.19 337.97 Td (with some aquatic mammal, until then unknown, that could spurt from its blowholes waterspouts mixed with) Tj ET Q
0 Tw
q 0 g BT 31.19 323.80 Td (air and steam.) Tj ET Q
2.548 Tw
q 0 g BT 31.19 309.63 Td (Similar events were likewise observed in Pacific seas, on July 23 of the same year, by the Christopher) Tj ET Q
1.355 Tw
q 0 g BT 31.19 295.45 Td (Columbus from the West India & Pacific Steam Navigation Co.  Consequently, this extraordinary cetacean) Tj ET Q
0.567 Tw
q 0 g BT 31.19 281.28 Td (could transfer itself from one locality to another with startling swiftness, since within an interval of just three) Tj ET Q
1.163 Tw
q 0 g BT 31.19 267.11 Td (days, the Governor Higginson and the Christopher Columbus had observed it at two positions on the charts) Tj ET Q
0 Tw
q 0 g BT 31.19 252.93 Td (separated by a distance of more than 700 nautical leagues.) Tj ET Q
1.734 Tw
q 0 g BT 31.19 238.76 Td (Fifteen days later and 2,000 leagues farther, the Helvetia from the Compagnie Nationale and the Shannon) Tj ET Q
0.050 Tw
q 0 g BT 31.19 224.59 Td (from the Royal Mail line, running on opposite tacks in that part of the Atlantic lying between the United States) Tj ET Q
0.167 Tw
q 0 g BT 31.19 210.41 Td (and Europe, respectively signaled each other that the monster had been sighted in latitude 42 degrees 15' north) Tj ET Q
0.551 Tw
q 0 g BT 31.19 196.24 Td (and longitude 60 degrees 35' west of the meridian of Greenwich.  From their simultaneous observations, they) Tj ET Q
0.341 Tw
q 0 g BT 31.19 182.07 Td (were able to estimate the mammal's minimum length at more than 350 English feet; this was because both the) Tj ET Q
0.146 Tw
q 0 g BT 31.19 167.89 Td (Shannon and the Helvetia were of smaller dimensions, although each measured 100 meters stem to stern. Now) Tj ET Q
0.377 Tw
q 0 g BT 31.19 153.72 Td (then, the biggest whales, those rorqual whales that frequent the waterways of the Aleutian Islands, have never) Tj ET Q
0 Tw
q 0 g BT 31.19 139.55 Td (exceeded a length of 56 meters--if they reach even that.) Tj ET Q
0.293 Tw
q 0 g BT 31.19 125.37 Td (One after another, reports arrived that would profoundly affect public opinion:  new observations taken by the) Tj ET Q
0.893 Tw
q 0 g BT 31.19 111.20 Td (transatlantic liner Pereire, the Inman line's Etna running afoul of the monster, an official report drawn up by) Tj ET Q
0.051 Tw
q 0 g BT 31.19 97.03 Td (officers on the French frigate Normandy, dead-earnest reckonings obtained by the general staff of Commodore) Tj ET Q
1.236 Tw
q 0 g BT 31.19 82.85 Td (Fitz-James aboard the Lord Clyde. In lighthearted countries, people joked about this phenomenon, but such) Tj ET Q
0 Tw
q 0 g BT 31.19 68.68 Td (serious, practical countries as England, America, and Germany were deeply concerned.) Tj ET Q
0.060 Tw
0 Tw
BT /F4 8.00 Tf ET
q 0.502 g BT 284.96 25.95 Td (Page 1) Tj ET Q

endstream
endobj
5 0 obj
<</Type /Page
/Parent 1 0 R
/Resources 2 0 R
/Contents 6 0 R>>
endobj
6 0 obj
<</Length 1847>>
stream
2 J
0.57 w
BT /F3 12.00 Tf ET
BT /F1 15.00 Tf ET
0.000 0.314 0.706 RG
0.902 0.902 0.000 rg
2.83 w
179.09 813.54 237.10 -25.51 re B q 0.863 0.196 0.196 rg BT 187.59 796.28 Td (20000 Leagues Under the Seas) Tj ET Q
0.57 w
BT /F3 12.00 Tf ET
0.784 0.863 1.000 rg
0 G
0.060 Tw
q 0 g BT 31.19 749.00 Td (In every big city the monster was the latest rage; they sang about it in the coffee houses, they ridiculed it in the) Tj ET Q
0.034 Tw
q 0 g BT 31.19 734.82 Td (newspapers, they dramatized it in the theaters.  The tabloids found it a fine opportunity for hatching all sorts of) Tj ET Q
1.315 Tw
q 0 g BT 31.19 720.65 Td (hoaxes. In those newspapers short of copy, you saw the reappearance of every gigantic imaginary creature,) Tj ET Q
0.742 Tw
q 0 g BT 31.19 706.48 Td (from "Moby Dick," that dreadful white whale from the High Arctic regions, to the stupendous kraken whose) Tj ET Q
1.315 Tw
q 0 g BT 31.19 692.30 Td (tentacles could entwine a 500-ton craft and drag it into the ocean depths. They even reprinted reports from) Tj ET Q
0.707 Tw
q 0 g BT 31.19 678.13 Td (ancient times: the views of Aristotle and Pliny accepting the existence of such monsters, then the Norwegian) Tj ET Q
0.936 Tw
q 0 g BT 31.19 663.96 Td (stories of Bishop Pontoppidan, the narratives of Paul Egede, and finally the reports of Captain Harrington --) Tj ET Q
0.980 Tw
q 0 g BT 31.19 649.78 Td (whose good faith is above suspicion--in which he claims he saw, while aboard the Castilian in 1857, one of) Tj ET Q
1.389 Tw
q 0 g BT 31.19 635.61 Td (those enormous serpents that, until then, had frequented only the seas of France's old extremist newspaper,) Tj ET Q
0 Tw
q 0 g BT 31.19 621.44 Td (The Constitutionalist.
) Tj ET Q
BT /F5 12.00 Tf ET
q 0 g BT 31.19 593.09 Td (\(end of extract\)) Tj ET Q
BT /F4 8.00 Tf ET
q 0.502 g BT 284.96 25.95 Td (Page 2) Tj ET Q

endstream
endobj
7 0 obj
<</Type /Page
/Parent 1 0 R
/Resources 2 0 R
/Contents 8 0 R>>
endobj
8 0 obj
<</Length 6813>>
stream
2 J
0.57 w
BT /F5 12.00 Tf ET
BT /F1 15.00 Tf ET
0.000 0.314 0.706 RG
0.902 0.902 0.000 rg
2.83 w
179.09 813.54 237.10 -25.51 re B q 0.863 0.196 0.196 rg BT 187.59 796.28 Td (20000 Leagues Under the Seas) Tj ET Q
0.57 w
BT /F5 12.00 Tf ET
0.784 0.863 1.000 rg
0 G
BT /F2 12.00 Tf ET
0.784 0.863 1.000 rg
28.35 759.68 538.58 -17.01 re f q 0 g BT 31.19 747.58 Td (Chapter 2 : THE PROS AND CONS) Tj ET Q
BT /F3 12.00 Tf ET
1.002 Tw
q 0 g BT 31.19 720.65 Td (During the period in which these developments were occurring, I had returned from a scientific undertaking) Tj ET Q
0.608 Tw
q 0 g BT 31.19 706.48 Td (organized to explore the Nebraska badlands in the United States. In my capacity as Assistant Professor at the) Tj ET Q
1.687 Tw
q 0 g BT 31.19 692.30 Td (Paris Museum of Natural History, I had been attached to this expedition by the French government. After) Tj ET Q
2.020 Tw
q 0 g BT 31.19 678.13 Td (spending six months in Nebraska, I arrived in New York laden with valuable collections near the end of) Tj ET Q
1.649 Tw
q 0 g BT 31.19 663.96 Td (March. My departure for France was set for early May. In the meantime, then, I was busy classifying my) Tj ET Q
0 Tw
q 0 g BT 31.19 649.78 Td (mineralogical, botanical, and zoological treasures when that incident took place with the Scotia.) Tj ET Q
0.471 Tw
q 0 g BT 31.19 635.61 Td (I was perfectly abreast of this question, which was the big news of the day, and how could I not have been? I) Tj ET Q
0.782 Tw
q 0 g BT 31.19 621.44 Td (had read and reread every American and European newspaper without being any farther along. This mystery) Tj ET Q
0.516 Tw
q 0 g BT 31.19 607.26 Td (puzzled me. Finding it impossible to form any views, I drifted from one extreme to the other. Something was) Tj ET Q
1.601 Tw
q 0 g BT 31.19 593.09 Td (out there, that much was certain, and any doubting Thomas was invited to place his finger on the Scotia's) Tj ET Q
0 Tw
q 0 g BT 31.19 578.92 Td (wound.) Tj ET Q
1.249 Tw
q 0 g BT 31.19 564.74 Td (When I arrived in New York, the question was at the boiling point. The hypothesis of a drifting islet or an) Tj ET Q
1.561 Tw
q 0 g BT 31.19 550.57 Td (elusive reef, put forward by people not quite in their right minds, was completely eliminated. And indeed,) Tj ET Q
0 Tw
q 0 g BT 31.19 536.40 Td (unless this reef had an engine in its belly, how could it move about with such prodigious speed?) Tj ET Q
0.779 Tw
q 0 g BT 31.19 522.22 Td (Also discredited was the idea of a floating hull or some other enormous wreckage, and again because of this) Tj ET Q
0 Tw
q 0 g BT 31.19 508.05 Td (speed of movement.) Tj ET Q
1.114 Tw
q 0 g BT 31.19 493.88 Td (So only two possible solutions to the question were left, creating two very distinct groups of supporters: on) Tj ET Q
0.914 Tw
q 0 g BT 31.19 479.70 Td (one side, those favoring a monster of colossal strength; on the other, those favoring an "underwater boat" of) Tj ET Q
0 Tw
q 0 g BT 31.19 465.53 Td (tremendous motor power.) Tj ET Q
3.674 Tw
q 0 g BT 31.19 451.36 Td (Now then, although the latter hypothesis was completely admissible, it couldn't stand up to inquiries) Tj ET Q
0.227 Tw
q 0 g BT 31.19 437.18 Td (conducted in both the New World and the Old. That a private individual had such a mechanism at his disposal) Tj ET Q
0 Tw
q 0 g BT 31.19 423.01 Td (was less than probable. Where and when had he built it, and how could he have built it in secret?) Tj ET Q
0.395 Tw
q 0 g BT 31.19 408.84 Td (Only some government could own such an engine of destruction, and in these disaster-filled times, when men) Tj ET Q
1.331 Tw
q 0 g BT 31.19 394.66 Td (tax their ingenuity to build increasingly powerful aggressive weapons, it was possible that, unknown to the) Tj ET Q
0.106 Tw
q 0 g BT 31.19 380.49 Td (rest of the world, some nation could have been testing such a fearsome machine. The Chassepot rifle led to the) Tj ET Q
0.490 Tw
q 0 g BT 31.19 366.32 Td (torpedo, and the torpedo has led to this underwater battering ram, which in turn will lead to the world putting) Tj ET Q
0 Tw
q 0 g BT 31.19 352.14 Td (its foot down. At least I hope it will.) Tj ET Q
1.078 Tw
q 0 g BT 31.19 337.97 Td (But this hypothesis of a war machine collapsed in the face of formal denials from the various governments.) Tj ET Q
0.251 Tw
q 0 g BT 31.19 323.80 Td (Since the public interest was at stake and transoceanic travel was suffering, the sincerity of these governments) Tj ET Q
0.979 Tw
q 0 g BT 31.19 309.63 Td (could not be doubted. Besides, how could the assembly of this underwater boat have escaped public notice?) Tj ET Q
3.430 Tw
q 0 g BT 31.19 295.45 Td (Keeping a secret under such circumstances would be difficult enough for an individual, and certainly) Tj ET Q
0 Tw
q 0 g BT 31.19 281.28 Td (impossible for a nation whose every move is under constant surveillance by rival powers.) Tj ET Q
0.422 Tw
q 0 g BT 31.19 267.11 Td (So, after inquiries conducted in England, France, Russia, Prussia, Spain, Italy, America, and even Turkey, the) Tj ET Q
0 Tw
q 0 g BT 31.19 252.93 Td (hypothesis of an underwater Monitor was ultimately rejected.) Tj ET Q
2.481 Tw
q 0 g BT 31.19 238.76 Td (After I arrived in New York, several people did me the honor of consulting me on the phenomenon in) Tj ET Q
0.569 Tw
q 0 g BT 31.19 224.59 Td (question. In France I had published a two-volume work, in quarto, entitled The Mysteries of the Great Ocean) Tj ET Q
0.862 Tw
q 0 g BT 31.19 210.41 Td (Depths. Well received in scholarly circles, this book had established me as a specialist in this pretty obscure) Tj ET Q
1.833 Tw
q 0 g BT 31.19 196.24 Td (field of natural history. My views were in demand. As long as I could deny the reality of the business, I) Tj ET Q
0.058 Tw
q 0 g BT 31.19 182.07 Td (confined myself to a flat "no comment." But soon, pinned to the wall, I had to explain myself straight out. And) Tj ET Q
1.637 Tw
q 0 g BT 31.19 167.89 Td (in this vein, "the honorable Pierre Aronnax, Professor at the Paris Museum," was summoned by The New) Tj ET Q
0 Tw
q 0 g BT 31.19 153.72 Td (York Herald to formulate his views no matter what.) Tj ET Q
0.697 Tw
q 0 g BT 31.19 139.55 Td (I complied. Since I could no longer hold my tongue, I let it wag. I discussed the question in its every aspect,) Tj ET Q
0.017 Tw
q 0 g BT 31.19 125.37 Td (both political and scientific, and this is an excerpt from the well-padded article I published in the issue of April) Tj ET Q
0 Tw
q 0 g BT 31.19 111.20 Td (30.) Tj ET Q
2.226 Tw
q 0 g BT 31.19 82.85 Td ("Therefore," I wrote, "after examining these different hypotheses one by one, we are forced, every other) Tj ET Q
0 Tw
q 0 g BT 31.19 68.68 Td (supposition having been refuted, to accept the existence of an extremely powerful marine animal.) Tj ET Q
0.550 Tw
0 Tw
BT /F4 8.00 Tf ET
q 0.502 g BT 284.96 25.95 Td (Page 3) Tj ET Q

endstream
endobj
9 0 obj
<</Type /Page
/Parent 1 0 R
/Resources 2 0 R
/Contents 10 0 R>>
endobj
10 0 obj
<</Length 4707>>
stream
2 J
0.57 w
BT /F3 12.00 Tf ET
BT /F1 15.00 Tf ET
0.000 0.314 0.706 RG
0.902 0.902 0.000 rg
2.83 w
179.09 813.54 237.10 -25.51 re B q 0.863 0.196 0.196 rg BT 187.59 796.28 Td (20000 Leagues Under the Seas) Tj ET Q
0.57 w
BT /F3 12.00 Tf ET
0.784 0.863 1.000 rg
0 G
0.550 Tw
q 0 g BT 31.19 749.00 Td ("The deepest parts of the ocean are totally unknown to us. No soundings have been able to reach them. What) Tj ET Q
0.352 Tw
q 0 g BT 31.19 734.82 Td (goes on in those distant depths? What creatures inhabit, or could inhabit, those regions twelve or fifteen miles) Tj ET Q
0 Tw
q 0 g BT 31.19 720.65 Td (beneath the surface of the water? What is the constitution of these animals? It's almost beyond conjecture.) Tj ET Q
3.495 Tw
q 0 g BT 31.19 706.48 Td ("However, the solution to this problem submitted to me can take the form of a choice between two) Tj ET Q
0 Tw
q 0 g BT 31.19 692.30 Td (alternatives.) Tj ET Q
q 0 g BT 31.19 678.13 Td ("Either we know every variety of creature populating our planet, or we do not.) Tj ET Q
1.250 Tw
q 0 g BT 31.19 663.96 Td ("If we do not know every one of them, if nature still keeps ichthyological secrets from us, nothing is more) Tj ET Q
0.231 Tw
q 0 g BT 31.19 649.78 Td (admissible than to accept the existence of fish or cetaceans of new species or even new genera, animals with a) Tj ET Q
3.022 Tw
q 0 g BT 31.19 635.61 Td (basically 'cast-iron' constitution that inhabit strata beyond the reach of our soundings, and which some) Tj ET Q
1.589 Tw
q 0 g BT 31.19 621.44 Td (development or other, an urge or a whim if you prefer, can bring to the upper level of the ocean for long) Tj ET Q
0 Tw
q 0 g BT 31.19 607.26 Td (intervals.) Tj ET Q
0.321 Tw
q 0 g BT 31.19 593.09 Td ("If, on the other hand, we do know every living species, we must look for the animal in question among those) Tj ET Q
1.409 Tw
q 0 g BT 31.19 578.92 Td (marine creatures already cataloged, and in this event I would be inclined to accept the existence of a giant) Tj ET Q
0 Tw
q 0 g BT 31.19 564.74 Td (narwhale.) Tj ET Q
0.008 Tw
q 0 g BT 31.19 550.57 Td ("The common narwhale, or sea unicorn, often reaches a length of sixty feet. Increase its dimensions fivefold or) Tj ET Q
0.352 Tw
q 0 g BT 31.19 536.40 Td (even tenfold, then give this cetacean a strength in proportion to its size while enlarging its offensive weapons,) Tj ET Q
1.251 Tw
q 0 g BT 31.19 522.22 Td (and you have the animal we're looking for. It would have the proportions determined by the officers of the) Tj ET Q
0 Tw
q 0 g BT 31.19 508.05 Td (Shannon, the instrument needed to perforate the Scotia, and the power to pierce a steamer's hull.) Tj ET Q
0.130 Tw
q 0 g BT 31.19 493.88 Td ("In essence, the narwhale is armed with a sort of ivory sword, or lance, as certain naturalists have expressed it.) Tj ET Q
1.326 Tw
q 0 g BT 31.19 479.70 Td (It's a king-sized tooth as hard as steel. Some of these teeth have been found buried in the bodies of baleen) Tj ET Q
3.771 Tw
q 0 g BT 31.19 465.53 Td (whales, which the narwhale attacks with invariable success. Others have been wrenched, not without) Tj ET Q
0.119 Tw
q 0 g BT 31.19 451.36 Td (difficulty, from the undersides of vessels that narwhales have pierced clean through, as a gimlet pierces a wine) Tj ET Q
0.649 Tw
q 0 g BT 31.19 437.18 Td (barrel. The museum at the Faculty of Medicine in Paris owns one of these tusks with a length of 2.25 meters) Tj ET Q
0 Tw
q 0 g BT 31.19 423.01 Td (and a width at its base of forty-eight centimeters!) Tj ET Q
0.467 Tw
q 0 g BT 31.19 408.84 Td ("All right then! Imagine this weapon to be ten times stronger and the animal ten times more powerful, launch) Tj ET Q
0.980 Tw
q 0 g BT 31.19 394.66 Td (it at a speed of twenty miles per hour, multiply its mass times its velocity, and you get just the collision we) Tj ET Q
0 Tw
q 0 g BT 31.19 380.49 Td (need to cause the specified catastrophe.) Tj ET Q
1.067 Tw
q 0 g BT 31.19 366.32 Td ("So, until information becomes more abundant, I plump for a sea unicorn of colossal dimensions, no longer) Tj ET Q
0.631 Tw
q 0 g BT 31.19 352.14 Td (armed with a mere lance but with an actual spur, like ironclad frigates or those warships called 'rams,' whose) Tj ET Q
0 Tw
q 0 g BT 31.19 337.97 Td (mass and motor power it would possess simultaneously.) Tj ET Q
1.992 Tw
q 0 g BT 31.19 323.80 Td ("This inexplicable phenomenon is thus explained away--unless it's something else entirely, which, despite) Tj ET Q
0 Tw
q 0 g BT 31.19 309.63 Td (everything that has been sighted, studied, explored and experienced, is still possible!"
) Tj ET Q
BT /F5 12.00 Tf ET
q 0 g BT 31.19 281.28 Td (\(end of extract\)) Tj ET Q
BT /F4 8.00 Tf ET
q 0.502 g BT 284.96 25.95 Td (Page 4) Tj ET Q

endstream
endobj
1 0 obj
<</Type /Pages
/Kids [3 0 R 5 0 R 7 0 R 9 0 R ]
/Count 4
/MediaBox [0 0 595.28 841.89]
>>
endobj
11 0 obj
<</Type /Font
/BaseFont /Helvetica-Bold
/Subtype /Type1
/Encoding /WinAnsiEncoding
>>
endobj
12 0 obj
<</Type /Font
/BaseFont /Helvetica
/Subtype /Type1
/Encoding /WinAnsiEncoding
>>
endobj
13 0 obj
<</Type /Font
/BaseFont /Times-Roman
/Subtype /Type1
/Encoding /WinAnsiEncoding
>>
endobj
14 0 obj
<</Type /Font
/BaseFont /Helvetica-Oblique
/Subtype /Type1
/Encoding /WinAnsiEncoding
>>
endobj
15 0 obj
<</Type /Font
/BaseFont /Times-Italic
/Subtype /Type1
/Encoding /WinAnsiEncoding
>>
endobj
2 0 obj
<</ProcSet [/PDF /Text /ImageB /ImageC /ImageI]
/Font <<
/F1 11 0 R
/F2 12 0 R
/F3 13 0 R
/F4 14 0 R
/F5 15 0 R
>>
>>
endobj
16 0 obj
<<
/Producer (Horde PDF)
/Title (20000 Leagues Under the Seas)
/Author (Jules Verne)
/CreationDate (D:%d)
>>
endobj
17 0 obj
<<
/Type /Catalog
/Pages 1 0 R
/OpenAction [3 0 R /FitH null]
/PageLayout /OneColumn
>>
endobj
xref
0 18
0000000000 65535 f 
0000020852 00000 n 
0000021460 00000 n 
0000000009 00000 n 
0000000087 00000 n 
0000007099 00000 n 
0000007177 00000 n 
0000009074 00000 n 
0000009152 00000 n 
0000016015 00000 n 
0000016094 00000 n 
0000020957 00000 n 
0000021059 00000 n 
0000021156 00000 n 
0000021255 00000 n 
0000021360 00000 n 
0000021593 00000 n 
0000021730 00000 n 
trailer
<<
/Size 18
/Root 17 0 R
/Info 16 0 R
>>
startxref
21834
%%EOF
