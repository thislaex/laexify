<?php
session_start();

if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

require_once '../config/database.php';
require_once '../config/settings.php';

$database = new Database();
$db = $database->getConnection();
$settings = new Settings($db);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updates = [
        'site_title' => $_POST['site_title'] ?? '',
        'site_description' => $_POST['site_description'] ?? '',
        'site_keywords' => $_POST['site_keywords'] ?? '',
        'site_author' => $_POST['site_author'] ?? '',
        'og_title' => $_POST['og_title'] ?? '',
        'og_description' => $_POST['og_description'] ?? '',
        'twitter_title' => $_POST['twitter_title'] ?? '',
        'twitter_description' => $_POST['twitter_description'] ?? '',
        'github_username' => $_POST['github_username'] ?? ''
    ];

    foreach($updates as $key => $value) {
        $settings->updateSetting($key, $value);
    }

    $success = "Settings updated successfully!";
}

$currentSettings = $settings->getAllSettings();
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Laexify Admin</title>
    <link rel="icon" type="image/x-icon" href="../cdn/img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../cdn/assets/css/styles.css">
    <style>
        * {
            cursor: default;
        }
        body {
            background: #f3f4f6;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        a, button, input[type="submit"], .menu-item {
            cursor: pointer !important;
        }
        input, textarea, select {
            cursor: text !important;
        }
        .sidebar {
            width: 260px;
            background: white;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            box-shadow: 2px 0 10px rgba(0,0,0,0.05);
            z-index: 100;
        }
        .sidebar-header {
            padding: 1.5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .sidebar-menu {
            padding: 1rem;
        }
        .menu-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: #374151;
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 0.5rem;
            transition: all 0.3s;
        }
        .menu-item:hover, .menu-item.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .menu-item i {
            margin-right: 0.75rem;
            width: 20px;
        }
        .main-content {
            margin-left: 260px;
            padding: 2rem;
        }
        .top-bar {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .content-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #374151;
            font-weight: 500;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s;
        }
        .form-group input:focus, .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }
        .btn-primary {
            padding: 0.75rem 1.5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
        }
        .btn-danger {
            padding: 0.75rem 1.5rem;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .btn-danger:hover {
            transform: translateY(-2px);
        }
        .success-message {
            background: #dcfce7;
            color: #15803d;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }
        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid #e5e7eb;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        .stat-info h3 {
            font-size: 0.875rem;
            color: #6b7280;
            margin-bottom: 0.25rem;
        }
        .stat-info p {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h2 class="text-xl font-bold">Laexify Admin</h2>
            <p class="text-sm opacity-90 mt-1">Control Panel</p>
        </div>
        <div class="sidebar-menu">
            <a href="dashboard.php" class="menu-item active">
                <i class="fas fa-home"></i>
                Dashboard
            </a>
            <a href="logout.php" class="menu-item">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="top-bar">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
                <p class="text-gray-600 mt-1">Manage your portfolio settings</p>
            </div>
            <div class="text-gray-600">
                <i class="fas fa-user-circle mr-2"></i>
                <?php echo htmlspecialchars($_SESSION['admin_username']); ?>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-info">
                    <h3>Total Settings</h3>
                    <p><?php echo count($currentSettings); ?></p>
                </div>
                <div class="stat-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                    <i class="fas fa-cog"></i>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <h3>GitHub Projects</h3>
                    <p>Live Data</p>
                </div>
                <div class="stat-icon" style="background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%); color: white;">
                    <i class="fab fa-github"></i>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <h3>Status</h3>
                    <p>Active</p>
                </div>
                <div class="stat-icon" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white;">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
        </div>

        <div class="content-card">
            <?php if(isset($success)): ?>
                <div class="success-message">
                    <i class="fas fa-check-circle mr-2"></i>
                    <?php echo htmlspecialchars($success); ?>
                </div>
            <?php endif; ?>

            <h2 class="section-title">Site Settings</h2>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="site_title">Site Title</label>
                    <input type="text" id="site_title" name="site_title" value="<?php echo htmlspecialchars($currentSettings['site_title'] ?? ''); ?>" required>
                </div>

                <div class="form-group">
                    <label for="site_description">Meta Description</label>
                    <textarea id="site_description" name="site_description" required><?php echo htmlspecialchars($currentSettings['site_description'] ?? ''); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="site_keywords">Meta Keywords</label>
                    <input type="text" id="site_keywords" name="site_keywords" value="<?php echo htmlspecialchars($currentSettings['site_keywords'] ?? ''); ?>" required>
                </div>

                <div class="form-group">
                    <label for="site_author">Author</label>
                    <input type="text" id="site_author" name="site_author" value="<?php echo htmlspecialchars($currentSettings['site_author'] ?? ''); ?>" required>
                </div>

                <h2 class="section-title">Open Graph Settings</h2>

                <div class="form-group">
                    <label for="og_title">OG Title</label>
                    <input type="text" id="og_title" name="og_title" value="<?php echo htmlspecialchars($currentSettings['og_title'] ?? ''); ?>" required>
                </div>

                <div class="form-group">
                    <label for="og_description">OG Description</label>
                    <textarea id="og_description" name="og_description" required><?php echo htmlspecialchars($currentSettings['og_description'] ?? ''); ?></textarea>
                </div>

                <h2 class="section-title">Twitter Card Settings</h2>

                <div class="form-group">
                    <label for="twitter_title">Twitter Title</label>
                    <input type="text" id="twitter_title" name="twitter_title" value="<?php echo htmlspecialchars($currentSettings['twitter_title'] ?? ''); ?>" required>
                </div>

                <div class="form-group">
                    <label for="twitter_description">Twitter Description</label>
                    <textarea id="twitter_description" name="twitter_description" required><?php echo htmlspecialchars($currentSettings['twitter_description'] ?? ''); ?></textarea>
                </div>

                <h2 class="section-title">GitHub Integration</h2>

                <div class="form-group">
                    <label for="github_username">GitHub Username</label>
                    <input type="text" id="github_username" name="github_username" value="<?php echo htmlspecialchars($currentSettings['github_username'] ?? ''); ?>" required>
                    <small class="text-gray-500">Projects will be fetched from this GitHub account</small>
                </div>

                <div style="display: flex; gap: 1rem;">
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-save mr-2"></i>
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
