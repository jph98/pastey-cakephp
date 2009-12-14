<script type="text/javascript">

function preview(imageLocation, imageElement) {	
	
	image = document.getElementById( imageElement );
		
	field = document.getElementById( imageLocation ).value;	
	
	path = 'file://'+ field;
	path = path.replace(/\\/, '/'); // Fix Windows paths

	image.src = path;
	image.style.display = 'block';
	image.style.width = "200px";
	image.style.height = "150px";
}

</script>