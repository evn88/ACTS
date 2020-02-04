$(function () {
    ClassicEditor
        .create(document.querySelector('#ckeditor'),  {
            ckfinder: {
                uploadUrl: process.env.MIX_URL + '/ckfinder/connector?command=QuickUpload&type=Files&responseType=json'
            },
            language: 'ru',
            // plugins: [ Essentials, Paragraph, Bold, Italic, Alignment ],     // <--- MODIFIED
            // toolbar: [ 'bold', 'italic', 'alignment', 'ckfinder' ],
            image: {
                resizeUnit: 'px',
                // You need to configure the image toolbar, too, so it uses the new style buttons.
                toolbar: [ 'imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight' , '|', 'imageStyle:full', 'imageStyle:side'],

                styles: [
                    'side',

                    // This option is equal to a situation where no style is applied.
                    'full',

                    // This represents an image aligned to the left.
                    'alignLeft',

                    // This represents an image aligned to the right.
                    'alignRight'
                ]
            }
        })
        .then( editor => {
            // editor.ui.view.editable.editableElement.style.height = '500px';
        } )
        .catch( error => {
            // console.error( error );
        } );
});
