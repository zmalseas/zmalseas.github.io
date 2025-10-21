<?php
// Scans workspace for <script type="application/ld+json"> blocks and attempts json_decode
$root = realpath(__DIR__ . '/../');
$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root));
$pattern = '/<script[^>]*type=["\']application\/ld\+json["\'][^>]*>(.*?)<\\\/script>/is';
$errors = [];
foreach ($files as $file) {
    if (!$file->isFile()) continue;
    $ext = strtolower(pathinfo($file->getPathname(), PATHINFO_EXTENSION));
    if (!in_array($ext, ['php','html','htm'])) continue;
    $content = file_get_contents($file->getPathname());
    if (preg_match_all($pattern, $content, $m)) {
        foreach ($m[1] as $idx => $block) {
            $blockTrim = trim($block);
            // Remove any server-side PHP echo bits inside the tag (heuristic)
            $clean = preg_replace('/<\?php.*?\?>/s', '', $blockTrim);
            // Replace unescaped line breaks, but keep unicode
            $json = $clean;
            // Try decode
            $decoded = json_decode($json, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                $errors[] = [
                    'file' => $file->getPathname(),
                    'index' => $idx,
                    'error' => json_last_error_msg(),
                    'snippet' => substr($json,0,800)
                ];
            }
        }
    }
}
if (empty($errors)) {
    echo "OK: No JSON-LD parse errors found\n";
    exit(0);
}
foreach ($errors as $e) {
    echo "ERROR in " . $e['file'] . " (block #" . $e['index'] . ")\n";
    echo "json error: " . $e['error'] . "\n";
    echo "snippet:\n" . $e['snippet'] . "\n\n";
}
exit(1);
