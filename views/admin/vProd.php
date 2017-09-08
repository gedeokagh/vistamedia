<style>
#containers{
	width:800px;
	margin: auto;
}
#rows{
	width:100%;
	background:url("../images/bg.png");
}
#logo{
	width:100px;
	margin:10px auto ;
	
}
#rowst{
	clear: both;
    float: left;
    margin: 0;
    padding: 10px;
    width: 778px;
	border:1px solid #000;
}
#rownd{
    float: left;
	margin-top:10px;
    padding: 5px;
    width: 388px;
	border:1px solid #000;
}
#rowrd{
	margin-top:10px;
	margin-left:5px;
    float: left;
    padding: 5px;
    width: 383px;
	border:1px solid #000;
}

#fTitle h2{
font-family: verdana;
    font-size: 14;
	margin:0px;
	padding:5px;
	
}
#fTitle h2 small{
	font-family: verdana;
    font-size: 12;
	padding-left:50px;
	background:blue;
}

</style>
<div id="containers">

	<div id="rows">
		<div id="logo">
		<img src="../assets/img/logo.jpg">
		</div>
		<div id="rowst">
			<div id="fTitle">
			<h2>Kode <small> Location 1, BADUNG, BALI</small></h2>
			</div>
			<div id="fimg">
				<img src="../assets/img/1G_B.jpg"  style="width:100%;height:50%;" >
			</div>
			
			
		</div>
		<div id="rownd">
			<h4>Informasi Area</h4>

		<table>
					<tr>
						<td   style="padding:5px;">Rute Jalan </td>
						<td  style="padding:5px;"> : </td>
						<td  style="padding:5px;"> <?php echo $prod["RuteJalan"];?></td>
					</tr>
					<tr>
						<td   style="padding:5px;">Akses Menuju </td>
						<td  style="padding:5px;"> : </td>
						<td  style="padding:5px;"> <?php echo $prod["akses"];?></td>
					</tr>
					<tr>
						<td   style="padding:5px;">Jarak Pandang </td>
						<td  style="padding:5px;"> : </td>
						<td  style="padding:5px;"> <?php echo $prod["JarakPandang"];?></td>
					</tr>
					<tr>
						<td   style="padding:5px;">Kecepatan Kendaraan </td>
						<td  style="padding:5px;"> : </td>
						<td  style="padding:5px;"> <?php echo $prod["KecepatanKendaraan"];?></td>
					</tr>
					<tr>
						<td   style="padding:5px;">Kawasan</td>
						<td  style="padding:5px;"> : </td>
						<td  style="padding:5px;"> <?php echo $prod["Kawasan"];?></td>
					</tr>
				</table>
		
		</div>
		<div id="rowrd">
		4
		</div>
	</div>

</div>
					<?php 
					
					foreach($this->listPro as $prodx){
						foreach($prodx as $prod){
						if($prod["ProductCode"]<>""){
						//}
					//}
					?>
						
								<i class="icon-map-marker"></i> <?php echo $prod["Address"].", ".$prod["Kota"].", ".Code::GetField("area","NamaArea","ID=".$prod["AreaID"]);?>


<?php
//echo "==>".$prod["img"];
if($prod["img"]!=""){
?>
								<img src="<?php echo URL.$prod["img"];?>" style="width:100%;height:50%;" alt=""/>
<?php
}else{ echo "harap set gambar untuk vistamedia<br> &nbsp; <br>";}
?>
								
								
								<h4>Informasi Area</h4>

								<table>
									<tr>
										<td   style="padding:5px;">Rute Jalan </td>
										<td  style="padding:5px;"> : </td>
										<td  style="padding:5px;"> <?php echo $prod["RuteJalan"];?></td>
									</tr>
									<tr>
										<td   style="padding:5px;">Akses Menuju </td>
										<td  style="padding:5px;"> : </td>
										<td  style="padding:5px;"> <?php echo $prod["akses"];?></td>
									</tr>
									<tr>
										<td   style="padding:5px;">Jarak Pandang </td>
										<td  style="padding:5px;"> : </td>
										<td  style="padding:5px;"> <?php echo $prod["JarakPandang"];?></td>
									</tr>
									<tr>
										<td   style="padding:5px;">Kecepatan Kendaraan </td>
										<td  style="padding:5px;"> : </td>
										<td  style="padding:5px;"> <?php echo $prod["KecepatanKendaraan"];?></td>
									</tr>
									<tr>
										<td   style="padding:5px;">Kawasan</td>
										<td  style="padding:5px;"> : </td>
										<td  style="padding:5px;"> <?php echo $prod["Kawasan"];?></td>
									</tr>
								</table>

								<h4>Deskripsi</h4>
								<table>
									<tr>
										<td   style="padding:5px;">Jenis</td>
										<td  style="padding:5px;"> : </td>
										<td  style="padding:5px;"> <?php echo $prod["RuteJalan"];?></td>
									</tr>
									<tr>
										<td   style="padding:5px;">Ukuran </td>
										<td  style="padding:5px;"> : </td>
										<td  style="padding:5px;"> <?php echo $prod["Ukuran"];?></td>
									</tr>
									<tr>
										<td   style="padding:5px;">Jumlah </td>
										<td  style="padding:5px;"> : </td>
										<td  style="padding:5px;"> <?php echo $prod["Jumlah"];?></td>
									</tr>
									<tr>
										<td   style="padding:5px;">Orientasi</td>
										<td  style="padding:5px;"> : </td>
										<td  style="padding:5px;"><?php if($prod["Orientasi"]=="V"){ echo "Vertical";}else{ echo "Horisontal";}?></td>
									</tr>
									<tr>
										<td   style="padding:5px;">Penerangan</td>
										<td  style="padding:5px;"> : </td>
										<td  style="padding:5px;"> <?php  
										switch($prod["Penerangan"]){
											case 'N' : echo "No-Light"; break;
											case 'B' : echo "Back Light"; break;
											case 'F' : echo "Front Light"; break;
										} ?></td>
									</tr>
								</table>
							<h4>Keterangan Lokasi</h4>
								<p><?php echo $prod["Keterangan"];?></p>

					<?php }}}?>

