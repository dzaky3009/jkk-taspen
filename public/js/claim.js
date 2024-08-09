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

            // Display the base64 data
            document.getElementById(`${fieldName}Display`).innerText = base64String;
        };
        reader.readAsDataURL(file);
    }
}

function editDraft(id, nip, nama, instansi, no_hp, diagnosa, tgl_kejadian, files) {
    document.getElementById('claim_id').value = id;
    document.getElementById('nip').value = nip;
    document.getElementById('nama').value = nama;
    document.getElementById('instansi').value = instansi;
    document.getElementById('no_hp').value = no_hp;
    document.getElementById('diagnosa').value = diagnosa;
    document.getElementById('tgl_kejadian').value = tgl_kejadian;
    document.getElementById('status').value = 'draft';

    // Display base64 encoded files
    for (const [key, value] of Object.entries(files)) {
        if (value) {
            document.getElementById(`${key}Display`).innerText = value;
        }
    }
}

function setStatus(status) {
    document.getElementById('status').value = status;
}
