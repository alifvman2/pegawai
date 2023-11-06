<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Kelurahan {{ $data->name }}</title>
 	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<div class="card p-5">
			<div class="card-header">
				Edit Kelurahan {{ $data->name }}
			</div>
			<div class="card p-3">
				<form action="{{ route('update_kel') }}" method="post">
					@CSRF
					<input type="hidden" name="id" value="{{ $data->id }}">
					<div class="control-group">
						<label class="control-label">Kode</label>
						<input type="text" name="kode" class="form-control" value="{{ $data->kode }}">
					</div>
					<div class="control-group">
						<label class="control-label">name</label>
						<input type="text" name="name" class="form-control" value="{{ $data->name }}">
					</div>
					<div class="control-group">
						<label class="control-label">Provinsi</label>
						<select class="form-control" name="provinsi" onchange="get_kec(this.value)">
							<option selected disabled>Pilih Provinsi</option>
							@foreach($provinsi as $prov)
								<option value="{{ $prov->id }}" @if($data->id_prov == $prov->id) selected @endif>{{ $prov->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="control-group">
						<label class="control-label">Kecamatan</label>
						<select class="form-control" name="kecamatan" id="kecamatan">
							<option selected disabled>Pilih Kecamatan</option>
							@foreach($kecamatan as $kec)
								<option value="{{ $kec->id }}" @if($data->id_kec == $kec->id) selected @endif>{{ $kec->name }}</option>
							@endforeach
						</select>
					</div>
					<button class="btn btn-primary my-3" type="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

	<script type="text/javascript">

		function get_kec(val) {
            $.ajax({
                type: "GET",
                url: "{{ route('get_kec')}}",
                data: {
                    id : val,
                },
                success: function(responses){  
                	console.log(responses)
                    $('#kecamatan').html(responses);  
                }
            });
		}

	</script>

</body>
</html>