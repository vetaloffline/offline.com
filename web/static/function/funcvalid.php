<?
function valpassword($str)
	{
if(preg_match('/[^\w\s\)\(\+\-\$\.\\\%\^\?\|\[\]]/',$str))
	{
//"Nedopustim simvol";	
	}else if(preg_match('/[A-Za-z]/',$str) && preg_match('/[0-9]/',$str) && preg_match('/.{8,64}/',$str))
					{
					$ys++;
					return $ys;
					}
					else
					{
					//'proverka ne proudena';
					}
	};

function valmail($mail)
	{
	if(preg_match("/[^\w\.,@]/i",$mail)){}

		else if (preg_match_all('/([a-z-0-9]+\.)*[a-z-0-9]+@[a-z0-9-]+(\.[a-z0-9-]+)*\.[a-z]{2,6}/',$mail,$arr)) 
			{
			 $aaa++;
			 return $aaa;
			}
			else{}
	};

function valtel($tel)
	{
	if (preg_match('/[^\d]/',$tel))
		 {
		 //"Ne dopustimuy simvol";
		 }
		 elseif (preg_match('/\d{6,7}/',$tel,$arr))
		 	{
			$asdf++;
			return $asdf;
			}
			else
				{
				//"Proverka ne proudena";
				}
	};

function vallogin($log)
	{if(preg_match('/[^\w]/',$log,$arr))
			{
			
			}else{
					$yes++;
				return  $yes;
			}
	};


function valruss($rus)
	{if(preg_match('/[^а-яё]/iu',$rus,$arr))
			{
			
			}else{
					$yes++;
				return  $yes;
			}
	};
?>