var addButton = document.getElementById( 'image-upload-button' );
var deleteButton = document.getElementById( 'image-delete-button' );
var img = document.getElementById( 'image-tag' );
var hidden = document.getElementById( 'img-hidden-field' );
var customUploader = wp.media({
    title: 'Select an Image',
    button: {
        text: 'Use this Image'
    },
    multiple: false
});

// var media_uploader = null;


//     var media_uploader = wp.media({
//         frame: 'post',
//         state: 'insert',
//         multiple: true
//     });
//     media_uploader.on('insert', function(){

//         var attachment = media_uploader.state().get('selection').length;
        
//         hidden.setAttribute( 'value', JSON.stringify( [{ id: attachment.id, url: attachment.url }]) );
//         // toggleVisibility( 'ADD' );

//         // var length = media_uploader.state().get('selection').length;
        
//         var images = media_uploader.state().get('selection').models;
//         for(var i = 0; i < attachment; i++){
            
//             var image_url = images[i].changed.url;
//             img.setAttribute( 'src', image_url );
            
//             var image_caption = images[i].changed.caption;
//             var image_title = images[i].changed.title;
//         }
        

//     });
    
    

addButton.addEventListener( 'click', function() { //change media_uploader back to customUploader
    if ( customUploader ) {
        customUploader.open();
    }
} );

customUploader.on( 'select', function() {
    var attachment = customUploader.state().get('selection').first().toJSON();
    img.setAttribute( 'src', attachment.url );
    hidden.setAttribute( 'value', JSON.stringify( [{ id: attachment.id, url: attachment.url }]) );
    toggleVisibility( 'ADD' );
} );

deleteButton.addEventListener( 'click', function() {
    img.removeAttribute( 'src' );
    hidden.removeAttribute( 'value' );
    toggleVisibility( 'DELETE' );
} );

var toggleVisibility = function( action ) {
    if ( 'ADD' === action ) {
        addButton.style.display = 'none';
        deleteButton.style.display = '';
        img.setAttribute( 'style', 'width: 100%;' );
    }

    if ( 'DELETE' === action ) {
        addButton.style.display = '';
        deleteButton.style.display = 'none';
        img.removeAttribute('style');
    }
};

window.addEventListener( 'DOMContentLoaded', function() {
    if ( "" === customUploads.imageData || 0 === customUploads.imageData.length ) {
        toggleVisibility( 'DELETE' );
    } else {
        img.setAttribute( 'src', customUploads.imageData.src );
        hidden.setAttribute( 'value', JSON.stringify([ customUploads.imageData ]) );
        toggleVisibility( 'ADD' );
    }
} );














