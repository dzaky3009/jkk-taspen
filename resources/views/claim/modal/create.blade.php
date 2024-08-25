
<form id="claimForm" action="{{ url('/claim/upload') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Pelaporan Baru') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nip">NIP</label>
                        <input type="text" name="nip" class="form-control" id="nip">
                    </div>
                    <div class="mb-3">
                        <label for="nama">NAMA</label>
                        <input type="text" name="nama" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label for="instansi">INSTANSI</label>
                        <input type="text" name="instansi" class="form-control" id="instansi">
                    </div>
                    <div class="mb-3">
                        <label for="no_hp">NO HP</label>
                        <input type="text" name="no_hp" class="form-control" id="no_hp">
                    </div>
                    <div class="mb-3">
                        <label for="diagnosa">DIAGNOSA</label>
                        <input type="text" name="diagnosa" class="form-control" id="diagnosa">
                    </div>
                    <div class="mb-3">
                        <label for="tgl_kejadian">Tanggal Kejadian</label>
                        <input type="date" name="tgl_kejadian" class="form-control" id="tgl_kejadian">
                    </div>

                    <input type="hidden" name="status" id="status" value="">
                    <input type="hidden" name="id" id="claim_id" value="">

                    <div class="mb-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Dokumen</th>
                                    <th>Nama File</th>
                                    <th>Upload</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Surat Jaminan </td>
                                    <td id="surat_jaminan_file_name">Tidak ada file yang dipilih</td>          
                                    <td><input type="file" name="surat_jaminan_file" id="surat_jaminan_file" /></td>

                                </tr>
                                <tr>
                                    <td>FPP</td>
                                    <td id="fpp_file_name">Tidak ada file yang dipilih</td>
                                    <td><input type="file" name="fpp_file" id="fpp_file" /></td>
                                </tr>
                                <tr>
                                    <td>Kwitansi</td>
                                    <td id="kwitansi_file_name">Tidak ada file yang dipilih</td>
                                    <td><input type="file" name="kwitansi_file" id="kwitansi_file" /></td>
                                </tr>
                                <tr>
                                    <td>Taspen 3</td>
                                    <td id="taspen_3_file_name">Tidak ada file yang dipilih</td>
                                    <td><input type="file" name="taspen_3_file" id="taspen_3_file" /></td>
                                </tr>
                                <tr>
                                    <td>Rincian Tagihan</td>
                                    <td id="rincian_tagihan_file_name">Tidak ada file yang dipilih</td>
                                    <td><input type="file" name="rincian_tagihan_file" id="rincian_tagihan_file" /></td>
                                </tr>
                                <tr>
                                    <td>Resume Medis</td>
                                    <td id="resume_medis_file_name">Tidak ada file yang dipilih</td>
                                    <td><input type="file" name="resume_medis_file" id="resume_medis_file" /></td>
                                </tr>
                                <tr>
                                    <td>Pemeriksaan Labor</td>
                                    <td id="pemeriksaan_labor_file_name">Tidak ada file yang dipilih</td>
                                    <td><input type="file" name="pemeriksaan_labor_file" id="pemeriksaan_labor_file" /></td>
                                </tr>
                                <tr>
                                    <td>Bacaan Pemeriksaan Radiologi</td>
                                    <td id="bacaan_pemeriksaan_radiologi_file_name">Tidak ada file yang dipilih</td>
                                    <td><input type="file" name="bacaan_pemeriksaan_radiologi_file" id="bacaan_pemeriksaan_radiologi_file" /></td>
                                </tr>
                                <tr>
                                    <td>Salinan Laporan Operasi</td>
                                    <td id="salinan_laporan_operasi_file_name">Tidak ada file yang dipilih</td>
                                    <td><input type="file" name="salinan_laporan_operasi_file" id="salinan_laporan_operasi_file" /></td>
                                </tr>
                                <tr>
                                    <td>Surat Jaminan Jasa Raharja</td>
                                    <td id="surat_jaminan_jasa_raharja_file_name">Tidak ada file yang dipilih</td>
                                    <td><input type="file" name="surat_jaminan_jasa_raharja_file" id="surat_jaminan_jasa_raharja_file" /></td>
                                </tr>
                                <tr>
                                    <td>Surat Keterangan Platform Jasa Raharja</td>
                                    <td id="surat_keterangan_platform_jasa_raharja_file_name">Tidak ada file yang dipilih</td>
                                    <td><input type="file" name="surat_keterangan_platform_jasa_raharja_file" id="surat_keterangan_platform_jasa_raharja_file" /></td>
                                </tr>
                                <tr>
                                    <td>Dokumen Pendukung Lainnya</td>
                                    <td id="dokumen_pendukung_lainnya_file_name">Tidak ada file yang dipilih</td>
                                    <td><input type="file" name="dokumen_pendukung_lainnya_file" id="dokumen_pendukung_lainnya_file" /></td>
                                </tr>
               
                            </tbody>
                            
                        </table>
                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary mr-2" onclick="setStatus('send')">
                                Send
                            </button>
                            <button type="submit" class="btn btn-warning" onclick="setStatus('draft')">
                                Draft
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
function editDraft(id, nip, nama, instansi, no_hp, diagnosa, tgl_kejadian,surat_jaminan, fpp, kwitansi, taspen_3,rincian_tagihan,resume_medis,bacaan_pemeriksaan_radiologi,salinan_laporan_operasi,surat_jaminan_jasa_raharja,surat_keterangan_platform_jasa_raharja,dokumen_pendukung_lainnya) {
    document.getElementById('claim_id').value = id;
    document.getElementById('nip').value = nip;
    document.getElementById('nama').value = nama;
    document.getElementById('instansi').value = instansi;
    document.getElementById('no_hp').value = no_hp;
    document.getElementById('diagnosa').value = diagnosa;
    document.getElementById('tgl_kejadian').value = tgl_kejadian;
    document.getElementById('status').value = 'draft';
  

    document.getElementById('surat_jaminan_file_name').innerHTML = surat_jaminan ? `<a href="/claim/download/${id}/surat_jaminan" target="_blank">surat_jaminan.pdf</a>` : 'Tidak ada file yang dipilih';
    document.getElementById('fpp_file_name').innerHTML = fpp ? `<a href="/claim/download/${id}/fpp" target="_blank">FPP.pdf</a>` : 'Tidak ada file yang dipilih';
    document.getElementById('kwitansi_file_name').innerHTML = kwitansi ? `<a href="/claim/download/${id}/kwitansi" target="_blank">Kwitansi.pdf</a>` : 'Tidak ada file yang dipilih';
    document.getElementById('taspen_3_file_name').innerHTML = taspen_3 ? `<a href="/claim/download/${id}/taspen_3" target="_blank">Taspen 3.pdf</a>` : 'Tidak ada file yang dipilih';
    document.getElementById('rincian_tagihan_file_name').innerHTML = rincian_tagihan ? `<a href="/claim/download/${id}/rincian_tagihan" target="_blank">rincian tagihan.pdf</a>` : 'Tidak ada file yang dipilih';
    document.getElementById('resume_medis_file_name').innerHTML = resume_medis ? `<a href="/claim/download/${id}/resume_medis" target="_blank">resume medis.pdf</a>` : 'Tidak ada file yang dipilih';
    document.getElementById('pemeriksaan_labor_file_name').innerHTML = resume_medis ? `<a href="/claim/download/${id}/pemeriksaan_labor" target="_blank">resume medis.pdf</a>` : 'Tidak ada file yang dipilih';
    document.getElementById('bacaan_pemeriksaan_radiologi_file_name').innerHTML = bacaan_pemeriksaan_radiologi ? `<a href="/claim/download/${id}/bacaan_pemeriksaan_radiologi" target="_blank">bacaan_pemeriksaan_radiologi.pdf</a>` : 'Tidak ada file yang dipilih';
    document.getElementById('salinan_laporan_operasi_file_name').innerHTML = salinan_laporan_operasi ? `<a href="/claim/download/${id}/salinan_laporan_operasi" target="_blank">salinan_laporan_operasi.pdf</a>` : 'Tidak ada file yang dipilih';
    document.getElementById('surat_jaminan_jasa_raharja_file_name').innerHTML = surat_jaminan_jasa_raharja ? `<a href="/claim/download/${id}/surat_jaminan_jasa_raharja" target="_blank">surat_jaminan_jasa_raharja.pdf</a>` : 'Tidak ada file yang dipilih';
    document.getElementById('surat_keterangan_platform_jasa_raharja_file_name').innerHTML = surat_keterangan_platform_jasa_raharja ? `<a href="/claim/download/${id}/surat_keterangan_platform_jasa_raharja" target="_blank">surat_keterangan_platform_jasa_raharja.pdf</a>` : 'Tidak ada file yang dipilih';
    document.getElementById('dokumen_pendukung_lainnya_file_name').innerHTML = dokumen_pendukung_lainnya ? `<a href="/claim/download/${id}/dokumen_pendukung_lainnya" target="_blank">dokumen_pendukung_lainnya.pdf</a>` : 'Tidak ada file yang dipilih';

    
}

function setStatus(status) {
    document.getElementById('status').value = status;
}
</script>
