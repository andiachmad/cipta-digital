/* ---------- Data & Storage ---------- */
let layananData = [], usersData = [], paymentsData = [], editIndex = -1;

function initDefaultData(){
    if(!localStorage.getItem('layananData')){
        layananData = [
            {id:1,nama:'Website Company Profile',kategori:'Web Development',harga:5000000,durasi:'2-3 Minggu',status:'Tersedia',deskripsi:'Pembuatan website profesional untuk perusahaan'},
            {id:2,nama:'SEO Optimization',kategori:'SEO',harga:3000000,durasi:'1 Bulan',status:'Tersedia',deskripsi:'Optimasi SEO'},
            {id:3,nama:'Social Media Management',kategori:'Digital Marketing',harga:2500000,durasi:'1 Bulan',status:'Dalam Proses',deskripsi:'Kelola konten'}
        ];
        localStorage.setItem('layananData', JSON.stringify(layananData));
    } else layananData = JSON.parse(localStorage.getItem('layananData'));

    if(!localStorage.getItem('usersData')){
        usersData = [
            {id:'U001',name:'Andi Prasetyo',email:'andi@example.com',role:'admin',joined:'2024-08-01'},
            {id:'U002',name:'Sinta Maharani',email:'sinta@example.com',role:'client',joined:'2024-09-10'},
            {id:'U003',name:'Budi Santoso',email:'budi@example.com',role:'client',joined:'2024-11-02'}
        ];
        localStorage.setItem('usersData', JSON.stringify(usersData));
    } else usersData = JSON.parse(localStorage.getItem('usersData'));

    if(!localStorage.getItem('paymentsData')){
        paymentsData = [
            {id:'P001',userId:'U002',service:'Website Company Profile',amount:5000000,date:'2025-10-01',status:'Lunas'},
            {id:'P002',userId:'U003',service:'Social Media Management',amount:2500000,date:'2025-11-10',status:'Belum Bayar'}
        ];
        localStorage.setItem('paymentsData', JSON.stringify(paymentsData));
    } else paymentsData = JSON.parse(localStorage.getItem('paymentsData'));
}

/* ---------- TOAST UTIL (success/info/error) ---------- */
function showToast(message, opts = {}) {
    const { type = 'success', duration = 1800 } = opts;
    const t = document.getElementById('toast');
    if(!t) return;
    const text = document.getElementById('toastText');
    const icon = t.querySelector('.icon');

    // reset classes
    t.className = 'toast';
    t.classList.add('show');
    t.classList.add(type);

    // choose icon
    if (type === 'success') { icon.className = 'icon fas fa-check-circle'; }
    else if (type === 'error') { icon.className = 'icon fas fa-exclamation-circle'; }
    else { icon.className = 'icon fas fa-info-circle'; }

    text.textContent = message;

    clearTimeout(t._hideTimeout);
    t._hideTimeout = setTimeout(() => {
        t.classList.remove('show');
    }, duration);
}

/* ---------- SPA NAV ---------- */
function setActiveNav(id){
    document.querySelectorAll('.sidebar li').forEach(li=>li.classList.remove('active'));
    const el = document.getElementById(id); if(el) el.classList.add('active');
}

function showDashboard(){
    setActiveNav('nav-dashboard');
    document.getElementById('mainContent').innerHTML = `
        <div class="header"><div class="header-left"><h1>Dashboard Admin</h1><p>Kelola layanan digital Anda dengan mudah</p></div><div class="user-info"><i class="fas fa-user-circle"></i><span>Andi</span></div></div>
        <div class="stats"><div class="stat-card"><h3>Total Layanan</h3><div class="number" id="totalLayanan">0</div></div><div class="stat-card"><h3>Layanan Tersedia</h3><div class="number" id="layananTersedia">0</div></div><div class="stat-card"><h3>Dalam Proses</h3><div class="number" id="layananProses">0</div></div></div>
        <div class="content-section"><div class="section-header"><h2><i class="fas fa-list-ul"></i> Manajemen Layanan</h2><div><button class="btn btn-primary" onclick="openModal()"><i class="fas fa-plus"></i> Tambah Layanan</button></div></div>
        <div class="search-box"><input id="searchInput" type="text" placeholder="Cari layanan..." onkeyup="searchLayanan()"></div>
        <table id="layananTable"><thead><tr><th>ID</th><th>Nama Layanan</th><th>Kategori</th><th>Harga</th><th>Durasi</th><th>Status</th><th>Aksi</th></tr></thead><tbody id="layananTableBody"></tbody></table></div>
    `;
    renderTable(); updateStats();
}

