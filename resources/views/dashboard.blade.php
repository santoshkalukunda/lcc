<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Summernote</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<body>
	{{$data="<b></br> hello</b> </br> world"}}
  {!!$data!!}  
  <div style="height:120px;width:200px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
    </div>
	<form method="get">
		@csrf
		<div class="col-md-3">
    <textarea id="summernote" name="editordata" rows="4" cols="50" disabled>{!!$data!!}</textarea>
			<input type="submit" value="submit">
		</div>
		
	  </form>

  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
</body>
</html>