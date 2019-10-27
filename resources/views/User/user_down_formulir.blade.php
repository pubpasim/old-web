@foreach($formulir as $data)
<embed width="600" height="450" src="{{url('file')}}/{{($data->dokumen) }}" type="application/pdf"></embed>
@endforeach