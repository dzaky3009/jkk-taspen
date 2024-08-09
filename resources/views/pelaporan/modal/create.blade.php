<form action="/pelaporan/posting" method="post" enctype="multipart/form-data">
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
                        <textarea name="kronologi" id="kronologi" cols="88" rows="10"></textarea>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">
                            Send
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
