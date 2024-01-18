<?php
	include('../header.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

<script>
	$( function() {
		$( "#datepicker" ).datepicker();
	} );
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#donors').DataTable();
	} );
</script>
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<h2>Merhaba, <span style="color: blue"><?php echo $_SESSION['username']?></span> Bağışçıları Yönetin.</h2><br/>
			<table class="table table-bordered" id="donors">
				<thead>
					<tr>
						<th>Adı</th>
						<th>Cinsiyet</th>
						<th>Telefon</th>
						<th>Kim Tarafından</th>
						<th>Resim</th>
						<th>İşlem</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$members = $connection->query("SELECT * FROM donor WHERE status='1'");
					while ($row = $members->fetch_array()) {
					?>

						<tr>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['gender'];?></td>
							<td><?php echo $row['phone'];?></td>
							<td><?php echo $row['username_fk'];?></td>
							<td><?php if($row['image'] == ''){ ?>
							<img src="http://wiki.bdtnrm.org.au/images/8/8d/Empty_profile.jpg" width="30px" height="30px">
							<?php   } else { ?>
							<img src="../<?php echo $row['image'];?>" width="30px" height="30px">
							<?php  } ?></td>

							<td><button type="button" data-toggle="modal" data-target="#deletdonor<?php echo $row['donor_id']?>" class="btn btn-danger">Sil</button>
								<button type="button" data-toggle="modal" data-target="#editdonor<?php echo $row['donor_id'];?>" class="btn btn-warning">Düzenle</button></td>
						</tr>

						<!-- delete city modal -->
						<div class="modal fade" id="deletdonor<?php echo $row['donor_id']?>" role="dialog">
							<div class="modal-dialog modal-sm">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Emin misiniz ?</h4>
									</div>
									<div class="modal-body">
										<p>Silmek istiyor musunuz?</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
										<a href="delete_donor.php?donor_id=<?php echo $row['donor_id'];?>"><button type="button" class="btn btn-danger">Sil</button></a>
									</div>
								</div>
							</div>
						</div>
						<!-- end of delete state modal -->

						<!-- edit member modal -->
						<div class="modal fade" id="editdonor<?php echo $row['donor_id'];?>" role="dialog">
							<div class="modal-dialog">

								<!-- Modal content-->
								<!-- <div class="modal-content">
								<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Edit Member</h4>
								</div>
								<div class="modal-body">
								<form enctype="multipart/form-data" action="edit_member.php?member_id=<?php echo $row['member_id'];?>" method="post" >
								<div class="form-group">
								<input type="text" name="name" id="name" class="form-control" value="<?php echo $row['name']?>"></input>
								</div>
								<div class="form-group">
								<input type="text" name="username" id="username" class="form-control" value="<?php echo $row['username']?>" disabled=""></input>
								</div>

								<div class="form-group">
								<input type="text" name="password" id="password" class="form-control" disabled="" value="<?php echo $row['password']?>" ></input>
								</div>

								<div class="form-group">
								<input type="file" name="photo" id="photo" class="form-control" ></input>
								</div>
								</div>
								<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-warning">Edit</button>

								</div>
								</div>
								</form>

								</div>
						</div>  -->
					<?php }
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- add state modal -->
<div class="modal fade" id="adddonor" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Bağışçı Detayları Ekle</h4>
			</div>
			<div class="modal-body">
				<form action="add_donor.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<input type="text" class="form-control" name="name" id="name" placeholder="Adınızı Girin"></input>
					</div>

					<div class="form-group">
						<input type="text" class="form-control" name="fathername" id="fathername" placeholder="Baba Adınızı Girin"></input>
					</div>

					<div class="form-group">
						<select class="form-control" name="gender" id="gender" >
							<option value="male">Erkek</option>
							<option value="female">Kadın</option>
							<option value="other">Diğer</option>
						</select>
					</div>

					<div class="form-group">
						<input type="text" class="form-control" name="datepicker" id="datepicker" placeholder="Doğum Tarihinizi Girin"></input>
					</div>

					<div class="form-group">
						<input type="text" class="form-control" name="weight" id="weight" placeholder="Ağırlığınızı Girin"></input>
					</div>
					<div class="form-group">
						<input type="email" class="form-control" name="email" id="email" placeholder="E-posta Adresinizi Girin"></input>
					</div>

					<div class="form-group">
						<select class="form-control" name="state" id="state" >
							<?php 
							$state = $connection->query("SELECT * FROM state");
							while($row = $state->fetch_array()){ ?>
								<option value="<?php echo $row['state_name'];?>"><?php echo $row['state_name'];?></option>

							<?php }
							?>

						</select>
					</div>

					<div class="form-group">
						<select class="form-control" name="city" id="city" >
							<?php 
							$state = $connection->query("SELECT * FROM city");
							while($row = $state->fetch_array()){ ?>
								<option value="<?php echo $row['city_name'];?>"><?php echo $row['city_name'];?></option>

							<?php }
							?>

						</select>
					</div>

					<div class="form-group">
						<input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pin Kodunuzu Girin"></input>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="phone" id="phone" placeholder="Telefon Numaranızı Girin"></input>
					</div>
					<div class="form-group">
						<textarea type="text" class="form-control" name="address" id="address" placeholder="Adresinizi Girin"></textarea>
					</div>

					<div class="form-group">
						<input type="file" class="form-control" name="photo" id="photo" ></input>
					</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
				<button type="submit" class="btn btn-primary" name="addmember">Ekle</button>
			</div>
			</form>
		</div>

	</div>
</div>
<?php
	include('../footer.php');
?>
