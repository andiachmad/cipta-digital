<!-- resources/views/admin/admin.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Admin Dashboard - Cipta Digital</title>

    <!-- Font Awesome (CDN) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- External CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="sidebar">
        <div class="logo-section">
            <img src="{{ asset('images/logo (2).png') }}" alt="Cipta Digital" class="logo-img" onerror="this.style.display='none'">
        </div>

        <ul>
            <li id="nav-dashboard" class="active" onclick="showDashboard()"><i class="fas fa-chart-line"></i><span>Dashboard</span></li>
            <li id="nav-users" onclick="showUsers()"><i class="fas fa-users"></i><span>User Management</span></li>
            <li onclick="logout()"><i class="fas fa-sign-out-alt"></i><span>Logout</span></li>
        </ul>
    </div>

    <main class="main-content" id="mainContent"></main>

    <!-- MODALS & TOAST -->
    <div class="modal" id="layananModal" aria-hidden="true">
        <div class="modal-backdrop" data-modal-close></div>
        <div class="modal-panel" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
            <button class="close" aria-label="Tutup" onclick="closeModal()"><i class="fas fa-times"></i></button>
            <div style="margin-bottom:10px;"><h3 id="modalTitle" style="color:#0b3b7a;font-size:1.05rem"><i class="fas fa-plus-circle"></i> Tambah Layanan</h3></div>
            <form id="layananForm" onsubmit="saveLayanan(event)">
                <input type="hidden" id="layananId">
                <div class="form-group"><label>Nama Layanan *</label><input type="text" id="namaLayanan" required placeholder="Contoh: Website Development"></div>
                <div class="form-group"><label>Kategori *</label><select id="kategori" required><option value="">Pilih Kategori</option><option>Web Development</option><option>SEO</option><option>Digital Marketing</option><option>Branding</option><option>Content Creation</option></select></div>
                <div class="form-group"><label>Harga (Rp) *</label><input type="number" id="harga" required min="0" placeholder="5000000"></div>
                <div class="form-group"><label>Durasi *</label><input type="text" id="durasi" required placeholder="Contoh: 2-4 Minggu"></div>
                <div class="form-group"><label>Status *</label><select id="status" required><option value="Tersedia">Tersedia</option><option value="Dalam Proses">Dalam Proses</option></select></div>
                <div class="form-group"><label>Deskripsi</label><textarea id="deskripsi" placeholder="Deskripsi (opsional)"></textarea></div>
                <div style="display:flex;gap:10px;justify-content:flex-end"><button type="button" class="btn" onclick="closeModal()">Batal</button><button type="submit" class="btn btn-success">Simpan</button></div>
            </form>
        </div>
    </div>

    <div class="modal" id="userModal" aria-hidden="true">
        <div class="modal-backdrop" data-modal-close></div>
        <div class="modal-panel" role="dialog" aria-modal="true" aria-labelledby="userModalTitle">
            <button class="close" aria-label="Tutup" onclick="closeUserModal()"><i class="fas fa-times"></i></button>
            <div style="margin-bottom:10px;"><h3 id="userModalTitle" style="color:#0b3b7a;font-size:1.05rem"><i class="fas fa-user-plus"></i> Tambah User</h3></div>
            <form id="userForm" onsubmit="handleAddUser(event)">
                <input type="hidden" id="userIndex">
                <div class="form-group"><label>Nama *</label><input type="text" id="userName" required placeholder="Nama lengkap"></div>
                <div class="form-group"><label>Email *</label><input type="email" id="userEmail" required placeholder="email@contoh.com"></div>
                <div class="form-group"><label>Role *</label><select id="userRole"><option value="client">client</option><option value="admin">admin</option></select></div>
                <div style="display:flex;gap:10px;justify-content:flex-end"><button type="button" class="btn" onclick="closeUserModal()">Batal</button><button type="submit" class="btn btn-primary">Simpan</button></div>
            </form>
        </div>
    </div>

    <div class="modal" id="paymentModal" aria-hidden="true">
        <div class="modal-backdrop" data-modal-close></div>
        <div class="modal-panel" role="dialog" aria-modal="true" aria-labelledby="paymentModalTitle">
            <button class="close" aria-label="Tutup" onclick="closePaymentModal()"><i class="fas fa-times"></i></button>
            <div style="margin-bottom:10px;"><h3 id="paymentModalTitle" style="color:#0b3b7a;font-size:1.05rem"><i class="fas fa-plus-circle"></i> Tambah Pembayaran</h3></div>
            <form id="paymentForm" onsubmit="handleAddPayment(event)">
                <input type="hidden" id="paymentIndex">
                <div class="form-group"><label>Pilih User *</label><select id="paymentUser" required></select></div>
                <div class="form-group"><label>Nama Layanan *</label><input type="text" id="paymentService" required></div>
                <div class="form-group"><label>Jumlah (Rp) *</label><input type="number" id="paymentAmount" required min="0"></div>
                <div class="form-group"><label>Tanggal *</label><input type="date" id="paymentDate" required></div>
                <div style="display:flex;gap:10px;justify-content:flex-end"><button type="button" class="btn" onclick="closePaymentModal()">Batal</button><button type="submit" class="btn btn-primary">Simpan</button></div>
            </form>
        </div>
    </div>

    <div id="toast" class="toast" role="status" aria-live="polite"><i class="icon fas"></i><div id="toastText"></div></div>

    <!-- Load JS -->
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
