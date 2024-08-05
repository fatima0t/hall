<!DOCTYPE html>
<html>
<head>
	<title> WEB PRAROZ</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        *{
	margin: 0;
	padding: 0;
	font-family: Century Gothic;
}
header{
	background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(../aa.jpg);
	height: 100vh;
	background-size: cover;
	background-position: center;
	min-height: 100px;
}
ul{
	float:right;
	list-style-type: none;
	margin-top: 30px;
	margin-right:60px ;
}
ul li{
	display: inline-block;
}
ul li a{
	text-decoration: none;
	color: #fff;
	padding: 5px 20px;
	border: 1px solid transparent;
	transition: 0.5s ease;

}

ul li a:hover{
	background-color: #fff;
	color: #000;
}

ul li.active a{
background-color:#fff;
	color: #000;

}

.logo img{
	float: left;
	width: 150px;
	height: auto;
}

.main{
	max-width: 1200px;
	margin: auto;
}

.title{
	position: absolute;
	top: 40%;
	left: 50%;
	transform: translate(-50%,-50%);
}

.title h1{
	color: #fff;
	font-size: 85px;
}

.button{
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
}

.btn{
	border: 1px solid #fff;
	padding: 5px 20px;
	color: #fff;
	transition: 0.6s ease;
	font-size: 18px;
	text-decoration: none;
}

.btn:hover{
	background-color: #fff;
	color: #000;
}

.main input[type="submit"] {
      background-color: red;
      color: #fff;
      cursor: pointer;
    }

    .main input[type="submit"]:hover {
      background-color: #d37979;
    }

.sub-menu{
	display: none;
    top:6%;
    position: relative;
}

.sub-menu ul{
	position: absolute;

}

.main ul li:hover .sub-menu
{
	display: block;
	position: absolute;
	background-color: rgb(0,45,117);
	margin-top: 12px;
	margin-left: -8px;
}

.main ul li:hover .sub-menu ul 
{
	display: block;
	margin:6px;

}
.main ul li:hover .sub-menu ul li
{
	width: 75px;
	padding: 5px;
	border-bottom: 1px#fff;
	background: transparent;
	transition: 0.4s ease;
	text-align: left;
	border-radius: 0;
	
}

.main ul li:hover .sub-menu ul li:last-child 
{
	border-bottom: none;
}
    </style>
</head>
<body>
	<header>
		<div class="main">
		
		
		 <ul>
		 <li class="active"><a href="#"><i class="fa fa-home"></i>Home</a></li>
		 <li>
            <form action="search_s.php" method="post">
                <button type="submit"><i class="fas fa-search"></i> &emsp;Search by Date & Time</button>
            </form>
        </li>
		 <li><a href="#">Search by name</a></li>
		 <li><a href="#">Show in selected month</a></li>
		 <li><a href="#">Show how not all paid</a></li>
		 <li><a href="#">Add new</a></li>
		 
		
		</ul>

		 </div>
		 <div class="title">
		 	<h1>HOMIE RECIPES</h1>
		 </div>
		 <div class="button">
		 	<a href="#" class="btn">WATCH VIDEO</a>
		 	<a href="#" class="btn">BASIC SKILLS</a>
		 	<a href="#" class="btn">LEARN MORE</a>
		 </div>

		 	</header>

</body>
</html>