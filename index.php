	<!DOCTYPE html>
	<html class="ie ie9 no-js" lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<title>Учёт услуг платной стоматологической клиники</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link href='http://fonts.googleapis.com/css?family=Electrolize' rel='stylesheet' type='text/css' />
	</head>
	<body>

		<div id="header">
			<h1>Учёт услуг платной стоматологической клиники</h1>
			<ul id="navigation">
				<li><a id="link-home" href="#table_2">Список наших клиентов</a></li>
				<li><a id="link-portfolio" href="#client">Перечень предостовляемых услуг</a></li>
			</ul>
		</div>
	
		<div id="client" class="content">
			<h2>Список наших клиентов</h2>
			<?php
			$link = mysql_connect('localhost', 'root', '')
			or die('Нет соединения с СУБД MySQL: ' . mysql_error());
			mysql_select_db('dental_clinic')
			or die('<br>Нет соединения с базой данных');
			mysql_query('SET CHARACTER SET cp1251',$link);
			mysql_query("set NAMES cp1251");
			$query="SELECT * FROM client_database";
			$result=mysql_query($query);
			print '<TABLE align=center border=1>'
			.'<TR><TH>№<TH>ФИО клиента клиники<TH>Телефонный номер<TH>Время приема';
			$i=0;
			while($A[$i++]=mysql_fetch_row($result)){;}
			$i=0;
			foreach($A as $st)
			{ if(!$st){break;}
			$i++; list($Id,$name,$n1,$n2)=$st;
			print "<TR><TD align=center>$Id<TD align=center>$name<TD>$n1<TD>$n2";
			}
			?>
		</div>

		<div id="table_2" class="panel">
			<div class="content">
				<h2>Перечень предостовляемых услуг</h2>
				<?php
				$link = mysql_connect('localhost', 'root', '')
				or die('Нет соединения с СУБД MySQL: ' . mysql_error());
				mysql_select_db('dental_clinic')
				or die('<br>Нет соединения с базой данных');
				mysql_query('SET CHARACTER SET cp1251',$link);
				mysql_query("set NAMES cp1251");
				$query="SELECT * FROM list_of_services";
				$result=mysql_query($query);
				print '<TABLE align=center border=1>'
			.'<TR><TH>id<TH> Наименование услуги <TH> Приблизительная цена ';
				$i=0;
				while($A[$i++]=mysql_fetch_row($result)){;}
				$i=0;
				foreach($A as $st)
				{ if(!$st){break;}
				$i++; list($Id,$name,$estimated_cost)=$st;
				print "<TR><TD align=center>$Id<TD align=center>$name<TD>$estimated_cost";
				}
				?>
			</div>
		</div>
	</body>
</html>
