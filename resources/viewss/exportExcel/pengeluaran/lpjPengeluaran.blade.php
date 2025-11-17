<h3 class="text-center ">RS. Jiwa Dr. Soeharto Heerdjan Jakarta</h3>
<h5 class="text-center mb-4">Laporan Pertanggung Jawaban (LPJ) Bendahara Pengeluaran <br> Bulan {{$bulan}} Tahun {{$tahun}}</h5>

    <table id="datatabl" class="table table-sm table-striped table-bordered text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Pembukuan</th>
                <th>saldo Awal</th>
                <th>Penambahan</th>
                <th>Pengurangan</th>
                <th>Saldo Akhir</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>BP Kas Tunai Bendahara Pengeluaran</td>
                <td>{{$bpkas['total_sebelum']}}</td>
                <td>{{$bpkas['total_debit']}}</td>
                <td>{{$bpkas['total_kredit']}}</td>
                <td>{{$bpkas['total']}}</td>
            </tr>
            <tr>
                <td>2</td>
                <td>BP Kas Bank Bendahara Pengeluaran</td>
                <td>{{$bptunai['total_sebelum']}}</td>
                <td>{{$bptunai['total_debit']}}</td>
                <td>{{$bptunai['total_kredit']}}</td>
                <td>{{$bptunai['total']}}</td>
            </tr>
            <tr>
                <td>3</td>
                <td>BP Bank</td>
                <td>{{$bpum['total_sebelum']}}</td>
                <td>{{$bpum['total_debit']}}</td>
                <td>{{$bpum['total_kredit']}}</td>
                <td>{{$bpum['total']}}</td>
            </tr>
            <tr>
                <td>4</td>
                <td>BP BPP</td>
                <td>{{$bpbpp['total_sebelum']}}</td>
                <td>{{$bpbpp['total_debit']}}</td>
                <td>{{$bpbpp['total_kredit']}}</td>
                <td>{{$bpbpp['total']}}</td>
            </tr>
            <tr>
                <td>5</td>
                <td>BP Uang di Penerima Dana Bergulir</td>
                <td>{{$bpupb['total_sebelum']}}</td>
                <td>{{$bpupb['total_debit']}}</td>
                <td>{{$bpupb['total_kredit']}}</td>
                <td>{{$bpupb['total']}}</td>
            </tr>
            <tr>
                <td>6</td>
                <td>BP UP</td>
                <td>{{$bpup['total_sebelum']}}</td>
                <td>{{$bpup['total_debit']}}</td>
                <td>{{$bpup['total_kredit']}}</td>
                <td>{{$bpup['total']}}</td>
            </tr>
            <tr>
                <td>7</td>
                <td>BP LS Bendahara</td>
                <td>{{$bpls['total_sebelum']}}</td>
                <td>{{$bpls['total_debit']}}</td>
                <td>{{$bpls['total_kredit']}}</td>
                <td>{{$bpls['total']}}</td>
            </tr>
            <tr>
                <td>8</td>
                <td>BP Pajak</td>
                <td>{{$bppajak['total_sebelum']}}</td>
                <td>{{$bppajak['total_debit']}}</td>
                <td>{{$bppajak['total_kredit']}}</td>
                <td>{{$bppajak['total']}}</td>
            </tr>
            <tr>
                <td>9</td>
                <td>BP Pendapatan</td>
                <td>{{$bppendapatan['total_sebelum']}}</td>
                <td>{{$bppendapatan['total_debit']}}</td>
                <td>{{$bppendapatan['total_kredit']}}</td>
                <td>{{$bppendapatan['total']}}</td>
            </tr>
            <tr>
                <td>10</td>
                <td>BP Uang dr Bendahara Penerimaan</td>
                <td>{{$bpudbp['total_sebelum']}}</td>
                <td>{{$bpudbp['total_debit']}}</td>
                <td>{{$bpudbp['total_kredit']}}</td>
                <td>{{$bpudbp['total']}}</td>
            </tr>
            <tr>
                <td>11</td>
                <td>BP Uang Pihak Ketiga</td>
                <td>{{$bpupk['total_sebelum']}}</td>
                <td>{{$bpupk['total_debit']}}</td>
                <td>{{$bpupk['total_kredit']}}</td>
                <td>{{$bpupk['total']}}</td>
            </tr>
            <tr>
                <td>12</td>
                <td>BP Uang Titipan</td>
                <td>{{$bpuangtitipan['total_sebelum']}}</td>
                <td>{{$bpuangtitipan['total_debit']}}</td>
                <td>{{$bpuangtitipan['total_kredit']}}</td>
                <td>{{$bpuangtitipan['total']}}</td>
            </tr>
            <tr>
                <td>13</td>
                <td>BP Dana Bergulir</td>
                <td>{{$bpdana['total_sebelum']}}</td>
                <td>{{$bpdana['total_debit']}}</td>
                <td>{{$bpdana['total_kredit']}}</td>
                <td>{{$bpdana['total']}}</td>
            </tr>
            <tr>
                <td>14</td>
                <td>BP Hibah/Donasi/Sumbangan</td>
                <td>{{$bphibah['total_sebelum']}}</td>
                <td>{{$bphibah['total_debit']}}</td>
                <td>{{$bphibah['total_kredit']}}</td>
                <td>{{$bphibah['total']}}</td>
            </tr>
            
            <tr>
                <td>15</td>
                <td>BP Lainnya</td>
                <td>{{$bplain['total_sebelum']}}</td>
                <td>{{$bplain['total_debit']}}</td>
                <td>{{$bplain['total_kredit']}}</td>
                <td>{{$bplain['total']}}</td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Jakarta, {{date('d F Y')}}</td>
            </tr>
            <tr>
                <td>Yang diperiksa</td>
                <td></td>
                <td></td>
                <td></td>
                <td>Yang memeriksa</td>
            </tr>
            <tr>
                <td>Bendahara Pengeluaran</td>
                <td></td>
                <td></td>
                <td></td>
                <td>Pemimpin BLU/Pejabat yang ditunjuk</td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td>{{auth()->user()->name}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>dr. Desmiarti, Sp.KJ, MARS</td>
            </tr>
            <tr>
                <td>NIP. {{auth()->user()->nip}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>NIP. 197009072001122001</td>
            </tr>
        </tbody>
    </table>
