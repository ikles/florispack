<?php
/**
 * @package                Joomla.Site
 * @subpackage  Templates.beez_20
 * @copyright        Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license                GNU General Public License version 2 or later; see LICENSE.txt
 */

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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript"></script>
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
 <?php if ($_SERVER['REQUEST_URI'] == '/prajs-list/kalkulyator-raschjota-stoimosti'){ ?>
  <style>
    .item-page {
      height: 699px;
      position: relative;
    }
  </style>
  <?php  } ?>
  <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/common.js"></script>
  <?php JHTML::_('behavior.modal'); ?>
</head>
<?php if ($_SERVER['REQUEST_URI'] == '/prajs-list/kalkulyator-raschjota-stoimosti'){ ?>
  <link href="calktor/lightbox/css/lightbox.css" rel="stylesheet" />
  <script src="calktor/js/calk.js" type="text/javascript"></script>
  <script src="calktor/js/calk_2.js" type="text/javascript"></script>
  <script src="calktor/lightbox/js/lightbox.min.js" type="text/javascript"></script>
  <?php  } ?>
  <body>
  <div class="overlay22"></div>
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
      <div class="phone-order">
        <div class="phone">
          <jdoc:include type="modules" name="phone" />
        </div>
        <div class="order1">
          <jdoc:include type="modules" name="ord1" />
        </div>
        <div class="form form2">
          <jdoc:include type="modules" name="popup-form" />          
        </div>
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
         <jdoc:include type="component" />
         <div class="form form1"><jdoc:include type="modules" name="form-bottom" /></div>
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
