var numPages = 0;

function doPdf(url){
    // If absolute URL from the remote server is provided, configure the CORS
    // header on that server.

    // Loaded via <script> tag, create shortcut to access PDF.js exports.
    var pdfjsLib = window['pdfjs-dist/build/pdf'];

    // The workerSrc property shall be specified.
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.2.2/pdf.worker.js';

    var currPage = 1; //Pages are 1-based not 0-based
    var thePDF = null;

    pdfjsLib.getDocument(url).then(function(pdf) {
        //Set PDFJS global object (so we can easily access in our page functions
        thePDF = pdf;

        //How many pages it has
        numPages = pdf.numPages;
        setXY('y', numPages);
        pageDropdown();

        //Start with first page
        pdf.getPage( 1 ).then( handlePages );
    });


    function handlePages(page){
        //We'll create a canvas for each page to draw it on, as well as an anchor
        var container = document.getElementById('the-dissertation');
        var canvas = document.createElement( "canvas" );
        var anchor = document.createElement("a");
        var name = document.createAttribute("name");
        var clss = document.createAttribute("class");
        name.value = "page-"+currPage;
        clss.value = "page-marker";
        anchor.setAttributeNode(name);
        anchor.setAttributeNode(clss);
        canvas.style.display = "block";
        var context = canvas.getContext('2d');
        canvas.width = container.offsetWidth;
        var viewport = page.getViewport(canvas.width / page.getViewport(1.0).width);
        canvas.height = viewport.height;

        //Draw it on the canvas
        /*page.getTextContent().then(function (textContent){
            var textLayer = new TextLayerBuilder($textLayerDiv.get(0), currPage-1);
            textLayer.setTextContent(textContent);

            var renderContext = {
                canvasContext: context,
                viewport: viewport,
                textLayer: textLayer
            }

            page.render(renderContext);
        });*/
        page.render({canvasContext: context, viewport: viewport});

        //Add elements
        container.appendChild( anchor );
        container.appendChild( canvas );

        //Move to next page
        currPage++;
        if ( thePDF !== null && currPage <= numPages )
        {
            thePDF.getPage( currPage ).then( handlePages );
        } else {
            // We've got all the pages
            setPageWaypoints();
            $('#pdf-toolbar').removeClass('hidden');
            $('#loading-pdf').remove();
        }
    }

    function pageDropdown(){
        for(i=1;i<=numPages;++i){
            $('#dropdown-pages').html($('#dropdown-pages').html()+'<a class="dropdown-item page-link" data-page="'+i+'">Page '+i+'</a>');
        }
    }
}