function showUsers(){
    setActiveNav('nav-users');
    document.getElementById('mainContent').innerHTML = `
        <div class="header"><div class="header-left"><h1>User Management</h1><p>Daftar pengguna yang terdaftar di sistem</p></div><div class="user-info"><i class="fas fa-user-circle"></i><span>Admin</span></div></div>
        <div class="content-section"><div class="section-header"><h2><i class="fas fa-users"></i> Daftar User</h2><div><button class="btn btn-primary" onclick="openUserModal()"><i class="fas fa-user-plus"></i> Tambah User</button></div></div>
        <div class="search-box"><input id="searchUserInput" type="text" placeholder="Cari user..." onkeyup="searchUsers()"></div>
        <table id="usersTable"><thead><tr><th>ID</th><th>Nama</th><th>Email</th><th>Role</th><th>Tanggal Bergabung</th><th>Aksi</th></tr></thead><tbody id="usersTableBody"></tbody></table></div>
    `;
    renderUsersTable();
}

function showPayments(){
    setActiveNav('nav-payments');
    document.getElementById('mainContent').innerHTML = `
        <div class="header"><div class="header-left"><h1>Status Pembayaran</h1><p>Pantau status pembayaran klien</p></div><div class="user-info"><i class="fas fa-user-circle"></i><span>Admin</span></div></div>
        <div class="content-section"><div class="section-header"><h2><i class="fas fa-file-invoice-dollar"></i> Riwayat Pembayaran</h2><div><button class="btn btn-primary" onclick="openPaymentModal()"><i class="fas fa-plus"></i> Tambah Pembayaran</button></div></div>
        <div class="search-box"><input id="searchPaymentInput" type="text" placeholder="Cari pembayaran..." onkeyup="searchPayments()"></div>
        <table id="paymentsTable"><thead><tr><th>ID</th><th>User</th><th>Layanan</th><th>Jumlah</th><th>Tanggal</th><th>Status</th><th>Aksi</th></tr></thead><tbody id="paymentsTableBody"></tbody></table></div>
    `;
    renderPaymentsTable();
}

/* ---------- LAYANAN HANDLERS ---------- */
function saveLayananToStorage(){ localStorage.setItem('layananData', JSON.stringify(layananData)); }
function renderTable(){
    layananData = JSON.parse(localStorage.getItem('layananData')||'[]');
    const tbody = document.getElementById('layananTableBody'); if(!tbody) return; tbody.innerHTML = '';
    layananData.forEach((item, idx) => {
        const tr = document.createElement('tr');
        const statusBadge = item.status === 'Tersedia' ? 'badge-paid' : 'badge-unpaid';
        const statusIcon = item.status === 'Tersedia' ? 'fa-check-circle' : 'fa-clock';
        tr.innerHTML = `<td>#${item.id}</td><td><strong>${item.nama}</strong></td><td>${item.kategori}</td><td>Rp ${item.harga.toLocaleString('id-ID')}</td><td>${item.durasi}</td><td><span class="badge ${statusBadge}"><i class="fas ${statusIcon}"></i> ${item.status}</span></td>
            <td><div class="action-buttons"><button class="btn btn-primary" onclick="editLayanan(${idx})"><i class="fas fa-edit"></i></button><button class="btn btn-danger" onclick="deleteLayanan(${idx})"><i class="fas fa-trash"></i></button></div></td>`;
        tbody.appendChild(tr);
    });
}
function updateStats(){
    const total = layananData.length;
    const tersedia = layananData.filter(l=>l.status==='Tersedia').length;
    const proses = layananData.filter(l=>l.status==='Dalam Proses').length;
    document.getElementById('totalLayanan') && (document.getElementById('totalLayanan').textContent = total);
    document.getElementById('layananTersedia') && (document.getElementById('layananTersedia').textContent = tersedia);
    document.getElementById('layananProses') && (document.getElementById('layananProses').textContent = proses);
}

