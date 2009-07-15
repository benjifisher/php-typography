<?php
/*
	Project: PHP Typography
	Project URI: http://kingdesk.com/projects/php-typography/

	File modified to place pattern and exceptions in arrays that can be understood in php files.
	This file is released under the same copyright as the below referenced original file
	Original unmodified file is available at: http://mirror.unl.edu/ctan/language/hyph-utf8/tex/generic/hyph-utf8/patterns/
	Original file name: hyph-sl.tex
	
//============================================================================================================
	ORIGINAL FILE INFO

		% This file is part of hyph-utf8 package and resulted from
		% semi-manual conversions of hyphenation patterns into UTF-8 in June 2008.
		%
		% Source: slhyph.tex (2007-01-29)
		% Author: Matjaž Vrečko <matjaz at mg-soft.si>
		%
		% The above mentioned file should become obsolete,
		% and the author of the original file should preferaby modify this file instead.
		%
		% Modificatios were needed in order to support native UTF-8 engines,
		% but functionality (hopefully) didn't change in any way, at least not intentionally.
		% This file is no longer stand-alone; at least for 8-bit engines
		% you probably want to use loadhyph-foo.tex (which will load this file) instead.
		%
		% Modifications were done by Jonathan Kew, Mojca Miklavec & Arthur Reutenauer
		% with help & support from:
		% - Karl Berry, who gave us free hands and all resources
		% - Taco Hoekwater, with useful macros
		% - Hans Hagen, who did the unicodifisation of patterns already long before
		%               and helped with testing, suggestions and bug reports
		% - Norbert Preining, who tested & integrated patterns into TeX Live
		%
		% However, the "copyright/copyleft" owner of patterns remains the original author.
		%
		% The copyright statement of this file is thus:
		%
		%    Do with this file whatever needs to be done in future for the sake of
		%    "a better world" as long as you respect the copyright of original file.
		%    If you're the original author of patterns or taking over a new revolution,
		%    plese remove all of the TUG comments & credits that we added here -
		%    you are the Queen / the King, we are only the servants.
		%
		% If you want to change this file, rather than uploading directly to CTAN,
		% we would be grateful if you could send it to us (http://tug.org/tex-hyphen)
		% or ask for credentials for SVN repository and commit it yourself;
		% we will then upload the whole "package" to CTAN.
		%
		% Before a new "pattern-revolution" starts,
		% please try to follow some guidelines if possible:
		%
		% - \lccode is *forbidden*, and I really mean it
		% - all the patterns should be in UTF-8
		% - the only "allowed" TeX commands in this file are: \patterns, \hyphenation,
		%   and if you really cannot do without, also \input and \message
		% - in particular, please no \catcode or \lccode changes,
		%   they belong to loadhyph-foo.tex,
		%   and no \lefthyphenmin and \righthyphenmin,
		%   they have no influence here and belong elsewhere
		% - \begingroup and/or \endinput is not needed
		% - feel free to do whatever you want inside comments
		%
		% We know that TeX is extremely powerful, but give a stupid parser
		% at least a chance to read your patterns.
		%
		% For more unformation see
		%
		%    http://tug.org/tex-hyphen
		%
		%------------------------------------------------------------------------------
		%
		% This is `slhyph.tex' as of 15. 4. 97.
		%
		% Copyright (C) 1990 Matjaž Vrečko, TeXCeX (SLO)
		%               [slovenian hyphenation patterns]
		%
		% This program can be redistributed and/or modified under the terms
		% of the LaTeX Project Public License Distributed from CTAN
		% archives in directory macros/latex/base/lppl.txt; either
		% version 1 of the License, or any later version.
		%
		% This file contains slovene hyphen patterns with čšž
		%
		% Generation of hyphen patterns for TeX
		%
		%          Matjaž Vrečko, TeXCeH (SLO), 1990
		%   Email: matjaz@mg-soft.si
		%
		% Changes:
		%  1990       First version of `hyphen.si' (Matjaž Vrečko, TeXCeX)
		%
		% Some cosmetic changes done later on, but none of these apply any more;
		% the patterns are still the same as they were originally:
		%
		%  1994-05-17 Use of code page 852 in patterns (Leon Žlajpah)
		%  1995-04-06 Release of `sihyph21.tex'
		%  1995-06-20 Added \slovenehyphenmins
		%             Release of `sihyph22.tex'
		%  1997-15-04 Some changes concerning "c, "s, "z and ...
		%             Release of `sihyph23.tex'
		%  2007-01-20 `sihyph23.tex' renamed to `slhyph.tex'
		%             (sl is the proper language code for Slovenian)

//============================================================================================================	
	
*/

