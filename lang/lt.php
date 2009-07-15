<?php
/*
	Project: PHP Typography
	Project URI: http://kingdesk.com/projects/php-typography/
	
	File modified to place pattern and exceptions in arrays that can be understood in php files.
	This file is released under the same copyright as the below referenced original file
	Original unmodified file is available at: http://mirror.unl.edu/ctan/language/hyph-utf8/tex/generic/hyph-utf8/patterns/
	Original file name: hyph-lt.tex
	
//============================================================================================================
	ORIGINAL FILE INFO

		% This file is part of hyph-utf8 package and resulted from
		% semi-manual conversions of hyphenation patterns into UTF-8
		% in October 2008 by Mojca & Arthur.
		%
		% Source available on:
		% - http://www.vtex.lt/tex/littex/index.html
		%
		% Authors:
		%
		% First version in LT encoding (modified T1):
		% - Vytas Statulevičius <vytas at vtex.lt>
		% - Yannis Haralambous
		%   (Vilnius, March 4, 1992)
		% Conversion into Latin 7 and aditional support files (babel, fonts):
		% - Sigitas Tolusis <sigitas at vtex.lt>
		%   (2002-11-20)
		% Adaptation for hyph-utf8:
		% - Mojca & Arthur (see below), October 2008
		%
		% The copyright statement of this file is:
		%
		%    Do with this file whatever needs to be done in future for the sake of
		%    "a better world" as long as you respect the copyright of original file.
		%
		% If you want to change this file, rather than uploading directly to CTAN,
		% we would be grateful if you could send it to us (http://tug.org/tex-hyphen)
		% or ask for credentials for SVN repository and commit it yourself;
		% we will then upload the whole "package" to CTAN.
		%
		% For more unformation see
		%
		%    http://tug.org/tex-hyphen
		%
		%------------------------------------------------------------------------------


//============================================================================================================	
	
*/

$patgenLanguage = "Lithuanian";

$patgenExceptions = array();

$patgenMaxSeg = 6;

