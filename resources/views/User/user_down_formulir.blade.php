@foreach($formulir as $data)
<?php header("Location: /file/$data->dokumen");
header("Content-Disposition: filename=$data->dokumen");?>
@endforeach