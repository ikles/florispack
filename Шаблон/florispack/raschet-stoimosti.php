<?php
// No direct access.
defined('_JEXEC') or die;

JHtml::_('behavior.framework', true);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
        <head>
                <jdoc:include type="head" />
        <?php $this->setGenerator(''); ?>
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css" type="text/css" media="screen,projection" />
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700&subset=latin,cyrillic' type='text/css' />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/menu/jqueryslidemenu.js"></script>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/menu/jqueryslidemenu.css" type="text/css" media="screen,projection" />
<script type="text/javascript">
jQuery('document').ready(function(){
   jQuery.noConflict(); 
   jQuery('a.product').after('<span id="product">список наших товаров</span>');
   jQuery('a.price').after('<span id="price">цены и условия</span>');
   jQuery('a.opt').after('<span id="opt">оптовые условия закупок</span>');
   jQuery('a.yslugi').after('<span id="yslugi">список наших услуг</span>');
   jQuery('a.contact').after('<span id="contact">контактная информация</span>');
});
</script>
        </head>
        <script type="text/javascript">

function Check (Eingabe) {
  var nur_das = "0123456789";
  
  if (Eingabe.length == 0) return false;
  
  for (var i = 0; i < Eingabe.length; i++)
    if (nur_das.indexOf(Eingabe.charAt(i)) < 0)
      return false;
  return true;
}

