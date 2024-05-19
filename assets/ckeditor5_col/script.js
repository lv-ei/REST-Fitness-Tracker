ClassicEditor
	.create( document.querySelector( '.editor_des' ), {
		// Editor configuration.
	} )
	.then( editor => {
		window.editor = editor;
	} )
	.catch( handleSampleError );
	ClassicEditor
	.create( document.querySelector( '.editor_content' ), {
		// Editor configuration.
	} )
	.then( editor => {
		window.editor = editor;
	} )
	.catch( handleSampleError );

function handleSampleError( error ) {
	const issueUrl = 'https://github.com/ckeditor/ckeditor5/issues';

	const message = [
		'Oops, something went wrong!',
		`Please, report the following error on ${ issueUrl } with the build id "1s6a1abno2py-hh5gaeb6s03i" and the error stack trace:`
	].join( '\n' );

	console.error( message );
	console.error( error );
}
