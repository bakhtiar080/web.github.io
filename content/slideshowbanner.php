<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type"/>
<title>Bakorwil Bojonegoro Banner</title>
<script type="text/javascript" src="jquery-1.2.6.min.js"></script>
<script type="text/javascript">
function slideSwitch() {
    var $active = $('#slideshow IMG.active');
    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');
    // use this to pull the images in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');

    // uncomment the 3 lines below to pull the images in random order

    // var $sibs  = $active.siblings();

    // var rndNum = Math.floor(Math.random() * $sibs.length );

    // var $next  = $( $sibs[ rndNum ] );

    $active.addClass('last-active');
    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}



$(function() {

    setInterval( "slideSwitch()", 4000 );

});

</script>

<style type="text/css">

/*** set the width and height to match your images **/



#slideshow {

    position:relative;

    height:340px;

}



#slideshow IMG {

    position:absolute;

    top:-70px;

	left:50px;

    z-index:8;

    opacity:0.0;

}



#slideshow IMG.active {

    z-index:10;

    opacity:1.0;

}



#slideshow IMG.last-active {

    z-index:9;

}

</style>

</head>

<body>
<div id="slideshow">
<img src="images/banner/1.png" alt="" class="active" height="400" width="900px"/>
<img src="images/banner/2.jpg" alt="" class="" height="400" width="900px"/>
<img src="images/banner/3.png" alt="" class="" height="400" width="900px"/>
<img src="images/banner/5.jpg" alt="" class="" height="400" width="900px"/>
<img src="images/banner/6.jpg" alt="" class="" height="400" width="900px"/>
<img src="images/banner/7.jpg" alt="" class="" height="400" width="900px"/>
<img src="images/banner/8.jpg" alt="" class="" height="400" width="900px"/>
<img src="images/banner/9.jpg" alt="" class="" height="400" width="900px"/>
<img src="images/banner/10.jpg" alt="" class="" height="400" width="900px"/>
<img src="images/banner/11.jpg" alt="" class="" height="400" width="900px"/>
<img src="images/banner/11.jpg" alt="" class="" height="400" width="900px"/>

</div>
</body>
</html>
