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
		// Create a list of images for the gallery
		$images = [
			['src' => 'https://images.pexels.com/photos/346529/pexels-photo-346529.jpeg?_gl=1*1aavnhf*_ga*NjczMjg4Njc4LjE3NjI2Nzk1NDg.*_ga_8JE65Q40S6*czE3NjI2Nzk1NDgkbzEkZzEkdDE3NjI2Nzk1NTIkajU2JGwwJGgw', 'alt' => 'Image 1'],
			['src' => 'https://images.pexels.com/photos/34155611/pexels-photo-34155611.jpeg?_gl=1*swq3pr*_ga*NjczMjg4Njc4LjE3NjI2Nzk1NDg.*_ga_8JE65Q40S6*czE3NjI2ODI2MDIkbzIkZzEkdDE3NjI2ODI2MDMkajU5JGwwJGgw', 'alt' => 'Image 2'],
			['src' => 'https://images.pexels.com/photos/2166711/pexels-photo-2166711.jpeg?_gl=1*hnej8i*_ga*NjczMjg4Njc4LjE3NjI2Nzk1NDg.*_ga_8JE65Q40S6*czE3NjI2ODI2MDIkbzIkZzEkdDE3NjI2ODI2NzIkajUwJGwwJGgw', 'alt' => 'Image 3'],
			['src' => 'https://images.pexels.com/photos/206359/pexels-photo-206359.jpeg?_gl=1*117qa85*_ga*NjczMjg4Njc4LjE3NjI2Nzk1NDg.*_ga_8JE65Q40S6*czE3NjI2ODI2MDIkbzIkZzEkdDE3NjI2ODI2NTAkajEyJGwwJGgw', 'alt' => 'Image 4'],
		];
	?>
	<div class="container">
		<h1 class="my-4">Image Gallery</h1>
		<div class="row">
			<?php foreach ($images as $image): ?>
			<div class="col-lg-3 col-md-4 col-6 mb-4">
				<img src="<?php echo $image['src']; ?>" class="img-fluid img-thumbnail border-0" alt="<?php echo $image['alt']; ?>" data-bs-toggle="modal" data-bs-target="#lightbox" data-keyboard="true" data-bs-whatever="<?php echo $image['src']; ?>">
			</div>
			<?php endforeach; ?>
		</div>
        <a href="gallery.php">DB linked Gallery Page</a>
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