/* ---------- Data & Storage ---------- */
let ordersData = [];
let usersData = [];

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
        <div class="header"><div class="header-left"><h1>Dashboard Admin</h1><p>Kelola pesanan masuk</p></div><div class="user-info"><i class="fas fa-user-circle"></i><span>Admin</span></div></div>
        <div class="stats">
            <div class="stat-card"><h3>Total Pesanan</h3><div class="number" id="totalOrders">0</div></div>
            <div class="stat-card"><h3>Pending</h3><div class="number" id="pendingOrders">0</div></div>
            <div class="stat-card"><h3>Approved</h3><div class="number" id="approvedOrders">0</div></div>
        </div>
        <div class="content-section">
            <div class="section-header"><h2><i class="fas fa-list-ul"></i> Daftar Pesanan Masuk</h2></div>
            <div class="search-box"><input id="searchInput" type="text" placeholder="Cari pesanan..." onkeyup="searchOrders()"></div>
            <table id="ordersTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Total Harga</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="ordersTableBody"></tbody>
            </table>
        </div>
    `;
    fetchOrders();
}

function showUsers(){
    setActiveNav('nav-users');
    document.getElementById('mainContent').innerHTML = `
        <div class="header"><div class="header-left"><h1>User Management</h1><p>Daftar pengguna yang terdaftar di sistem</p></div><div class="user-info"><i class="fas fa-user-circle"></i><span>Admin</span></div></div>
        <div class="content-section">
            <div class="section-header"><h2><i class="fas fa-users"></i> Daftar User</h2></div>
            <div class="search-box"><input id="searchUserInput" type="text" placeholder="Cari user..." onkeyup="searchUsers()"></div>
            <table id="usersTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Tanggal Bergabung</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="usersTableBody"></tbody>
            </table>
        </div>
    `;
    fetchUsers();
}

/* ---------- API HANDLERS ---------- */
async function fetchOrders() {
    try {
        const response = await fetch('/admin/api/orders');
        ordersData = await response.json();
        renderOrdersTable();
        updateStats();
    } catch (error) {
        console.error('Error fetching orders:', error);
        showToast('Gagal memuat data pesanan', {type: 'error'});
    }
}

async function fetchUsers() {
    try {
        const response = await fetch('/admin/api/users');
        usersData = await response.json();
        renderUsersTable();
    } catch (error) {
        console.error('Error fetching users:', error);
        showToast('Gagal memuat data user', {type: 'error'});
    }
}

async function updateOrderStatus(id, newStatus) {
    try {
        const response = await fetch(`/admin/api/orders/${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ status: newStatus })
        });
        
        if (response.ok) {
            showToast(`Order #${id} updated to ${newStatus}`, {type: 'success'});
            fetchOrders(); // Refresh table
        } else {
            showToast('Gagal update status', {type: 'error'});
        }
    } catch (error) {
        console.error('Error updating order:', error);
    }
}

async function deleteOrder(id) {
    if(!confirm('Hapus pesanan ini permanen?')) return;

    try {
        const response = await fetch(`/admin/api/orders/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });

        if (response.ok) {
            showToast('Pesanan dihapus', {type: 'info'});
            fetchOrders();
        } else {
            showToast('Gagal menghapus pesanan', {type: 'error'});
        }
    } catch (error) {
        console.error('Error deleting order:', error);
    }
}

async function deleteUser(id) {
    if(!confirm('Hapus user ini permanen?')) return;

    try {
        const response = await fetch(`/admin/api/users/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });

        if (response.ok) {
            showToast('User dihapus', {type: 'info'});
            fetchUsers();
        } else {
            showToast('Gagal menghapus user', {type: 'error'});
        }
    } catch (error) {
        console.error('Error deleting user:', error);
    }
}

/* ---------- RENDERERS ---------- */
function renderOrdersTable() {
    const tbody = document.getElementById('ordersTableBody');
    if (!tbody) return;
    tbody.innerHTML = '';

    ordersData.forEach(order => {
        const tr = document.createElement('tr');
        
        let statusBadge = 'badge-unpaid'; // default gray/red
        if (order.status === 'approved') statusBadge = 'badge-paid'; // green
        if (order.status === 'pending') statusBadge = 'badge-warning'; // yellow (custom css needed or reuse existing)

        // Status Dropdown Logic
        const statusSelect = `
            <select onchange="updateOrderStatus(${order.order_id}, this.value)" class="status-select">
                <option value="pending" ${order.status === 'pending' ? 'selected' : ''}>Pending</option>
                <option value="approved" ${order.status === 'approved' ? 'selected' : ''}>Approved</option>
                <option value="rejected" ${order.status === 'rejected' ? 'selected' : ''}>Rejected</option>
            </select>
        `;

        tr.innerHTML = `
            <td>#${order.order_id}</td>
            <td><strong>${order.user ? order.user.nama : 'Unknown'}</strong><br><small>${order.user ? order.user.email : ''}</small></td>
            <td>Rp ${new Intl.NumberFormat('id-ID').format(order.total_harga)}</td>
            <td>${new Date(order.created_at).toLocaleDateString('id-ID')}</td>
            <td>${statusSelect}</td>
            <td>
                <button class="btn btn-danger btn-sm" onclick="deleteOrder(${order.order_id})"><i class="fas fa-trash"></i></button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

function renderUsersTable() {
    const tbody = document.getElementById('usersTableBody');
    if (!tbody) return;
    tbody.innerHTML = '';

    usersData.forEach(user => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>#${user.user_id}</td>
            <td><strong>${user.nama}</strong></td>
            <td>${user.email}</td>
            <td><span class="badge ${user.role === 'admin' ? 'badge-paid' : 'badge-unpaid'}">${user.role}</span></td>
            <td>${new Date(user.created_at).toLocaleDateString('id-ID')}</td>
            <td>
                <button class="btn btn-danger btn-sm" onclick="deleteUser(${user.user_id})"><i class="fas fa-trash"></i></button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

function updateStats() {
    const total = ordersData.length;
    const pending = ordersData.filter(o => o.status === 'pending').length;
    const approved = ordersData.filter(o => o.status === 'approved').length;

    if(document.getElementById('totalOrders')) document.getElementById('totalOrders').textContent = total;
    if(document.getElementById('pendingOrders')) document.getElementById('pendingOrders').textContent = pending;
    if(document.getElementById('approvedOrders')) document.getElementById('approvedOrders').textContent = approved;
}

function searchOrders() {
    const term = document.getElementById('searchInput').value.toLowerCase();
    const rows = document.querySelectorAll('#ordersTableBody tr');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(term) ? '' : 'none';
    });
}

function searchUsers() {
    const term = document.getElementById('searchUserInput').value.toLowerCase();
    const rows = document.querySelectorAll('#usersTableBody tr');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(term) ? '' : 'none';
    });
}

function logout(){ 
    if(confirm('Keluar dari dashboard?')) { 
        // Submit logout form
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/auth/logout';
        const csrf = document.createElement('input');
        csrf.type = 'hidden';
        csrf.name = '_token';
        csrf.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        form.appendChild(csrf);
        document.body.appendChild(form);
        form.submit();
    } 
}

/* ---------- INIT ---------- */
(function init(){
    showDashboard();
})();