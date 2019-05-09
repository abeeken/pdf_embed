<?php
    function pdfControlBar(){
        $output = '<a id="page-top" name="page-top"></a>';
        $output .= '<p id="loading-pdf" class="alert alert-warning"><i class="fas fa-spinner fa-spin"></i> Loading PDF, please wait...</p>';
        $output .= '<div id="pdf-toolbar" class="btn-group hidden" role="group">';
        $output .= '    <button type="button" class="btn btn-secondary pdf-nav-btn" id="pdf-previous-btn" data-page="top">Previous Page</button>';
        $output .= '    <div class="btn-group" role="group">';
        $output .= '        <button type="button" id="pdf-pages" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Page: <span id="page-x">1</span> of <span id="page-y">0</span></button>';
        $output .= '           <div id="dropdown-pages" class="dropdown-menu" aria-labelledby="pdf-pages">';
        $output .= '            </div>';
        $output .= '    </div>';
        $output .= '    <button type="button" class="btn btn-secondary pdf-nav-btn" id="pdf-next-btn" data-page="2">Next Page</button>';        
        $output .= '    <button type="button" class="btn btn-secondary pdf-nav-btn" id="pdf-top-btn" data-page="top">Back To Top</button>';
        $output .= '</div>';
        
        return $output;
    }
?>