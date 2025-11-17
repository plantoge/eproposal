@extends('layout/website/masterWebsite')

@section('css')
@endsection

@section('konten')
	<div class="card">
		<div class="card-body p-lg-5 text-cente">
			
			<div class="container">
				<div class="row mb-0 mt-10">
					<div class="col">
						<h1 class="text-center mb-10">Informasi Panduan</h1>
                        <iframe src="{{asset('storage/app/panduan_eproposal.pdf')}}" width="100%" height="600px" class="mb-10"></iframe>
					</div>
				</div>
				
			</div>
			
		</div>
	</div>

	
@endsection

@section('js')
@endsection