$patgenLanguage = "Slovenian";

$patgenExceptions = array();

$patgenMaxSeg = 6;

$patgen = array('begin'=>array("avr"=>"0050","dispo"=>"006000","eks"=>"0030","ekv"=>"0050","is"=>"001","iz"=>"001","obid"=>"00040","obit"=>"00500","od"=>"001","podn"=>"00450","povs"=>"00450","predn"=>"000670","seks"=>"00450","sis"=>"0040","st"=>"004","vozl"=>"00050","vozn"=>"00050","zliz"=>"00006","č"=>"08","š"=>"08","ž"=>"08"),'end'=>array("adrl"=>"00600","aju"=>"0500","bja"=>"0400","ch"=>"200","cko"=>"0500","esti"=>"05000","hl"=>"400","ks"=>"200","kst"=>"4000","lavz"=>"00600","lidž"=>"00600","lj"=>"200","mith"=>"00600","mošt"=>"00600","movš"=>"00600","nj"=>"200","pzig"=>"00600","sc"=>"400","sign"=>"00600","sk"=>"200","st"=>"200","stra"=>"04000","šč"=>"200","tovž"=>"00600","tz"=>"400","udmi"=>"00600","vižg"=>"00600","zane"=>"06000","ž"=>"80","š"=>"80","č"=>"80"),'all'=>array("aa"=>"010","ab"=>"010","abba"=>"00500","abrod"=>"006000","ac"=>"010","acci"=>"00500","ač"=>"010","ad"=>"010","adl"=>"0020","adobl"=>"060000","adrla"=>"006000","adrob"=>"006000","adur"=>"00500","ae"=>"011","af"=>"010","afga"=>"00500","aft"=>"0010","ag"=>"010","ah"=>"010","ahm"=>"0400","ahmi"=>"00500","ahmo"=>"00500","ai"=>"010","ain"=>"0021","aj"=>"010","ajek"=>"04500","ajf"=>"0400","ajfi"=>"00500","ajfo"=>"00500","ajha"=>"00500","ajhe"=>"00500","ajim"=>"00500","ajimo"=>"006000","ajos"=>"00300","ajstb"=>"006000","ajuč"=>"00300","ajug"=>"00300","ajžn"=>"00500","ak"=>"010","aks"=>"0040","akst"=>"04000","al"=>"010","am"=>"010","amz"=>"0400","an"=>"010","andga"=>"006000","andhi"=>"006000","anm"=>"0400","anmi"=>"00500","anzi"=>"00500","ao"=>"010","aob"=>"0021","ap"=>"010","aph"=>"0400","ara"=>"0100","ardwa"=>"006000","are"=>"0100","ari"=>"0100","aro"=>"0100","aru"=>"0100","arxa"=>"00500","arxo"=>"00500","arxu"=>"00500","as"=>"010","asš"=>"0400","asšč"=>"00500","aš"=>"010","at"=>"010","atf"=>"0400","ati"=>"0040","au"=>"011","auf"=>"0400","auk"=>"0200","aul"=>"0400","av"=>"010","avši"=>"00500","avž"=>"0400","avža"=>"00500","ayto"=>"00500","aze"=>"0100","azfo"=>"00500","azig"=>"04000","azla"=>"00300","azle"=>"00300","azlil"=>"004000","azlit"=>"004000","azliv"=>"004000","azob"=>"04000","azoč"=>"04300","azora"=>"005000","azoro"=>"005000","azra"=>"04000","azred"=>"004000","azvp"=>"00500","až"=>"010","ažmi"=>"00500","babba"=>"006000","banč"=>"00034","bau"=>"0040","bc"=>"210","bč"=>"210","bd"=>"210","be"=>"001","bev"=>"0040","bh"=>"010","bi"=>"001","bja"=>"0100","bjel"=>"05000","bjem"=>"03000","bjet"=>"05000","bk"=>"210","blep"=>"03000","bleta"=>"050000","blil"=>"05000","blit"=>"05000","bliv"=>"05000","bm"=>"010","bmi"=>"4000","bn"=>"210","bo"=>"001","bochm"=>"006000","bord"=>"05000","bovp"=>"00500","brab"=>"03000","bras"=>"05000","braš"=>"03000","brez"=>"03000","brezg"=>"000400","brezi"=>"000400","brezr"=>"000400","breže"=>"050000","brob"=>"03000","bržda"=>"006000","bs"=>"210","bš"=>"210","bt"=>"210","buki"=>"00500","buku"=>"00500","bukv"=>"00500","bury"=>"00500","bv"=>"210","bz"=>"010","bž"=>"010","cc"=>"200","chma"=>"00500","ck"=>"200","cka"=>"0100","cko"=>"0012","ckov"=>"00003","cks"=>"0010","ckwe"=>"00500","cn"=>"210","ct"=>"210","čb"=>"210","čg"=>"210","či"=>"001","čj"=>"100","čk"=>"210","čl"=>"100","člet"=>"43000","čmes"=>"05000","čn"=>"210","čop"=>"4000","čp"=>"210","čs"=>"210","čup"=>"4000","db"=>"210","dc"=>"210","dč"=>"210","dd"=>"210","ddvoj"=>"006000","de"=>"020","delem"=>"650000","demin"=>"004000","demn"=>"00400","dezi"=>"00430","dg"=>"210","dh"=>"210","dick"=>"00500","dind"=>"40000","dino"=>"04500","dis"=>"0001","diskr"=>"004000","dispr"=>"006000","dj"=>"210","dk"=>"210","dlet"=>"50000","dli"=>"0200","dlit"=>"05000","dliv"=>"05000","dlo"=>"0100","dm"=>"230","dnac"=>"43000","dnač"=>"45000","dnap"=>"45000","dnar"=>"43000","dnas"=>"40000","dneb"=>"45000","dniv"=>"05000","dniz"=>"45000","dnjač"=>"450000","dnož"=>"43000","do"=>"020","dobč"=>"40000","dobd"=>"45000","dof"=>"2320","dord"=>"00500","dovč"=>"00500","dovz"=>"00540","dp"=>"210","draz"=>"05000","drep"=>"03000","drepn"=>"000600","drev"=>"04000","ds"=>"210","dš"=>"210","dt"=>"210","dteks"=>"000006","dur"=>"0400","duro"=>"00500","duum"=>"00500","dv"=>"210","dvi"=>"4300","dz"=>"212","ea"=>"010","eb"=>"010","ebj"=>"0040","ebliz"=>"006000","ec"=>"010","eč"=>"010","ečd"=>"0400","ečde"=>"00500","ečdi"=>"00500","ečdo"=>"00500","ečle"=>"00300","ečop"=>"00500","ečt"=>"0400","ečti"=>"00500","ečto"=>"00500","ečtr"=>"00500","ečup"=>"00500","ečv"=>"0210","ečvrs"=>"006000","ed"=>"010","edf"=>"0400","edig"=>"00500","edl"=>"0020","edob"=>"00500","edobe"=>"006000","edobr"=>"006000","edobs"=>"040000","edoč"=>"04300","edvč"=>"00500","edzb"=>"00500","ee"=>"010","eep"=>"0400","ef"=>"010","eff"=>"0400","effe"=>"00500","efta"=>"00500","eg"=>"010","eh"=>"010","ei"=>"010","eipzi"=>"006000","eiz"=>"0020","eize"=>"00050","ej"=>"010","ek"=>"010","ekmal"=>"006000","ektre"=>"006000","el"=>"010","em"=>"010","en"=>"010","eo"=>"011","eobj"=>"00040","eobr"=>"00040","eodl"=>"00400","eozn"=>"00450","ep"=>"010","epnik"=>"005000","era"=>"0100","erazl"=>"000650","erazr"=>"000540","erazv"=>"000540","ere"=>"0100","erf"=>"0400","eri"=>"0100","ero"=>"0100","err"=>"0400","eru"=>"0100","es"=>"010","esda"=>"00500","esta"=>"05000","estih"=>"050000","estil"=>"050000","eš"=>"010","ešp"=>"0400","ešpo"=>"00500","et"=>"010","eth"=>"4000","etinš"=>"040000","eu"=>"011","ev"=>"010","evetl"=>"000650","evha"=>"00500","evpre"=>"006000","evste"=>"006000","evstv"=>"005000","ew"=>"200","ewind"=>"006000","ewle"=>"00500","ewt"=>"0400","ewto"=>"00500","eyw"=>"0400","ez"=>"010","ezdj"=>"00500","ezdr"=>"03400","ezg"=>"0020","ezgl"=>"00500","ezij"=>"05000","ezijo"=>"006000","ezimn"=>"005000","ezis"=>"05000","ezist"=>"006000","eziz"=>"00500","ezl"=>"0040","ezlom"=>"006000","ezman"=>"006000","ezmo"=>"00400","ezob"=>"04000","ezor"=>"04500","ezre"=>"00400","ezt"=>"0400","ezum"=>"04545","ezž"=>"0400","ež"=>"010","fa"=>"100","fe"=>"001","feljt"=>"006000","ffma"=>"00500","fizlj"=>"006000","fn"=>"210","fouri"=>"006000","freu"=>"00040","fs"=>"210","ft"=>"200","ftve"=>"00500","fu"=>"001","gd"=>"210","geige"=>"006000","gelč"=>"00054","genjč"=>"006000","gitpr"=>"006000","go"=>"001","govz"=>"00500","gt"=>"210","gu"=>"001","hau"=>"0040","hč"=>"210","hei"=>"0040","hk"=>"210","hlo"=>"0400","hn"=>"210","hren"=>"05000","hš"=>"210","ht"=>"210","hu"=>"100","huffm"=>"006000","ia"=>"010","ib"=>"010","ic"=>"010","ics"=>"0400","iča"=>"0100","iče"=>"0100","iči"=>"0100","ičra"=>"00500","iču"=>"0100","ičvr"=>"00500","id"=>"010","idor"=>"40000","ie"=>"011","if"=>"010","ig"=>"010","igh"=>"4000","ih"=>"010","ii"=>"010","iin"=>"0021","ij"=>"010","ik"=>"010","ikč"=>"0400","ikča"=>"00500","il"=>"010","ilčk"=>"00540","ile"=>"4000","ilo"=>"4000","im"=>"010","imh"=>"0400","imhi"=>"00500","in"=>"010","ind"=>"1000","ine"=>"2000","inos"=>"34300","inp"=>"1000","inse"=>"30000","inš"=>"1000","inšk"=>"40000","intr"=>"30000","io"=>"011","ip"=>"010","ir"=>"010","ire"=>"4000","is"=>"010","isa"=>"0040","isert"=>"006000","isis"=>"00004","iskv"=>"04000","iss"=>"2000","iš"=>"010","it"=>"010","itpr"=>"00500","iu"=>"010","iv"=>"010","ivjo"=>"00500","ix"=>"010","iz"=>"010","izl"=>"0010","izla"=>"00400","izliz"=>"000040","izme"=>"00500","izmo"=>"00500","izode"=>"006000","izpo"=>"00500","izr"=>"0200","izu"=>"0010","izure"=>"006000","iž"=>"010","jakt"=>"05000","jb"=>"210","jc"=>"210","jč"=>"210","jd"=>"210","jeks"=>"00404","jg"=>"210","jh"=>"200","jhi"=>"0100","jime"=>"40000","jint"=>"45000","jk"=>"210","jl"=>"210","jm"=>"210","jn"=>"210","job"=>"4000","jod"=>"2100","jodl"=>"00040","jos"=>"2000","jož"=>"4000","jp"=>"210","jr"=>"210","jra"=>"0001","jraz"=>"00004","js"=>"210","jsist"=>"000060","jš"=>"210","jt"=>"210","ju"=>"001","juč"=>"2000","judm"=>"00500","jus"=>"2000","juž"=>"0021","jv"=>"210","jz"=>"210","jzves"=>"006000","kc"=>"210","kd"=>"210","keti"=>"00500","ki"=>"001","km"=>"210","kn"=>"100","ko"=>"001","kok"=>"0004","kokd"=>"00500","kovše"=>"006000","kozlo"=>"000600","kre"=>"1000","ksat"=>"05000","ksc"=>"0010","ksp"=>"0010","kspo"=>"00400","kst"=>"0010","kstaz"=>"006000","kste"=>"00500","kt"=>"210","ktr"=>"3000","ktra"=>"40000","kuro"=>"00500","kvip"=>"05000","lair"=>"00400","lb"=>"210","lc"=>"210","lč"=>"210","ld"=>"210","le"=>"001","lee"=>"0040","leipz"=>"006000","leme"=>"00500","lf"=>"210","lg"=>"210","lgča"=>"00500","lh"=>"210","li"=>"021","liz"=>"1000","lizd"=>"45000","ljc"=>"4000","ljč"=>"2000","ljk"=>"2000","ljn"=>"2000","ljs"=>"2000","ljš"=>"2000","ljudj"=>"000560","lk"=>"210","ll"=>"210","lm"=>"210","ln"=>"210","lo"=>"001","loč"=>"1000","lp"=>"210","ls"=>"210","lš"=>"210","lt"=>"210","luki"=>"00500","luku"=>"00500","lv"=>"210","lz"=>"210","lž"=>"210","mb"=>"210","mc"=>"210","mč"=>"210","md"=>"210","medn"=>"00450","medos"=>"006000","medr"=>"00400","mf"=>"210","mind"=>"40000","minp"=>"40000","minš"=>"40000","mk"=>"210","mm"=>"210","mniv"=>"05000","mp"=>"210","ms"=>"210","mš"=>"210","mt"=>"210","murn"=>"05000","mv"=>"210","myhi"=>"00500","mž"=>"210","na"=>"001","načel"=>"500000","nadnj"=>"004500","nadr"=>"00050","nadra"=>"006000","nadre"=>"004000","nadur"=>"006000","naj"=>"1000","najak"=>"006000","najen"=>"004500","najo"=>"00030","najoč"=>"006000","naju"=>"00430","nas"=>"1000","navz"=>"00430","navze"=>"000006","naz"=>"1000","nazor"=>"000600","nb"=>"210","nc"=>"210","nč"=>"200","nča"=>"0100","nče"=>"0100","nči"=>"0100","nču"=>"0100","nd"=>"232","ndga"=>"00500","ndhi"=>"00500","ndm"=>"0400","ne"=>"001","ned"=>"0032","neh"=>"1000","nezm"=>"00300","nezv"=>"00040","nf"=>"210","ng"=>"210","ngh"=>"0400","ngha"=>"00500","ngv"=>"0400","ngvi"=>"00500","nh"=>"210","njc"=>"2000","njevs"=>"000450","njk"=>"2000","njs"=>"2000","njš"=>"2000","njv"=>"4000","nk"=>"210","nl"=>"210","nn"=>"210","nord"=>"00500","nost"=>"04000","np"=>"210","ns"=>"210","nsis"=>"00004","nš"=>"210","nt"=>"210","nteks"=>"000004","ntg"=>"0400","ntga"=>"00500","ntge"=>"00500","ntv"=>"0400","ntvi"=>"00500","nu"=>"001","nv"=>"210","nyqu"=>"00500","nz"=>"210","nzi"=>"0040","nž"=>"210","oa"=>"010","oas"=>"0400","ob"=>"010","obgl"=>"00500","obide"=>"005000","objo"=>"00500","obla"=>"50000","obro"=>"50000","obz"=>"0400","oc"=>"010","ocke"=>"00500","ocki"=>"00500","ocr"=>"0400","oč"=>"010","od"=>"010","oddv"=>"00500","odnal"=>"005000","odrep"=>"060000","odzd"=>"00500","odž"=>"0210","oe"=>"010","oele"=>"00004","of"=>"010","og"=>"010","ogl"=>"4000","oh"=>"010","oi"=>"010","oiz"=>"0002","oj"=>"010","ok"=>"010","okb"=>"0400","okba"=>"00500","okbe"=>"00500","okt"=>"0400","ol"=>"010","olavt"=>"065000","olgča"=>"006000","olr"=>"0400","olre"=>"00500","om"=>"010","on"=>"010","oo"=>"010","oodl"=>"00040","ool"=>"0200","oom"=>"0400","op"=>"010","opm"=>"0400","opme"=>"00500","opy"=>"4000","ora"=>"0100","ordeč"=>"004000","ore"=>"0100","ori"=>"0100","oro"=>"0100","oru"=>"0100","os"=>"010","oseb"=>"50000","osem"=>"00045","oš"=>"010","ot"=>"010","ou"=>"010","ouki"=>"00500","ouku"=>"00500","ov"=>"010","ovsem"=>"005000","ovšk"=>"00500","ovz"=>"0210","ovza"=>"05000","ovzd"=>"00300","oy"=>"010","oz"=>"010","ozb"=>"0040","ozdj"=>"00050","ozg"=>"0040","ozlo"=>"00500","ozlož"=>"006000","ozn"=>"0020","oznic"=>"005000","ozniš"=>"005000","ozo"=>"0020","ozr"=>"0020","ozv"=>"0020","ož"=>"010","ožmi"=>"00500","pc"=>"210","pč"=>"232","pčka"=>"00500","pe"=>"001","peč"=>"1000","pekt"=>"00400","petl"=>"00030","petle"=>"004000","pevs"=>"00450","pevt"=>"00054","phs"=>"4000","phso"=>"00500","pizo"=>"00500","pk"=>"210","ploz"=>"40000","po"=>"001","podfa"=>"006000","podl"=>"00430","podna"=>"004000","podoč"=>"004500","polob"=>"006000","postd"=>"006000","prez"=>"00004","ps"=>"210","pš"=>"210","pt"=>"210","qu"=>"002","raču"=>"30000","rae"=>"2000","rajžn"=>"006000","ravz"=>"00050","ravza"=>"006000","razid"=>"004500","razl"=>"30000","razor"=>"004500","rb"=>"210","rc"=>"210","rč"=>"210","rd"=>"210","re"=>"001","real"=>"30000","recht"=>"006000","rečv"=>"00500","redč"=>"50000","redig"=>"006000","rednju"=>"0060000","reiba"=>"006000","rejo"=>"00500","rekm"=>"00500","resda"=>"006000","revsk"=>"000600","reznač"=>"0060000","rezus"=>"006000","rezve"=>"006000","rf"=>"010","rg"=>"210","rh"=>"210","ri"=>"001","rin"=>"0400","rino"=>"00540","rizg"=>"00040","rizl"=>"00040","rizn"=>"00040","rj"=>"210","rk"=>"210","rl"=>"210","rm"=>"210","rn"=>"210","ro"=>"001","robid"=>"000600","rodi"=>"30000","rozo"=>"00500","rp"=>"210","rr"=>"010","rs"=>"210","rš"=>"210","rt"=>"210","rth"=>"0400","rtha"=>"00500","rukl"=>"00500","rv"=>"210","rvj"=>"0320","rvjo"=>"00500","ryan"=>"00500","rz"=>"210","rzl"=>"0020","rž"=>"010","ržda"=>"00500","sb"=>"210","sc"=>"100","sci"=>"0200","seksa"=>"004500","seksi"=>"000500","sema"=>"00500","sevp"=>"00500","sf"=>"210","si"=>"001","sid"=>"0400","sis"=>"0001","sj"=>"210","skn"=>"0200","skre"=>"40000","slav"=>"04000","son"=>"0400","soni"=>"00005","sonič"=>"000004","sp"=>"100","splod"=>"040000","spodl"=>"000040","ss"=>"210","ste"=>"3000","sten"=>"04000","stf"=>"4000","stič"=>"04000","stim"=>"50000","stir"=>"04000","stk"=>"2000","stm"=>"2000","str"=>"1000","su"=>"001","subo"=>"00400","svet"=>"00050","šč"=>"020","ščk"=>"2000","ščn"=>"2000","šes"=>"0020","šj"=>"210","tawi"=>"00500","taz"=>"0004","tb"=>"210","tc"=>"210","tcho"=>"00050","td"=>"210","tekst"=>"000600","tema"=>"50000","texa"=>"00500","tf"=>"010","tind"=>"40000","tinos"=>"400000","tinp"=>"40000","tinse"=>"400000","tint"=>"43000","tk"=>"210","tletno"=>"6000000","tm"=>"210","tnaj"=>"40000","trtu"=>"00050","trtur"=>"006000","ts"=>"210","tt"=>"210","tu"=>"001","ua"=>"210","ub"=>"010","ubj"=>"0040","ubp"=>"0400","ubpo"=>"00500","uc"=>"010","uč"=>"010","ud"=>"010","ue"=>"010","uf"=>"010","ug"=>"010","uh"=>"010","ui"=>"010","uj"=>"010","uka"=>"0100","uke"=>"0100","uko"=>"0100","ul"=>"010","um"=>"010","un"=>"010","up"=>"010","upčka"=>"006000","ura"=>"0100","ure"=>"0100","urg"=>"4000","uri"=>"0100","us"=>"010","usp"=>"1000","uš"=>"010","ušes"=>"00030","ut"=>"010","uth"=>"0400","utho"=>"00050","uv"=>"010","uxem"=>"00500","uz"=>"010","už"=>"010","vb"=>"210","vc"=>"210","vč"=>"200","vča"=>"0100","vče"=>"0100","včer"=>"04000","vči"=>"0100","vd"=>"210","večl"=>"00400","večm"=>"00400","vei"=>"0040","vetin"=>"004000","vetlet"=>"0000060","vf"=>"010","vg"=>"010","vidv"=>"00500","vidva"=>"000600","viv"=>"1000","vj"=>"210","vjo"=>"4000","vk"=>"210","vm"=>"210","vn"=>"210","vord"=>"00500","vozle"=>"000500","vp"=>"210","vpa"=>"3200","vpij"=>"04000","vpil"=>"04000","vskn"=>"05000","všek"=>"05000","všk"=>"4000","vt"=>"210","vtk"=>"0040","vz"=>"002","vza"=>"0200","vzg"=>"3200","vzk"=>"2300","vzo"=>"2000","vzp"=>"0300","vzu"=>"0200","wa"=>"100","wo"=>"002","xf"=>"010","ye"=>"100","yf"=>"210","yj"=>"010","yl"=>"010","yw"=>"010","za"=>"120","zauk"=>"00500","zavp"=>"00300","zaz"=>"0012","zazd"=>"00500","zb"=>"210","zbir"=>"30000","zc"=>"010","zč"=>"210","zd"=>"212","zdju"=>"00500","zdv"=>"0300","zg"=>"010","zgni"=>"04000","zgot"=>"05000","zh"=>"210","zi"=>"100","zig"=>"0100","zis"=>"2100","zišč"=>"45000","zj"=>"210","zk"=>"210","zku"=>"0300","zlas"=>"05000","zli"=>"0100","zlil"=>"30000","zlit"=>"50000","zliv"=>"50000","zliz"=>"00005","zlj"=>"1000","zlog"=>"30000","zlom"=>"05000","zlož"=>"30000","zlu"=>"0100","zm"=>"210","zn"=>"100","zo"=>"100","zob"=>"0100","zod"=>"2100","zog"=>"0100","zol"=>"0200","zom"=>"0400","zp"=>"210","zr"=>"110","zredč"=>"400000","zreš"=>"40000","zrez"=>"40000","zrež"=>"40000","zri"=>"4000","zru"=>"4000","zs"=>"210","zš"=>"010","zt"=>"010","zu"=>"100","zuj"=>"0400","zup"=>"2100","zuz"=>"2100","zv"=>"012","zven"=>"04000","zvn"=>"0300","zvoj"=>"34000","zvok"=>"04000","zz"=>"212","zž"=>"010","žb"=>"210","žc"=>"210","žč"=>"210","žj"=>"210","žk"=>"210","žmi"=>"4000"));

?>