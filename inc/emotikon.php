<?php

function emot($str) {
	$str = eregi_replace(":D", "<img src='../emot/smile2.png' width='26px' height='26px'>", $str);
	$str = eregi_replace(":v", "<img src='../emot/yimyam.png' width='28px' height='28px'>", $str);
	$str = eregi_replace(":)", "<img src='../emot/smile.png' width='28px' height='28px'>", $str);
	$str = eregi_replace(":p", "<img src='../emot/melet.png' width='28px' height='28px'>", $str);
	$str = eregi_replace("^_^", "<img src='../emot/^_^.png' width='28px' height='28px'>", $str);
	$str = eregi_replace(":3", "<img src='../emot/3.png' width='28px' height='28px'>", $str);
	$str = eregi_replace(":o", "<img src='../emot/o.png' width='28px' height='28px'>", $str);
	$str = eregi_replace(":like:", "<img src='../emot/like.png' width='28px' height='28px'>", $str);
	$str = eregi_replace(":sad:", "<img src='../emot/sad.png' width='28px' height='28px'>", $str);
	$str = eregi_replace("<3", "<img src='../emot/love.png' width='28px' height='28px'>", $str);
	return $str;
}

?>