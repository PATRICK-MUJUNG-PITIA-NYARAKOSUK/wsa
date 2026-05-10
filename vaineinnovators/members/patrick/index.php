<?php require_once '../../db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrick | Vaineinnovators</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Inter', -apple-system, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #e8f0fe 0%, #d4e4fc 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            max-width: 440px;
            width: 100%;
        }

        .profile-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 48px 40px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08), 0 2px 8px rgba(0, 0, 0, 0.04);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .profile-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12), 0 4px 12px rgba(0, 0, 0, 0.06);
        }

        .user-avatar {
            width: 72px;
            height: 72px;
            background: linear-gradient(135deg, #4f8bf9, #3b6fd4);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 28px;
            font-size: 32px;
            font-weight: 600;
            color: white;
            letter-spacing: 1px;
        }

        .greeting {
            text-align: center;
            margin-bottom: 32px;
        }

        .greeting h1 {
            font-size: 26px;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 6px;
            letter-spacing: -0.3px;
        }

        .greeting .subtitle {
            font-size: 14px;
            color: #6b7280;
            font-weight: 500;
        }

        .info-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .info-item {
            background: #f8fafd;
            border-radius: 12px;
            padding: 16px 20px;
            border: 1px solid #eef2f7;
            transition: background 0.15s ease;
        }

        .info-item:hover {
            background: #f0f4fb;
        }

        .info-label {
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #8b9cb5;
            margin-bottom: 6px;
        }

        .info-value {
            font-size: 16px;
            font-weight: 600;
            color: #1a1a2e;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            background: #e8f5e9;
            color: #2e7d32;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
            margin-top: 4px;
        }

        .divider {
            height: 1px;
            background: #eef2f7;
            margin: 24px 0;
        }

        .footer-note {
            text-align: center;
            font-size: 12px;
            color: #9ca3af;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-card">
            <div class="user-avatar">P</div>
            
            <?php
            $stmt = $pdo->prepare("SELECT * FROM members WHERE name = ?");
            $stmt->execute(['Patrick']);
            $member = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if($member): ?>
                <div class="greeting">
                    <h1>Welcome back, <?php echo htmlspecialchars($member['name']); ?></h1>
                    <p class="subtitle">Vaineinnovators Member</p>
                </div>

                <div class="info-list">
                    <div class="info-item">
                        <div class="info-label">Registration Number</div>
                        <div class="info-value"><?php echo htmlspecialchars($member['registration_number']); ?></div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Role</div>
                        <div class="info-value"><?php echo htmlspecialchars($member['role']); ?></div>
                        <span class="status-badge">Active</span>
                    </div>
                </div>

                <div class="divider"></div>
                <p class="footer-note">Vaineinnovators © <?php echo date('Y'); ?></p>
            
            <?php else: ?>
                <div class="greeting">
                    <h1>Profile Not Found</h1>
                    <p class="subtitle">Unable to load member information</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
