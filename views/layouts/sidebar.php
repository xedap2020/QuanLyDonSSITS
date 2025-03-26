<ul class="sidebar-menu">
  <li class="<?= (!isset($_GET['url']) || $_GET['url'] === '' || $_GET['url'] === 'dashboard') ? 'active' : '' ?>">
    <a href="/approval_system/public/dashboard">Dashboard</a>
  </li>
  <li class="<?= ($_GET['url'] ?? '') === 'users' || ($_GET['url'] ?? '') === 'users/create' ? 'active' : '' ?>">
      <a href="/approval_system/public/users">Quản lý người dùng</a>
  </li>
  <li class="<?= ($_GET['url'] ?? '') === 'requests' ? 'active' : '' ?>">
    <a href="/approval_system/public/requests">Quản lý đơn</a>
  </li>
  <li>
    <a href="/approval_system/public/logout">Đăng xuất</a>
  </li>
</ul>

<style>
  .sidebar-menu {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .sidebar-menu li {
    height: 56px;
    padding-left: 20px;
    display: flex;
    align-items: center;
    font-size: 18px;
    font-weight: 700;
  }

  .sidebar-menu li a {
    text-decoration: none;
    color: black;
    width: 100%;
    display: block;
    padding: 16px 0;
  }

  .sidebar-menu li.active {
    background-color: #007EC6;
  }

  .sidebar-menu li.active a {
    color: white;
    font-weight: bold;
  }

  .sidebar-menu li:hover:not(.active) {
    background-color: rgba(0, 126, 198, 0.1);
  }
</style>
