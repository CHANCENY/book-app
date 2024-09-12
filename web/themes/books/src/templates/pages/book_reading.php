<?php $book = $content['book'] ?? null;

$pdf_file = \Mini\Cms\Modules\FileSystem\File::load($book->pdf_id);

?>
<main>
    <div class="form-wrapper" style="width: 90%;margin-top: 20px;">
        <div class="form">
            <h1>
                <?= $book->title ?>
                <a style="float: inline-end;" href="#" id="fullscreen-btn"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M120-120v-200h80v120h120v80H120Zm520 0v-80h120v-120h80v200H640ZM120-640v-200h200v80H200v120h-80Zm640 0v-120H640v-80h200v200h-80Z"/></svg></a>
            </h1>
            <div id="pdf-canvas-container"></div> <!-- Container for multiple canvases -->
        </div>
    </div>
    <script>
        function enterFullscreen() {
            const element = document.documentElement; // Selects the whole page
            if (element.requestFullscreen) {
                element.requestFullscreen();
            } else if (element.mozRequestFullScreen) { // For Firefox
                element.mozRequestFullScreen();
            } else if (element.webkitRequestFullscreen) { // For Safari
                element.webkitRequestFullscreen();
            } else if (element.msRequestFullscreen) { // For Internet Explorer/Edge
                element.msRequestFullscreen();
            }
        }

        // To trigger it on a button click, you can do this:
        document.getElementById("fullscreen-btn").addEventListener("click", enterFullscreen);
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script>
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';

        const url = '<?= "/".$pdf_file->getFilePath() ?>'; // Path to your PDF file
        const container = document.getElementById('pdf-canvas-container');

        // Get the body width or the width of any container element
        const bodyWidth = containerWidth = document.querySelector('.form-wrapper').offsetWidth;


        // Load PDF and render each page
        pdfjsLib.getDocument(url).promise.then(async (pdfDoc) => {
            const totalPages = pdfDoc.numPages;

            // Loop through all the pages and render each one
            for (let pageNum = 1; pageNum <= totalPages; pageNum++) {
                const pdfPage = await pdfDoc.getPage(pageNum);
                const viewport = pdfPage.getViewport({ scale: 1.0 }); // Initial viewport for aspect ratio

                // Calculate the scale based on body width
                const scale = bodyWidth / viewport.width;
                const scaledViewport = pdfPage.getViewport({ scale: scale });

                // Create a canvas element for each page
                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');

                // Set the canvas dimensions based on the body width and proportional height
                canvas.width = bodyWidth;
                canvas.height = scaledViewport.height;

                // Append the canvas to the container
                container.appendChild(canvas);

                // Render the page into the canvas
                const renderContext = {
                    canvasContext: ctx,
                    viewport: scaledViewport,
                };
                await pdfPage.render(renderContext).promise;
            }
        });
    </script>

</main>


