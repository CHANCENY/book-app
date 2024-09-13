<?php
$book = $content['book'] ?? null;
$pdf = \Mini\Cms\Modules\FileSystem\File::load($book->pdf_id);
$base64PDF = base64_encode(file_get_contents($pdf->getFilePath()));
?>

<main tabindex="1">
    <object id="pdfObject" data="data:application/pdf;base64,<?= $base64PDF ?>" type="application/pdf" width="100%" height="900"></object>
</main>

<script>
    // JavaScript to set the width and height based on screen dimensions
    const pdfObject = document.getElementById('pdfObject');

    // Set the width and height based on the screen's dimensions
    const screenWidth = window.innerWidth;
    const screenHeight = window.innerHeight;

    // Adjust the width and height as needed (e.g., make the object smaller than full screen)
    const objectWidth = Math.min(screenWidth * 0.9, 1200);  // 90% of the screen width, max 1200px
    const objectHeight = Math.min(screenHeight * 0.9, 900); // 90% of the screen height, max 900px

    pdfObject.setAttribute('width', objectWidth);
    pdfObject.setAttribute('height', objectHeight);

    // Optionally, listen for window resize events to adjust the size dynamically
    window.addEventListener('resize', () => {
        const newScreenWidth = window.innerWidth;
        const newScreenHeight = window.innerHeight;

        const newObjectWidth = Math.min(newScreenWidth * 0.9, 1200);
        const newObjectHeight = Math.min(newScreenHeight * 0.9, 900);

        pdfObject.setAttribute('width', newObjectWidth);
        pdfObject.setAttribute('height', newObjectHeight);
    });
</script>