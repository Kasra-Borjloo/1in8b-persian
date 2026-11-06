<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$db_file = __DIR__ . '/data.sqlite';
$pdo = new PDO('sqlite:' . $db_file);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Create SQLite tables if not exist
$pdo->exec("
CREATE TABLE IF NOT EXISTS memorials (
    id TEXT PRIMARY KEY,
    tok TEXT,
    data TEXT,
    created_at INTEGER
);
CREATE TABLE IF NOT EXISTS rooms (
    id TEXT PRIMARY KEY,
    tok TEXT,
    room TEXT,
    created_at INTEGER
);
CREATE TABLE IF NOT EXISTS lives (
    id TEXT PRIMARY KEY,
    tok TEXT,
    data TEXT,
    created_at INTEGER
);
");

$uri = $_SERVER['REQUEST_URI'] ?? '';
$path = parse_url($uri, PHP_URL_PATH);
$body_raw = file_get_contents('php://input');
$body = json_decode($body_raw, true) ?? $_POST;

$tok = $body['tok'] ?? 'free-unlocked-token-persian';

// Default successful response
$res = [
    'ok' => true,
    'tok' => $tok,
    'left' => 999999,
    'full' => true,
    'pk' => ['all', 'deco', 'nature', 'city', 'cozy'],
    'pka' => new stdClass(),
    'ml' => 0,
    'why' => ''
];

if (strpos($path, '/api/memorial') !== false) {
    if (isset($body['d'])) {
        $id = substr(md5(uniqid()), 0, 9);
        $stmt = $pdo->prepare("INSERT OR REPLACE INTO memorials (id, tok, data, created_at) VALUES (?, ?, ?, ?)");
        $stmt->execute([$id, $tok, json_encode($body), time()]);
        $res['id'] = $id;
        $res['left'] = 999999;
    }
} elseif (strpos($path, '/api/memown') !== false) {
    $res['d'] = [];
    $res['rm'] = new stdClass();
} elseif (strpos($path, '/api/home/room') !== false || strpos($path, '/api/home/set') !== false) {
    $res['rm'] = $body['rm'] ?? [];
    $res['hk'] = 'hk_' . substr(md5(uniqid()), 0, 8);
    $res['pub'] = true;
} elseif (strpos($path, '/api/home') !== false) {
    $res['me'] = [
        'nm' => 'خانه من',
        'pub' => true,
        'hk' => 'hk_free'
    ];
} elseif (strpos($path, '/api/lives') !== false) {
    $res['lives'] = [];
    $res['items'] = [];
} elseif (strpos($path, '/api/villages') !== false) {
    $res['villages'] = [];
}

echo json_encode($res, JSON_UNESCAPED_UNICODE);
