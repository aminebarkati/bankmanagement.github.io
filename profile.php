<?php
include("cnc.php");
//////////////////////
$us= $_SESSION['user'];
//////////////////////////////
$req="select * from users where username='$us'";
$res=mysqli_query($id,$req);
$t=mysqli_fetch_assoc($res);
//////////////////////////
echo"<head>
   <link rel='stylesheet' href='style/scard.css'></head><br><br>";
echo"</table>";
$_SESSION['cn'] =$t['cardnum'];
$name=$t['lname']." ".$t['fname'];
$b=$t['balance'];
$y=$t['exp_yy'];
$m=$t['exp_mm'];
$num=$t['cardnum'];
$cnum="";
for ($i=0; $i <16 ; $i++){ 
  if (in_array($i,array(4,8,12))) {
    $cnum=$cnum." ".$num[$i];
  }else{
    $cnum=$cnum.$num[$i];
  }
}
echo"
<div class='Wrap'>
      <div class='Base'>
         <div class='Inner-wrap'>
            <svg class='Chip' version='1.1' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px'
            viewBox='0 0 387.8 380.3' style='enable-background:new 0 0 387.8 380.3;' xml:space='preserve'>
         <style type='text/css'>
            .st0{fill:url(#gold-gradient);stroke:#000000;stroke-width:10;stroke-miterlimit:10;}
         </style>
         <defs>
         <linearGradient id='gold-gradient' x1='0%' y1='0%' x2='100%' y2='0%'>
               <stop offset='0%' stop-color='#c79750'></stop>
               <stop offset='20%' stop-color='#e6b964'></stop>
               <stop offset='50%' stop-color=' #f8e889'></stop>
               <stop offset='80%' stop-color=' #deb15f'></stop>
               <stop offset='100%' stop-color=' #dfb461'></stop>
            </linearGradient>
         </defs>
         <g id='XMLID_4_'>
            <path id='XMLID_1_' class='st0' d='M308.8,375.3H79.1C38.2,375.3,5,342.1,5,301.2V79.1C5,38.2,38.2,5,79.1,5h229.7
               c40.9,0,74.1,33.2,74.1,74.1v222.2C382.8,342.1,349.7,375.3,308.8,375.3z'/>
            <line id='XMLID_2_' class='st0' x1='109.9' y1='5.1' x2='109.9' y2='375.1'/>
            <line id='XMLID_3_' class='st0' x1='4.9' y1='95.1' x2='109.9' y2='95.1'/>
            <line id='XMLID_7_' class='st0' x1='4.9' y1='185.1' x2='109.9' y2='185.1'/>
            <line id='XMLID_8_' class='st0' x1='1.9' y1='275.1' x2='106.9' y2='275.1'/>
            <line id='XMLID_9_' class='st0' x1='276.9' y1='275.1' x2='381.9' y2='275.1'/>
            <line id='XMLID_10_' class='st0' x1='274.9' y1='185.1' x2='379.9' y2='185.1'/>
            <line id='XMLID_11_' class='st0' x1='277.9' y1='95.1' x2='382.9' y2='95.1'/>
            <g id='XMLID_6_'>
               <g id='XMLID_14_'>
                  <g id='XMLID_32_'>
                     <path id='XMLID_33_' d='M277.4,90.1h-1c-2.5,0-4.5,2-4.5,4.5v272c0,2.5,2,4.5,4.5,4.5h1c2.5,0,4.5-2,4.5-4.5v-272
                        C281.9,92.1,279.9,90.1,277.4,90.1z'/>
                  </g>
               </g>
            </g>
         </g>
            </svg>
            <div class='Card-number'>
               <h3 id='num'>$cnum</h3>
            </div>
            <div class='Expire'>
               <h4>Valid till</h4>
               <p>$m/$y</p>
            </div>
            <div class='Name'>
               <h3>$name</h3>
            </div>
            <div class='balance'>
               <h3>balance : $b $</h3>
            </div>   
            <svg
                  xmlns:dc='http://purl.org/dc/elements/1.1/'
                  xmlns:cc='http://creativecommons.org/ns#'
                  xmlns:rdf='http://www.w3.org/1999/02/22-rdf-syntax-ns#'
                  xmlns:svg='http://www.w3.org/2000/svg'
                  xmlns='http://www.w3.org/2000/svg'
                  xmlns:sodipodi='http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd'
                  xmlns:inkscape='http://www.inkscape.org/namespaces/inkscape'
                  version='1.1'
                  id='Layer_1'
                  x='0px'
                  y='0px'
                  class='Logo'
                  width='1000.046'
                  height='323.65302'
                  viewBox='0 0 1000.046 323.653'
                  enable-background='new 0 0 258.381 161.154'
                  xml:space='preserve'
                  inkscape:version='0.91 r13725'
                  sodipodi:docname='Visa_2006.svg'><metadata
                  id='metadata23'><rdf:RDF><cc:Work
                     rdf:about='><dc:format>image/svg+xml</dc:format><dc:type
                        rdf:resource='http://purl.org/dc/dcmitype/StillImage' /><dc:title></dc:title></cc:Work></rdf:RDF></metadata><defs
                  id='defs21'>

               </defs><sodipodi:namedview
                  pagecolor='#ffffff'
                  bordercolor='#666666'
                  borderopacity='1'
                  objecttolerance='10'
                  gridtolerance='10'
                  guidetolerance='10'
                  inkscape:pageopacity='0'
                  inkscape:pageshadow='2'
                  inkscape:window-width='1366'
                  inkscape:window-height='705'
                  id='namedview19'
                  showgrid='false'
                  inkscape:zoom='0.35355339'
                  inkscape:cx='34.690897'
                  inkscape:cy='131.15483'
                  inkscape:window-x='-8'
                  inkscape:window-y='-8'
                  inkscape:window-maximized='1'
                  inkscape:current-layer='Layer_1' />
               <g
                  id='g4158'
                  transform='matrix(4.4299631,0,0,4.4299631,-81.165783,-105.04783)'><polygon
                  points='116.145,95.719 97.858,95.719 109.296,24.995 127.582,24.995 '
                  id='polygon9'
                  style='fill:#f2f2f2' /><path
                  d='m 182.437,26.724 c -3.607,-1.431 -9.328,-3.011 -16.402,-3.011 -18.059,0 -30.776,9.63 -30.854,23.398 -0.15,10.158 9.105,15.8 16.027,19.187 7.075,3.461 9.48,5.72 9.48,8.805 -0.072,4.738 -5.717,6.922 -10.982,6.922 -7.301,0 -11.213,-1.126 -17.158,-3.762 l -2.408,-1.13 -2.559,15.876 c 4.289,1.954 12.191,3.688 20.395,3.764 19.188,0 31.68,-9.481 31.828,-24.153 0.073,-8.051 -4.814,-14.22 -15.35,-19.261 -6.396,-3.236 -10.313,-5.418 -10.313,-8.729 0.075,-3.01 3.313,-6.093 10.533,-6.093 5.945,-0.151 10.313,1.278 13.622,2.708 l 1.654,0.751 2.487,-15.272 0,0 z'
                  id='path11'
                  inkscape:connector-curvature='0'
                  style='fill:#fff' /><path
                  d='m 206.742,70.664 c 1.506,-4.063 7.301,-19.788 7.301,-19.788 -0.076,0.151 1.503,-4.138 2.406,-6.771 l 1.278,6.094 c 0,0 3.463,16.929 4.215,20.465 -2.858,0 -11.588,0 -15.2,0 l 0,0 z m 22.573,-45.669 -14.145,0 c -4.362,0 -7.676,1.278 -9.558,5.868 l -27.163,64.855 19.188,0 c 0,0 3.159,-8.729 3.838,-10.609 2.105,0 20.771,0 23.479,0 0.525,2.483 2.182,10.609 2.182,10.609 l 16.932,0 -14.753,-70.723 0,0 z'
                  id='path13'
                  inkscape:connector-curvature='0'
                  style='fill:#fff' /><path
                  d='M 82.584,24.995 64.675,73.222 62.718,63.441 C 59.407,52.155 49.023,39.893 37.435,33.796 l 16.404,61.848 19.338,0 28.744,-70.649 -19.337,0 0,0 z'
                  id='path15'
                  inkscape:connector-curvature='0'
                  style='fill:#fff' /><path
                  d='m 48.045,24.995 -29.422,0 -0.301,1.429 c 22.951,5.869 38.151,20.016 44.396,37.02 L 56.322,30.94 c -1.053,-4.517 -4.289,-5.796 -8.277,-5.945 l 0,0 z'
                  id='path17'
                  inkscape:connector-curvature='0'
                  style='fill:#fff' /></g>
            </svg>
         </div>
      </div>
   </div><br><br>
";