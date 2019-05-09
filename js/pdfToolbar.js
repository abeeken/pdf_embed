// vars
var currentScrollPage = 1;

// waypoints
function setPageWaypoints(){
    var pages = document.getElementsByClassName('page-marker');

    for (var i = 0; i < pages.length; i++) {
        new Waypoint({
            element: pages[i],
            handler: function() {
                var pageNo = this.element.getAttribute('name').split("-")[1];
                setXY('x', pageNo);
                setPrevNext(pageNo);
                currentScrollPage = pageNo;
                console.log( pageNo + ' hit');
            }
        });
    }
}

function setPDFTop(){
    var pageTop = new Waypoint({
        element: $('#page-top'),
        handler: function(){
            if(!$('#pdf-toolbar').hasClass('fixed')){
                $('#pdf-toolbar').addClass('fixed');
            } else {
                $('#pdf-toolbar').removeClass('fixed');
            }
        }
    });
}

// fns
function scrollToAnchor(aid,offset){
    if(!offset) offset = 0;
    var aTag = $("a[name='"+ aid +"']");
    $('html,body').animate({scrollTop: (aTag.offset().top + offset)},'slow');
}

function setXY(xy, value){
    $('#page-'+xy).text(value);
}

function setPrevNext(value){
    value = parseInt(value,10);
    if(value == 1){
        $('#pdf-previous-btn').data("page", "top");
    } else {
        $('#pdf-previous-btn').data("page", value-1);
    }
    console.log(numPages);
    if(value == numPages){
        $('#pdf-next-btn').data("page", value);
    } else {
        $('#pdf-next-btn').data("page", value+1);
    }
}

// watchers
$('.pdf-nav-btn').on('click', function(){
    if($(this).attr('id') == "pdf-previous-btn" || $(this).attr('id') == "pdf-top-btn"){
        offset = -2;
    } else {
        offset = 65;
    }
    if($(this).data("page") != "top"){
        currentScrollPage = $(this).data("page");
    } else {
        currentScrollPage = 1;
    }
    scrollToAnchor("page-"+$(this).data("page"),offset);
});

$('#dropdown-pages').on('click', '.page-link', function(){
    if($(this).data('page') < currentScrollPage){
        offset = -2;
    } else {
        offset = 65;
    }
    if($(this).data("page") != "top"){
        currentScrollPage = $(this).data("page");
    } else {
        currentScrollPage = 1;
    }
    scrollToAnchor("page-"+$(this).data("page"),offset);
});