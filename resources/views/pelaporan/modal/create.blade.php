<form id="claimForm" action="/pelaporan/posting" method="post" enctype="multipart/form-data">
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
                        <label for="kronologi">KRONOLOGI</label>
                        <textarea name="kronologi" id="kronologi"  class="form-control" cols="88" rows="10"></textarea>
                    </div>
                    
                    
                    <input type="hidden" name="id" id="claim_id" value="">

                    <div class="mb-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Dokumen</th>
                                    <th>Nama File</th>
                                    {{-- <th>Upload</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                               
                                <tr>
                                    <td>Surat Jaminan </td>
                                    <td id="surat_jaminan_file_name">Tidak ada file</td>
                                    @if (auth()->user()->role === 'admin')
                                    <td><input type="file" name="surat_jaminan_file" id="surat_jaminan_file" /></td>
                               @endif
                                   
                                </tr>
                                
                            </tbody>
                        </table>
     
                             <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary mr-2">
                                Send
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
function editDraft(id, nip, nama, instansi, no_hp, diagnosa, kronologi,surat_jaminan) {
    document.getElementById('claim_id').value = id;
    document.getElementById('nip').value = nip;
    document.getElementById('nama').value = nama;
    document.getElementById('instansi').value = instansi;
    document.getElementById('no_hp').value = no_hp;
    document.getElementById('diagnosa').value = diagnosa;
    document.getElementById('kronologi').value = kronologi;

    document.getElementById('surat_jaminan_file_name').innerHTML = surat_jaminan ? `<a href="/pelaporan/download/${id}/surat_jaminan" target="_blank">surat_jaminan.pdf</a>` : 'Tidak ada file yang dipilih';
    
}

function setStatus(status) {
    document.getElementById('status').value = status;
}
</script>
