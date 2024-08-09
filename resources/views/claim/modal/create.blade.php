
<form id="claimForm" action="/claim/posting" method="post" enctype="multipart/form-data">
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
                    <input type="hidden" name="claim_id" id="claim_id" value="">

                    <div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>dokumen</th>
                                    <th>upload</th>
                                </tr>
                            </thead>
                            <tbody id="fileTable">
                                <tr>
                                    <td>fpp</td>
                                    <td><input type="file" name="fpp" onchange="encodeFile(this, 'fpp')" /></td>
                                </tr>
                                <tr>
                                    <td>kwitansi</td>
                                    <td><input type="file" name="kwitansi" onchange="encodeFile(this, 'kwitansi')" /></td>
                                </tr>
                                <tr>
                                    <td>taspen 3</td>
                                    <td><input type="file" name="taspen_3" onchange="encodeFile(this, 'taspen_3')" /></td>
                                </tr>
                                <tr>
                                    <td>rincian tagihan</td>
                                    <td><input type="file" name="rincian_tagihan" onchange="encodeFile(this, 'rincian_tagihan')" /></td>
                                </tr>
                                <tr>
                                    <td>resume medis</td>
                                    <td><input type="file" name="resume_medis" onchange="encodeFile(this, 'resume_medis')" /></td>
                                </tr>
                                <tr>
                                    <td>pemeriksaan labor</td>
                                    <td><input type="file" name="pemeriksaan_labor" onchange="encodeFile(this, 'pemeriksaan_labor')" /></td>
                                </tr>
                                <tr>
                                    <td>bacaan pemeriksaan radiologi</td>
                                    <td><input type="file" name="bacaan_pemeriksaan_radiologi" onchange="encodeFile(this, 'bacaan_pemeriksaan_radiologi')" /></td>
                                </tr>
                                <tr>
                                    <td>salinan laporan operasi</td>
                                    <td><input type="file" name="salinan_laporan_operasi" onchange="encodeFile(this, 'salinan_laporan_operasi')" /></td>
                                </tr>
                                <tr>
                                    <td>surat jaminan jasa raharja</td>
                                    <td><input type="file" name="surat_jaminan_jasa_raharja" onchange="encodeFile(this, 'surat_jaminan_jasa_raharja')" /></td>
                                </tr>
                                <tr>
                                    <td>surat keterangan platform jasa raharja</td>
                                    <td><input type="file" name="surat_keterangan_platform_jasa_raharja" onchange="encodeFile(this, 'surat_keterangan_platform_jasa_raharja')" /></td>
                                </tr>
                                <tr>
                                    <td>dokumen pendukung lainnya</td>
                                    <td><input type="file" name="dokumen_pendukung_lainnya" onchange="encodeFile(this, 'dokumen_pendukung_lainnya')" /></td>
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
function encodeFile(input, fieldName) {
    const file = input.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onloadend = function () {
            const base64String = reader.result.split(',')[1]; // Get base64 string from the result
            let hiddenInput = document.querySelector(`input[name="${fieldName}"]`);
            if (!hiddenInput) {
                hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = fieldName;
                document.getElementById('claimForm').appendChild(hiddenInput);
            }
            hiddenInput.value = base64String;
        };
        reader.readAsDataURL(file);
    }
}

function editDraft(id, nip, nama, instansi, no_hp, diagnosa, tgl_kejadian) {
    document.getElementById('claim_id').value = id;
    document.getElementById('nip').value = nip;
    document.getElementById('nama').value = nama;
    document.getElementById('instansi').value = instansi;
    document.getElementById('no_hp').value = no_hp;
    document.getElementById('diagnosa').value = diagnosa;
    document.getElementById('tgl_kejadian').value = tgl_kejadian;
    document.getElementById('status').value = 'draft';
}

function setStatus(status) {
    document.getElementById('status').value = status;
}
</script>