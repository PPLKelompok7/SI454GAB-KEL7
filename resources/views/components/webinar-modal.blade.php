<div class="modal fade" id="webinarModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="webinarForm" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">
                        Tambah Data Webinar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="webinarId">

                    <div class="mb-3">
                        <label class="form-label">Nama Webinar</label>
                        <input type="text" class="form-control" id="webinarName" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="gambar" onchange="previewImage()">
                        <img id="preview" class="mt-3" style="width: 250px; height: auto;">
                    </div>

                    <div class="mb-3">
                        <label>Nama Pembicara</label>
                        <select name="user_id" id="user_id" required class="form-control">
                            <option value="" disabled selected>-- Silahkan Pilih Pembicara --</option>
                            @foreach ($konselor as $value)
                                <option value="{{ $value->user_id }}">{{ $value->user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="webinarDate" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jam</label>
                        <input type="text" class="form-control" id="webinarTime" placeholder="Contoh: 09:00-12:00"
                            pattern="^\d{2}:\d{2}-\d{2}:\d{2}$" required>
                        <small class="text-muted">Format: HH:MM-HH:MM</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea rows="6" class="form-control" id="deskripsi" required></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submitBtn"
                        onclick="handleClick(event)">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var isUpdateMode = false;
    let webinarModalInstance;

    function openCreateModal() {
        isUpdateMode = false;
        document.getElementById('modalTitle').textContent = "Tambah Data Webinar";
        document.getElementById('submitBtn').textContent = "Simpan";
        document.getElementById('webinarForm').reset();
        document.getElementById('preview').src = "";

        const modal = document.getElementById('webinarModal');
        webinarModalInstance = bootstrap.Modal.getOrCreateInstance(modal);
        webinarModalInstance.show();

    }

    function openEditModal(webinarData) {
        isUpdateMode = true;
        document.getElementById('modalTitle').textContent = "Edit Data Webinar";
        document.getElementById('submitBtn').textContent = "Update";

        document.getElementById('webinarId').value = webinarData.id;
        document.getElementById('webinarName').value = webinarData.nama;
        document.getElementById('user_id').value = webinarData.user_id;
        document.getElementById('webinarDate').value = webinarData.tanggal;
        document.getElementById('webinarTime').value = webinarData.jam;
        document.getElementById('deskripsi').value = webinarData.deskripsi;
        document.getElementById('preview').src = webinarData.gambar.length > 1
            ? `/storage/${webinarData.gambar}`
            : "";

        const modal = document.getElementById('webinarModal');
        webinarModalInstance = bootstrap.Modal.getOrCreateInstance(modal);
        webinarModalInstance.show();

    }

    function handleClick(e) {
        e.preventDefault()

        const form = document.getElementById('webinarForm');
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        const formData = new FormData();
        const id = document.getElementById('webinarId').value;

        const gambarInput = document.getElementById('gambar');
        if (gambarInput.files.length > 0) {
            formData.append('gambar', gambarInput.files[0]);
        }
        formData.append('nama', document.getElementById('webinarName').value);
        formData.append('user_id', document.getElementById('user_id').value);
        formData.append('tanggal', document.getElementById('webinarDate').value);
        formData.append('jam', document.getElementById('webinarTime').value);
        formData.append('deskripsi', document.getElementById('deskripsi').value);

        const url = isUpdateMode
            ? `/admin/webinar/update/${id}`
            : `{{ route('webinars.store') }}`;
        const method = 'POST';
        const extra = isUpdateMode ? { '_method': 'PUT' } : {};
        for (const key in extra) {
            formData.append(key, extra[key]);
        }
        fetch(url, {
            method,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: formData
        })
            .then(response => response.json()
            ).then(data => {
                alert(isUpdateMode ? 'Data berhasil diubah ' : "Data berhasil ditambahkan");
                window.location.reload();
            })
            .catch(error => {
                console.error(error);
                alert("Terjadi kesalahan saat menyimpan data.");
            });

    };

    function previewImage() {
        const input = document.getElementById('gambar');
        const preview = document.getElementById('preview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>