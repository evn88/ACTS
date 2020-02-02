$(function () {
    ClassicEditor
        .create(document.querySelector('#ckeditor'),  {
            ckfinder: {
                uploadUrl: process.env.MIX_URL + '/ckfinder/connector?command=QuickUpload&type=Files&responseType=json'
            },
            language: 'ru',

        })
        .then(editor => {
            // editor.ui.view.editable.editableElement.style.height = '500px';
        } )
        .catch( error => {
            // console.error( error );
        } );

});