function GetPrice () {
  var strOut, strTemp;
  var bTest;
  var iHeight;
  var iWidth;
  var iClipHeight;
  var iEuropodwesHeight;
  var iWidthScotch;
  var iSquare;
  var iSquareClip;
  var iSquareEuropodwes;
  var dPrice;
  var iPricePerKg = 110; // rub/kg
  var dScotchPerMillimeter = 0.00015; // rub/mm
  var dPriceWork;
  var dPriceScotch;
  var dPriceEuropodwes;
  var dAddPriceWidthGroup;
  var dEuropodwesPerSquareTemp;
  var iPackCount;
  
  // европодвес (стандартный, усиленный)
  dEuropodwesPerSquare = new Array(0.00000500, 0.00000825); // rub/mm2
  
  // ------------------------ 25 mkm       30 mkm       35 mkm       40 mkm
  dPricePerSquare = new Array(0.000000047, 0.000000056, 0.000000066, 0.000000075); // kg/mm2
  
  // стандартный пакет (зависимость от количества: 2000 - 5000, 5001 - 15000, 15000 - 50000, более 50000)
  dPriceWork_V0 = new Array(0.40, 0.35, 0.30, 0.25); // rub/pack
  
  // стандартный пакет с перфорацией(зависимость от количества: 2000 - 5000, 5001 - 15000, 15000 - 50000, более 50000)
  dPriceWork_V1 = new Array(0.41, 0.36, 0.31, 0.26); // rub/pack
  
  // пакет с клапаном и клеевым слоем (зависимость от количества: 2000 - 5000, 5001 - 15000, 15000 - 50000, более 50000)
  dPriceWork_V2 = new Array(0.40, 0.35, 0.30, 0.25); // rub/pack
  
  // пакет с клапаном, клеевым слоем и перфорацией(зависимость от количества: 2000 - 5000, 5001 - 15000, 15000 - 50000, более 50000)
  dPriceWork_V3 = new Array(0.41, 0.36, 0.31, 0.26); // rub/pack
  
  // европакет с нижним клапаном и клеевым слоем (зависимость от количества: 2000 - 5000, 5001 - 15000, 15000 - 50000, более 50000)
  dPriceWork_V4 = new Array(0.50, 0.45, 0.40, 0.35); // rub/pack
  
  // европакет с нижним клапаном, клеевым слоем и перфорацией (зависимость от количества: 2000 - 5000, 5001 - 15000, 15000 - 50000, более 50000)
  dPriceWork_V5 = new Array(0.51, 0.46, 0.41, 0.36); // rub/pack
  
  // европакет с верхним клапаном и клеевым слоем (зависимость от количества: 2000 - 5000, 5001 - 15000, 15000 - 50000, более 50000)
  dPriceWork_V6 = new Array(0.50, 0.45, 0.40, 0.35); // rub/pack
  
  // европакет с верхним клапаном. клеевым слоем и перфорацией (зависимость от количества: 2000 - 5000, 5001 - 15000, 15000 - 50000, более 50000)
  dPriceWork_V7 = new Array(0.51, 0.46, 0.41, 0.36); // rub/pack
  
  
  // Test Packet Height
  bTest = Check (document.getElementsByName("PackHeight")[0].value);
  
  if (bTest == false)
  {
    alert("Задайте высоту пакета 50-650 миллиметров");
    return false;
  }
  
  iHeight = eval(document.getElementsByName("PackHeight")[0].value);
  if (iHeight > 650 || iHeight < 50)
  {   
  alert("Задайте высоту пакета 50-650 миллиметров");
  return false;
  }
  
  bTest = Check (document.getElementsByName("PackWidth")[0].value);
  
  if (bTest == false)
  {
    alert("Задайте ширину пакета 75-800 миллиметров");
    return false;
  }
  
  iWidth = eval(document.getElementsByName("PackWidth")[0].value);
  if (iWidth > 800 || iWidth < 75)
  {   
  alert("Задайте ширину пакета 75-800 миллиметров");
  return false;
  }
  
  // наценка в зависимости от ширины пакета
  if (iWidth < 350)
  {
      // за пакеты шириной до 35 см наценки нет
      dAddPriceWidthGroup = 0.00;
  }
  else if (iWidth < 600)
  {
      // за пакеты шириной от 35 до 60 см наценка 5 коп.
      dAddPriceWidthGroup = 0.05;
  }
  else
  {
      // за пакеты шириной более 60 см наценка 10 коп.
      dAddPriceWidthGroup = 0.10;
  }
  
  // инициализация европодвес
  iEuropodwesHeight = 0;
  iSquareEuropodwes = 0;
  dPriceEuropodwes = 0;
  
  // инициализация клапан
  iClipHeight = 0;
  iSquareClip = 0;
  
  // инициализация скотч
  iWidthScotch = 0;
  dPriceScotch = 0;
  
  // определение стоимости мм2 европодвеса в зависимости от модификации
  switch(document.getElementsByName("EuropodwesType")[0].value)
  {
    case "Обычный":
    dEuropodwesPerSquareTemp = eval(dEuropodwesPerSquare[0]);
  break;
  
  case "Усиленный":
    dEuropodwesPerSquareTemp = eval(dEuropodwesPerSquare[1]);
  break;
  }

  strOut =  "Параметры пакета\n";
  strOut += "================\n";
  
  switch(document.getElementsByName("PackType")[0].value)
  {
    case "0":
    strOut += "Тип: Стандартный пакет\n";
  break;
  
  case "1":
    strOut += "Тип: Стандартный пакет с перфорацией\n";
  break;
  
  case "2":
    strOut += "Тип: Пакет с клапаном и клеевым слоем\n";
    
    // стоимость клеевого слоя (скотча)
    dPriceScotch = iWidth * dScotchPerMillimeter;
  break;
  
  case "3":
    strOut += "Тип: Пакет с клапаном, клеевым слоем и перфорацией\n";
    
    // стоимость клеевого слоя (скотча)
    dPriceScotch = iWidth * dScotchPerMillimeter;
  break;
  
  case "4":
    strOut += "Тип: \"Европодвес\" с нижним клапаном и клеевым слоем\n";
    
    // высота европодвеса
    iEuropodwesHeight = document.getElementsByName("EuropodwesHeight")[0].value;
    
    // площадь европодвеса
    iSquareEuropodwes = eval(iWidth) * eval(iEuropodwesHeight);
    
    // стоимость европодвеса
      dPriceEuropodwes = iSquareEuropodwes * dEuropodwesPerSquareTemp;

    // стоимость клеевого слоя (скотча)
    dPriceScotch = iWidth * dScotchPerMillimeter;
  break;
  
  case "5":
    strOut += "Тип: \"Европодвес\" с нижним клапаном, клеевым слоем и перфорацией\n";
    
    // высота европодвеса
    iEuropodwesHeight = document.getElementsByName("EuropodwesHeight")[0].value;
    
    // площадь европодвеса
    iSquareEuropodwes = eval(iWidth) * eval(iEuropodwesHeight);
    
    // стоимость европодвеса
      dPriceEuropodwes = iSquareEuropodwes * dEuropodwesPerSquareTemp;

    // стоимость клеевого слоя (скотча)
    dPriceScotch = iWidth * dScotchPerMillimeter;
  break;
  
  case "6":
    strOut += "Тип: \"Европодвес\" с верхним клапаном и клеевым слоем\n";
    
    // высота европодвеса
    iEuropodwesHeight = document.getElementsByName("EuropodwesHeight")[0].value;
    
    // площадь европодвеса
      iSquareEuropodwes = eval(iWidth) * eval(iEuropodwesHeight);
    
    // стоимость европодвеса
      dPriceEuropodwes = iSquareEuropodwes * dEuropodwesPerSquareTemp;

    // стоимость клеевого слоя (скотча)
    dPriceScotch = iWidth * dScotchPerMillimeter;
  break;
  
  case "7":
    strOut += "Тип: \"Европодвес\" с верхним клапаном, клеевым слоем и перфорацией\n";
    
    // высота европодвеса
    iEuropodwesHeight = document.getElementsByName("EuropodwesHeight")[0].value;
    
    // площадь европодвеса
      iSquareEuropodwes = eval(iWidth) * eval(iEuropodwesHeight);
    
    // стоимость европодвеса
      dPriceEuropodwes = iSquareEuropodwes * dEuropodwesPerSquareTemp;

    // стоимость клеевого слоя (скотча)
    dPriceScotch = iWidth * dScotchPerMillimeter;
  break;
  }
  
  strOut += "Ширина пакета: " + document.getElementsByName("PackWidth")[0].value + " мм\n";
  strOut += "Высота пакета: " + document.getElementsByName("PackHeight")[0].value + " мм\n";
  
  switch(document.getElementsByName("PackType")[0].value)
  {
    // стандартный пакет
    case "0":
  case "1":
  break;
  
  // пакеты с клапаном и клеевым слоем
  case "2":
  case "3":
    iClipHeight = document.getElementsByName("ClipHeight")[0].value;
    iSquareClip = iClipHeight * 0.5 * iWidth;
    strOut += "Высота клапана: " + document.getElementsByName("ClipHeight")[0].value + " мм\n";
  break;
  
  // пакеты "Европодвес"
  case "4":
  case "5":
  case "6":
  case "7":
    iClipHeight = document.getElementsByName("ClipHeight")[0].value;
    iSquareClip = iClipHeight * 0.5 * iWidth;
    strOut += "Высота клапана: " + document.getElementsByName("ClipHeight")[0].value + " мм\n";
    strOut += "Высота европодвеса: " + document.getElementsByName("EuropodwesHeight")[0].value + " мм\n";
    strOut += "Модификация европодвеса: " + document.getElementsByName("EuropodwesType")[0].value + "\n";
  break;
  }
  
  switch(document.getElementsByName("FoilSize")[0].value)
  {
    case "0":
    strOut += "Толщина плёнки: 25 мкм\n";
  break;
  case "1":
    strOut += "Толщина плёнки: 30 мкм\n";
  break;
  case "2":
    strOut += "Толщина плёнки: 35 мкм\n";
  break;
  case "3":
    strOut += "Толщина плёнки: 40 мкм\n";
  break;
  }

  // �&#65533;ндекс группы с количеством пакетов
  switch(document.getElementsByName("PackCount")[0].value)
  {
    case "0":
    iPackCount = 0;
    strOut += "Количество: 2000 - 5000 шт.\n";
  break;
  
  case "1":
    iPackCount = 1;
    strOut += "Количество: 5001 - 15000 шт.\n";
  break;
  
  case "2":
    iPackCount = 2;
    strOut += "Количество: 15001 - 50000 шт.\n";
  break;
  
  case "3":
    iPackCount = 3;
    strOut += "Количество:  более 50000 шт.\n";
  break;
  }
  
  // тип пакета
  switch(document.getElementsByName("PackType")[0].value)
  {
      // стандартный пакет
      case "0":
        dPriceWork = dPriceWork_V0[iPackCount];
    break;
    
    // стандартный пакет с перфорацией
      case "1":
        dPriceWork = dPriceWork_V1[iPackCount];
    break;
    
    // пакет с клапаном и клеевым слоем
    case "2":
        dPriceWork = dPriceWork_V2[iPackCount];
    break;
    
    // пакет с клапаном, клеевым слоем и перфорацией
    case "3":
        dPriceWork = dPriceWork_V3[iPackCount];
    break;
    
    // европодвес с нижним клапаном и клеевым слоем
    case "4":
        dPriceWork = dPriceWork_V4[iPackCount];
    break;
    
    // европодвес с нижним клапаном, клеевым слоем и перфорацией
    case "5":
        dPriceWork = dPriceWork_V5[iPackCount];
    break;
    
    // пакет с верхним клапаном и клеевым слоем
    case "6":
        dPriceWork = dPriceWork_V6[iPackCount];
    break;
    
    // пакет с верхним клапаном, клеевым слоем и перфорацией
    case "7":
        dPriceWork = dPriceWork_V7[iPackCount];
    break;
  }
  
  // общая площадь пакета
  iSquare = iHeight * iWidth + iSquareClip + iSquareEuropodwes;
  
  dPrice = iSquare * iPricePerKg * dPricePerSquare[eval(document.getElementsByName("FoilSize")[0].value)] + dPriceWork + dPriceScotch + dPriceEuropodwes + dAddPriceWidthGroup;
  
  strOut += "________________\n";
  strTmp = dPrice + ""
  strOut += "Цена за пакет: " + strTmp.substring(0,4) + " руб.";
  
  alert(strOut);
  return true;
}
</script>
<body>
<div class="main">
  <div class="header">
     <div class="logo">
     <a href="/" title="ФлорисПак">
       <img src="/templates/florispack/images/logo.png" title="ФлорисПак" alt="ФлорисПак"/>
     </a>
     </div>   
   <div class="search">
      <jdoc:include type="modules" name="search" />
     </div>   
   <div class="phone">
      <jdoc:include type="modules" name="phone" />
     </div>  
     <div id="myslidemenu" class="topmenu"<?php $flag1=true; if((JMenuSite::getInstance('site')->getActive()->home)!=($flag1)) {echo 'style="margin-bottom:20px;"';}else{}?>> 
      <jdoc:include type="modules" name="topmenu" />
     </div>   
  </div>
  <?php if(JMenuSite::getInstance('site')->getActive()->home){?>
  <div class="slideshow">
     <jdoc:include type="modules" name="slideshow" />   </div>
  <?php }else{?>
  <div class="otp"></div>
  <?php }?>
  <div class="content">
   <jdoc:include type="modules" name="breadcrums" />
     <jdoc:include type="message" /> 
    