/* Modal control (reliable) */
function openModal(){
    editIndex = -1;
    const titleEl = document.getElementById('modalTitle');
    if(titleEl) titleEl.textContent = ' Tambah Layanan';
    const m = document.getElementById('layananModal'); if(m) m.classList.add('active');
    document.body.classList.add('modal-open');
    const form = document.getElementById('layananForm'); if(form) form.reset();
    setTimeout(()=>{ const el = document.getElementById('namaLayanan'); if(el) el.focus(); }, 140);
}
function closeModal(){
    const m = document.getElementById('layananModal'); if(m) m.classList.remove('active');
    setTimeout(()=>{ if(!document.querySelectorAll('.modal.active').length) document.body.classList.remove('modal-open'); }, 260);
}
function saveLayanan(e){ 
    e.preventDefault();
    const idVal = editIndex === -1 ? (layananData.length>0?Math.max(...layananData.map(l=>l.id))+1:1) : layananData[editIndex].id;
    const layanan = { id:idVal, nama: document.getElementById('namaLayanan').value, kategori: document.getElementById('kategori').value, harga: parseInt(document.getElementById('harga').value)||0, durasi: document.getElementById('durasi').value, status: document.getElementById('status').value, deskripsi: document.getElementById('deskripsi').value };
    if(editIndex===-1) layananData.push(layanan); else layananData[editIndex] = layanan;
    saveLayananToStorage(); closeModal(); showToast('Layanan tersimpan', {type:'success'}); showDashboard();
}
function editLayanan(index){
    editIndex = index;
    const layanan = layananData[index];
    const modalTitleEl = document.getElementById('modalTitle');
    if(modalTitleEl) modalTitleEl.innerHTML = '<i class="fas fa-edit"></i> Edit Layanan';
    const form = document.getElementById('layananForm'); if(form) form.reset();
    document.getElementById('namaLayanan').value = layanan.nama;
    document.getElementById('kategori').value = layanan.kategori;
    document.getElementById('harga').value = layanan.harga;
    document.getElementById('durasi').value = layanan.durasi;
    document.getElementById('status').value = layanan.status;
    document.getElementById('deskripsi').value = layanan.deskripsi;
    const m = document.getElementById('layananModal'); if(m) m.classList.add('active');
    document.body.classList.add('modal-open');
    setTimeout(()=> document.getElementById('namaLayanan').focus(), 140);
}
function deleteLayanan(index){ if(confirm('Hapus layanan?')){ layananData.splice(index,1); saveLayananToStorage(); renderTable(); updateStats(); showToast('Layanan dihapus', {type:'info'}); } }
function searchLayanan(){ const term = document.getElementById('searchInput')?.value.toLowerCase()||''; document.querySelectorAll('#layananTableBody tr').forEach(r=>r.style.display = r.textContent.toLowerCase().includes(term) ? '' : 'none'); }

