document.addEventListener( 'wpcf7mailsent', function ( event ) {
    gtag( 'event', 'wpcf7_submission', {
        'event_category': "form_submit",
        'event_label': event.detail.unitTag
    } );
}, false );