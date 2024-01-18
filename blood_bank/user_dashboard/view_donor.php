<?php
	include('user_header.php');
?>
<div class="main">
			<!-- ANA İÇERİK -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- SOL SÜTUN -->
							<div class="profile-left">
								<!-- PROFİL BAŞLIK -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
									<?php 
										$info = $connection->query("SELECT * FROM donor WHERE donor_id='".$_GET['donor_id']."'");
										$fetch = $info->fetch_array(); ?>
									
										<img src="../<?php echo $fetch['image']?>" class="img-circle" alt="Avatar" width="100px" height="100px">
										<h3 class="name"><?php echo $fetch['name'];?> </h3>
										<span class="online-status status-available">Uygun</span>
									</div>
									
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												45 <span>Projeler</span>
											</div>
											<div class="col-md-4 stat-item">
												15 <span>Ödüller</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Puanlar</span>
											</div>
										</div>
									</div>
								</div>
								<!-- PROFİL DETAY -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Temel Bilgiler</h4>
										<ul class="list-unstyled list-justify">
											<li>Doğum Tarihi <span><?php echo $fetch['dob']?></span></li>
											<li>Mobil <span><?php echo $fetch['phone']?></span></li>
											<li>Email <span><?php echo $fetch['email']?></span></li>
											<li>Email <span><?php echo $fetch['gender']?></span></li>
										</ul>
									</div>
									
									<div class="profile-info">
										<h4 class="heading">Hakkında</h4>
										<p>Benzeri olmayan dış kaynak kullanımından sonra etkileşimli modaya uygun bilgi.</p>
									</div>
									
								</div>
								<!-- PROFİL DETAY SONU -->
							</div>
							<!-- SOL SÜTUN SONU -->
							<!-- SAĞ SÜTUN -->
							<div class="profile-right">

								<h4 class="heading"><?php echo $fetch['name'];?>'in Ödülleri</h4>
								<!-- ÖDÜLLER -->
								<div class="awards">
									<div class="row">
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
												<div class="hexagon">
													<span class="lnr lnr-sun award-icon"></span>
												</div>
												<span>En Parlak Fikir</span>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
												<div class="hexagon">
													<span class="lnr lnr-clock award-icon"></span>
												</div>
												<span>En Zamanında</span>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
												<div class "hexagon">
													<span class="lnr lnr-magic-wand award-icon"></span>
												</div>
												<span>Sorun Çözücü</span>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
												<div class="hexagon">
													<span class="lnr lnr-heart award-icon"></span>
												</div>
												<span>En Sevilen</span>
											</div>
										</div>
									</div>
									<div class="text-center"><a href="#" class="btn btn-default">Tüm ödülleri gör</a></div>
								</div>
								<?php ?>
								<!-- ÖDÜLLER SONU -->
								<!-- SEKME İÇERİĞİ -->
								<div class="custom-tabs-line tabs-line-bottom left-aligned">
									<ul class="nav" role="tablist">
										<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Son Aktiviteler</a></li>
										<li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Projeler <span class="badge">7</span></a></li>
									</ul>
								</div>
								<div class="tab-content">
									<div class="tab-pane fade in active" id="tab-bottom-left1">
										<ul class="list-unstyled activity-timeline">
											<li>
												<i class="fa fa-comment activity-icon"></i>
												<p>Yazıya yorum yapıldı <a href="#">Prototip</a> <span class="timestamp">2 dakika önce</span></p>
											</li>
											<li>
												<i class="fa fa-cloud-upload activity-icon"></i>
												<p>Yeni dosya yüklendi <a href="#">Öneri.docx</a> projeye <a href="#">Yılbaşı Kampanyası</a> <span class="timestamp">7 saat önce</span></p>
											</li>
											<li>
												<i class="fa fa-plus activity-icon"></i>
												<p><a href="#">Martin</a> ve <a href="#">diğer 3 meslektaşı</a> projeye depo ekledi <span class="timestamp">Dün</span></p>
											</li>
											<li>
												<i class="fa fa-check activity-icon"></i>
												<p>Atanmış görevlerin <a href="#">%80'i tamamlandı</a> <span class="timestamp">1 gün önce</span></p>
											</li>
										</ul>
										<div class="margin-top-30 text-center"><a href="#" class="btn btn-default">Tüm aktiviteleri gör</a></div>
									</div>
									<div class="tab-pane fade" id="tab-bottom-left2">
										<div class="table-responsive">
											<table class="table project-table">
												<thead>
													<tr>
														<th>Başlık</th>
														<th>İlerleme</th>
														<th>Lider</th>
														<th>Durum</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><a href="#">Spot Media</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
																	<span>%60 Tamamlandı</span>
																</div>
															</div>
														</td>
														<td><img src="assets/img/user2.png" alt="Avatar" class="avatar img-circle"> <a href="#">Michael</a></td>
														<td><span class="label label-success">AKTİF</span></td>
													</tr>
													<tr>
														<td><a href="#">E-Ticaret Sitesi</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;">
																	<span>%33 Tamamlandı</span>
																</div>
															</div>
														</td>
														<td><img src="assets/img/user1.png" alt="Avatar" class="avatar img-circle"> <a href="#">Antonius</a></td>
														<td><span class="label label-warning">BEKLEMEDE</span></td>
													</tr>
													<tr>
														<td><a href="#">Proje 123GO</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;">
																	<span>%68 Tamamlandı</span>
																</div>
															</div>
														</td>
														<td><img src="assets/img/user1.png" alt="Avatar" class="avatar img-circle"> <a href="#">Antonius</a></td>
														<td><span class="label label-success">AKTİF</span></td>
													</tr>
													<tr>
														<td><a href="#">Wordpress Teması</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
																	<span>%75 Tamamlandı</span>
																</div>
															</div>
														</td>
														<td><img src="assets/img/user2.png" alt="Avatar" class="avatar img-circle"> <a href="#">Michael</a></td>
														<td><span class="label label-success">AKTİF</span></td>
													</tr>
													<tr>
														<td><a href="#">Proje 123GO</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																	<span>%100 Tamamlandı</span>
																</div>
															</div>
														</td>
														<td><img src="assets/img/user1.png" alt="Avatar" class="avatar img-circle" /> <a href="#">Antonius</a></td>
														<td><span class="label label-default">KAPALI</span></td>
													</tr>
													<tr>
														<td><a href="#">Yeniden Tasarım Ana Sayfa</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																	<span>%100 Tamamlandı</span>
																</div>
															</div>
														</td>
														<td><img src="assets/img/user5.png" alt="Avatar" class="avatar img-circle" /> <a href="#">Jason</a></td>
														<td><span class="label label-default">KAPALI</span></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- SEKME İÇERİĞİ SONU -->
							</div>
							<!-- SAĞ SÜTUN SONU -->
						</div>
					</div>
				</div>
			</div>
			<!-- ANA İÇERİK SONU -->
		</div>
		<!-- ANA SONU -->

<?php
	include('user_footer.php');
?>
