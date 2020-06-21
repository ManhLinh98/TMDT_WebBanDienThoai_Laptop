<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Kết Quả Tìm Kiếm</title>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<link rel="stylesheet" href="css/search.css">
</head>
<body>
<?php 
	include ('menu.php');

 ?>
	
	<div class="main">
		<div class="container">
		<div class="timkiem">
			<?php 
				include ('MYSQL/connectmysql.php');
						if(isset($_GET['submit_search'])){
							$search=$_GET['search'];

			 ?>

			<div class="col-xs-12">
				<p class="td">KẾT QUẢ TÌM KIẾM CHO : <span class='tdf'>" <?php echo $search ;?> "</span></p>
			</div>
			<div class="row shado">
			<?php

							$sql_search="select * from sanpham where ten_sp LIKE '%$search%' OR thuocdanhmuc LIKE '%$search%'";
							$sql_search_query=mysqli_query($connection,$sql_search);
							$row_search=mysqli_num_rows($sql_search_query);
							if($row_search>0 && $search != ''){
								while($row=mysqli_fetch_array($sql_search_query)){
								
					?>
				<div class="col-xs-12 col-sm-6 col-md-6 pol">
					<div class="col-xs-4">
						<a href="index.php?page=product&id_sp=<?php echo $row['id_sp']; ?>" title=""><img src="public/<?php echo $row['anh_sp'] ; ?>" alt="" width='100%'></a>
					</div>
					<div class="col-xs-8">
					<div class='sp'>
						<a href="index.php?page=product&id_sp=<?php echo $row['id_sp']; ?>" class='tensp'><?php echo $row['ten_sp']; ?></a>
						</div>
						<p class='giasp'><?php echo $row['gia_sp']; ?></p>
					</div>
				</div>
					<?php
					}
				}
				else{
			?>
			<div class='container'>
			<div class='col-xs-12'>
				<p class='khongthay'>Không Tìm Thấy Thông Tin Cho Từ Khóa <span> " <?php echo  $search ?> " </span></p>
			</div>
			</div>
			<?php
				}
			}


			?>

			</div>


			</div>
		</div>
	</div>
	<?php 

		include ('footer.php');
	 ?>
</body>
</html>







					