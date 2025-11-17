@extends('layout/website/masterWebsite')

@section('css')
@endsection

@section('konten')
	<div class="card">
		<div class="card-body p-lg-5 text-cente">
			
			<div class="container">
				<div class="row mb-0 mt-10">
					<div class="col">
						<h1 class="text-center mb-10">INFORMASI PANDUAN</h1>
                        <iframe src="{{asset('storage/panduan_eproposal.pdf')}}" width="100%" height="600px" class="mb-10"></iframe>
					</div>
				</div>
				<div class="row mb-10 mt-10">
					<div class="col">
						<h1 class="text-center mb-10">PROSEDUR PENGAJUAN</h1>
						<ol class="fs-3">
							<li>
								Menyiapkan surat permohonan penelitian yang ditandatangani oleh pimpinan instansi, ditujukan kepada Direktur Utama RSPI SS (contoh)
							</li>
							<li>
								Menyiapkan proposal penelitian 
							</li>
							<li>
								Menyiapkan surat pernyataan (contoh)
							</li>
							<li>
								Menyiapkan berkas pengajuan etik penelitian
							</li>
								<ul>
									<li>Proposal Penelitian</li>
									<li>Formulir isian etik</li>
									<li>Formulir PSP dan inform consent</li>
									<li>CV</li>
								</ul>
							<li>
								Menyiapkan draf Memorandum of Understanding (MoU) atau Perjanjian Kerja Sama (PKS) untuk penelitian eksternal non pendidikan Institusi/Lembaga/Badan/Kementerian) (contoh)
							</li>
							<li>
								Menyiapkan Material Transfer Agreement untuk penelitian yang pemeriksaan terhadap material (specimen bahan biologis tersimpan) di luar RSPI SS (contoh)
							</li>
							<li>
								Menandatangani surat pernyataan, dimana saat publikasi mencantumkan nama pembimbing lapangan (SDM RSPI-SS).
							</li>
							<li>
								Memahami dan mengikuti panduan penggunaan web e-proposal (terlampir)
							</li>
							<li>
								Log in pada E-Proposal
							</li>
						</ol>
					</div>
				</div>
				
			</div>
			
		</div>
	</div>

	
@endsection

@section('js')
@endsection