$patgen = array('begin'=>array("ap"=>"001","api"=>"0001","apr"=>"0030","arbi"=>"00001","arti"=>"00001","asp"=>"0030","at"=>"001","ata"=>"0001","atr"=>"0030","ašv"=>"0030","dina"=>"00001","ekr"=>"0030","iš"=>"023","iši"=>"0002","kirti"=>"000001","nu"=>"001","nusi"=>"00001","pieč"=>"00020","sam"=>"0001","sida"=>"00001","sk"=>"004","st"=>"004","sukr"=>"00500","tes"=>"0032","uk"=>"003","uš"=>"023","už"=>"001","įs"=>"004","šven"=>"00001"),'end'=>array("gro"=>"0300","ja"=>"300","ka"=>"300","ki"=>"500","kle"=>"4000","klo"=>"4000","klu"=>"4000","la"=>"300","le"=>"300","li"=>"300","lo"=>"300","lu"=>"300","pro"=>"0500","ra"=>"300","rauka"=>"000400","ri"=>"300","rima"=>"00200","rsko"=>"00400","sk"=>"400","ska"=>"0500","sme"=>"4000","va"=>"300"),'all'=>array("aa"=>"012","ab"=>"010","ac"=>"010","ach"=>"0200","ad"=>"010","adra"=>"04000","ae"=>"010","ael"=>"0020","af"=>"010","ag"=>"210","agr"=>"0400","agra"=>"00300","agrio"=>"050000","agro"=>"05000","ah"=>"010","ainf"=>"05000","aisk"=>"00400","aitr"=>"00400","aj"=>"010","ak"=>"010","akl"=>"0020","akvi"=>"00200","akėt"=>"02000","al"=>"010","ali"=>"0300","alo"=>"0501","aly"=>"0300","alė"=>"0300","alū"=>"0300","am"=>"010","an"=>"010","ankl"=>"00320","ansk"=>"00400","antr"=>"00400","ao"=>"020","ap"=>"010","apak"=>"00140","apei"=>"00300","apim"=>"00320","apl"=>"0030","apr"=>"0300","aps"=>"0032","ar"=>"010","areit"=>"001000","arg"=>"0400","aris"=>"00040","as"=>"010","asi"=>"0001","asis"=>"00050","ask"=>"0400","askl"=>"00300","asl"=>"0300","asmi"=>"00200","asmu"=>"00200","asn"=>"0540","astu"=>"04000","at"=>"010","ataug"=>"003000","ateist"=>"0005000","atim"=>"00320","ato"=>"0001","atp"=>"0004","atru"=>"04000","atė"=>"0012","atūž"=>"00020","au"=>"040","aukl"=>"00400","ausk"=>"00400","ausl"=>"00400","autr"=>"00430","av"=>"010","aw"=>"010","ay"=>"010","az"=>"010","aą"=>"010","ač"=>"210","aę"=>"010","aė"=>"012","aį"=>"010","aš"=>"010","ašn"=>"0300","aštr"=>"00400","ašv"=>"0020","aų"=>"010","aū"=>"012","až"=>"010","ažl"=>"0020","bac"=>"0030","balta"=>"000001","basl"=>"00400","bb"=>"210","bc"=>"210","bd"=>"430","bep"=>"0004","bes"=>"0032","besi"=>"00001","bet"=>"0032","bf"=>"210","bg"=>"210","bh"=>"210","bj"=>"010","bk"=>"210","bl"=>"210","bla"=>"0200","bliz"=>"02000","blo"=>"3200","blu"=>"0200","bm"=>"210","bn"=>"210","bp"=>"210","br"=>"220","bri"=>"0300","bs"=>"210","bt"=>"230","buk"=>"0040","bv"=>"210","bw"=>"210","bz"=>"210","bč"=>"210","bš"=>"210","bž"=>"210","car"=>"0004","cb"=>"210","cc"=>"210","cd"=>"210","cf"=>"210","cg"=>"210","chi"=>"3000","ck"=>"210","cl"=>"210","cm"=>"210","cn"=>"210","cp"=>"210","cr"=>"210","cs"=>"210","ct"=>"210","cu"=>"004","cuk"=>"0005","cv"=>"210","cw"=>"210","cz"=>"210","cč"=>"210","cš"=>"210","cž"=>"210","dab"=>"0034","db"=>"210","dc"=>"210","dd"=>"210","dek"=>"0040","dema"=>"00001","depr"=>"00400","desp"=>"00400","df"=>"210","dg"=>"210","dh"=>"210","dip"=>"0040","dis"=>"0040","disk"=>"00050","dj"=>"210","dk"=>"230","dl"=>"430","dm"=>"210","dn"=>"210","dori"=>"00300","dp"=>"210","dr"=>"210","dro"=>"0001","drob"=>"00020","drė"=>"0200","drų"=>"4000","ds"=>"210","dt"=>"210","dua"=>"0020","duk"=>"0040","duka"=>"00500","dusl"=>"00400","dv"=>"210","dva"=>"0300","dvia"=>"00030","dw"=>"210","dz"=>"040","dč"=>"210","dš"=>"210","dž"=>"040","džio"=>"00001","ea"=>"012","eal"=>"0230","eapi"=>"00001","eat"=>"0001","eb"=>"012","ebe"=>"0001","ebl"=>"0300","ebr"=>"0030","ec"=>"010","ech"=>"0200","ed"=>"032","edri"=>"00300","edro"=>"04000","edrė"=>"00300","ee"=>"010","ef"=>"010","eg"=>"010","egra"=>"00300","eh"=>"010","eie"=>"0100","eikl"=>"00430","ein"=>"1000","eisk"=>"00400","eisl"=>"00400","eist"=>"20030","eistra"=>"0000200","eiš"=>"0021","ej"=>"010","ek"=>"010","ekr"=>"0300","el"=>"010","em"=>"010","emas"=>"00054","en"=>"210","enkl"=>"00320","enkla"=>"000400","eno"=>"0001","ens"=>"0004","enta"=>"40000","enu"=>"0001","eo"=>"020","eor"=>"0300","eoš"=>"0320","ep"=>"030","epli"=>"00400","epr"=>"0040","epra"=>"00001","epri"=>"00001","er"=>"010","erea"=>"00034","eris"=>"00040","ero"=>"0001","erė"=>"0002","es"=>"010","esis"=>"00050","esk"=>"0040","eska"=>"00001","esko"=>"05000","esv"=>"0320","et"=>"010","eu"=>"014","euž"=>"0003","ev"=>"010","evi"=>"0300","ew"=>"010","ey"=>"010","ez"=>"010","eą"=>"010","eč"=>"010","eę"=>"010","eė"=>"010","eį"=>"014","eįp"=>"0003","eįsk"=>"00030","eįtr"=>"00030","eš"=>"010","ešn"=>"0300","ešv"=>"0020","ešė"=>"0003","eų"=>"010","eū"=>"010","ež"=>"010","fb"=>"210","fc"=>"210","fd"=>"210","ff"=>"210","fg"=>"210","fh"=>"210","fis"=>"0045","fk"=>"210","fl"=>"210","fm"=>"210","fn"=>"210","fp"=>"210","fr"=>"210","fri"=>"0001","fs"=>"210","ft"=>"210","fv"=>"210","fw"=>"210","fz"=>"210","fč"=>"210","fš"=>"210","fž"=>"210","gaš"=>"0003","gb"=>"210","gc"=>"210","gd"=>"210","geo"=>"0041","gf"=>"210","gg"=>"210","gh"=>"210","gk"=>"210","gl"=>"210","gle"=>"0200","glo"=>"0200","gm"=>"210","gn"=>"210","gnų"=>"3200","gp"=>"212","gr"=>"320","grai"=>"00002","gran"=>"03000","gre"=>"5300","grei"=>"04000","gri"=>"0300","grio"=>"44000","grą"=>"0400","grį"=>"5000","grų"=>"4000","gs"=>"210","gt"=>"410","gu"=>"300","gv"=>"210","gw"=>"210","gyva"=>"00001","gz"=>"210","gč"=>"210","gš"=>"210","gž"=>"210","hb"=>"210","hc"=>"210","hd"=>"210","hf"=>"210","hg"=>"210","hh"=>"210","hib"=>"0040","hk"=>"210","hl"=>"220","hm"=>"210","hme"=>"0200","hn"=>"210","hp"=>"210","hr"=>"210","hs"=>"210","ht"=>"210","hv"=>"210","hw"=>"210","hz"=>"210","hč"=>"210","hš"=>"210","hž"=>"210","ia"=>"020","iag"=>"0054","iaiš"=>"03000","iak"=>"0030","iantę"=>"030000","iantė"=>"030000","iap"=>"0004","iar"=>"0300","ib"=>"032","ic"=>"010","ice"=>"0001","id"=>"010","idr"=>"0020","idrė"=>"00300","idėm"=>"02000","ie"=>"020","iedr"=>"00430","ieg"=>"0030","iei"=>"0300","iekl"=>"00300","ient"=>"03000","iepr"=>"00450","iesk"=>"00400","if"=>"010","ig"=>"210","igl"=>"0320","igru"=>"00300","ih"=>"210","ii"=>"012","ij"=>"010","ik"=>"010","ikn"=>"0320","ikr"=>"0030","il"=>"010","ilo"=>"0001","im"=>"010","imd"=>"1000","in"=>"410","inkl"=>"00400","inv"=>"5000","io"=>"020","iogr"=>"00430","iok"=>"0002","iopl"=>"00400","ior"=>"0300","ip"=>"010","ipj"=>"0210","ipru"=>"00300","ir"=>"010","iras"=>"00032","iri"=>"0300","is"=>"410","isa"=>"0500","isi"=>"0500","isk"=>"0040","isl"=>"0300","isli"=>"00400","isn"=>"0540","iste"=>"04000","isto"=>"00001","it"=>"232","iu"=>"020","iv"=>"010","iw"=>"010","iy"=>"010","iz"=>"010","ią"=>"020","ič"=>"010","ię"=>"010","iė"=>"012","iį"=>"010","iš"=>"010","išn"=>"0300","išt"=>"0050","išv"=>"0400","išė"=>"0002","išš"=>"1000","ių"=>"020","iū"=>"020","iž"=>"030","jauna"=>"000001","jb"=>"210","jc"=>"210","jd"=>"210","jf"=>"210","jg"=>"210","jh"=>"210","jj"=>"210","jk"=>"210","jl"=>"210","jm"=>"210","jn"=>"210","jot"=>"0003","jotv"=>"00400","jp"=>"210","jr"=>"210","js"=>"210","jt"=>"210","ju"=>"100","jv"=>"210","jw"=>"210","jz"=>"210","jč"=>"210","jš"=>"210","jū"=>"100","jž"=>"210","kad"=>"5030","kak"=>"0003","kakl"=>"00400","kapr"=>"00400","kar"=>"3000","kas"=>"3000","kati"=>"30000","kav"=>"5000","kavar"=>"000001","kaz"=>"0032","kb"=>"210","kc"=>"210","kd"=>"210","ke"=>"300","keb"=>"0043","keren"=>"000001","kf"=>"210","kg"=>"210","kh"=>"210","ki"=>"040","kia"=>"5000","kib"=>"3000","kil"=>"3000","kit"=>"5000","kk"=>"210","kl"=>"210","kla"=>"3200","klan"=>"04000","klel"=>"02000","kly"=>"0200","klą"=>"4000","klų"=>"4000","km"=>"210","kn"=>"210","ko"=>"300","kp"=>"210","kr"=>"220","krau"=>"04000","kris"=>"00002","krist"=>"000500","kro"=>"0300","krov"=>"04000","kru"=>"4300","krun"=>"50000","kry"=>"0400","krą"=>"0500","ks"=>"210","ksk"=>"0400","ksl"=>"0030","ksp"=>"0430","kt"=>"410","kta"=>"0300","ku"=>"300","kub"=>"4000","kuk"=>"0040","kupr"=>"00400","kv"=>"210","kva"=>"0200","kvo"=>"0300","kvė"=>"0200","kw"=>"210","kyt"=>"3000","kz"=>"210","ką"=>"500","kč"=>"210","kš"=>"210","kšly"=>"00200","kšė"=>"0003","kž"=>"210","lapsto"=>"0004300","lb"=>"210","lbr"=>"0030","lc"=>"210","ld"=>"210","lec"=>"0030","legr"=>"00400","leč"=>"4000","lf"=>"210","lg"=>"210","lgst"=>"00320","lh"=>"210","lia"=>"0040","lio"=>"5040","lių"=>"3000","lj"=>"210","lk"=>"210","lko"=>"0001","ll"=>"210","lm"=>"210","ln"=>"210","log"=>"0004","lop"=>"4000","lp"=>"410","lpna"=>"00001","lr"=>"210","ls"=>"410","lsk"=>"0400","lsp"=>"0430","lt"=>"430","lup"=>"2000","lv"=>"410","lw"=>"210","lyč"=>"3000","lz"=>"210","lą"=>"300","lč"=>"210","lęs"=>"3000","lėm"=>"3000","lės"=>"3000","lėč"=>"2000","lį"=>"304","lš"=>"410","lų"=>"300","lž"=>"210","ma"=>"020","maid"=>"23000","mas"=>"3000","maski"=>"000300","mb"=>"210","mbr"=>"0030","mc"=>"210","md"=>"210","mec"=>"0030","meis"=>"00001","mf"=>"210","mg"=>"210","mh"=>"210","migl"=>"00400","migr"=>"00400","mins"=>"00040","mitr"=>"00400","mk"=>"210","ml"=>"210","mm"=>"210","mn"=>"210","mo"=>"020","mod"=>"2000","mp"=>"210","mpl"=>"0400","mpr"=>"0300","mr"=>"210","ms"=>"410","mt"=>"210","mta"=>"0300","muo"=>"3000","mv"=>"210","mw"=>"210","mz"=>"210","mč"=>"210","mš"=>"210","mž"=>"210","nas"=>"0032","nat"=>"0032","nb"=>"210","nc"=>"210","ncen"=>"00001","nd"=>"210","ndrė"=>"03000","ne"=>"001","neg"=>"0004","neim"=>"00020","neo"=>"0043","neor"=>"00002","nerė"=>"00003","nesi"=>"00001","nesl"=>"00300","nest"=>"00320","net"=>"0032","neįst"=>"000030","nf"=>"210","ng"=>"410","ngl"=>"0030","ngr"=>"0040","nh"=>"210","nis"=>"0040","nj"=>"210","nk"=>"210","nkla"=>"00300","nkr"=>"0030","nkry"=>"03000","nl"=>"210","nm"=>"210","nn"=>"210","no"=>"500","np"=>"210","nr"=>"210","ns"=>"410","nsku"=>"00400","nsl"=>"0030","nsp"=>"0430","nstr"=>"00030","nt"=>"410","nta"=>"0300","ntpl"=>"00400","ntru"=>"03000","ntruo"=>"002000","nua"=>"0004","nub"=>"0032","nug"=>"0030","nui"=>"0010","nuk"=>"0002","nuo"=>"0043","nuos"=>"00002","nus"=>"0054","nv"=>"210","nw"=>"210","nz"=>"210","nč"=>"410","nš"=>"210","nž"=>"210","oa"=>"010","ob"=>"010","oc"=>"010","od"=>"010","odr"=>"0300","oe"=>"010","oet"=>"0200","of"=>"010","og"=>"010","oh"=>"010","oi"=>"010","oj"=>"010","ok"=>"010","okr"=>"0300","ol"=>"010","olen"=>"00001","om"=>"010","ompr"=>"00400","on"=>"010","ono"=>"0001","oo"=>"012","op"=>"010","or"=>"010","orie"=>"02000","oris"=>"00040","ortr"=>"00400","orę"=>"0200","os"=>"010","osl"=>"0300","osle"=>"00300","oslo"=>"00400","osv"=>"0320","ot"=>"032","oto"=>"0001","ov"=>"010","ow"=>"010","oy"=>"010","oz"=>"010","oą"=>"010","oč"=>"010","oę"=>"010","oė"=>"010","oį"=>"010","oš"=>"010","ošv"=>"0020","oų"=>"010","oū"=>"010","ož"=>"010","pa"=>"003","pad"=>"0002","pail"=>"00020","paim"=>"00020","pair"=>"00020","pan"=>"3000","pap"=>"0004","par"=>"0200","parsi"=>"000001","parė"=>"00412","pas"=>"0002","pasr"=>"00500","pat"=>"0202","pb"=>"210","pc"=>"410","pd"=>"432","pe"=>"020","per"=>"0001","pere"=>"00200","perim"=>"002300","pers"=>"00030","perė"=>"00200","pf"=>"210","pg"=>"210","ph"=>"210","pi"=>"020","pieš"=>"03000","pk"=>"232","pl"=>"320","ple"=>"0300","pli"=>"0300","plio"=>"40000","pliu"=>"04000","plo"=>"0300","ploj"=>"04000","plu"=>"0400","ply"=>"0400","pm"=>"210","pn"=>"410","po"=>"300","pog"=>"0040","poli"=>"00001","pp"=>"210","pr"=>"220","prai"=>"03000","prausi"=>"0000200","praš"=>"03000","pri"=>"0300","pris"=>"00002","prom"=>"03000","pry"=>"0300","prą"=>"4000","prė"=>"0300","prū"=>"0300","ps"=>"410","psi"=>"0001","psk"=>"0540","psty"=>"04300","psv"=>"0320","pt"=>"432","pu"=>"340","pusiau"=>"0000001","pusk"=>"00400","pusl"=>"00400","putr"=>"00400","pv"=>"210","pw"=>"210","py"=>"020","pz"=>"210","pč"=>"210","pė"=>"020","pš"=>"432","pž"=>"430","ra"=>"020","rab"=>"0030","rac"=>"3000","raim"=>"00100","raitį"=>"000400","rakr"=>"00300","ral"=>"3000","ram"=>"3000","rasl"=>"00040","rasm"=>"00300","rav"=>"3000","rb"=>"210","rbo"=>"0001","rbr"=>"0340","rc"=>"210","rd"=>"410","reb"=>"2000","rein"=>"40000","reit"=>"40000","rel"=>"3000","rep"=>"0045","res"=>"5000","resl"=>"00030","ret"=>"3000","rf"=>"210","rg"=>"210","rh"=>"210","ri"=>"020","rid"=>"0030","rij"=>"3000","rikr"=>"00300","ril"=>"2000","rimt"=>"23000","rio"=>"3000","rip"=>"0030","risi"=>"00001","rist"=>"00300","rivin"=>"000001","rią"=>"3000","rių"=>"3000","riū"=>"2000","rk"=>"410","rkly"=>"00300","rkr"=>"0340","rl"=>"410","rm"=>"210","rn"=>"410","ro"=>"020","rod"=>"3002","rogr"=>"00400","roj"=>"3000","rok"=>"3000","ron"=>"3000","rop"=>"3000","rorg"=>"23000","ros"=>"5000","rp"=>"210","rpr"=>"0340","rr"=>"210","rs"=>"410","rsp"=>"0040","rt"=>"410","rtik"=>"00054","rtis"=>"00032","rtr"=>"0320","rtv"=>"0320","ru"=>"020","ruk"=>"2000","rul"=>"3000","run"=>"4000","ruos"=>"30000","rup"=>"2000","rus"=>"3000","rusk"=>"00400","ruto"=>"40000","rv"=>"410","rw"=>"210","rz"=>"210","rą"=>"300","rąs"=>"4000","rč"=>"410","rš"=>"410","ršl"=>"0320","ršm"=>"0320","rų"=>"500","rž"=>"210","sala"=>"00001","samž"=>"21000","sant"=>"00050","sarka"=>"000001","sb"=>"230","sc"=>"210","sd"=>"230","se"=>"020","sekr"=>"00400","senat"=>"000004","sf"=>"210","sg"=>"210","sh"=>"210","siauk"=>"003000","siav"=>"00320","siaš"=>"00320","sid"=>"0030","sik"=>"0034","sip"=>"0034","sis"=>"0032","sišv"=>"00520","sk"=>"322","ske"=>"4000","sken"=>"54000","ski"=>"5000","skle"=>"54000","skr"=>"5040","skub"=>"50000","skva"=>"00300","skvi"=>"00300","sky"=>"5000","ską"=>"4000","skę"=>"5000","sl"=>"220","sle"=>"3000","sli"=>"0300","slo"=>"0300","slu"=>"4300","slū"=>"4300","sm"=>"210","smę"=>"4000","sn"=>"430","sodr"=>"00400","sp"=>"320","spe"=>"0300","spn"=>"4000","spu"=>"4000","sr"=>"410","sri"=>"0300","ss"=>"210","st"=>"210","stal"=>"02000","sten"=>"02000","stin"=>"40000","stod"=>"02000","stoj"=>"02000","stov"=>"32000","strai"=>"002000","stv"=>"0020","stę"=>"4000","stė"=>"4300","stų"=>"4000","stū"=>"0200","su"=>"001","subl"=>"00300","sud"=>"0032","sug"=>"0032","sukl"=>"00020","sus"=>"0032","susi"=>"00001","suž"=>"0004","sv"=>"210","sve"=>"0200","svy"=>"3200","sw"=>"210","sz"=>"210","są"=>"003","sč"=>"430","sė"=>"500","sš"=>"210","sž"=>"210","ta"=>"020","tab"=>"2000","takr"=>"00300","tas"=>"0050","tat"=>"2000","taura"=>"000001","tač"=>"2000","tb"=>"210","tc"=>"210","td"=>"210","teb"=>"2000","tem"=>"3000","teo"=>"0040","tet"=>"0032","tf"=>"210","tg"=>"430","th"=>"210","ti"=>"020","tigr"=>"00400","tikl"=>"00430","tin"=>"3000","tip"=>"2000","tj"=>"430","tk"=>"430","tkl"=>"0400","tl"=>"430","tm"=>"430","tn"=>"210","to"=>"020","toje"=>"30000","tolį"=>"20000","tos"=>"0032","tow"=>"2000","tp"=>"230","tpj"=>"0400","tplū"=>"00300","tpr"=>"0040","tr"=>"210","trio"=>"40000","triš"=>"02000","tro"=>"4000","trą"=>"4000","trų"=>"4000","ts"=>"434","tsi"=>"0001","tskri"=>"000001","tt"=>"410","tua"=>"0004","tur"=>"3000","tv"=>"210","tvo"=>"0200","tvėj"=>"40000","tw"=>"210","tyd"=>"3000","tz"=>"210","tč"=>"210","tę"=>"300","tėm"=>"0200","tėmu"=>"03000","tėmę"=>"03000","tėmė"=>"03000","tš"=>"232","tž"=>"230","ua"=>"012","uai"=>"0300","ub"=>"010","ubj"=>"0200","uc"=>"010","ud"=>"010","ue"=>"012","uf"=>"010","ug"=>"010","ugr"=>"0040","ugrio"=>"005000","uh"=>"010","uim"=>"0120","uin"=>"0500","uir"=>"0020","uj"=>"010","uk"=>"010","ukl"=>"0300","ukle"=>"00200","ukr"=>"0300","ukv"=>"0300","ukų"=>"0500","ul"=>"010","um"=>"010","un"=>"010","uo"=>"020","uor"=>"0300","uosl"=>"00400","up"=>"030","upl"=>"0040","upro"=>"00300","ur"=>"010","urk"=>"0002","urkl"=>"00300","uro"=>"0501","urs"=>"0032","us"=>"010","usal"=>"02100","usl"=>"0300","usla"=>"00300","usle"=>"00300","usva"=>"00001","usve"=>"00300","ut"=>"032","uto"=>"0001","utr"=>"2000","uu"=>"010","uv"=>"010","uw"=>"010","uy"=>"010","uz"=>"010","uą"=>"010","uč"=>"010","uę"=>"010","uė"=>"012","uį"=>"010","uš"=>"010","ušl"=>"0320","ušn"=>"0320","ušv"=>"0020","uų"=>"010","uū"=>"012","už"=>"010","užim"=>"00020","užl"=>"0300","užv"=>"0030","užė"=>"0012","vap"=>"0004","vat"=>"0030","vb"=>"210","vc"=>"210","vd"=>"210","ve"=>"020","vep"=>"2000","ves"=>"3000","vf"=>"210","vg"=>"210","vh"=>"210","viesia"=>"0000001","visk"=>"00450","vitr"=>"00430","vj"=>"210","vk"=>"210","vl"=>"210","vm"=>"210","vn"=>"210","vp"=>"210","vr"=>"210","vs"=>"240","vt"=>"210","vv"=>"210","vw"=>"210","vydau"=>"200000","vz"=>"210","vą"=>"300","vč"=>"210","vė"=>"300","vėp"=>"4000","vš"=>"210","vž"=>"210","wb"=>"210","wc"=>"210","wd"=>"210","wf"=>"210","wg"=>"210","wh"=>"210","wk"=>"210","wl"=>"210","wm"=>"210","wn"=>"210","wp"=>"210","wr"=>"210","ws"=>"210","wt"=>"210","wv"=>"210","ww"=>"210","wz"=>"210","wč"=>"210","wš"=>"210","wž"=>"210","ya"=>"010","yb"=>"010","yc"=>"010","yd"=>"010","ye"=>"010","yf"=>"010","yg"=>"010","ygia"=>"00001","yh"=>"010","yi"=>"010","yj"=>"010","yk"=>"010","ykl"=>"0430","yl"=>"010","ym"=>"010","yn"=>"010","yo"=>"010","yp"=>"010","yr"=>"030","ys"=>"010","ysk"=>"0400","yt"=>"010","yu"=>"010","yv"=>"010","yw"=>"010","yy"=>"010","yz"=>"010","yą"=>"010","yč"=>"010","yę"=>"010","yė"=>"010","yį"=>"010","yš"=>"010","yų"=>"010","yū"=>"010","yž"=>"010","zb"=>"210","zc"=>"210","zd"=>"210","zf"=>"210","zg"=>"210","zh"=>"210","zk"=>"210","zl"=>"210","zm"=>"210","zn"=>"210","zp"=>"210","zr"=>"210","zs"=>"210","zt"=>"210","zv"=>"210","zw"=>"210","zz"=>"210","zč"=>"210","zš"=>"210","zž"=>"210","ąa"=>"010","ąb"=>"010","ąc"=>"010","ąd"=>"010","ąe"=>"010","ąf"=>"010","ąg"=>"010","ąh"=>"010","ąi"=>"010","ąj"=>"010","ąk"=>"010","ąl"=>"010","ąm"=>"010","ąn"=>"010","ąo"=>"010","ąp"=>"010","ąr"=>"010","ąs"=>"010","ąt"=>"010","ąu"=>"010","ąv"=>"010","ąw"=>"010","ąy"=>"010","ąz"=>"010","ąą"=>"010","ąč"=>"010","ąę"=>"010","ąė"=>"010","ąį"=>"010","ąš"=>"010","ąų"=>"010","ąū"=>"010","ąž"=>"010","čb"=>"210","čc"=>"210","čd"=>"210","čeko"=>"00001","čf"=>"210","čg"=>"210","čh"=>"210","čin"=>"0001","čk"=>"210","čl"=>"210","čm"=>"210","čn"=>"210","čp"=>"210","čr"=>"210","čs"=>"210","čt"=>"210","čv"=>"210","čw"=>"210","čz"=>"210","čč"=>"210","čš"=>"210","čž"=>"210","ęa"=>"010","ęb"=>"010","ęc"=>"010","ęd"=>"010","ęe"=>"010","ęf"=>"010","ęg"=>"010","ęh"=>"010","ęi"=>"010","ęj"=>"010","ęk"=>"010","ęl"=>"010","ęm"=>"010","ęn"=>"010","ęo"=>"010","ęp"=>"010","ęr"=>"010","ęs"=>"010","ęt"=>"010","ęu"=>"010","ęv"=>"010","ęw"=>"010","ęy"=>"010","ęz"=>"010","ęą"=>"010","ęč"=>"010","ęę"=>"010","ęė"=>"010","ęį"=>"010","ęš"=>"010","ęų"=>"010","ęū"=>"010","ęž"=>"010","ėa"=>"010","ėb"=>"010","ėc"=>"010","ėd"=>"010","ėe"=>"010","ėf"=>"010","ėg"=>"010","ėh"=>"010","ėi"=>"010","ėj"=>"010","ėk"=>"010","ėkl"=>"0430","ėl"=>"230","ėm"=>"010","ėme"=>"0300","ėn"=>"010","ėo"=>"010","ėp"=>"010","ėr"=>"010","ės"=>"210","ėsl"=>"0030","ėt"=>"230","ėtr"=>"0400","ėu"=>"010","ėv"=>"010","ėw"=>"010","ėy"=>"010","ėz"=>"010","ėą"=>"010","ėč"=>"010","ėę"=>"010","ėė"=>"010","ėį"=>"010","ėš"=>"010","ėų"=>"010","ėū"=>"010","ėž"=>"010","įa"=>"010","įb"=>"010","įc"=>"010","įd"=>"012","įe"=>"020","įf"=>"010","įg"=>"040","įh"=>"010","įi"=>"010","įj"=>"010","įk"=>"024","įl"=>"020","įm"=>"020","įn"=>"010","įo"=>"010","įp"=>"040","įr"=>"020","įs"=>"010","įsi"=>"0001","įsl"=>"0030","įsm"=>"0020","įsr"=>"0020","įst"=>"0002","įt"=>"022","įu"=>"010","įv"=>"020","įw"=>"010","įy"=>"010","įz"=>"010","įą"=>"010","įč"=>"010","įę"=>"010","įė"=>"012","įį"=>"010","įš"=>"010","įų"=>"010","įū"=>"010","įž"=>"010","šb"=>"212","šc"=>"210","šd"=>"232","šei"=>"0100","šev"=>"0020","šf"=>"210","šg"=>"214","šh"=>"210","šist"=>"25000","šiuk"=>"00001","šk"=>"212","šl"=>"210","šlij"=>"02000","šlu"=>"0200","šly"=>"3000","šm"=>"210","šn"=>"210","šne"=>"0200","šno"=>"0001","šor"=>"0020","šp"=>"214","šr"=>"210","šs"=>"234","šsi"=>"0001","šsikap"=>"0000001","št"=>"432","šuš"=>"0040","šv"=>"310","švi"=>"0200","švyd"=>"04000","šw"=>"210","šz"=>"210","šč"=>"430","šėj"=>"0020","šš"=>"210","šž"=>"210","ųa"=>"010","ųb"=>"010","ųc"=>"010","ųd"=>"010","ųe"=>"010","ųf"=>"010","ųg"=>"010","ųh"=>"010","ųi"=>"010","ųj"=>"010","ųk"=>"010","ųl"=>"010","ųm"=>"010","ųn"=>"010","ųo"=>"010","ųp"=>"010","ųr"=>"010","ųs"=>"010","ųt"=>"010","ųu"=>"010","ųv"=>"010","ųw"=>"010","ųy"=>"010","ųz"=>"010","ųą"=>"010","ųč"=>"010","ųę"=>"010","ųė"=>"010","ųį"=>"010","ųš"=>"010","ųų"=>"010","ųū"=>"010","ųž"=>"010","ūa"=>"010","ūb"=>"010","ūc"=>"010","ūd"=>"010","ūe"=>"010","ūf"=>"010","ūg"=>"010","ūh"=>"010","ūi"=>"010","ūj"=>"010","ūk"=>"010","ūkl"=>"0430","ūl"=>"010","ūm"=>"010","ūn"=>"010","ūo"=>"010","ūp"=>"010","ūr"=>"010","ūs"=>"010","ūsk"=>"0430","ūsl"=>"0030","ūst"=>"0030","ūt"=>"010","ūu"=>"010","ūv"=>"010","ūw"=>"010","ūy"=>"010","ūz"=>"010","ūą"=>"010","ūč"=>"010","ūę"=>"010","ūė"=>"010","ūį"=>"010","ūš"=>"010","ūų"=>"010","ūū"=>"010","ūž"=>"010","žant"=>"00004","žants"=>"000005","žb"=>"232","žc"=>"210","žd"=>"232","žen"=>"0001","žf"=>"234","žg"=>"230","žh"=>"210","žimu"=>"00300","žio"=>"0003","žj"=>"010","žk"=>"232","žl"=>"210","žlu"=>"0200","žm"=>"410","žn"=>"210","žp"=>"230","žr"=>"210","žs"=>"210","žsi"=>"0001","žsk"=>"0400","žsl"=>"0450","žst"=>"0030","žt"=>"432","žu"=>"020","žus"=>"0032","žv"=>"320","žvi"=>"0400","žvo"=>"0300","žw"=>"210","žz"=>"210","žč"=>"210","žįs"=>"0003","žš"=>"210","žž"=>"210"));

?>