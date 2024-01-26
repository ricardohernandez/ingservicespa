
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs" style="margin-top: 100px">
<div class="container">
  
    <nav aria-label="breadcrumb">

	  	<ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Inicio</a></li>
		    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>servicios">Servicios</a></li>
		</ol>

	</nav>

	<div class="row"  style="margin: 40px 0;">

		<div class="col-lg-6">
			 <h2 class="text-center"><?php echo $data["titulo"]; ?></h2>

		     <p>
		      <?php echo $data["descripcion"]; ?>
		    </p>
		</div>

		<div class="col-lg-6">
			<img src="<?php echo base_url() ?>assets/img/intro-carousel/<?php echo $data["imagen"] ?>" alt="" class="img-thumbnail">	
		</div>

	</div>
   

</div>
</section><!-- End Breadcrumbs -->

<!-- <section class="inner-page">
  <div class="container">
   
  </div>
</section> -->
