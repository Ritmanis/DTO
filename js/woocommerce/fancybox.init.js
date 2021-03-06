jQuery( function( $ ) {
    // Initialize fancyBox

    $( 'a.zoom' ).fancybox({
        padding: 0,
        margin: 32,
        tpl: {
            closeBtn: '<a class="fancybox-item fancybox-close" href="javascript:;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve" width="64" height="64" fill="#f2f2f2"><path id="XMLID_351_" d="M25,26c0.3,0,0.5-0.1,0.7-0.3c0.4-0.4,0.4-1,0-1.4L17.4,16l8.3-8.3c0.4-0.4,0.4-1,0-1.4s-1-0.4-1.4,0l-9,9c-0.4,0.4-0.4,1,0,1.4l9,9C24.5,25.9,24.7,26,25,26z"/><path id="XMLID_6_" d="M7,26c-0.3,0-0.5-0.1-0.7-0.3c-0.4-0.4-0.4-1,0-1.4l8.3-8.3L6.3,7.7c-0.4-0.4-0.4-1,0-1.4s1-0.4,1.4,0l9,9c0.4,0.4,0.4,1,0,1.4l-9,9C7.5,25.9,7.3,26,7,26z"/></svg></a>',
            next: '<a class="fancybox-nav fancybox-next" href="javascript:;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve" width="64" height="64" fill="#f2f2f2"><path id="XMLID_350_" d="M12,26c-0.3,0-0.5-0.1-0.7-0.3c-0.4-0.4-0.4-1,0-1.4l8.3-8.3l-8.3-8.3c-0.4-0.4-0.4-1,0-1.4s1-0.4,1.4,0l9,9c0.4,0.4,0.4,1,0,1.4l-9,9C12.5,25.9,12.3,26,12,26z"/></svg></a>',
            prev: '<a class="fancybox-nav fancybox-prev" href="javascript:;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve" width="64" height="64" fill="#f2f2f2"><path id="XMLID_351_" d="M20,26c0.3,0,0.5-0.1,0.7-0.3c0.4-0.4,0.4-1,0-1.4L12.4,16l8.3-8.3c0.4-0.4,0.4-1,0-1.4s-1-0.4-1.4,0l-9,9c-0.4,0.4-0.4,1,0,1.4l9,9C19.5,25.9,19.7,26,20,26z"/></svg></a>'
        },
        helpers: {
            overlay: {
                locked: false
            }
        }
    });
});