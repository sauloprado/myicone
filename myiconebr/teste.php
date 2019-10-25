<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="ScriptLibrary/jquery-latest.pack.js"></script>
<script type="text/javascript" src="ScriptLibrary/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="ScriptLibrary/jquery.csstransform.pack.js"></script>
<script type="text/javascript">
<!--
function flip(context, flags, backsrc, dur, easing, onend, onflip) {//v1.0
var $=jQuery,jc=$(context),f=flags,bs=$.trim(String(backsrc)),pf=parseFloat;if((
/\.(jpe?g|gif|pnga?)(\?.*)?$/i).test(bs))new Image().src=bs;jc.each(function(i,o
){var jo=$(o);if((f&32)&&jo.is(":animated"))return true;jo.stop(true,true);var c
={},r=/^[^\d\-\.\+]*/,x=pf(jo.css("scaleX").replace(r,"")),y=pf(jo.css("scaleY")
.replace(r,"")),a=180,bst;if(f&2){if(f&8)c.skewX=a*(y<1?0:1);c.scaleY=y*-1;}else
if(f&4){if(f&8)c.skewY=a*(x<1?0:1);c.scaleX=x*-1;}if(jo.is("img")){if(bs&&bs!=(o
.origsrc||jo.attr("src")))bst="img";}else try{bs=$(bs);if(bs.length>0){jo.width(
jo.width()).height(jo.height()).css({overflow:"auto"});bst="html";bs=bs.html();}
}catch(e){}if(bst){this.backsrc=bs;this.origsrc=!!this.origsrc?this.origsrc:bst
=="img"?jo.attr("src"):jo.html();this.front=!!this.front;}var sw=0;jo.animate(c,
{duration:(dur||.8)*1000,easing:easing,complete:onend,step:function(n,z){var el=
z.elem;if(z.prop=="scaleX"||z.prop=="scaleY"){if(z.state==1||z.state==0)sw=0;else
if(!sw){if(z.start>0&&z.end<0&&z.now<0){o.front=0;sw=1;if(f&16)jo.css("matrix",f&
4?[-1,0,0,1,0,0]:[1,0,0,-1,0,0]);if($.isFunction(onflip))onflip.call(o,"toback");
}if(z.start<0&&z.end>0&&z.now>0){o.front=1;sw=true;if(f&16)jo.css("matrix",[1,0,0
,1,0,0]);if($.isFunction(onflip))onflip.call(o,"tofront");}if(bst&&sw){if(bst==
"img")o.src=o.front?o.origsrc:o.backsrc;else jo.html(o.front?o.origsrc:o.backsrc);
}}}}});});}
//-->
</script>
</head>

<body>
<img src="imagens/2011/2011.jpg" width="500" height="172" onclick="flip(this, 10, '', 0.8, 'easeInOutElastic')" />
</body>
</html>