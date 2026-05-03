<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>

    <!-- IMPORT ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- IMPORT CSS -->
    <link rel="stylesheet" href="{{ asset('css/edit_profil.css') }}">
</head>

<body>

    <!-- BACKGROUND HALAMAN SEBELUMNYA (TETAP TERLIHAT) -->
    <div class="background-blur"></div>

    <!-- MODAL BOX -->
    <div class="edit-modal-container">

        <div class="edit-modal">

            <!-- HEADER -->
            <div class="edit-header">
                <a href="{{ url()->previous() }}" class="back-btn">‹</a>
                <h2>Edit Profil</h2>
            </div>

            <!-- BODY -->
            <div class="edit-body">

                <!-- FOTO PROFIL -->
                <div class="avatar-box">
                    <img id="avatarPreview" src="{{ asset('img/pas_foto_sarah.jpeg') }}" alt="Foto Profil">
                    <label class="avatar-edit">
                        <input type="file" id="avatarInput" accept="image/*">
                        <i class="bi bi-camera-fill"></i>
                    </label>
                </div>

                <!-- FORM -->
                <form id="editForm">

                    <div class="row">
                        <div class="col">
                            <label>Nama</label>
                            <input type="text" placeholder="Nama">
                        </div>

                        <div class="col">
                            <label>NIS</label>
                            <input type="text" placeholder="12345">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Kelas</label>
                            <select>
                                <option>XA</option>
                                <option>XB</option>
                                <option>XC</option>
                            </select>
                        </div>

                        <div class="col">
                            <label>Email</label>
                            <input type="email" placeholder="email@contoh.com">
                        </div>
                    </div>

                </form>

            </div>

            <!-- FOOTER -->
            <div class="edit-footer">
                <a href="{{ url()->previous() }}" class="btn-cancel">Batal</a>
                <button class="btn-save" id="saveBtn">Simpan</button>
            </div>

        </div>
    </div>

    <!-- SCRIPT -->
    <script>
        const avatarInput = document.getElementById("avatarInput");
        const avatarPreview = document.getElementById("avatarPreview");

        avatarInput.addEventListener("change", e => {
            const file = e.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = () => avatarPreview.src = reader.result;
            reader.readAsDataURL(file);
        });
    </script>

</body>
</html>