/* ---------- USER HANDLERS ---------- */
function saveUsersToStorage(){ localStorage.setItem('usersData', JSON.stringify(usersData)); }
function renderUsersTable(){
    usersData = JSON.parse(localStorage.getItem('usersData')||'[]');
    const tbody = document.getElementById('usersTableBody'); if(!tbody) return; tbody.innerHTML='';
    usersData.forEach((u, idx)=> { const tr=document.createElement('tr'); tr.innerHTML = `<td>${u.id}</td><td><strong>${u.name}</strong></td><td>${u.email}</td><td>${u.role}</td><td>${u.joined}</td><td><div class="action-buttons"><button class="btn btn-primary" onclick="openUserModal(${idx})"><i class="fas fa-edit"></i></button><button class="btn btn-danger" onclick="deleteUser(${idx})"><i class="fas fa-trash"></i></button></div></td>`; tbody.appendChild(tr); });
}
function openUserModal(index=null){
    const form = document.getElementById('userForm'); if(form) form.reset();
    document.getElementById('userIndex').value = index===null ? '' : index;
    const titleEl = document.getElementById('userModalTitle'); if(titleEl) titleEl.textContent = index===null ? ' Tambah User' : ' Edit User';
    if(index!==null){ const u = usersData[index]; document.getElementById('userName').value = u.name; document.getElementById('userEmail').value = u.email; document.getElementById('userRole').value = u.role; }
    const m = document.getElementById('userModal'); if(m) m.classList.add('active');
    document.body.classList.add('modal-open');
    setTimeout(()=>{ const el = document.getElementById('userName'); if(el) el.focus(); },130);
}
function closeUserModal(){ const m = document.getElementById('userModal'); if(m) m.classList.remove('active'); setTimeout(()=>{ if(!document.querySelectorAll('.modal.active').length) document.body.classList.remove('modal-open'); },260); }
function handleAddUser(e){ 
    e.preventDefault(); 
    const idx = document.getElementById('userIndex').value; 
    const name = document.getElementById('userName').value.trim(); 
    const email = document.getElementById('userEmail').value.trim(); 
    const role = document.getElementById('userRole').value || 'client'; 
    if(!name||!email){ showToast('Nama & email wajib diisi', {type:'error'}); return; } 
    if(idx===''){ const id = 'U' + String(Math.floor(100 + Math.random()*900)); const joined = new Date().toISOString().slice(0,10); usersData.push({id,name,email,role,joined}); showToast('User ditambahkan', {type:'success'}); } else { usersData[idx] = {...usersData[idx], name, email, role}; showToast('User diperbarui', {type:'success'}); } 
    saveUsersToStorage(); renderUsersTable(); closeUserModal(); 
}

function deleteUser(index){ if(confirm('Hapus user?')){ usersData.splice(index,1); saveUsersToStorage(); renderUsersTable(); showToast('User dihapus', {type:'info'}); } }
function searchUsers(){ const term = document.getElementById('searchUserInput')?.value.toLowerCase()||''; document.querySelectorAll('#usersTableBody tr').forEach(r=>r.style.display = r.textContent.toLowerCase().includes(term)?'':'none'); }

