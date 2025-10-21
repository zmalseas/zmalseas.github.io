$root = Resolve-Path ".."
$patterns = @('*.php','*.html','*.htm')
$errors = @()

Get-ChildItem -Path $root -Recurse -Include $patterns | ForEach-Object {
    $path = $_.FullName
    try {
        $text = Get-Content -Path $path -Raw -ErrorAction Stop
    } catch { return }
    $pos = 0
    while ($true) {
        $s = $text.IndexOf('<script', $pos)
        if ($s -lt 0) { break }
        $e = $text.IndexOf('</script>', $s)
        if ($e -lt 0) { break }
        $len = $e - $s + 9
        $block = $text.Substring($s, $len)
        # simple contains check for application/ld+json
        if ($block -like '*application/ld+json*') {
            $open = $block.IndexOf('>')
            if ($open -ge 0) {
                $inner = $block.Substring($open+1, $block.Length - $open - 10)
                # remove embedded php blocks safely
                $clean = [regex]::Replace($inner,'<\?php.*?\?>','', [System.Text.RegularExpressions.RegexOptions]::Singleline)
                $clean = $clean -replace "`r`n","`n"
                $trim = $clean.Trim()
                if ($trim) {
                    try { $null = $trim | ConvertFrom-Json -ErrorAction Stop } catch { 
                        $errors += [PSCustomObject]@{ File = $path; Error = $_.Exception.Message; Snippet = $trim.Substring(0,[Math]::Min(800,$trim.Length)) }
                    }
                }
            }
        }
        $pos = $e + 9
    }
}

if ($errors.Count -eq 0) { Write-Host 'OK: No JSON-LD parse errors found'; exit 0 }
foreach ($e in $errors) {
    Write-Host "ERROR in $($e.File)" -ForegroundColor Red
    Write-Host "json error: $($e.Error)" -ForegroundColor Yellow
    Write-Host "snippet:"
    Write-Host $e.Snippet
    Write-Host '------------------------'
}
exit 1
