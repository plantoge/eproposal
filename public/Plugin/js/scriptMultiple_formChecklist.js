$('.thead').on('click', '.addrow', function(){

    $('#head').attr('disabled','');
    $('#level').attr('disabled','');

    var jumlah = parseInt($("#jumlah-row").val()); 
    var nextrow1 = jumlah + 1;

    var tr = '<tr class="list_row_item">'+
                '<td class="align-middle">'+
                    '<div class="form-group">'+
                        '<select id="master_rkakl" name="master_rkakl[]" class="form-select single-select mb-1" onchange="masterRkakl(this)" required>'+
                            '<option value="">Select</option>'+
                            '@foreach ($masterv3rkakl as $item)'+
                                '<option data-idmaster="{{$item->id}}" value="{{$item->id}}">{{$item->periode_rkakl}} - {{$item->nama_rkakl}}</option>'+
                            '@endforeach'+
                        '</select>'+
                        '<select id="akun_rkakl" name="akun_rkakl[]" class="form-control single-select" onchange="akunRkakl(this)" required>'+
                            '<option>Select</option>'+
                        '</select>'+
                    '</div>'+
                '</td>'+
                '<td class="align-middle">'+
                    '<div class="form-group">'+
                        '<select id="detil_rkakl" name="detil_rkakl[]" class="form-control single-select mb-1" onchange="detilRkakl(this)">'+
                            '<option>Pilih ..</option>'+
                        '</select>'+
                        '<input type="text" id="nominal_pagu" name="nominal_pagu[]" value="" class="form-control mb-1 text-center" readonly required>'+
                    '</div>'+
                '</td>'+
                
                '<td class="align-middle">'+
                    '<div class="form-group">'+
                        '<textarea class="form-control form-control-sm mb-1 mt-3" id="keterangan" name="keterangan[]" rows="2"></textarea>'+
                        '<input type="text" id="nominal_belanja" name="nominal_belanja[]" value="" class="form-control mb-1 text-center" required>'+
                    '</div>'+
                '</td>'+
                '<td class="align-middle">'+
                    '<a href="javascript:;" data-nilai="' + nextrow1 + '" class="btn btn-danger btn-sm deleterow" data-toggle="tooltip" data-placement="top" title="Klik Dari bawah">-</a>'+
                '</td>'+
            '</tr>';

    $('.tbody').append(tr);
    $("#jumlah-row").val(nextrow1);
});

$('.tbody').on('click', '.deleterow', function (){
    // proses pengurangan angka urutan jika di hapus
    var urutan = $(this).data('nilai');
    var urutanSebelum = urutan - 1;
    $("#jumlah-row").val(urutanSebelum);

    // menghapus satu baris TD dengan fungsi parent
    $(this).parent().parent().remove();
});