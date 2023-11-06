<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
 	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<div class="card my-5">
			<div class="card-header">
		    	Data Provinsi
		  	</div>
		  	<div class="p-5">
		  		<a href="{{ route('add_prov') }}" class="btn btn-primary">Tambah</a>
		  	</div>
		  	<div class="card">
			    <table id="example" class="display" style="width:100%">
			    	<thead>
				    	<tr>
				    		<td>No.</td>
				    		<td>Kode</td>
				    		<td>Nama Provinsi</td>
				    		<td>Active</td>
				    		<td>Action</td>
				    	</tr>
			    	</thead>
			    	<tbody>
			    		@foreach($provinsi as $prov)
				    		<tr>
				    			<td>{{ $loop->iteration }}</td>
				    			<td>{{ $prov->kode }}</td>
				    			<td>{{ $prov->name }}</td>
				    			<td><input type='checkbox' value='{{ $prov->id }}' @if($prov->active == 'active') checked @endif onchange="prov(this.value)"></td>
				    			<td><a href="{{ route('edit_prov', ['id' => $prov->id]) }}" class="btn btn-warning">Edit</a> <button class="btn btn-danger" onclick="del_prov(this.value)" value="{{ $prov->id }}">Delete</button></td>
				    		</tr>
			    		@endforeach
			    	</tbody>
			    </table>
		  	</div>
		</div>

		<div class="card my-5">
			<div class="card-header">
		    	Data Kecamatan
		  	</div>
		  	<div class="p-5">
		  		<a href="{{ route('add_kel') }}" class="btn btn-primary">Tambah</a>
		  	</div>
		  	<div class="card">
			    <table id="example" class="display" style="width:100%">
			    	<thead>
				    	<tr>
				    		<td>No.</td>
				    		<td>Kode</td>
				    		<td>Nama Provinsi</td>
				    		<td>Active</td>
				    		<td>Action</td>
				    	</tr>
			    	</thead>
			    	<tbody>
			    		@foreach($kel as $kelu)
				    		<tr>
				    			<td>{{ $loop->iteration }}</td>
				    			<td>{{ $kelu->kode }}</td>
				    			<td>{{ $kelu->name }}</td>
				    			<td><input type='checkbox' value='{{ $kelu->id }}' @if($kelu->active == 'active') checked @endif onchange="kelu(this.value)"></td>
				    			<td><a href="{{ route('edit_kelu', ['id' => $kelu->id]) }}" class="btn btn-warning">Edit</a> <button class="btn btn-danger" onclick="del_kelu(this.value)" value="{{ $kelu->id }}">Delete</button></td>
				    		</tr>
			    		@endforeach
			    	</tbody>
			    </table>
		  	</div>
		</div>

		<div class="card my-5">
			<div class="card-header">
		    	Data Kelurahan
		  	</div>
		  	<div class="p-5">
		  		<button class="btn btn-primary">Tambah</button>
		  	</div>
		  	<div class="card">
			    <table id="example" class="display" style="width:100%">
			    	<thead>
				    	<tr>
				    		<td>No.</td>
				    		<td>Kode</td>
				    		<td>Nama Provinsi</td>
				    		<td>Active</td>
				    		<td>Action</td>
				    	</tr>
			    	</thead>
			    	<tbody>
			    		@foreach($provinsi as $prov)
				    		<tr>
				    			<td>{{ $loop->iteration }}</td>
				    			<td>{{ $prov->kode }}</td>
				    			<td>{{ $prov->name }}</td>
				    			<td></td>
				    			<td></td>
				    		</tr>
			    		@endforeach
			    	</tbody>
			    </table>
		  	</div>
		</div>

		<div class="card my-5">
			<div class="card-header">
		    	Data Pegawai
		  	</div>
		  	<div class="p-5">
		  		<button class="btn btn-primary">Tambah</button>
		  	</div>
		  	<div class="card">
			    <table id="example" class="display" style="width:100%">
			    	<thead>
				    	<tr>
				    		<td>No.</td>
				    		<td>Kode</td>
				    		<td>Nama Provinsi</td>
				    		<td>Active</td>
				    		<td>Action</td>
				    	</tr>
			    	</thead>
			    	<tbody>
			    		@foreach($provinsi as $prov)
				    		<tr>
				    			<td>{{ $loop->iteration }}</td>
				    			<td>{{ $prov->kode }}</td>
				    			<td>{{ $prov->name }}</td>
				    			<td></td>
				    			<td></td>
				    		</tr>
			    		@endforeach
			    	</tbody>
			    </table>
		  	</div>
		</div>
		
	</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  
	<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

	<script type="text/javascript">
		
        $(document).ready(function () {
            $('#example').DataTable();
        

        });

        function prov(val) {
	        
	        $.ajax({
	            type: "GET",
	            url: "{{ route('active_prov')}}",
	            data: {
	                id_prov : val,
	            },
	            success: function(responses){  
	            	console.log(responses)
	            }
	        });

        }


        function kelu(val) {
	        
	        $.ajax({
	            type: "GET",
	            url: "{{ route('active_prov')}}",
	            data: {
	                id_prov : val,
	            },
	            success: function(responses){  
	            	console.log(responses)
	            }
	        });

        }

        function del_prov(val) {
	        
	        $.ajax({
	            type: "GET",
	            url: "{{ route('del_prov')}}",
	            data: {
	                id_prov : val,
	            },
	            success: function(responses){  
					location.reload()
	            }
	        });
        }


	</script>

</body>
</html>