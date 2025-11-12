<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Gallery</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<?php
		include 'database.php';

		try {
        $conn = new PDO("mysql:host=$db_host; dbname=$db_name;", $db_user, $db_pass);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";

        $stmt = $conn->prepare("SELECT * FROM `tbl_images` WHERE img_inc = 1");

        $gallery_items = array();
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $gallery_items[] = $row;
        }

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        }

	?>
	<div class="container">
		<h1 class="my-4">Image Gallery - DB</h1>
		<div class="row">
			<?php foreach ($gallery_items as $item): ?>
			<div class="col-lg-3 col-md-4 col-6 mb-4">
				<img src="<?php echo $item['img_src']; ?>" class="img-fluid img-thumbnail border-0" alt="<?php echo $image['img_alt']; ?>" data-bs-toggle="modal" data-bs-target="#lightbox" data-keyboard="true" data-bs-whatever="<?php echo $item['img_src']; ?>">
			</div>
			<?php endforeach; ?>
		</div>
	</div>

	<!-- The Modal -->
    <div class="modal fade" id="lightbox" tabindex='-1'>
        <div class="modal-dialog modal-xl">
            <div class="modal-content bg-dark">
                <!-- Modal Header -->
                <div class="modal-header border-0">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body pb-5"><img src="" class="img-fluid mx-auto d-block"></div>
            </div>
        </div>
    </div>

    <script>
        const lightbox = document.getElementById('lightbox')
        if (lightbox) {
			lightbox.addEventListener('show.bs.modal', event => {
			const imglink = event.relatedTarget
			const imagesrc = imglink.getAttribute('data-bs-whatever')
			const modalBodyImage = lightbox.querySelector('.modal-body img')
			modalBodyImage.src = imagesrc
			})
        }
        //script to tab through images in modal
        lightbox.addEventListener('keydown', event => {
            if (event.key === 'ArrowRight' || event.key === 'ArrowLeft') {
                const currentSrc = lightbox.querySelector('.modal-body img').src;
                const images = Array.from(document.querySelectorAll('.img-thumbnail'));
                let currentIndex = images.findIndex(img => img.src === currentSrc);
                if (event.key === 'ArrowRight') {
                    currentIndex = (currentIndex + 1) % images.length;
                } else if (event.key === 'ArrowLeft') {
                    currentIndex = (currentIndex - 1 + images.length) % images.length;
                }
                lightbox.querySelector('.modal-body img').src = images[currentIndex].src;
            }
        });
    </script>

	<!-- Bootstrap JS and dependencies -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>