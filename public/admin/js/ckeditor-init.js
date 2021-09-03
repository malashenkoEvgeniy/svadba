ClassicEditor
    .create( document.querySelector( '.editor' ), {
        ckfinder: {
            uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
        },
        alignment: {
            options: [ 'left', 'right', 'center', 'justify' ]
        },
        image: {
            // You need to configure the image toolbar, too, so it uses the new style buttons.
            toolbar: [ 'imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight' ],

            styles: [
                // This option is equal to a situation where no style is applied.
                'full',

                // This represents an image aligned to the left.
                'alignLeft',

                // This represents an image aligned to the right.
                'alignRight'
            ]
        },
        toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                '|',
                'CKFinder',
                'outdent',
                'indent',
                '|',
                'blockQuote',
                'insertTable',
                'mediaEmbed',
                'undo',
                'redo',
                'alignment',
                'fontBackgroundColor',
                'fontColor',
                'fontSize',
                'fontFamily'
            ]
        },
        language: 'ru',
        table: {
            contentToolbar: [
                'tableColumn',
                'tableRow',
                'mergeTableCells'
            ]
        },
        licenseKey: '',
    } )
    .catch( function( error ) {
        console.error( error );
    } );
