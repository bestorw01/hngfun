
<?php
require ("p_api.php");
  
$api_key = "52P8WQDT-UNTGQINY-A7RUEC8A-PJ7RQCKL"; // Api Keys here
$api_secret = "1d63d60d45b510553c0bc7dd2aa4128e8b36c44d23a47459e03ef077bb5c1d25a098e1139434c7ceb97ed3ab7673164a6f12a67432d5062be08992b5c04e358e"; // Api Secret here

# loadclass
$load_trade = new poloniex($api_key, $api_secret);

//$trade_ticker = $load_trade->get_ticker();
$trade_ticker = $load_trade->get_trading_pairs();

?>
					
	<html>
		<head>
		</head>
		<body>
					
		<?php	

		$arrlength = count($trade_ticker);
		$alldata = Array();
			
		$biggest = Array();	
		$bigger = Array();	
		$big = Array();		
			
		$first_runner_up = 0;
		for ($i = 0; $i < 4; $i++) {	
			//echo $load_trade->get_trade_history($trade_ticker[$i]);
			$trade_history = $load_trade->get_trade_history($trade_ticker['3']);	
			$trade_history_count = count($trade_history);					
			$count_sell = 0;
			$count_buy = 0;
			foreach($load_trade->get_trade_history($trade_ticker[$i]) as $x => $x_value) {
			    if($x_value["type"] == "sell"){
				$count_sell = $count_sell+1;
			    }else if($x_value["type"] == "buy"){
				$count_buy = $count_buy+1;
			    }				
			}
			
			if($count_buy > $first_runner_up){
				$first_runner_up = $count_buy;
				
				$big = $bigger;
				$bigger = $biggest;
				$biggest =array("coin"=>$trade_ticker[$i], "total_buy"=>$count_buy, "total_sell"=>$count_sell);			
						
					
			}else{
				
			}
			
			//echo '<p>';
			$data = array("coin"=>$trade_ticker[$i], "total_buy"=>$count_buy, "total_sell"=>$count_sell);
			array_push($alldata,$data);
		}
			
			echo json_encode($alldata);
			echo json_encode($biggest)." <br>";
			echo json_encode($bigger)." <br>";
			echo json_encode($big)." <br>";


		?>
		</body>
		</html>