/* ---------- PAYMENT HANDLERS ---------- */
function savePaymentsToStorage(){ localStorage.setItem('paymentsData', JSON.stringify(paymentsData)); }
function renderPaymentsTable(){
    paymentsData = JSON.parse(localStorage.getItem('paymentsData')||'[]');
    usersData = JSON.parse(localStorage.getItem('usersData')||'[]');
    const tbody = document.getElementById('paymentsTableBody'); if(!tbody) return; tbody.innerHTML='';
    paymentsData.forEach((p, idx)=>{ const user = usersData.find(u=>u.id===p.userId) || {name:'-'}; const statusClass = p.status==='Lunas' ? 'badge-paid' : 'badge-unpaid'; const statusLabel = p.status==='Lunas' ? 'Lunas' : 'Belum Bayar'; const tr=document.createElement('tr'); tr.innerHTML = `<td>${p.id}</td><td><strong>${user.name}</strong></td><td>${p.service}</td><td>Rp ${p.amount.toLocaleString('id-ID')}</td><td>${p.date}</td><td><span class="badge ${statusClass}">${statusLabel}</span></td><td><div class="action-buttons"><button class="btn btn-success" onclick="togglePaymentStatus(${idx})"><i class="fas fa-exchange-alt"></i></button><button class="btn btn-danger" onclick="deletePayment(${idx})"><i class="fas fa-trash"></i></button></div></td>`; tbody.appendChild(tr); });
}
function openPaymentModal(index=null){
    const form = document.getElementById('paymentForm'); if(form) form.reset();
    document.getElementById('paymentIndex').value = index===null ? '' : index;
    const sel = document.getElementById('paymentUser'); if(sel) { sel.innerHTML = ''; usersData.forEach(u=>{ const opt=document.createElement('option'); opt.value = u.id; opt.textContent = `${u.name} (${u.id})`; sel.appendChild(opt); }); }
    if(index!==null){ const p = paymentsData[index]; document.getElementById('paymentUser').value = p.userId; document.getElementById('paymentService').value = p.service; document.getElementById('paymentAmount').value = p.amount; document.getElementById('paymentDate').value = p.date; } else { const dEl = document.getElementById('paymentDate'); if(dEl) dEl.value = new Date().toISOString().slice(0,10); }
    const m = document.getElementById('paymentModal'); if(m) m.classList.add('active');
    document.body.classList.add('modal-open');
    setTimeout(()=>{ const el = document.getElementById('paymentUser'); if(el) el.focus(); },130);
}
function closePaymentModal(){ const m = document.getElementById('paymentModal'); if(m) m.classList.remove('active'); setTimeout(()=>{ if(!document.querySelectorAll('.modal.active').length) document.body.classList.remove('modal-open'); },260); }
function handleAddPayment(e){ 
    e.preventDefault(); 
    const idx = document.getElementById('paymentIndex').value; 
    const userId = document.getElementById('paymentUser').value; 
    const service = document.getElementById('paymentService').value.trim(); 
    const amount = parseInt(document.getElementById('paymentAmount').value)||0; 
    const date = document.getElementById('paymentDate').value; 
    if(!userId||!service||!amount||!date){ showToast('Lengkapi data pembayaran', {type:'error'}); return; } 
    if(idx===''){ const id = 'P' + String(Math.floor(100 + Math.random()*900)); paymentsData.push({id,userId,service,amount,date,status:'Belum Bayar'}); showToast('Pembayaran ditambahkan', {type:'success'}); } else { paymentsData[idx] = {...paymentsData[idx], userId,service,amount,date}; showToast('Pembayaran diperbarui', {type:'success'}); } 
    savePaymentsToStorage(); renderPaymentsTable(); closePaymentModal(); 
}
function togglePaymentStatus(index){ paymentsData[index].status = paymentsData[index].status==='Lunas'?'Belum Bayar':'Lunas'; savePaymentsToStorage(); renderPaymentsTable(); showToast('Status pembayaran diperbarui', {type:'info'}); }
function deletePayment(index){ if(confirm('Hapus pembayaran?')){ paymentsData.splice(index,1); savePaymentsToStorage(); renderPaymentsTable(); showToast('Pembayaran dihapus', {type:'info'}); } }
function searchPayments(){ const term = document.getElementById('searchPaymentInput')?.value.toLowerCase()||''; document.querySelectorAll('#paymentsTableBody tr').forEach(r=>r.style.display = r.textContent.toLowerCase().includes(term)?'':'none'); }

/* ---------- UTIL: TOAST / MODAL CLOSE HANDLERS ---------- */
// close by backdrop click
document.querySelectorAll('[data-modal-close]').forEach(el => el.addEventListener('click', () => {
    document.querySelectorAll('.modal.active').forEach(m => { m.classList.remove('active'); });
    setTimeout(()=>{ if(!document.querySelectorAll('.modal.active').length) document.body.classList.remove('modal-open'); }, 260);
}));

// close modals with ESC
window.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        document.querySelectorAll('.modal.active').forEach(m => m.classList.remove('active'));
        setTimeout(()=>{ if(!document.querySelectorAll('.modal.active').length) document.body.classList.remove('modal-open'); }, 260);
    }
});

function logout(){ if(confirm('Keluar dari dashboard?')) { showToast('Anda telah logout', {type:'info'}); } }

/* ---------- INIT ---------- */
(function init(){
    initDefaultData();
    layananData = JSON.parse(localStorage.getItem('layananData')||'[]');
    usersData = JSON.parse(localStorage.getItem('usersData')||'[]');
    paymentsData = JSON.parse(localStorage.getItem('paymentsData')||'[]');
    showDashboard();
})();