<div align="center">
  <table border="0" cellpadding="2" width="700">
    <tr>
    <th colspan="3" align="centre"><h3>Калькулятор стоимости пакетов</h3></th>
  </tr>
  
    <tr>
      <th colspan="3" align="centre"><img src="V0.png" width="150" height="180" alt="V0"></th>
    </tr>
  
  <tr>

      <td align="top"><h4></h4></td>
      <td><h4></h4></td>
      <td><h4></h4></td>

    </tr>
  
  <tr>
    <td align="left">Пакет: </br> (модификации)</td>
    <td align="left">
    <select name="PackType" size="1" onchange="SetPackImage()">
        <option value = "0">Стандартный пакет</option>
    <option value = "1">Стандартный пакет с перфорацией</option>
        <option value = "2">Пакет с клапаном и клеевым слоем</option>
    <option value = "3">Пакет с клапаном, клеевым слоем и перфорацией</option>
        <option value = "4">"Европодвес" с нижним клапаном и клеевым слоем</option>
    <option value = "5">"Европодвес" с нижним клапаном, клеевым слоем и перфорацией</option>
    <option value = "6">"Европодвес" с верхним клапаном и клеевым слоем</option>
    <option value = "7">"Европодвес" с верхним клапаном, клеевым слоем и перфорацией</option>
      </select> 
    <script type="text/javascript">
    var b = new Array();
    b[0] = new Image(); b[0].src = "V0.png";
    b[1] = new Image(); b[1].src = "V1.png";
    b[2] = new Image(); b[2].src = "V2.png";
    b[3] = new Image(); b[3].src = "V3.png";
    b[4] = new Image(); b[4].src = "V4.png";
    b[5] = new Image(); b[5].src = "V5.png";
    b[6] = new Image(); b[6].src = "V6.png";
    b[7] = new Image(); b[7].src = "V7.png";
    var i = 0;

    function SetPackImage () {
      var ind = document.getElementsByName("PackType")[0].value;
      //alert(ind);
      document.images[0].src = b[ind].src;
      
      // стандартный пакет
      if(ind==0) 
      {
        document.getElementsByName("ClipHeight")[0].disabled = true;
      document.getElementsByName("EuropodwesHeight")[0].disabled = true;
      document.getElementsByName("EuropodwesType")[0].disabled = true;
      }
      // стандартный пакет с перфорацией
      if(ind==1) 
      {
        document.getElementsByName("ClipHeight")[0].disabled = true;
      document.getElementsByName("EuropodwesHeight")[0].disabled = true;
      document.getElementsByName("EuropodwesType")[0].disabled = true;
      }
      // пакет с клапаном и клеевым слоем
      if(ind==2) 
      {
        document.getElementsByName("ClipHeight")[0].disabled = false;
      document.getElementsByName("EuropodwesHeight")[0].disabled = true;
      document.getElementsByName("EuropodwesType")[0].disabled = true;
      }
      // пакет с клапаном, клеевым слоем и перфорацией
      if(ind==3) 
      {
        document.getElementsByName("ClipHeight")[0].disabled = false;
      document.getElementsByName("EuropodwesHeight")[0].disabled = true;
      document.getElementsByName("EuropodwesType")[0].disabled = true;
      }
      // европакет с нижним клапаном и клеевым слоем
      if(ind==4) 
      {
        document.getElementsByName("ClipHeight")[0].disabled = false;
      document.getElementsByName("EuropodwesHeight")[0].disabled = false;
      document.getElementsByName("EuropodwesType")[0].disabled = false;
      }
      // европакет с нижним клапаном, клеевым слоем и перфорацией
      if(ind==5) 
      {
        document.getElementsByName("ClipHeight")[0].disabled = false;
      document.getElementsByName("EuropodwesHeight")[0].disabled = false;
      document.getElementsByName("EuropodwesType")[0].disabled = false;
      }
      // европакет с верхним клапаном и клеевым слоем
      if(ind==6) 
      {
        document.getElementsByName("ClipHeight")[0].disabled = false;
      document.getElementsByName("EuropodwesHeight")[0].disabled = false;
      document.getElementsByName("EuropodwesType")[0].disabled = false;
      }
      // европакет с верхним клапаном, клеевым слоем и перфорацией
      if(ind==7) 
      {
        document.getElementsByName("ClipHeight")[0].disabled = false;
      document.getElementsByName("EuropodwesHeight")[0].disabled = false;
      document.getElementsByName("EuropodwesType")[0].disabled = false;
      }
    }
    </script>
    </td>
  </tr>
    
  <tr>
      <td align="left">Ширина пакета: </br>(75-800 миллиметров)</td>
      <td align="left"><input name="PackWidth" type="text" size="10" maxlength="10" value = "400"></td>
    </tr>
  
  <tr>
      <td align="left">Высота пакета: </br>(50-650 миллиметров)</td>
      <td align="left"><input name="PackHeight" type="text" size="10" maxlength="10" value="250"></td>
    </tr>
  
  <tr>
    <td align="left">Толщина плёнки: </br>(микрометры)</td>
    <td align="left">
    <select name="FoilSize" size="1">
        <option value = "0">25</option>
        <option value = "1">30</option>
        <option value = "2">35</option>
        <option value = "3">40</option>
      </select> 
    </td>
  </tr>
  
  <tr>
      <td align="left">Высота клапана: </br>(20-100 миллиметров)</td>
      <td align="left">
    <select name="ClipHeight" size="1" value = "1" disabled="true">
      <option value = "20">20</option>
        <option value = "25">25</option>
        <option value = "30">30</option>
        <option value = "35">35</option>
        <option value = "40">40</option>
    <option value = "45">45</option>
        <option value = "50">50</option>
        <option value = "55">55</option>
        <option value = "60">60</option>
    <option value = "65">65</option>
        <option value = "70">70</option>
        <option value = "75">75</option>
        <option value = "80">80</option>
    <option value = "85">85</option>
        <option value = "90">90</option>
        <option value = "95">95</option>
        <option value = "100">100</option>
      </select>
    </tr>
  
  <tr>
      <td align="left">Высота европодвеса: </br>(20-60 миллиметров)</td>
    <td align="left">
    <select name="EuropodwesHeight" size="1" value = "1" disabled="true">
        <option value = "25">25</option>
        <option value = "30">30</option>
        <option value = "35">35</option>
        <option value = "40">40</option>
    <option value = "45">45</option>
        <option value = "50">50</option>
        <option value = "55">55</option>
        <option value = "60">60</option>
      </select>
    </tr>
  
  <tr>
    <td align="left">Модификация европодвеса: </br>(вариант)</td>
    <td align="left">
    <select name="EuropodwesType" size="1" value = "1" disabled="true">
        <option value = "Обычный">Обычный</option>
        <option value = "Усиленный">Усиленный</option>
      </select> 
    </td>
  </tr>
  
  <tr>
    <td align="left">Количество пакетов в заказе: </br>(шт.):</td>
    <td align="left">
    <select name="PackCount" size="1">
        <option value = "0">2000 - 5000</option>
        <option value = "1">5001 - 15000</option>
        <option value = "2">15001 - 50000</option>
        <option value = "3">более 50000</option>
      </select> 
    </td>
  </tr>
  
  <tr>
    <td></td>
    <td align="left"><input type="button" name="CalcPrice" value="Узнать цену" onclick="GetPrice()"></td>
    <td></td>
  </tr>
  
  </table>
  
</div>
  </div>
  <div style="clear:both;"><div>
<div class="hFooter"></div>
</div>
<div class="footer">
   <div id="footer">
      <div id="copyright">
       <jdoc:include type="modules" name="copyright" />
      </div>    
    <div id="footer_mail">
       <jdoc:include type="modules" name="footer_mail" />
      </div>
    <div id="footer_adres">
       <jdoc:include type="modules" name="footer_adres" />
      </div>
    <div id="footer_schetchik">
       <jdoc:include type="modules" name="footer_schetchik" />
      </div>
    <div id="footer_phone">
       <jdoc:include type="modules" name="footer_phone" />
      </div>
   </div>
</div>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter21725656 = new Ya.Metrika({id:21725656,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/21725656" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-35404029-45', 'florispack.ru');
  ga('send', 'pageview');

</script>
</body>
</html>
